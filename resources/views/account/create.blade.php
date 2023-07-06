@extends('layout.app');
@section('content')
  <div class="nk-content ">
          <div class="container-fluid">
            <div class="nk-content-inner">
              <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                  <div class="nk-block-between">
                    <div class="nk-block-head-content">
                      <h3 class="nk-block-title page-title">Create Chart of Account</h3>
                    </div><!-- .nk-block-head-content -->
                  </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                  <div class="card">
                    <div class="card-inner">
                      <div class="tab-content">
                        <div class="tab-pane active" id="tabItem5">
                          <form action="{{ route('center.store') }}" class="pt-2" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="last-name">Chart Name</label>
                                  <input type="text" name="chart_name" class="form-control" id="email" placeholder="Email">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="last-name">GL Code</label>
                                  <input type="number" name="gl-code" class="form-control" id="email" placeholder="Email">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="phone-no">Type</label>
                                  <select class="form-control" name="type">
                                    <option>Asset</option>
                                    <option>Equity</option>
                                    <option>Expenses</option>
                                    <option>Liabilities</option>
                                    <option>Reveunues</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-line2">Notes</label>
                                  <textarea class="form-control" name="notes"></textarea>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                  <li>
                                    <button name="create_center" class="btn btn-primary">Add Chart of Account</button>
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