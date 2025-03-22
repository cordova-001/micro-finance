@extends('layout.app');
@section('content')
  <div class="nk-content ">
          <div class="container-fluid">
            <div class="nk-content-inner">
              <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                  <div class="nk-block-between">
                    <div class="nk-block-head-content">
                      <h3 class="nk-block-title page-title">Edit Branch</h3>
                    </div><!-- .nk-block-head-content -->
                  </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                  <div class="card">
                    <div class="card-inner">
                      <div class="tab-content">
                        <div class="tab-pane active" id="tabItem5">
                          <h5 class="title">Edit Branch </h5>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
 
                          
                          <form action="{{ route('branch.update', ['id' => $branch->id]) }}" class="pt-2" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row gy-4">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Branch Manager</label>
                                  <input type="text" name="manager" class="form-control" id="branch-name" value="{{ $branch->manager }}">
                                  {{-- <input type="text" name="branch_name" class="form-control" id="branch-name" value="{{ $branch->id }}"> --}}
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="form-label" for="first-name">Branch Name</label>
                                <input type="text" name="branch_name" class="form-control" id="branch-name" value="{{ $branch->branch_name }}">
                                {{-- <input type="text" name="branch_name" class="form-control" id="branch-name" value="{{ $branch->id }}"> --}}
                              </div>
                            </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="last-name">Email Address</label>
                                  <input type="text" name="email" class="form-control" id="email" value="{{ $branch->email }}">
                                </div>
                              </div>
                              
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="phone-no">Phone Number</label>
                                  <input type="text" name="phone" class="form-control" id="phone-no" maxlength="11" value="{{ $branch->phone }}">
                                </div>
                              </div>
                              
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-line2">Address</label>
                                  <input type="text" class="form-control" name="address" id="address-line2" value="{{ $branch->address }}">
                                </div>
                              </div>
                             
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Branch No</label>
                                  <input type="text" name="branch_no" class="form-control" id="branch_id" readonly value="{{ $branch->branch_no }}">
                                </div>
                              </div>

                              <div class="col-md-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                  <li>
                                    <button name="create_branch" class="btn btn-primary">Edit Branch</button>
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