@extends('layout.layout')

@section('content')
		
		<!-- START MAIN CONTENT -->

      <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Edit Staff</div>
          </h1>
          

          <div class="row">
          <div class="col-12 ">

            <div class="card card-primary">
              <div class="card-header"><h4>Edit Staff</h4></div>

              <div class="card-body">


            @if(Session::has('edit_message'))
                <div class="alert alert-success alert-has-icon alert-dismissible show fade">
                  <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    <div class="alert-title">Success:</div>
                    {{ Session::get('edit_message') }}
                  </div>
                </div>
            @endif

            @if($errors->any())
                {{ implode('', $errors->all('
                <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
                  <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    <div class="alert-title">Error:</div>
                    :message
                  </div>
                </div>
                ')) }}
            @endif


                <form method="POST" action="" class="needs-validation" novalidate="">
                  

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="first_name">First Name</label>
                      <input id="first_name" type="text" class="form-control" name="first_name" autofocus required placeholder="First Name" value="{{ $staff->first_name }}">
                      <div class="invalid-feedback">
                        Enter First Name!
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Last Name</label>
                      <input id="last_name" type="text" class="form-control" name="last_name" required placeholder="Last Name" value="{{ $staff->last_name }}">
                      <div class="invalid-feedback">
                        Enter Last Name!
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12 ">
                      <label for="email" class="d-block">Email</label>
                      <input id="email" type="email" class="form-control" name="email" required readonly="readonly" placeholder="Email (Only Gmail ID)" value="{{ $staff->email }}">
                      <div class="invalid-feedback">
                        Enter Email!
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12">
                      <label for="phone_no" class="d-block">Phone Number</label>
                      <input id="phone_no" type="number" class="form-control" name="phone_no" required placeholder="Phone Number" value="{{ $staff->phone_no }}">
                      <div class="invalid-feedback">
                        Enter Phone Number!
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12">
                      <label for="role" class="d-block">Role</label>
                      <select name="role" id="role" class="form-control" required>
                      @if($staff->role == '2')
                        <option value="{{ $staff->role }}">Selected : Staff</option>
                        <option value="1">Admin</option>
                      @else
                        <option value="{{ $staff->role }}">Selected : Admin</option>
                        <option value="2">Staff</option>
                      @endif
                      </select>
                      <div class="invalid-feedback">
                        Enter Role!
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12">
                      <label for="status" class="d-block">Status</label>
                      <select name="status" id="status" class="form-control" required>
                      @if($staff->status == '0')
                        <option value="{{ $staff->status }}">Selected : Block</option>
                        <option value="1">UnBlock</option>
                      @else
                        <option value="{{ $staff->status }}">Selected : UnBlock</option>
                        <option value="0">Block</option>
                      @endif
                        
                      </select>
                      <div class="invalid-feedback">
                        Enter Status!
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                      Edit
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
          
        </section>
      </div>

      <!-- END MAIN CONTENT -->

@endsection
