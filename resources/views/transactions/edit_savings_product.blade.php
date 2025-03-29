@extends('layout.app');
@section('content')
  <div class="nk-content ">
          <div class="container-fluid">
            <div class="nk-content-inner">
              <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                  <div class="nk-block-between">
                    <div class="nk-block-head-content">
                      <h3 class="nk-block-title page-title">Create Savings Product</h3>
                    </div><!-- .nk-block-head-content -->
                  </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                  <div class="card">
                    <div class="card-inner">
                      <div class="tab-content">
                        <div class="tab-pane active" id="tabItem5">
                          <h5 class="title">Create Savings Product </h5>
                          
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
                          
                          <form action="{{ route('update.savings.product', [$savingsProduct->id]) }}" method="POST" class="pt-2"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row gy-4">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Product Name</label>
                                  <input type="text" name="product_name" class="form-control" id="product-name" value=" {{ $savingsProduct->product_name }}" placeholder="Product name">
                                </div>
                              </div>                                                         

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Minimum Deposit</label>
                                  <input type="number" step="0.1" name="min_deposit" class="form-control" id="product-name" value="{{ $savingsProduct->min_deposit }}" placeholder="Minimum Deposit">
                                  <small>You can specify minimum deposit for this savings product. You can leave it empty.</small>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Maximum Deposit</label>
                                  <input type="number" step="0.1"  name="max_deposit" class="form-control" value="{{ $savingsProduct->max_deposit }}" id="product-name" placeholder="Maximum Deposit">
                                  <small>You can specify maximum deposit for this savings product. You can leave it empty.</small>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Interest Rate </label>
                                  <input type="text" name="interest_rate" class="form-control" id="product-name" value="{{ $savingsProduct->interest_rate }}" placeholder="Interest rate">
                                  <small>You can specify the interest rate for this savings product. You can leave it empty.</small>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Duration</label>
                                  <input type="text" name="duration" class="form-control" id="product-name" value="{{ $savingsProduct->duration }}" placeholder="Duration">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name"> Opening Fee </label>
                                  <input type="text" name="opening_fee" class="form-control" id="product-name" value="{{ $savingsProduct->opening_fee }}" placeholder="Opening Fees">
                                  <small style="color: brown">You can specify the opening fee for this savings product. This will be deducted from the first deposit into the customer's account.</small>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name"> Target Amount </label>
                                  <input type="text" name="target_amount" class="form-control" id="product-name" value="{{ $savingsProduct->target_amount }}" placeholder="Target Amount">
                                  <small>You can specify the target amount for this savings product. You can leave it empty.</small>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name"> Account Maintenance Fee </label>
                                  <input type="text" name="maintenance_fee" class="form-control" id="product-name" value="{{ $savingsProduct->maintenance_fee }}" placeholder="Account Maintenance Fee">
                                  <small>You can specify the account maintenance fee for this savings product. You can leave it empty.</small>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name"> Maximum Withdrawal Amount </label>
                                  <input type="text" name="maximum_withdrawal_amount" class="form-control" value="{{ $savingsProduct->maximum_withdrawal_amount }}" id="product-name" placeholder="Maximum Withdrawal Amount">
                                  <small>You can specify the maximum withdrawal amount for this savings product. You can leave it empty.</small>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Description</label>
                                  {{-- <input type="text" name="product_name"  id="product-name" placeholder="Product name"> --}}
                                  <textarea name="description" id="description" class="form-control" value="{{ $savingsProduct->description }}" cols="30" rows="10"></textarea>
                                </div>
                              </div>
                              
                              
                              <div class="col-md-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                  <li>
                                    <button name="update_savings_product" class="btn btn-primary">Update Savings Product</button>
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
