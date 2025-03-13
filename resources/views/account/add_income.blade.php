@extends('layout.app');
@section('content')
  <div class="nk-content ">
          <div class="container-fluid">
            <div class="nk-content-inner">
              <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                  <div class="nk-block-between">
                    <div class="nk-block-head-content">
                      <h3 class="nk-block-title page-title">Create Income </h3>
                    </div><!-- .nk-block-head-content -->
                  </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                  <div class="card">
                    <div class="card-inner">
                      <div class="tab-content">
                        <div class="tab-pane active" id="tabItem5">
                          <h5 class="title">Add  Income </h5>
                          
                          <form action="" class="pt-2" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                              <div class="col-md-9">
                                <div class="form-group">
                                  <label class="form-label" for="first-name"> Purpose</label>
                                  <input type="text" name="purpose" class="form-control" id="purpose" placeholder=" Purpose ">
                                </div>
                              </div>
                              <div class="col-md-9">
                                <div class="form-group">
                                  <label class="form-label" for="last-name">Type</label>
                                  <input type="text" name="type" class="form-control" id="email" placeholder="Email">
                                </div>
                              </div>
                              
                              <div class="col-md-9">
                                <div class="form-group">
                                  <label class="form-label" for="phone-no">Amount</label>
                                  <input type="text" name="amount" class="form-control" id="phone-no" maxlength="11" placeholder= " Amount ">
                                </div>
                              </div>
                              
                              <div class="col-md-9">
                                <div class="form-group">
                                  <label class="form-label" for="address-line2">Description</label>                                  
                                  <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                              </div>     
                              
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-line2">Invoice / Receipt </label>
                                  <input type="file" class="form-control" multiple name="invoice" id="address-line2" >
                                </div>
                              </div>     

                              <div class="col-md-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                  <li>
                                    <button name="create_branch" class="btn btn-primary">Add Income</button>
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