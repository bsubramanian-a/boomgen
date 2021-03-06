
    
    @extends('layout.layout')
       
    @section('content')
    <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
              @endif
              @if (session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
              @endif
              <h4 class="card-title">Advertisement List</h4>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                        <th>S.No. #</th>
                        <th>Logo</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php $count = 1 @endphp
                        @foreach ($ads as $ad) 
                          <tr>
                            <td>{{ $count++}}</td>
                            @php $path = url("/".$ad->logo); @endphp
                            <td> <img src="{{ $path }}" alt="logo" /></td>
                            <td>{{ $ad->title}}</td>
                            <td>{{ $ad->description}}</td>
                            <td style="display: flex; flex-direction: row;flex-wrap: nowrap;">
                              <a href="{{ route('viewad', $ad->id) }}" class="btn btn-outline-primary mx-1" style="padding: 7px;width: 70px;">View</a>
                              <a href="{{ route('editad', $ad->id) }}" class="btn btn-outline-secondary mx-1" style="padding: 7px;width: 70px;">Edit</a>
                              <form action="{{ route('deletead') }}" id="deleteadform{{$ad->id}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="deleteid" value="{{$ad->id}}"/>
                              </form>
                              <button onclick="showSwal('deleteadform{{$ad->id}}')" style="padding: 7px;width: 70px;" class="btn btn-outline-danger mx-1">Delete</button>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        
    @endsection