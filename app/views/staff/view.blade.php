@extends('layout.layout')
@section('content')

      <!-- START MAIN CONTENT -->

      <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>All Staffs</div>
          </h1>
          <!-- START COUNT ROW -->
          
          <!-- END COUNT ROW -->

          <!-- START MCQ ROW -->
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3>All Staffs</h3>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped text-center">
                  @if(count($staff) >= '1')
                        <tr>
                          <th>Id</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Phone No.</th>
                          <th>Ip Adress</th>
                          <th>Status</th>
                          <th>Last Ip</th>
                          <th>Last Log in</th>
                          <th>Created at</th>
                          <th>Updated at</th>
                          <th>Action</th>
                        </tr>
                      @foreach( $staff as $s )
                        <tr>
                            <td>{{ $s->id }}</td>   
                            <td>{{ $s->first_name }}</td>
                            <td>{{ $s->last_name }}</td>
                            <td>{{ $s->email }}</td> 
                            <td>{{ $s->phone_no }}</td> 
                            <td>{{ $s->ip_address }}</td>
                          @if($s->status == '0')
                            <td class="badge badge-danger">Blocked</td>
                          @else
                            <td class="badge badge-success">UnBlocked</td>
                          @endif
                            <td>{{ $s->last_ip_address }}</td>
                            <td>{{ $s->last_login }}</td>
                            <td>{{ $s->created_at }}</td>
                            <td>{{ $s->updated_at }}</td>
                            <td><a href="{{ URL::to('/staff/edit/'.$s->id) }}" title="Edit"><i class="ion ion-edit"></i> Edit</a></td>
                        </tr>
                      @endforeach
                  @else
                        <tr>
                          <td colspan="10" align="center">No Staff Found.</td>
                        </tr>
                  @endif
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <!-- END MCQ ROW -->
          
        </section>
      </div>

      <!-- END MAIN CONTENT -->


@endsection

     