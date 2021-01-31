@extends('Admin.layouts.app')

@section('title', 'Profile')

@section('content')
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="
              {{ asset('image/'.auth()->user()->image) }}
              " alt="User profile picture">

              <h3 class="profile-username text-center">{{ $user->name }}</h3>

              <p class="text-muted text-center">Manager</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li><a href="#Company_Settings" data-toggle="tab">Company Settings</a></li>
                <li class="active" ><a href="#Profile_Settings" data-toggle="tab">Profile Settings</a></li>
                <li ><a href="#Profile_Image" data-toggle="tab">Profile Image Settings</a></li>
              </ul>
              <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="tab-pane" id="Company_Settings">
                    <form class="form-horizontal" method="post" action="{{ Route('Company-Update') }}">
                      @csrf

                        <div class="form-group">
                          <label class="col-sm-2 control-label">Software</label>

                          <div class="col-sm-10">
                            <input type="text" class="form-control"  placeholder="Enter your Software name" name="App_name" value="{{ $settings->App_name }}" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Company</label>

                          <div class="col-sm-10">
                            <input type="text" class="form-control"  placeholder="Enter your Company name" name="Company_name" value="{{ $settings->Company_name }}" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" required> I agree to this
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Update Settings </button>
                          </div>
                        </div>
                      </form>
                </div>
                <!-- /.tab-pane -->

                <div class=" active tab-pane" id="Profile_Settings">
                  <form class="form-horizontal">
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Name</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $user->name }}" placeholder="Name" readonly required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Email</label>

                      <div class="col-sm-10">
                        <input type="email" class="form-control" value="{{ $user->email }}"  placeholder="Email" readonly required>
                      </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Old Password</label>

                        <div class="col-sm-10">
                          <input type="password" class="form-control"  placeholder="Enter your old password"x required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-sm-2 control-label">New Password</label>

                        <div class="col-sm-10">
                          <input type="password" class="form-control"  placeholder="Enter your New password" required>
                        </div>
                      </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" required> I agree to this
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Update Profile</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class=" tab-pane" id="Profile_Image" style="height: 280px">
                    <form method="post" action="{{ Route('upload-image') }}" enctype="multipart/form-data">
                        @csrf

                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Profile Image</label>

                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="image"  required onchange="loadFile(event)">
                        </div>
                      </div>
                      <center><img id="output" width="150px" height="150px" accept="image/*"></center>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" required> I agree do this
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Update Upload</button>
                        </div>
                      </div>
                    </form>
                  </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <script>
        var loadFile = function(event) {
          var reader = new FileReader();
          reader.onload = function(){
            var output = document.getElementById('output');
            output.src = reader.result;
          };
          reader.readAsDataURL(event.target.files[0]);
        };
      </script>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
