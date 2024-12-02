@extends('layout.app');
@section('content')
  <div class="nk-content ">
          <div class="container-fluid">
            <div class="nk-content-inner">
              <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                  <div class="nk-block-between">
                    <div class="nk-block-head-content">
                      <h3 class="nk-block-title page-title"> Transfer  </h3>
                    </div><!-- .nk-block-head-content -->
                  </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                  <div class="card">
                    <div class="card-inner">
                      <div class="tab-content">
                        <div class="tab-pane active" id="tabItem5">
                          <h5 class="title"> Transfer </h5>
                          
                          <form action="{{ route('confirm_for_transfer') }}" class="pt-2" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                              <div class="col-md-9">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Confirm Account Number </label>
                                  <input type="text" name="account_number" class="form-control" id="branch-name" placeholder="Confirm Account Number">
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="form-label" for="last-name">.</label>
                                  <input type="submit" name="email" class="form-control btn btn-primary" id="email" value="Confirm Account Number">
                                </div>
                              </div>
                              <hr>

                              
                                
                                
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