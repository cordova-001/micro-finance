@extends('layout.app');
@section('content')
  <div class="nk-content ">
          <div class="container-fluid">
            <div class="nk-content-inner">
              <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                  <div class="nk-block-between">
                    <div class="nk-block-head-content">
                      <h3 class="nk-block-title page-title"> Loan Request</h3>
                    </div><!-- .nk-block-head-content -->
                  </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                  <div class="card">
                    <div class="card-inner">
                      <div class="tab-content">
                        <div class="tab-pane active" id="tabItem5">
                          <h5 class="title">Loan Request </h5>

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

                          
                          <form action="{{ route('loan.loan_process') }}" class="pt-2" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <div class="form-group">
                                    <label class="form-label">Account Number</label>
                                    <div class="form-control-wrap">                                                                      
                                        <select class="form-select js-select2" required data-search="on" name="account_number">
                                          @foreach ($customers as $customer) 
                                          <option value="">Enter Account Number</option>
                                            <option value="{{ $customer->customer_id }} ">  
                                              {{ $customer->customer_id }} - {{ $customer->first_name }} {{ $customer->last_name }}
                                            </option>
                                           
                                          @endforeach      
                                        </select>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
                             
                              {{-- <hr> --}}
                                                       

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="phone-no">Loan Product </label>
                                  {{-- <input type="text" name="loan_product"  id="account_name"  placeholder="Account Name"> --}}
                                  <select name="loan_product" id="" required class="form-control">
                                    <option value="">Select a Loan Product</option>
                                    @foreach ($lproduct as $lproducts) 
                                    
                                      <option value="{{ $lproducts->loan_product }} ">  
                                        {{ $lproducts->loan_product }} 
                                      </option>
                                     
                                    @endforeach  
                                  </select>
                                </div>
                              </div>
                              
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-line2">Loan Amount</label>
                                  <input type="number" required step="0.1" class="form-control" name="loan_amount" id="amount" >
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Repayment Frequency </label>
                                  <select name="frequency" required id="" class="form-control">
                                    <option value="">Select a Frequency</option>
                                      <option value="Weekly">  Weekly </option>
                                      <option value="Monthly">  Monthly </option>                                                                         
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Repayment Duration </label>
                                  <select name="repayment_period" required id="" class="form-control">
                                    <option value="">Select a Frequency</option>
                                      <option value="1">  1 </option>
                                      <option value="2">  2 </option> 
                                      <option value="3">  3 </option> 
                                      <option value="4">  4 </option> 
                                      <option value="5">  5 </option> 
                                      <option value="6">  6 </option> 
                                      <option value="7">  7 </option> 
                                      <option value="8">  8 </option> 
                                      <option value="9">  9 </option> 
                                      <option value="10">  10 </option> 
                                      <option value="11">  11 </option> 
                                      <option value="12">  12 </option> 
                                      <option value="13">  13 </option> 
                                      <option value="14">  14 </option>   
                                      <option value="15">  15 </option> 
                                      <option value="16">  16 </option> 
                                      <option value="17">  17 </option> 
                                      <option value="18">  18 </option> 
                                      <option value="19">  19 </option>
                                      <option value="20">  20 </option> 
                                      <option value="21">  21 </option> 
                                      <option value="21">  12 </option> 
                                      <option value="23">  23 </option> 
                                      <option value="24">  24 </option> 
                                      <option value="25">  25 </option> 
                                      <option value="26">  26 </option> 
                                      <option value="27">  27 </option> 
                                      <option value="28">  28 </option> 
                                      <option value="29">  29 </option>  
                                      <option value="30">  30 </option>                                                                       
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Branch </label>
                                  <select name="branch_id" required id="" class="form-control">
                                    <option value="">Select a Branch</option>
                                    @foreach ($branches as $branch) 
                                    
                                      <option value="{{ $branch->id }} ">  
                                        {{ $branch->branch_name }} 
                                      </option>
                                     
                                    @endforeach  
                                  </select>
                                </div>
                              </div>
                                                         

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Application Date </label>
                                  <input type="date" required name="application_date" class="form-control" id="depositor" >
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-line2">Account Officer</label>
                                  <input type="text" required  class="form-control" name="staff" value="{{ $user->name }}" >
                                </div>
                              </div>
                             
                              <div class="col-md-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                  <li>
                                    <button name="process_loan" class="btn btn-primary">Process Loan</button>
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