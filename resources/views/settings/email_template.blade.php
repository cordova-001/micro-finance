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
                                                    <h5>PAYMENTS</h5>
                                                    <hr style="border: 1px solid black;">
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label class="form-label" for="first-name"> Payment Received Subject</label>
                                                      <input type="text" name="payment_received_subject" class="form-control" id="first-name" placeholder="Payment Received Subject">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-12">
                                                    <div class="form-group">
                                                      <label class="form-label" for="first-name"> Payment Received Template </label>
                                                      {{-- <input type="text" name="first_name"  id="first-name" placeholder="First name"> --}}
                                                      <textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
                                                      <br>
                                                      <button class="btn btn-primary">Update setting</button>
                                                    </div>
                                                  </div>
                                                  <hr style="border: 1px solid; color: black;">
                                                  

                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label class="form-label" for="first-name"> Payment Receipt Subject</label>
                                                      <input type="text" name="payment_receipt_subject" class="form-control" id="first-name" placeholder="Payment Receipt Subject">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-12">
                                                    <div class="form-group">
                                                      <label class="form-label" for="first-name"> Payment Receipt Template </label>
                                                      {{-- <input type="text" name="first_name"  id="first-name" placeholder="First name"> --}}
                                                      <textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
                                                      <br>
                                                      <button class="btn btn-primary">Update setting</button>
                                                    </div>
                                                  </div>
                                                  <hr style="border: 1px solid black;">


                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label class="form-label" for="first-name"> Repayment Reminder Subject</label>
                                                      <input type="text" name="repayment_reminder_subject" class="form-control" id="first-name" placeholder="Repayment Reminder Subject">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-12">
                                                    <div class="form-group">
                                                      <label class="form-label" for="first-name"> Repayment Reminder Template </label>
                                                      {{-- <input type="text" name="first_name"  id="first-name" placeholder="First name"> --}}
                                                      <textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
                                                      <br>
                                                      <button class="btn btn-primary">Update setting</button>
                                                    </div>
                                                  </div>
                                                  <hr style="border: 1px solid black;">


                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label class="form-label" for="first-name"> Payment Received Subject</label>
                                                      <input type="text" name="first_name" class="form-control" id="first-name" placeholder="First name">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-12">
                                                    <div class="form-group">
                                                      <label class="form-label" for="first-name"> Payment Received Template </label>
                                                      {{-- <input type="text" name="first_name"  id="first-name" placeholder="First name"> --}}
                                                      <textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
                                                      <br>
                                                      <button class="btn btn-primary">Update setting</button>
                                                    </div>
                                                  </div>
                                                  <hr>
                                                  
                                                
                    
                                                  
                    
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