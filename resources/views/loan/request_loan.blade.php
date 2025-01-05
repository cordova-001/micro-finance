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
                          
                          <form action="" class="pt-2" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <div class="form-group">
                                    <label class="form-label">Account Number</label>
                                    <div class="form-control-wrap">                                                                      
                                        <select class="form-select js-select2" data-search="on" name="account_number">
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
                                  <select name="loan_product" id="" class="form-control">
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
                                  <input type="number" step="0.1" class="form-control" name="amount" id="amount" >
                                </div>
                              </div>
                             
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Depositor </label>
                                  <input type="text" name="depositor" class="form-control" id="depositor" >
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Depositor Phone Number </label>
                                  <input type="text" name="depositor_phone" class="form-control" id="depositor_phone" >
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Branch </label>
                                  <select name="branch" id="" class="form-control">
                                    <option value="">Select a Branch</option>
                                    @foreach ($branches as $branch) 
                                    
                                      <option value="{{ $branch->branch_name }} ">  
                                        {{ $branch->branch_name }} 
                                      </option>
                                     
                                    @endforeach  
                                  </select>
                                </div>
                              </div>


                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Withdrawal Date </label>
                                  <input type="date" name="depositor" class="form-control" id="depositor" >
                                </div>
                              </div>

                             







                              <div class="col-md-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                  <li>
                                    <button name="create_branch" class="btn btn-primary">Add Withdrawal</button>
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