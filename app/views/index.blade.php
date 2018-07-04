@extends('layout.layout')
@section('content')

      <!-- START MAIN CONTENT -->

      <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Dashboard</div>
          </h1>
          <!-- START COUNT ROW -->
          <div class="row ">
        
            <div class="col-lg-3 col-md-6 col-12 ">
              <div class="card card-sm-3">
                <div class="card-icon bg-primary">
                  <i class="ion ion-person"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Staffs</h4>
                  </div>
                  <div class="card-body">
                    {{ $user }}
                  </div>
                </div>
              </div>
            </div>


            <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-danger">
                  <i class="ion ion-ios-paper-outline"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>MCQ Questions</h4>
                  </div>
                  <div class="card-body">
                    {{ $mcq_count }}
                  </div>
                </div>
              </div>
            </div>


            <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-warning">
                  <i class="ion ion-ios-paper-outline"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Broad Questions</h4>
                  </div>
                  <div class="card-body">
                    {{ $broad_count }}
                  </div>
                </div>
              </div>
            </div>


            <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-success">
                  <i class="ion ion-ios-book"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Subjects</h4>
                  </div>
                  <div class="card-body">
                    {{ $subject }}
                  </div>
                </div>
              </div>
            </div> 

          </div>
          <!-- END COUNT ROW -->

          <!-- START MCQ ROW -->
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3>Deactivated MCQ Questions</h3>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                  @if(count($mcq) >= '1')
                        <tr>
                          <th>Id</th>
                          <th>User Id</th>
                          <th>Subject Code</th>
                          <th>Year</th>
                          <th>Question <small><div class="badge badge-primary">New</div></small></th>
                          <th>Status</th>
                          <th>Ip Adress</th>
                          <th>Created at</th>
                          <th>Updated at</th>
                      @if(Auth::user()->role == '1')
                          <th colspan="2">Action</th>
                      @endif
                        </tr>
                    @foreach($mcq as $m)
                        <tr>
                          <td>{{ $m->id }}</td>
                          <td>{{ $m->user_id }}</td>
                          <td>{{ $m->subject_code }}</td>
                          <td>{{ $m->year }}</td>
                          <td style="width: 25%;">{{ $m->question }}</td>
                          <td><div class="badge badge-warning">Deactivated</div></td>
                          <td>{{ $m->ip_address }}</td>
                          <td>{{ $m->created_at }}</td>
                          <td>{{ $m->updated_at }}</td>
                        @if(Auth::user()->role == '1')
                          <td><a href="{{ URL::to('/mcq/edit/'.$m->id) }}"><i class="ion ion-edit"></i> Edit</a></td>
                        @endif
                        </tr>
                    @endforeach
                  @else
                        <tr>
                          <td colspan="10" align="center">No Question Found.</td>
                        </tr>
                  @endif
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <!-- END MCQ ROW -->


          <!-- START BROAD ROW -->
          <div class="row ">
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3>Deactivated Broad Questions</h3>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive ">
                      <table class="table table-striped">
                  @if(count($broad) >= '1')
                        <tr>
                          <th>Id</th>
                          <th>User Id</th>
                          <th>Subject Code</th>
                          <th>Year</th>
                          <th>Question <small><div class="badge badge-primary">New</div></small></th>
                          <th>Status</th>
                          <th>Ip Adress</th>
                          <th>Created at</th>
                          <th>Updated at</th>
                      @if(Auth::user()->role == '1')
                          <th colspan="2">Action</th>
                      @endif
                        </tr>
                    @foreach($broad as $b)
                        <tr>
                          <td>{{ $b->id }}</td>
                          <td>{{ $b->user_id }}</td>
                          <td>{{ $b->subject_code }}</td>
                          <td>{{ $b->year }}</td>
                          <td style="width: 25%;">{{ $b->question }}</td>
                          <td><div class="badge badge-warning">Deactivated</div></td>
                          <td>{{ $b->ip_address }}</td>
                          <td>{{ $b->created_at }}</td>
                          <td>{{ $b->updated_at }}</td>
                        @if(Auth::user()->role == '1')
                          <td><a href="{{ URL::to('/broad/edit/'.$b->id) }}"><i class="ion ion-edit"></i> Edit</a></td>
                        @endif
                        </tr>
                    @endforeach
                  @else
                        <tr>
                          <td colspan="10" align="center">No Question Found.</td>
                        </tr>
                  @endif
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <!-- END BROAD ROW -->
          
        </section>
      </div>

      <!-- END MAIN CONTENT -->


@endsection

     