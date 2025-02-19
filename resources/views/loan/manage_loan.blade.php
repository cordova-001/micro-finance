@extends('layout.app');
@section('content')
  <div class="nk-content ">
          <div class="container-fluid">
            <div class="nk-content-inner">
              <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                  <div class="nk-block-between">
                    <div class="nk-block-head-content">
                      <h3 class="nk-block-title page-title"> Manage Loan</h3>
                    </div><!-- .nk-block-head-content -->
                  </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                  <div class="card">
                    <div class="card-inner">
                      <div class="tab-content">
                        <div class="tab-pane active" id="tabItem5">
                          <h5 class="title">Manage Loan  </h5>
                          {{-- <p>Confirm the loan details below before processing the loan</p> --}}
                          <div class="col-md-12">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-2">
                                        <div class="card-title">
                                            <h6 class="title">Loan Performances</h6>
                                            <p>In last 30 days</p>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Financial System"></em>
                                        </div>
                                    </div>
                                    <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                                        <div class="nk-sale-data-group flex-md-nowrap g-4">
                                             <div class="nk-sale-data">
                                                <span class="amount">5490 <span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>16.93%</span></span>
                                                <span class="sub-title">This Month</span>
                                            </div>
                                            <div class="nk-sale-data">
                                                <span class="amount">1480<span class="change up text-success"><em class="icon ni ni-arrow-long-up"></em>4.26%</span></span>
                                                <span class="sub-title">This Week</span>
                                            </div> 
                                        </div>
                                        <div class="nk-sales-ck sales-revenue">
                                            <canvas class="student-enrole" id="enrolement"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .col -->
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
                                                <th> Action </th>                                                   

                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($loan as $loans) --}}
                                                <tr>
                                                    
                                                    {{-- <td>{{ $loans->first_name }} {{ $allLoan->last_name }}</td> --}}
                                                    <td>{{ $loan->customer_id }}</td>
                                                    <td>{{ $loan->loan_product }}</td>
                                                    <td>{{ $loan->loan_amount }}</td>
                                                    <td>{{ $loan->interest_rate }}</td>
                                                    <td>{{ $loan->total_repayment_amount }}</td>
                                                    <td>{{ $loan->each_repayment_amount }}</td>
                                                    <td>{{ $loan->repayment_period }}</td>
                                                    <td>{{ $loan->application_date }}</td>
                                                    <td>{{ $loan->status }}</td>
                                                    <td>
                                                        <li>
                                                            <div class='drodown'>
                                                                <a href='' class='dropdown-toggle btn btn-icon btn-trigger' data-bs-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>
                                                                <div class='dropdown-menu dropdown-menu-end'>
                                                                    <ul class='link-list-opt no-bdr'>
                                                                      
                                                                        {{-- <a href="{{ route('branch.edit', $branches->id) }}" class="dropdown-item"><em class='icon ni ni-eye'></em>  Edit Loan  </a> --}}
                                                                        <hr>
                                                                        <a href="{{ route('loan.manage', $loan->id) }}" class="dropdown-item"> <em class='icon ni ni-activity-round'></em> Manage Loan</a>
                                                                          
                                                                      </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </td>
                                                </tr>
                                            {{-- @endforeach --}}
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- .card-preview -->
                        </div> <!-- nk-block -->

                        <div class="card card-bordered card-preview">
                          <div class="card-inner">
                              <ul class="nav nav-tabs mt-n3">
                                  <li class="nav-item">
                                      <a class="nav-link active" data-bs-toggle="tab" href="#tabItem5"><span> Loan Details  </span></a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-bs-toggle="tab" href="#tabItem6"><span> Repayment </span></a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-bs-toggle="tab" href="#tabItem7"><span> Loan Terms </span></a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-bs-toggle="tab" href="#tabItem8"><span> Loan Schedule</span></a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tabItem8"><span> Expenses  </span></a>
                                </li>



                                <li class="nav-item">
                                  <a class="nav-link" data-bs-toggle="tab" href="#tabItem8"><span> Income  </span></a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-bs-toggle="tab" href="#tabItem8"><span> Loan FIles  </span></a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-bs-toggle="tab" href="#tabItem8"><span> Expenses  </span></a>
                               </li>
                              </ul>
                              <div class="tab-content">
                                  <div class="tab-pane active" id="tabItem5">
                                     
                                    <div class="nk-block nk-block-lg">
                                      <div class="nk-block-head">
                                          
                                      </div>
                                      <div class="card card-bordered card-preview">
                                          <div class="card-inner">
                                            <form action="{{ route('loan.create.loan_request') }}" class="pt-2" method="POST" enctype="multipart/form-data">
                                              @csrf
                                              <div class="row gy-4">
                                                {{-- <div class="col-md-8">
                                                  <div class="form-group">
                                                    <div class="form-group">
                                                      <label class="form-label">Customer Name</label>
                                                      <div class="form-control-wrap">                                                                      
                                                          <input type="text" readonly class="form-control" name="account_name" value="{{ $account_details->first_name }} {{ $account_details->last_name }} " id="amount" >
                                                        
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div> --}}
                  
                                                <div class="col-md-8">
                                                  <div class="form-group">
                                                    <div class="form-group">
                                                      <label class="form-label">Account Number</label>
                                                      <div class="form-control-wrap">                                                                      
                                                          <input type="text" readonly class="form-control" name="account_number" value="{{ $loan->customer_id }}" id="amount" >                                       
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                  
                                               
                                                                         
                  
                                                <div class="col-md-8">
                                                  <div class="form-group">
                                                    <label class="form-label" for="phone-no">Loan Product </label>
                                                    <input type="text" readonly name="loan_product"  id="loan_product"  value="{{ $loan->loan_product }}" class="form-control" required>
                                                   
                                                  </div>
                                                </div>
                                                
                                                <div class="col-md-8">
                                                  <div class="form-group">
                                                    <label class="form-label" for="address-line2">Loan Amount (Principal) </label>
                                                    <input type="number" readonly step="0.1" class="form-control" value="{{ $loan->loan_amount }}" loan_amount="amount" >
                                                  </div>
                                                </div>
                                                <div class="col-md-8">
                                                  <div class="form-group">
                                                    <label class="form-label" for="address-st"> Interest  </label>
                                                    <input type="number" readonly step="0.1" name="interest_rate" class="form-control" value="{{ $loan->interest_rate }}" id="amount" >
                                                  </div>
                                                </div>
                  
                                                <div class="col-md-8">
                                                  <div class="form-group">
                                                    <label class="form-label" for="address-st"> Total Repayment Amount </label>
                                                   <input type="text" class="form-control" readonly value="{{ $loan->total_repayment_amount }}" name="total_repayment_amount">
                                                  </div>
                                                </div>
                  
                                                <div class="col-md-8">
                                                  <div class="form-group">
                                                    <label class="form-label" for="address-st"> Each Repayment Amount  </label>
                                                    <input type="number" readonly step="0.1" name="each_repayment_amount" class="form-control" value="{{ $loan->each_repayment_amount }}" id="amount" >
                                                  </div>
                                                </div>
                  
                                                <div class="col-md-8">
                                                  <div class="form-group">
                                                    <label class="form-label" for="address-st"> Repayment Period </label>
                                                   <input type="text" class="form-control" readonly value="{{ $loan->repayment_period }}" name="repayment_period">
                                                  </div>
                                                </div>
                  
                                                <div class="col-md-8">
                                                  <div class="form-group">
                                                    <label class="form-label" for="address-st"> Repayment Frequency </label>
                                                   <input type="text" class="form-control" readonly value="{{ $loan->frequency }}" name="frequency">
                                                  </div>
                                                </div>
                  
                                                {{-- <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label class="form-label" for="address-st"> Branch </label>
                                                   <input type="text" class="form-control" readonly value="{{ $branch }}" name="branch">
                                                  </div>
                                                </div> --}}
                                                                           
                  
                                                <div class="col-md-8">
                                                  <div class="form-group">
                                                    <label class="form-label" for="address-st"> Application Date </label>
                                                    <input type="date" readonly name="application_date" class="form-control" value="{{ $loan->application_date }}" >
                                                  </div>
                                                </div>
                  
                                                <div class="col-md-8">
                                                  <div class="form-group">
                                                    <label class="form-label" for="address-line2">Account Officer</label>
                                                    <input type="text" readonly  class="form-control" name="staff" value="{{ $user->name }}" >
                                                  </div>
                                                </div>
                                               
                                                <div class="col-md-12">
                                                  <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                                    <li>
                                                      <button name="create_loan" class="btn btn-primary">Approve Loan</button>
                                                    </li>
                                                    <li>
                                                      <button name="create_loan" class="btn btn-primary">Reject Loan</button>
                                                    </li>
                                                    
                  
                                                  </ul>
                                                  
                                                </div>
                                              </div>
                                            </form>
                                          </div>
                                      </div><!-- .card-preview -->
                                  </div> <!-- nk-block -->


                                  </div>
                                  <div class="tab-pane" id="tabItem6">
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
                                                            <th>Depositor</th>
                                                            <th>Savings Product</th> 
                                                            <th>Amount Deposited</th>
                                                              
                                                            <th>Transaction Date</th>                                                   
    
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- @foreach ($savings as $saving) --}}
                                                            <tr>
                                                              <td>Ands</td>
                                                              <td>hdgsg</td>
                                                              <td>hsdfsd</td>
                                                              <td>hgbsg</td>
                                                              <td>jhytr</td>
                                                              <td>juyhgt</td>
                                                              <td>juyhgt</td>
                                                              <td>juyhgt</td>
                                                                {{-- <td> {{ $saving->id }}</td>
                                                                <td> {{ $saving->account_name }} </td>
                                                                <td>{{ $saving->account_number }}</td>
                                                                <td>{{ $saving->transaction_type }}</td>
                                                                <td>{{ $saving->transaction_id }}</td>
                                                                <td>{{ $saving->depositor_name }}</td>
                                                                <td>{{ $saving->savings_product }}</td>
                                                                <td>{{ $saving->amount_paid }}</td>
                                                                
                                                                <td>
                                                                    {{ $saving->created_at }}
                                                                   
                                                                </td> --}}
                                                            </tr>
                                                            
                                                        {{-- @endforeach --}}
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- .card-preview -->
                                    </div> <!-- nk-block -->
                                  </div> <!-- nk-block -->
                                  </div>
                                  <div class="tab-pane" id="tabItem7">
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
                                                            <th>Withdrawn By</th>
                                                            {{-- <th>Savings Product</th>  --}}
                                                            <th>Amount Withdrawn</th>
                                                              
                                                            <th>Transaction Date</th>                                                   
    
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- @foreach ($withdrawal as $withdrawals) --}}
                                                            <tr>
                                                              
                                                              <td>hdgsg</td>
                                                              <td>hsdfsd</td>
                                                              <td>hgbsg</td>
                                                              <td>jhytr</td>
                                                              <td>juyhgt</td>
                                                              <td>juyhgt</td>
                                                              <td>juyhgt</td>
                                                              <td>hgfd</td>
                                                                {{-- <td> {{ $withdrawals->id }}</td> --}}
                                                                {{-- <td> {{ $withdrawals->account_name }} </td>
                                                                <td>{{ $withdrawals->account_number }}</td>
                                                                <td>{{ $withdrawals->transaction_type }}</td>
                                                                <td>{{ $withdrawals->transaction_id }}</td>
                                                                <td>{{ $withdrawals->withdrawn_by }}</td> --}}
                                                                {{-- <td>{{ $transactions->savings_product }}</td> --}}
                                                                {{-- <td>{{ $withdrawals->amount_received }}</td>
                                                                
                                                                <td>
                                                                    {{ $withdrawals->created_at }}
                                                                    
                                                                </td> --}}
                                                            </tr>
                                                            
                                                        {{-- @endforeach --}}
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- .card-preview -->
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
                                                            <th> Account Name </th>
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
                                                        {{-- @foreach ($loans as $loan) --}}
                                                            <tr>

                                                              
                                                              <td>hdgsg</td>
                                                              <td>hsdfsd</td>
                                                              <td>hgbsg</td>
                                                              <td>jhytr</td>
                                                              <td>juyhgt</td>
                                                              <td>juyhgt</td>
                                                              <td>juyhgt</td>
                                                              <td>hgdfdhd</td>
                                                              <td>hdgdd</td>
                                                              <td>hdgdfsf</td>
                                                                
                                                                {{-- <td>{{ $loan->customer_id }}</td>
                                                                <td>{{ $loan->customer_id }}</td>
                                                                <td>{{ $loan->loan_product }}</td>
                                                                <td>{{ $loan->loan_amount }}</td>
                                                                <td>{{ $loan->interest_rate }}</td>
                                                                <td>{{ $loan->total_repayment_amount }}</td>
                                                                <td>{{ $loan->each_repayment_amount }}</td>
                                                                <td>{{ $loan->repayment_period }}</td>
                                                                <td>{{ $loan->application_date }}</td>
                                                                <td>{{ $loan->status }}</td> --}}
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
                                                        {{-- @endforeach --}}
                                                       
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