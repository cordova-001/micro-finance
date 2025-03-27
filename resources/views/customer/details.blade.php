@extends('layout.app');
@section('content')
  <div class="nk-content ">
          <div class="container-fluid">
            <div class="nk-content-inner">
              <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                  <div class="nk-block-between">
                    <div class="nk-block-head-content">
                      <h3 class="nk-block-title page-title"> {{ $customer->first_name }} - {{ $customer->last_name }}  Details</h3>
                    </div><!-- .nk-block-head-content -->
                  </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                  <div class="card">
                    <div class="card-inner">
                      <div class="tab-content">
                        <div class="tab-pane active" id="tabItem5">
                          {{-- <h5 class="title"> Customer's name Transaction Details </h5> --}}
                          
                         
                              <hr>

                              <div class="nk-block nk-block-lg">
                                
                                <div class="card card-bordered card-preview">
                                    <div class="card-inner">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div class="card card-bordered">
                                                    <img src="{{ asset('images/' . $customer->passport) }}" class="card-img-top" alt="">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                             
                                          </div>

                                        

                                          <div class="col-lg-4">
                                            <div class="card card-bordered">
                                                {{-- <img src="./images/slides/slide-a.jpg" class="card-img-top" alt=""> --}}
                                                <div class="card-inner">
                                                    <h5 class="card-title">Personal Information</h5>
                                                    <p><b>Account Name:  </b> {{ $customer->first_name }} {{ $customer->last_name }} <br>
                                                    <b>Account Number:</b>  {{ $customer->customer_id }} <br>
                                                    <b>Contact Phone </b> {{ $customer->phone }} <br>
                                                    <b>Contact Email :</b> {{ $customer->email }} <br>
                                                    <b>Contact Address:</b> {{ $customer->address }}</p>
                                                                                                       
                                                </div>
                                            </div>
                                          </div>

                                          <div class="col-lg-4">
                                            <div class="card card-bordered">
                                                {{-- <img src="./images/slides/slide-a.jpg" class="card-img-top" alt=""> --}}
                                                <div class="card-inner">
                                                    <h5 class="card-title">Account Summary</h5>
                                                    <p><b>Account Name:  </b> {{ $customer->first_name }} {{ $customer->last_name }} <br>
                                                    <b>Account Number:</b>  {{ $customer->customer_id }} <br>
                                                    <b>Total Savings:</b> {{ $totalSavings }} <br>
                                                    <b>Total Withdrawal:</b> {{ $totalWithdrawal }} <br>
                                                    <b>Total Balance:</b> {{ $totalBalance }} <br>
                                                    <b>Total Loan Collected: </b> <br>
                                                    <b>Total Loan repaid: </b> </p>
                                                                                                       
                                                </div>
                                            </div>
                                          </div>

                                        </div>
                                    </div>
                                </div><!-- .card-preview -->


                                
                                
                            </div>
                             
                            <div class="card card-bordered card-preview">
                              <div class="card-inner">
                                  <ul class="nav nav-tabs mt-n3">
                                      <li class="nav-item">
                                          <a class="nav-link active" data-bs-toggle="tab" href="#tabItem5"><em class="icon ni ni-user"></em><span>Account Transactions</span></a>
                                      </li>                                      
                                      <li class="nav-item">
                                          <a class="nav-link" data-bs-toggle="tab" href="#tabItem8"><em class="icon ni ni-link"></em><span> Loan Transactions</span></a>
                                      </li>
                                      
                                  </ul>
                                  <div class="tab-content">
                                      <div class="tab-pane active" id="tabItem5">
                                         
                                        <div class="nk-block nk-block-lg">
                                            <div class="nk-block-head">
                                                
                                            </div>
                                            <div class="nk-block nk-block-lg">
                                              <div class="nk-block-head">
                                                  
                                              </div>
                                              <div class="card card-bordered card-preview">
                                                  <div class="card-inner">
                                                      <table class="datatable-init-export nowrap table" data-export-title="Export">
                                                          <thead>
                                                              <tr>
                                                                  <th>SN</th>
                                                                  <th>Account Name</th>
                                                                  <th>Account Number</th>
                                                                  <th>Transaction Type</th>
                                                                  <th>Transaction ID</th>
                                                                  <th>Inflow Amount</th>
                                                                  <th>Outflow Amount</th> 
                                                                  <th>Balance</th>
                                                                  <th>Narration</th>
                                                                    
                                                                  <th>Transaction Date</th>                                                   
          
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                                                              @foreach ($transactions as $transaction)
                                                                  <tr>
                                                                      <td> {{ $transaction->id }}</td>
                                                                      <td> {{ $transaction->account_name }} </td>
                                                                      <td>{{ $transaction->account_number }}</td>
                                                                      <td>{{ $transaction->transaction_type }}</td>
                                                                      <td>{{ $transaction->transaction_id }}</td>
                                                                      <td>{{ number_format($transaction->inflow_amount) }}</td>
                                                                      <td>{{ number_format($transaction->outflow_amount) }}</td>
                                                                      <td>{{ number_format($transaction->total_balance) }}</td>
                                                                      <td>{{ $transaction->narration }}</td>
                                                                      
                                                                      <td>
                                                                          {{ $transaction->created_at }}
                                                                         
                                                                      </td>
                                                                  </tr>
                                                                  
                                                              @endforeach
                                                              <tr style="background-color: rgb(205, 205, 231); color:black; font-weight: bold;">
                                                                  <td>Total</td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td>{{ $total_inflow }}</td>
                                                                  <td> {{ $total_outflow }} </td>
                                                                  <td>{{ $total_balance }}</td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  
                                                              </tr>
                                                             
                                                          </tbody>
                                                      </table>
                                                  </div>
                                              </div><!-- .card-preview -->
                                          </div> <!-- nk-block -->
                                      </div> <!-- nk-block -->


                                      </div>
                                      
                                      
                                      <div class="tab-pane" id="tabItem8">
                                        <div class="nk-block nk-block-lg">
                                            <div class="nk-block-head">
                                                
                                            </div>
                                            <div class="card card-bordered card-preview">
                                                <div class="card-inner">
                                                    <table class="datatable-init-export nowrap table" data-export-title="Export">
                                                        <thead>
                                                            <tr>
                                                                {{-- <th> Account Name </th> --}}
                                                                <th> Account Number </th>
                                                                <th> Loan Product </th>
                                                                <th> Loan Principal Amount </th>
                                                                <th> Interest Rate </th>
                                                                <th> Total Repayment Amount </th>
                                                                <th> Each Repayment Amount </th>
                                                                <th> Repayment Period </th>
                                                                <th> Application Date </th>
                                                                <th> Status </th>    
                                                                {{-- <th> Action </th>                                                    --}}
        
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($loans as $loan)
                                                                <tr>
                                                                    
                                                                    {{-- <td>{{ $loan->customer_id }}</td> --}}
                                                                    <td>{{ $loan->customer_id }}</td>
                                                                    <td>{{ $loan->loan_product }}</td>
                                                                    <td>{{ $loan->loan_amount }}</td>
                                                                    <td>{{ $loan->interest_rate }}</td>
                                                                    <td>{{ $loan->total_repayment_amount }}</td>
                                                                    <td>{{ $loan->each_repayment_amount }}</td>
                                                                    <td>{{ $loan->repayment_period }}</td>
                                                                    <td>{{ $loan->application_date }}</td>
                                                                    <td>{{ $loan->status }}</td>
                                                                    {{-- <td>
                                                                        <li>
                                                                            <div class='drodown'>
                                                                                <a href='' class='dropdown-toggle btn btn-icon btn-trigger' data-bs-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>
                                                                                <div class='dropdown-menu dropdown-menu-end'>
                                                                                <form method='get'>
                                                                                    <ul class='link-list-opt no-bdr'>
                                                                                      <li class="form-control"><span><em class='icon ni ni-eye'></em><input name='branch_details' style='border: 0px; background-color: white; float: center;' value='View Details' class='icon ni ni-eye' /></span></li>
                                                                                      <br>
                                                                                      <input type='text' name='bid' value='$bid' hidden />
                                                                                      <li class="form-control"><em class='icon ni ni-activity-round'></em><input name='edit_branch'  type='submit' formaction='edit_branch' style='border: 0px; background-color: white; float: center;' value='Manage Loan' class='icon ni ni-eye' /></li>
                                                                                        
                                                                                    </ul>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </td> --}}
                                                                </tr>
                                                            @endforeach
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div><!-- .card-preview -->
                                        </div> <!-- nk-block -->
                                      </div>
                                  </div>
                              </div>
                         
                          
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