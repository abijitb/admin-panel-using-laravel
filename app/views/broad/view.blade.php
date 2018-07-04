@extends('layout.layout')
@section('content')

      <!-- START MAIN CONTENT -->

      <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>All Broad Questions</div>
          </h1>
          <!-- START COUNT ROW -->
          
          <!-- END COUNT ROW -->

          <!-- START BROAD ROW -->
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Broad Questions</h4>
                  </div>
                  <div class="card-body p-0">
                    @if(Session::has('not_found'))
                        <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
                          <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                            <div class="alert-title">Error:</div>
                            {{ Session::get('not_found') }}
                          </div>
                        </div>
                    @endif

                    @if(Session::has('not_belong'))
                        <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
                          <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                            <div class="alert-title">Error:</div>
                            {{ Session::get('not_belong') }}
                          </div>
                        </div>
                    @endif
                    @if(Session::has('del_message'))
                        <div class="alert alert-success alert-has-icon alert-dismissible show fade">
                          <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                            <div class="alert-title">Success:</div>
                            {{ Session::get('del_message') }}
                          </div>
                        </div>
                    @endif
                    <div class="table-responsive">
                      <table class="table table-striped text-center">
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
                          <th colspan="2">Action</th>
                        </tr>
                    @foreach($broad as $m)
                        <tr>
                          <td>{{ $m->id }}</td>
                          <td>{{ $m->user_id }}</td>
                          <td>{{ $m->subject_code }}</td>
                          <td>{{ $m->year }}</td>
                          <td style="width: 25%;">{{ $m->question }}</td>
                          <td>
                            @if($m->status == '0')
                              <div class="badge badge-warning">Deactivated</div>
                            @elseif($m->status == '1')
                              <div class="badge badge-success">Activated</div>
                            @else
                              <div class="badge badge-danger">Trashed</div>
                            @endif
                          </td>
                          <td>{{ $m->ip_address }}</td>
                          <td>{{ $m->created_at }}</td>
                          <td>{{ $m->updated_at }}</td>
                        @if(Auth::user()->role == '1')
                          <td><a href="{{ URL::to('/broad/edit/'.$m->id) }}"><i class="ion ion-edit"></i> Edit</a></td>
                        @endif
                        @if(Auth::user()->role != '1' && $m->status == '2')
                          <td><i class="ion ion-trash-b"></i> Trashed</td>
                        @else
                          <td><a href="{{ URL::to('/broad/remove/'.$m->id) }}"><i class="ion ion-trash-b"></i> Delete</a></td>
                        @endif
                        </tr>
                    @endforeach
                        <tr>
                          <td style="font-size: 20px;">
                            <p >{{ $broad->links() }}</p>
                          </td>
                        </tr>
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

     