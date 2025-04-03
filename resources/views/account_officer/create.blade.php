@extends('layout.app');
@section('content')
  <div class="nk-content ">
          <div class="container-fluid">
            <div class="nk-content-inner">
              <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                  <div class="nk-block-between">
                    <div class="nk-block-head-content">
                      <h3 class="nk-block-title page-title">Create Account Officer</h3>
                    </div><!-- .nk-block-head-content -->
                  </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                  <div class="card">
                    <div class="card-inner">
                      <div class="tab-content">
                        <div class="tab-pane active" id="tabItem5">
                          <h5 class="title">Add Account Officer </h5>
                          
                          <form action="{{ route('add_officer') }}" class="pt-2" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                              
                              
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="last-name">Account Officer Name</label>
                                  <input type="text" name="name" class="form-control" id="email" placeholder="Account Officer Name">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="last-name">Account Officer Number</label>
                                  <input type="text" name="officer_number" class="form-control" id="email" placeholder="Account Officer Name">
                                </div>
                              </div>
                              
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="last-name">Email Address</label>
                                  <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="phone-no">Phone Number</label>
                                  <input type="text" name="phone" class="form-control" id="phone-no" maxlength="11" placeholder="Phone Number">
                                </div>
                              </div>
                              
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-line2">Address</label>
                                  <input type="text" class="form-control" name="address" id="address-line2" >
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Account Role </label>
                                  {{-- <input type="text" name="branch_name"  id="branch-name" placeholder="Branch name"> --}}
                                  <select name="roles" id="" class="form-control" required>
                                    <option value="">Select a Role</option>
                                    <option value="Teller">Teller</option>
                                    <option value="Loan Officer">Loan Officer</option>
                                    <option value="Supervisor">Supervisor</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Super Admin">Super Admin</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name"> Branch </label>
                                  {{-- <input type="text" name="branch_name"  id="branch-name" placeholder="Branch name"> --}}
                                  <select name="branch_id" id="" class="form-control" required>
                                    <option value="">Select Branch</option>
                                    @foreach ($branch as $branches)
                                    <option value="{{ $branches->id }}"> {{ $branches->branch_name }} </option>
                                    @endforeach                                  
                                  </select>
                                </div>
                              </div>
                             
                             

                              <div class="col-md-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                  <li>
                                    <button name="create_branch" class="btn btn-primary">Create Account Officer</button>
                                  </li>

                                </ul>
                              </div>
                            </div>
                          </form>
                        </div>
                        <!--tab pan -->


                      </div>
                    </div>
                    <!--card inner-->
                  </div>
                  <!--card-->
                </div>
                <!--nk-block-->
              </div>
            </div>
          </div>
        </div>
@endsection