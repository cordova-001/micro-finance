@extends('layout.app');
@section('content')
  <div class="nk-content ">
          <div class="container-fluid">
            <div class="nk-content-inner">
              <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                  <div class="nk-block-between">
                    <div class="nk-block-head-content">
                      <h3 class="nk-block-title page-title">Add Withdrawal</h3>
                    </div><!-- .nk-block-head-content -->
                  </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
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
                  <div class="card">
                    <div class="card-inner">
                      <div class="tab-content">
                        <div class="tab-pane active" id="tabItem5">
                          <h5 class="title">Add Withdrawal </h5>
                          
                          <form action="{{ route('initiate_withdrawal') }}" class="pt-2" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">                             
                              <div class="nk-block nk-block-lg">
                                
                                <div class="card card-bordered card-preview">
                                    <div class="card-inner">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div class="card card-bordered">
                                                    <img src="{{ asset('images/' . $checkAccountNo->passport) }}"  class="card-img-top" alt="">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                              <div class="card card-bordered">
                                                  <img src="{{ asset('images/' . $checkAccountNo->signature) }}" class="card-img-top" alt="">
                                                  
                                              </div>
                                          </div>

                                        

                                          <div class="col-lg-8">
                                            <div class="card card-bordered">
                                                {{-- <img src="./images/slides/slide-a.jpg" class="card-img-top" alt=""> --}}
                                                <div class="card-inner">
                                                    <h5 class="card-title">Account Summary </h5>
                                                    <p><b>Account Name:  </b> {{ $checkAccountNo->first_name }} {{ $checkAccountNo->last_name }} <br>
                                                    <b>Account Number:</b>  {{ $checkAccountNo->customer_id }} <br>
                                                    <b>Total Savings:</b> {{ $totalSavings }} <br>
                                                    <b>Total Withdrawal:</b> {{ $totalWithdrawal }} <br>
                                                    <b>Total Balance:</b> {{ $totalBalance }}</p>
                                                                                                       
                                                </div>
                                            </div>
                                        </div>

                                        </div>
                                    </div>
                                </div><!-- .card-preview -->
                                                                
                            </div>
                             
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="phone-no">Account Number</label>
                                  <input type="text" name="account_number" value="{{ $checkAccountNo->customer_id }}" readonly class="form-control" id="account_name"  placeholder="Account Number">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="phone-no">Account Name</label>
                                  <input type="text" name="account_name" readonly value="{{ $checkAccountNo->first_name }} - {{ $checkAccountNo->last_name }}" class="form-control" id="account_name"  placeholder="Account Name">
                                </div>
                              </div>
                              
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-line2">Withdrawal Amount</label>
                                  <input type="number" step="0.1" class="form-control" name="withdraw_amount" id="amount" >
                                </div>
                              </div>
                             
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Withdrawn by </label>
                                  <input type="text" name="withdrawn_by" class="form-control" id="withdrawn_by" >
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Branch </label>
                                  <input type="text" name="branch" class="form-control" id="branch" >
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Withdrawal Date </label>
                                  <input type="date" name="withdrawal_date" class="form-control" id="withdrawal_date" >
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Staff </label>
                                  <input type="text" readonly name="staff" value="{{ Auth::user()->name }}" class="form-control" id="staff" >
                                </div>
                              </div>

                              <div class="col-md-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                  <li>
                                    <button name="create_withdrawal" class="btn btn-primary">Add Withdrawal</button>
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