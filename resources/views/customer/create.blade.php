@extends('layout.app')
@section('content')
  <div class="nk-content ">
          <div class="container-fluid">
            <div class="nk-content-inner">
              <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                  <div class="nk-block-between">
                    <div class="nk-block-head-content">
                      <h3 class="nk-block-title page-title">Add Customer</h3>
                    </div><!-- .nk-block-head-content -->
                  </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                  <div class="card">
                    <div class="card-inner">
                      <div class="tab-content">
                        <div class="tab-pane active" id="tabItem5">
                          <h5 class="title">Add A Customer </h5>
                          
                          <form action="{{ route('customer.add') }}" class="pt-2" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">First Name</label>
                                  <input type="text" name="first_name" class="form-control" id="first-name" placeholder="First name">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="last-name">Last Name</label>
                                  <input type="text" name="last_name" class="form-control" id="last-name" placeholder="Last name">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="email">Email Address</label>
                                  <input type="email" name="email" class="form-control" id="email" placeholder="Email Address">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="phone-no">Phone Number</label>
                                  <input type="text" name="phone" class="form-control" id="phone-no" maxlength="11" placeholder="Phone Number">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-l1">Gender</label>
                                  <select class="form-select js-select2" id="gender" name="gender">
                                    <option>Male</option>
                                    <option>Female</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-line2">Address</label>
                                  <input type="text" class="form-control" name="address" id="address-line2" value="">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="country">State of Origin</label>
                                  <select class="form-select js-select2" name="state_of_origin">
                                    <option>Abia State</option>
                                    <option>Adamwa State</option>
                                    <option>Akwa Ibom</option>
                                    <option>Anambra State</option>
                                    <option>Bauchi State</option>
                                    <option>Bayelsa State</option>
                                    <option>Benue State</option>
                                    <option>Borno State</option>
                                    <option>Cross River State</option>
                                    <option>Delta State</option>
                                    <option>Ebonyi State</option>
                                    <option>Edo State</option>
                                    <option>Ekiti State</option>
                                    <option>Enugu State</option>
                                    <option>Gombe State</option>
                                    <option>Imo State</option>
                                    <option>Jigawa State</option>
                                    <option>Kaduna State</option>
                                    <option>Kano State</option>
                                    <option>Katsina State</option>
                                    <option>Kebbi State</option>
                                    <option>Kogi State</option>
                                    <option>Kwara State</option>
                                    <option>Lagos State</option>
                                    <option>Nasarawa State</option>
                                    <option>Niger State</option>
                                    <option>Ogun State</option>
                                    <option>Ondo State</option>
                                    <option>Osun State</option>
                                    <option>Oyo State</option>
                                    <option>Plateau State</option>
                                    <option>Rivers State</option>
                                    <option>Sokoto State</option>
                                    <option>Taraba State</option>
                                    <option>Yobe State</option>
                                    <option>Zamfara State</option>
                                    
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Local Government</label>
                                  <input type="text" name="local_govt" class="form-control" id="address-st" placeholder="Local Govt">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Next of Kin</label>
                                  <input type="text" name="next_of_kin" class="form-control" id="address-st" placeholder="Next of Kin">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">addy_of_nok</label>
                                  <input type="text" name="address_of_next_of_kin" class="form-control" id="address-st" placeholder="Address of Kin">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Date of Birth</label>
                                  <input type="date" name="date_of_birth" class="form-control" id="address-st" placeholder="Date of Birth">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Occupation</label>
                                  <input type="text" name="occupation" class="form-control" id="address-st" placeholder="occupation">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Status</label>
                                  <select class="form-select js-select2" name="status">
                                    <option>Active</option>
                                    <option>Suspended</option>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Customer ID</label>
                                  <input type="text" name="customer_id" class="form-control" id="address-st" value="{{ rand(10000, 999999) }}">
                                </div>
                              </div>

                              <hr>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Branch</label>
                                  <select class='form-select js-select2' id='branch' name='branch_id'>
                                   @foreach ($branch as $branches)
                                    <option value="{{ $branches->id }}">{{ $branches->branch_name }}</option>
                                    @endforeach

                                  </select>
                                </div>
                              </div>

                             

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Utility Bill</label>
                                  <input type="file" name="utility" class="form-control" id="address-st" placeholder="Utility Bill">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Identity Card</label>
                                  <input type="file" name="id_card" class="form-control" id="address-st" placeholder="Identity Card">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Passport</label>
                                  <input type="file" name="passport" class="form-control" id="address-st" placeholder="Passport">
                                </div>
                              </div>


                              <div class="col-md-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                  <li>
                                    <button name="create_customer" class="btn btn-primary">Add Customer</button>
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