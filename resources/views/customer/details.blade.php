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
                <div class="nk-block nk-block-lg">
                  <div class="card">
                    <div class="card-inner">
                      <div class="tab-content">
                        <div class="tab-pane active" id="tabItem5">
                          <h5 class="title">Add Withdrawal </h5>
                          
                         
                              <hr>

                              <div class="nk-block nk-block-lg">
                                
                                <div class="card card-bordered card-preview">
                                    <div class="card-inner">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="card card-bordered">
                                                    <img src="./images/slides/slide-a.jpg" class="card-img-top" alt="">
                                                    <div class="card-inner">
                                                        <h5 class="card-title">Passport Photo</h5>
                                                       
                                                        {{-- <a href="#" class="btn btn-primary">Download</a> --}}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                              <div class="card card-bordered">
                                                  <img src="./images/slides/slide-a.jpg" class="card-img-top" alt="">
                                                  <div class="card-inner">
                                                      <h5 class="card-title">Signature</h5>
                                                     
                                                      {{-- <a href="#" class="btn btn-primary">Download</a> --}}
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="col-lg-4">
                                            <div class="card card-bordered">
                                                <img src="./images/slides/slide-a.jpg" class="card-img-top" alt="">
                                                <div class="card-inner">
                                                    <h5 class="card-title">Utility</h5>
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div>


                                        </div>
                                    </div>
                                </div><!-- .card-preview -->
                                
                                
                            </div>
                             
                            <div class="card card-bordered card-preview">
                              <div class="card-inner">
                                  <ul class="nav nav-tabs mt-n3">
                                      <li class="nav-item">
                                          <a class="nav-link active" data-bs-toggle="tab" href="#tabItem5"><em class="icon ni ni-user"></em><span>Acount Transactions</span></a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" data-bs-toggle="tab" href="#tabItem6"><em class="icon ni ni-lock-alt"></em><span> Savings Transactions</span></a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" data-bs-toggle="tab" href="#tabItem7"><em class="icon ni ni-bell"></em><span>Withdrawal Transactions</span></a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" data-bs-toggle="tab" href="#tabItem8"><em class="icon ni ni-link"></em><span> Loan Transactions</span></a>
                                      </li>
                                  </ul>
                                  <div class="tab-content">
                                      <div class="tab-pane active" id="tabItem5">
                                         
                                        <div class="nk-block nk-block-lg">
                                          <div class="nk-block-head">
                                              
                                          </div>
                                          <div class="card card-bordered card-preview">
                                              <div class="card-inner">
                                                  <table class="datatable-init-export nowrap table" data-export-title="Export">
                                                      <thead>
                                                          <tr>
                                                              <th>Name</th>
                                                              <th>Account Number</th>
                                                              <th>Phone Number</th>
                                                              <th>Email</th>
                                                              <th>Address date</th>
                                                              <th>Status</th>    
                                                              <th>Action</th>                                                   
      
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                          {{-- @foreach ($customer as $customers) --}}
                                                              <tr>
                                                                  {{-- <td> {{ $customers->first_name }} {{ $customers->last_name }} </td>
                                                                  <td>{{ $customers->customer_id }}</td>
                                                                  <td>{{ $customers->phone }}</td>
                                                                  <td>{{ $customers->email }}</td>
                                                                  <td>{{ $customers->address }}</td>
                                                                  <td>{{ $customers->status }}</td> --}}
                                                                  <td>Ands</td>
                                                                  <td>hdgsg</td>
                                                                  <td>hsdfsd</td>
                                                                  <td>hgbsg</td>
                                                                  <td>jhytr</td>
                                                                  <td>juyhgt</td>
                                                                  <td>
                                                                      <li>
                                                                          <div class='drodown'>
                                                                              <a href='' class='dropdown-toggle btn btn-icon btn-trigger' data-bs-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>
                                                                              <div class='dropdown-menu dropdown-menu-end'>
                                                                              <form method='get'>
                                                                                  <ul class='link-list-opt no-bdr'>
                                                                                    <li class="form-control"><span><em class='icon ni ni-eye'></em><input name='branch_details' formaction='branch_details' type='submit' style='border: 0px; background-color: white; float: center;' value='View Details' class='icon ni ni-eye' /></span></li>
                                                                                    <br>
                                                                                    <input type='text' name='bid' value='$bid' hidden />
                                                                                    <li class="form-control"><em class='icon ni ni-activity-round'></em><input name='edit_branch'  type='submit' formaction='edit_branch' style='border: 0px; background-color: white; float: center;' value='Edit Customer' class='icon ni ni-eye' /></li>
                                                                                      
                                                                                  </ul>
                                                                                  </form>
                                                                              </div>
                                                                          </div>
                                                                      </li>
                                                                  </td>
                                                              </tr>
                                                              
                                                          {{-- @endforeach --}}
                                                         
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div><!-- .card-preview -->
                                      </div> <!-- nk-block -->


                                      </div>
                                      <div class="tab-pane" id="tabItem6">
                                        <div class="nk-block nk-block-lg">
                                          <div class="nk-block-head">
                                              
                                          </div>
                                          <div class="card card-bordered card-preview">
                                              <div class="card-inner">
                                                  <table class="datatable-init-export nowrap table" data-export-title="Export">
                                                      <thead>
                                                          <tr>
                                                              <th>Name</th>
                                                              <th>Account Number</th>
                                                              <th>Phone Number</th>
                                                              <th>Email</th>
                                                              <th>Address date</th>
                                                              <th>Status</th>    
                                                              <th>Action</th>                                                   
      
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                          {{-- @foreach ($customer as $customers) --}}
                                                              <tr>
                                                                  {{-- <td> {{ $customers->first_name }} {{ $customers->last_name }} </td>
                                                                  <td>{{ $customers->customer_id }}</td>
                                                                  <td>{{ $customers->phone }}</td>
                                                                  <td>{{ $customers->email }}</td>
                                                                  <td>{{ $customers->address }}</td>
                                                                  <td>{{ $customers->status }}</td> --}}
                                                                  <td>67890</td>
                                                                  <td>6543kljh</td>
                                                                  <td>gtrfdew</td>
                                                                  <td>0987654</td>
                                                                  <td>zxcvbnm</td>
                                                                  <td>juyhgt</td>
                                                                  <td>
                                                                      <li>
                                                                          <div class='drodown'>
                                                                              <a href='' class='dropdown-toggle btn btn-icon btn-trigger' data-bs-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>
                                                                              <div class='dropdown-menu dropdown-menu-end'>
                                                                              <form method='get'>
                                                                                  <ul class='link-list-opt no-bdr'>
                                                                                    <li class="form-control"><span><em class='icon ni ni-eye'></em><input name='branch_details' formaction='branch_details' type='submit' style='border: 0px; background-color: white; float: center;' value='View Details' class='icon ni ni-eye' /></span></li>
                                                                                    <br>
                                                                                    <input type='text' name='bid' value='$bid' hidden />
                                                                                    <li class="form-control"><em class='icon ni ni-activity-round'></em><input name='edit_branch'  type='submit' formaction='edit_branch' style='border: 0px; background-color: white; float: center;' value='Edit Customer' class='icon ni ni-eye' /></li>
                                                                                      
                                                                                  </ul>
                                                                                  </form>
                                                                              </div>
                                                                          </div>
                                                                      </li>
                                                                  </td>
                                                              </tr>
                                                              
                                                          {{-- @endforeach --}}
                                                         
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div><!-- .card-preview -->
                                      </div> <!-- nk-block -->
                                      </div>
                                      <div class="tab-pane" id="tabItem7">
                                          <p>Fugiat id quis dolor culpa eiusmod anim velit excepteur proident dolor aute qui magna. Ad proident laboris ullamco esse anim Lorem Lorem veniam quis Lorem irure occaecat velit nostrud magna nulla. Velit et et proident Lorem do ea tempor officia dolor. Reprehenderit Lorem aliquip labore est magna commodo est ea veniam consectetur.</p>
                                      </div>
                                      <div class="tab-pane" id="tabItem8">
                                          <p>Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.</p>
                                      </div>
                                  </div>
                              </div>
                         
                          
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