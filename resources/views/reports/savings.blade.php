@extends('layout.app');
@section('content')
  <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title"> Savings Report </h3>
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
                                                            {{-- <a class="btn btn-primary d-none d-md-inline-flex"  href=""><em class="icon ni ni-plus"></em><span>Add Customer</span></a> --}}
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
                                                            <td> <img src="X" alt="" class="thumb" style="width: 30px; height: 30px;"> # </td>
                                                            {{-- <td>{{ $customers->customer_id }}</td>
                                                            <td>{{ $customers->phone }}</td>
                                                            <td>{{ $customers->email }}</td>
                                                            <td>{{ $customers->address }}</td>
                                                            <td>{{ $customers->status }}</td> --}}
                                                            <td>#</td>
                                                            <td>#</td>
                                                            <td>#</td>
                                                            <td>#</td>
                                                            <td>#</td>
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