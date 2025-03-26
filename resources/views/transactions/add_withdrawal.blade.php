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
                              <div class="form-control-wrap">
                                <select class="form-select js-select2" data-search="on" name="account_number">
                                  
                                  @foreach ($getAccountDetails as $customer) 
                                  <option value="">Enter Account Number</option>
                                    <option value="{{ $customer->customer_id }} ">  
                                      {{ $customer->customer_id }} - {{ $customer->first_name }} {{ $customer->last_name }}
                                    </option>
                                  
                                  @endforeach      
                                </select>
                              </div>
                              
                              <hr>
                             
                              
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
                                  {{-- <input type="text" name="branch" class="form-control" id="branch" >
                                   --}}
                                   <select name="branch_id" id="branch" required class="form-control">
                                    <option value="">Select Branch</option>   
                                    @foreach ($branch as $branches)                                                                                                           
                                    <option value="{{ $branches->id }}"> {{ $branches->branch_name }} </option>
                                    @endforeach
                                   </select>
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