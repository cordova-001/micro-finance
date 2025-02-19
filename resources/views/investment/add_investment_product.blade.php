@extends('layout.app');
@section('content')
  <div class="nk-content ">
          <div class="container-fluid">
            <div class="nk-content-inner">
              <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                  <div class="nk-block-between">
                    <div class="nk-block-head-content">
                      <h3 class="nk-block-title page-title">Create Investment Product</h3>
                    </div><!-- .nk-block-head-content -->
                  </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                  <div class="card">
                    <div class="card-inner">
                      <div class="tab-content">
                        <div class="tab-pane active" id="tabItem5">
                          {{-- <h5 class="title">Create Investment Product </h5>
                          <hr> --}}
                          
                          <form action="{{ route('savings.add.product') }}" class="pt-2" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Investment Name</label>
                                  <input type="text" name="product_name" class="form-control" id="investment-name" placeholder="Investment name">
                                </div>
                              </div>
                             
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Product Code</label>
                                  <input type="text" name="product_code" class="form-control" id="" placeholder="Product Code">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Minimum Investment Amount</label>
                                  <input type="text" name="min_investment_amount" class="form-control" id="" placeholder="Minimum Investment Amount">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Maximum Investment Amount</label>
                                  <input type="text" name="max_investment_amount" class="form-control" id="" placeholder="Maximum Investment Amount">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Interest Rate </label>
                                  <input type="text" name="interest_rate" class="form-control" id="" placeholder="Interest rate">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Investment Period</label>
                                  <input type="text" name="investment_period" class="form-control" id="" placeholder="Investment Period">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name"> Payout Frequency </label>
                                  <input type="text" name="payout_frequency" class="form-control" id="" placeholder="Payout Frequency  ; Monthly, Quarterly, Yearly">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name"> Target Amount </label>
                                  <input type="text" name="target_amount" class="form-control" id="" placeholder="Target Amount">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name"> Investment Start Date </label>
                                  <input type="date" name="start_date" class="form-control" id="" placeholder=" Investment Start Date">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name"> Investment Closing Date </label>
                                  <input type="date" name="closing_date" class="form-control" id="" placeholder=" Investment Closing Date">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name"> Investment Description</label>
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
