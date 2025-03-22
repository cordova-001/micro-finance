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
                          {{-- <h5 class="title">Manage Loan  </h5> --}}
                          {{-- <p>Confirm the loan details below before processing the loan</p> --}}
                          <div class="col-md-12">
                            

                            {{-- @include('components.loan_nav') --}}

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
                                                <th> Interest AMount </th>
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
                                                    
                                                    {{-- <td>{{ $loan->first_name }} {{ $loan->last_name }}</td> --}}
                                                    <td>{{ $loan->customer_id }} </td>
                                                    <td>{{ $loan->loan_product }}</td>
                                                    <td>{{ $loan->loan_amount }} </td>
                                                    <td>{{ $loan->interest_amount }}</td>
                                                    <td> {{ $loan->total_repayment_amount }} </td>
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
                                      <a class="nav-link" data-bs-toggle="tab" href="#tabItem6"><span> Add Repayment  </span></a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-bs-toggle="tab" href="#tabItem7"><span> Loan Schedule  </span></a>
                                  </li>
                                  
                              </ul>
                              <div class="tab-content">
                                  <div class="tab-pane active" id="tabItem5">
                                     
                                    <div class="nk-block nk-block-lg">
                                      <div class="nk-block-head">
                                          
                                      </div>
                                      <div class="card card-bordered card-preview">
                                          <div class="card-inner">
                                            
                                              <div class="row gy-4">
                                               
                  
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
                                                   

                                                    {{-- <form action="{{ route('approve_loan', $loan->id) }}" method="POST">
                                                      @csrf
                                                      @method('PUT')
                                                      <button type="submit" class="btn btn-primary">Approve Loan</button>
                                                  </form>
                                                  <span></span>
                                                  
                                                  <form action="{{ route('reject_loan', $loan->id) }}" method="POST">
                                                      @csrf
                                                      @method('PUT')
                                                      <button type="submit" class="btn btn-danger">Reject Loan</button>
                                                  </form> --}}
                                                    
                  
                                                  </ul>
                                                  
                                                </div>
                                              </div>
                                            {{-- </form> --}}
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
                                              <form action="{{ route('make_payment', $loan->id) }}" class="pt-2" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row gy-4">

                                                  <h4>Add Repayment </h4>
                                                  
                    
                                                  <div class="col-md-8">
                                                    <div class="form-group">
                                                      <div class="form-group">
                                                        <label class="form-label"> Repayment Amount</label>
                                                        <div class="form-control-wrap">                                                                      
                                                            <input type="text" class="form-control" name="paid_amount" id="amount" >                                       
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                    
                                                
                                                                          
                    
                                                  <div class="col-md-8">
                                                    <div class="form-group">
                                                      <label class="form-label" for="phone-no"> Payment Date </label>
                                                      <input type="date" name="paid_date"  id="loan_product"   class="form-control" required>
                                                      
                                                    
                                                    </div>
                                                  </div>

                                                  <div class="col-md-8">
                                                    <div class="form-group">
                                                      <label class="form-label" for="phone-no"> Payment Reference </label>
                                                      <input type="text" name="payment_reference"  id="loan_product"   class="form-control" required>
                                                      
                                                    
                                                    </div>
                                                  </div>
                                                  
                                                  <div class="col-md-8">
                                                    <div class="form-group">
                                                      <label class="form-label" for="address-line2"> Collected By  </label>
                                                      <input type="text"   class="form-control"  name="collected_by" >
                                                    </div>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <div class="form-group">
                                                      <label class="form-label" for="address-st"> Payment Method  </label>
                                                      {{-- <input type="number" readonly step="0.1" name="interest_rate" class="form-control" value="{{ $loan->interest_rate }}" id="amount" > --}}
                                                      <select name="payment_means" id="payment_means" class="form-control">
                                                        <option value="Cash">Cash</option>
                                                        <option value="Bank">Bank</option>
                                                        <option value="Transfer">Transfer </option>
                                                      </select>
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
                                                    

                                                      
                                                        <button type="submit" class="btn btn-primary">Add Repayment </button>
                                                    
                                                    <span></span>
                                                      
                    
                                                    </ul>
                                                    
                                                  </div>
                                                </div>
                                            </form>
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
                                                        <tr > 
                                                            <th>Loan ID </th>
                                                            <th>Principal Amount  </th>
                                                            <th>Interest Amount </th>
                                                            <th> Total Amount Due  </th>
                                                            <th> Amount Paid  </th>
                                                            <th> Balance  </th>
                                                            <th> Due Date  </th>
                                                            <th> Status </th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($fetchedloan as $loans)
                                                            <tr>
                                                              
                                                                <td> {{ $loans->loan_id }}</td>
                                                                <td> {{ number_format($loans->principal_amount) }} </td>
                                                                <td>{{ number_format($loans->interest_amount) }}</td>
                                                                <td>{{ number_format($loans->total_amount_due) }}</td>
                                                                <td>{{ number_format($loans->repayment_amount) }}</td>
                                                                <td>{{ number_format($loans->balance) }}</td>
                                                                <td>{{ $loans->due_date }}</td>
                                                                <td>{{ $loans->status }}</td>
                                                                
                                                            </tr>
                                                            
                                                        @endforeach
                                                        <tr style="background-color: rgb(206, 214, 245);">
                                                          <td>as</td>
                                                          <td> {{ number_format($loan->loan_amount)  }} </td>
                                                          <td> {{ number_format($loan->interest_amount) }}  </td>
                                                          <td> {{ $loan->total_repayment_amount }} </td>
                                                          <td>as</td>
                                                          <td>as</td>
                                                          <td></td>
                                                          <td></td>
                                                          {{ $loans }}
                                                        </tr>
                                                       
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