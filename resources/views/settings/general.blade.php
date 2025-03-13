@extends('layout.app');
@section('content')
  <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title"> General Settings </h3>
                                        </div>
                                        
                                        
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->   
                               @include('Components.settings_menu')
                                                       

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

                                <div class="nk-block nk-block-lg">
                                    <div class="nk-block-head">
                                        
                                    </div>
                                    <div class="card card-bordered card-preview">
                                        <div class="card-inner">
                                            <form action="{{ route('customer.add') }}" class="pt-2" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row gy-4">
                                                  <div class="col-md-9">
                                                    <div class="form-group">
                                                      <label class="form-label" for="first-name">Company Name</label>
                                                      <input type="text" name="first_name" class="form-control" id="first-name" placeholder="First name">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-9">
                                                    <div class="form-group">
                                                      <label class="form-label" for="last-name"> Institution Code </label>
                                                      <input type="text" name="last_name" class="form-control" id="last-name" placeholder="Last name">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-9">
                                                    <div class="form-group">
                                                      <label class="form-label" for="email"> Company Email </label>
                                                      <input type="email" name="email" class="form-control" id="email" placeholder="Email Address">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-9">
                                                    <div class="form-group">
                                                      <label class="form-label" for="phone-no"> Company Phone </label>
                                                      <input type="text" name="phone" class="form-control" id="phone-no" maxlength="11" placeholder="Phone Number">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-9">
                                                    <div class="form-group">
                                                      <label class="form-label" for="address-l1">Company Website</label>
                                                      <input type="text" name="website" class="form-control" id="phone-no" >
                                                    </div>
                                                  </div>
                                                  <div class="col-md-9">
                                                    <div class="form-group">
                                                      <label class="form-label" for="address-line2"> Company Address</label>
                                                      <input type="text" class="form-control" name="company_address" id="address-line2" value="">
                                                    </div>
                                                  </div>
                                                  
                                                
                    
                                                  
                    
                                                  <div class="col-md-12">
                                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                                      <li>
                                                        <button name="create_customer" class="btn btn-primary">Update Settings</button>
                                                      </li>
                    
                                                    </ul>
                                                  </div>
                                                </div>
                                              </form>
                                        </div>
                                    </div><!-- .card-preview -->
                                </div> <!-- nk-block -->
                                </div>





                            </div>
                        </div>
                    </div>
                </div>
@endsection