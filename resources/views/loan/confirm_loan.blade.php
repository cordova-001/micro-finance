@extends('layout.app');
@section('content')
  <div class="nk-content ">
          <div class="container-fluid">
            <div class="nk-content-inner">
              <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                  <div class="nk-block-between">
                    <div class="nk-block-head-content">
                      <h3 class="nk-block-title page-title"> Loan Confirmation</h3>
                    </div><!-- .nk-block-head-content -->
                  </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                  <div class="card">
                    <div class="card-inner">
                      <div class="tab-content">
                        <div class="tab-pane active" id="tabItem5">
                          <h5 class="title">Loan Confirmation </h5>
                          <p>Confirm the loan details below before processing the loan</p>
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
                          
                          <form action="{{ route('loan.create.loan_request') }}" class="pt-2" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <div class="form-group">
                                    <label class="form-label">Customer Name</label>
                                    <div class="form-control-wrap">                                                                      
                                        <input type="text" readonly class="form-control" name="account_name" value="{{ $account_details->first_name }} {{ $account_details->last_name }} " id="amount" >
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <div class="form-group">
                                    <label class="form-label">Account Number</label>
                                    <div class="form-control-wrap">                                                                      
                                        <input type="text" readonly class="form-control" name="account_number" value="{{ $account_number }}" id="amount" >
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <div class="form-group">
                                    <label class="form-label">Customer Email</label>
                                    <div class="form-control-wrap">                                                                      
                                        <input type="text" readonly class="form-control" name="email" value="{{ $account_details->email }} " id="amount" >
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <div class="form-group">
                                    <label class="form-label"> Customer Phone Number</label>
                                    <div class="form-control-wrap">                                                                      
                                        <input type="text" readonly class="form-control" name="phone_number" value="{{ $account_details->phone }}" id="amount" >
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
                             
                              <hr>
                                                       

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="phone-no">Loan Product </label>
                                  <input type="text" readonly name="loan_product"  id="loan_product"  value="{{ $loan_product }}" class="form-control" required>
                                 
                                </div>
                              </div>
                              
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-line2">Loan Amount (Principal) </label>
                                  <input type="number" readonly step="0.1" class="form-control" value="{{ $loan_amount }}" loan_amount="amount" >
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Interest  </label>
                                  <input type="number" readonly step="0.1" name="interest_rate" class="form-control" value="{{ $interest_amount }}" id="amount" >
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Total Repayment Amount </label>
                                 <input type="text" class="form-control" readonly value="{{ $repayment_amount }}" name="total_repayment_amount">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Each Repayment Amount  </label>
                                  <input type="number" readonly step="0.1" name="each_repayment_amount" class="form-control" value="{{ $each_repayment_amount }}" id="amount" >
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Repayment Period </label>
                                 <input type="text" class="form-control" readonly value="{{ $repayment_period }}" name="repayment_period">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Repayment Frequency </label>
                                 <input type="text" class="form-control" readonly value="{{ $frequency }}" name="frequency">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Branch </label>
                                 <input type="text" class="form-control" readonly value="{{ $branch }}" name="branch">
                                </div>
                              </div>
                                                         

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Application Date </label>
                                  <input type="date" readonly name="application_date" class="form-control" value="{{ $application_date }}" >
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-line2">Account Officer</label>
                                  <input type="text" readonly  class="form-control" name="staff" value="{{ $user->name }}" >
                                </div>
                              </div>
                             
                              <div class="col-md-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                  <li>
                                    <button name="create_loan" class="btn btn-primary">Create Loan</button>
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