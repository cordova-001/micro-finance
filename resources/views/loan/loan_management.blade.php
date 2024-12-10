@extends('layout.app');
@section('content')
  <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title"> Loan Management</h3>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="more-options">
                                                    <ul class="nk-block-tools g-3">
                                                        <li>

                                                        </li>
                                                        <li>

                                                        </li>
                                                        <li class="nk-block-tools-opt">
                                                            <a href="#" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                                            <a class="btn btn-primary d-none d-md-inline-flex"  href="#"><em class="icon ni ni-plus"></em><span>Request Loan</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                




                                <div class="nk-block nk-block-lg">
                                    <div class="nk-block-head">
                                        
                                    </div>
                                    <div class="card card-bordered card-preview">
                                        <div class="card-inner">
                                            <table class="datatable-init-export nowrap table" data-export-title="Export">
                                                <thead>
                                                    <tr>
                                                        <th>Account Name</th>
                                                        <th>Account Number</th>
                                                        <th>Loan Product </th>
                                                        <th>Loan Principal Amount </th>
                                                        <th> Rate </th>
                                                        <th>Life Span</th>
                                                        <th> Status </th>    
                                                        <th>Action</th>                                                   

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @foreach ($customer as $customers) --}}
                                                        <tr>
                                                            {{-- <td> <img src="{{ asset('images/' . $customers->paasport) }}" alt="" class="thumb" style="width: 30px; height: 30px;"> {{ $customers->first_name }} {{ $customers->last_name }} </td>
                                                            <td>{{ $customers->customer_id }}</td>
                                                            <td>{{ $customers->phone }}</td>
                                                            <td>{{ $customers->email }}</td>
                                                            <td>{{ $customers->address }}</td>
                                                            <td>{{ $customers->status }}</td> --}}
                                                            <td>Ahmad Akorede</td>
                                                            <td>908765</td>
                                                            <td>Sharp Sharp Loan</td>
                                                            <td>3400000</td>
                                                            <td>1.2</td>
                                                            <td>2 years</td>
                                                            <td>Pending</td>
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

                                                        <tr>
                                                            {{-- <td> <img src="{{ asset('images/' . $customers->paasport) }}" alt="" class="thumb" style="width: 30px; height: 30px;"> {{ $customers->first_name }} {{ $customers->last_name }} </td>
                                                            <td>{{ $customers->customer_id }}</td>
                                                            <td>{{ $customers->phone }}</td>
                                                            <td>{{ $customers->email }}</td>
                                                            <td>{{ $customers->address }}</td>
                                                            <td>{{ $customers->status }}</td> --}}
                                                            <td>Tunji Wale</td>
                                                            <td>123000</td>
                                                            <td>Emergency Loan</td>
                                                            <td>300000</td>
                                                            <td>2</td>
                                                            <td>12 month </td>
                                                            <td>Pending</td>
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

                                                        <tr>
                                                            {{-- <td> <img src="{{ asset('images/' . $customers->paasport) }}" alt="" class="thumb" style="width: 30px; height: 30px;"> {{ $customers->first_name }} {{ $customers->last_name }} </td>
                                                            <td>{{ $customers->customer_id }}</td>
                                                            <td>{{ $customers->phone }}</td>
                                                            <td>{{ $customers->email }}</td>
                                                            <td>{{ $customers->address }}</td>
                                                            <td>{{ $customers->status }}</td> --}}
                                                            <td> Wasiu Olanrewaju </td>
                                                            <td>1200098</td>
                                                            <td>Emergency Loan</td>
                                                            <td>900000</td>
                                                            <td>1</td>
                                                            <td>6 month</td>
                                                            <td>Pending</td>
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

                                                        <tr>
                                                            {{-- <td> <img src="{{ asset('images/' . $customers->paasport) }}" alt="" class="thumb" style="width: 30px; height: 30px;"> {{ $customers->first_name }} {{ $customers->last_name }} </td>
                                                            <td>{{ $customers->customer_id }}</td>
                                                            <td>{{ $customers->phone }}</td>
                                                            <td>{{ $customers->email }}</td>
                                                            <td>{{ $customers->address }}</td>
                                                            <td>{{ $customers->status }}</td> --}}
                                                            <td>Ukachuwku Temi</td>
                                                            <td>908995</td>
                                                            <td> Health Loan</td>
                                                            <td>1000000</td>
                                                            <td>1</td>
                                                            <td>2 years</td>
                                                            <td>Pending</td>
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

                                                        <tr>
                                                            {{-- <td> <img src="{{ asset('images/' . $customers->paasport) }}" alt="" class="thumb" style="width: 30px; height: 30px;"> {{ $customers->first_name }} {{ $customers->last_name }} </td>
                                                            <td>{{ $customers->customer_id }}</td>
                                                            <td>{{ $customers->phone }}</td>
                                                            <td>{{ $customers->email }}</td>
                                                            <td>{{ $customers->address }}</td>
                                                            <td>{{ $customers->status }}</td> --}}
                                                            <td>Yusuf Tiwade</td>
                                                            <td>909876</td>
                                                            <td>Sharp Sharp Loan</td>
                                                            <td>390000</td>
                                                            <td>1.2</td>
                                                            <td>2 years</td>
                                                            <td>Pending</td>
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

                                                        <tr>
                                                            {{-- <td> <img src="{{ asset('images/' . $customers->paasport) }}" alt="" class="thumb" style="width: 30px; height: 30px;"> {{ $customers->first_name }} {{ $customers->last_name }} </td>
                                                            <td>{{ $customers->customer_id }}</td>
                                                            <td>{{ $customers->phone }}</td>
                                                            <td>{{ $customers->email }}</td>
                                                            <td>{{ $customers->address }}</td>
                                                            <td>{{ $customers->status }}</td> --}}
                                                            <td>Olawale Ayobami</td>
                                                            <td>345123</td>
                                                            <td>Sharp Sharp Loan</td>
                                                            <td>800000</td>
                                                            <td>2</td>
                                                            <td> 6 month</td>
                                                            <td>Approved</td>
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

                                                        <tr>
                                                            {{-- <td> <img src="{{ asset('images/' . $customers->paasport) }}" alt="" class="thumb" style="width: 30px; height: 30px;"> {{ $customers->first_name }} {{ $customers->last_name }} </td>
                                                            <td>{{ $customers->customer_id }}</td>
                                                            <td>{{ $customers->phone }}</td>
                                                            <td>{{ $customers->email }}</td>
                                                            <td>{{ $customers->address }}</td>
                                                            <td>{{ $customers->status }}</td> --}}
                                                            <td> Sule Ngozi </td>
                                                            <td>908765</td>
                                                            <td>Sharp Sharp Loan</td>
                                                            <td>5600000</td>
                                                            <td>1.2</td>
                                                            <td>2 years</td>
                                                            <td>Rejected</td>
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

                                                        <tr>
                                                            {{-- <td> <img src="{{ asset('images/' . $customers->paasport) }}" alt="" class="thumb" style="width: 30px; height: 30px;"> {{ $customers->first_name }} {{ $customers->last_name }} </td>
                                                            <td>{{ $customers->customer_id }}</td>
                                                            <td>{{ $customers->phone }}</td>
                                                            <td>{{ $customers->email }}</td>
                                                            <td>{{ $customers->address }}</td>
                                                            <td>{{ $customers->status }}</td> --}}
                                                            <td> Muhibah Tayo</td>
                                                            <td>908765</td>
                                                            <td>Education Loan</td>
                                                            <td>200000</td>
                                                            <td>1.2</td>
                                                            <td>1 years</td>
                                                            <td>Pending</td>
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

                                                        <tr>
                                                            {{-- <td> <img src="{{ asset('images/' . $customers->paasport) }}" alt="" class="thumb" style="width: 30px; height: 30px;"> {{ $customers->first_name }} {{ $customers->last_name }} </td>
                                                            <td>{{ $customers->customer_id }}</td>
                                                            <td>{{ $customers->phone }}</td>
                                                            <td>{{ $customers->email }}</td>
                                                            <td>{{ $customers->address }}</td>
                                                            <td>{{ $customers->status }}</td> --}}
                                                            <td> Abubakr Uthman</td>
                                                            <td>908765</td>
                                                            <td>Health Loan</td>
                                                            <td>3400000</td>
                                                            <td>1.2</td>
                                                            <td>2 years</td>
                                                            <td>Pending</td>
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

                                                        <tr>
                                                            {{-- <td> <img src="{{ asset('images/' . $customers->paasport) }}" alt="" class="thumb" style="width: 30px; height: 30px;"> {{ $customers->first_name }} {{ $customers->last_name }} </td>
                                                            <td>{{ $customers->customer_id }}</td>
                                                            <td>{{ $customers->phone }}</td>
                                                            <td>{{ $customers->email }}</td>
                                                            <td>{{ $customers->address }}</td>
                                                            <td>{{ $customers->status }}</td> --}}
                                                            <td>Umar Akorede</td>
                                                            <td>900765</td>
                                                            <td> Housing Loan</td>
                                                            <td>3400000</td>
                                                            <td>1.2</td>
                                                            <td> 6 month</td>
                                                            <td>Pending</td>
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

                                                        <tr>
                                                            {{-- <td> <img src="{{ asset('images/' . $customers->paasport) }}" alt="" class="thumb" style="width: 30px; height: 30px;"> {{ $customers->first_name }} {{ $customers->last_name }} </td>
                                                            <td>{{ $customers->customer_id }}</td>
                                                            <td>{{ $customers->phone }}</td>
                                                            <td>{{ $customers->email }}</td>
                                                            <td>{{ $customers->address }}</td>
                                                            <td>{{ $customers->status }}</td> --}}
                                                            <td>Ahmad Dangote</td>
                                                            <td>908111</td>
                                                            <td> Business Support Loan</td>
                                                            <td>34000000</td>
                                                            <td>1.2</td>
                                                            <td>2 years</td>
                                                            <td>Pending</td>
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
                        </div>
                    </div>
                </div>
@endsection