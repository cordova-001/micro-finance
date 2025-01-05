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
                          
                          <form action="{{ route('savings.add.product') }}" class="pt-2" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Product Name</label>
                                  <input type="text" name="product_name" class="form-control" id="product-name" placeholder="Product name">
                                </div>
                              </div>
                             
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Product Code</label>
                                  <input type="text" name="product_code" class="form-control" id="product-name" placeholder="Product Code">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Minimum Deposit</label>
                                  <input type="number" step="0.1" name="min_deposit" class="form-control" id="product-name" placeholder="Minimum Deposit">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Maximum Deposit</label>
                                  <input type="number" step="0.1"  name="max_deposit" class="form-control" id="product-name" placeholder="Maximum Deposit">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Interest Rate </label>
                                  <input type="text" name="interest_rate" class="form-control" id="product-name" placeholder="Interest rate">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Duration</label>
                                  <input type="text" name="duration" class="form-control" id="product-name" placeholder="Duration">
                                </div>
                              </div>

                              {{-- <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name"> Opening Fee </label>
                                  <input type="text" name="opening_fee" class="form-control" id="product-name" placeholder="Opening Fees">
                                </div>
                              </div> --}}

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name"> Target Amount </label>
                                  <input type="text" name="target_amount" class="form-control" id="product-name" placeholder="Target Amount">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name"> Account Maintenance Fee </label>
                                  <input type="text" name="maintenance_fee" class="form-control" id="product-name" placeholder="Account Maintenance Fee">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name"> Maximum Withdrawal Amount </label>
                                  <input type="text" name="maximum_withdrawal_amount" class="form-control" id="product-name" placeholder="Maximum Withdrawal Amount">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Description</label>
                                  {{-- <input type="text" name="product_name"  id="product-name" placeholder="Product name"> --}}
                                  <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                              </div>
                              
                              
                              <div class="col-md-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                  <li>
                                    <button name="create_savings_product" class="btn btn-primary">Create Savings Product</button>
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
