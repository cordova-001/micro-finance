{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}


@extends('layout.app')
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title"> {{ $branch->branch_name }} - Details</h3>
                            <div class="nk-block-des text-soft">
                                <!-- <p>Welcome to Learning Management Dashboard.</p> -->
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-xxl-12">
                            <div class="row g-gs">
                                
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Pending Loan Application</h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount fw-normal">0</div>
                                                        <div class="info text-end">
                                                            <!-- <h5> 232323 Customers</h5> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                            
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Processed Loan Application</h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount fw-normal">0</div>
                                                        <div class="info text-end">
                                                            <!-- <h5> 232323 Customers</h5> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                            
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Loan Approved</h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount fw-normal">0</div>
                                                        
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                            
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->

                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Loan Approved</h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount fw-normal">0</div>
                                                        {{-- <h5> 2345 Customers</h5> --}}
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                           
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->

                                <div class="col-md-3">
                                    <div class="card" style="background-color: skyblue;">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Loan Repaid</h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount fw-normal">#0</div>

                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                           
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->
                                <div class="col-md-3">
                                    <div class="card" style="background-color: skyblue;">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Loan Repaid</h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount fw-normal">#0</div>

                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                           
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->
                                <div class="col-md-3">
                                    <div class="card" style="background-color: skyblue;">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Loan Repaid</h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount fw-normal">#0</div>

                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                           
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->
                                <div class="col-md-3">
                                    <div class="card" style="background-color: skyblue;">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Loan Repaid</h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount fw-normal">#0</div>

                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                           
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->

                            </div><!-- .row -->


                        </div><!-- .col -->

                        <hr>

                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title"> Loan Perfomance Transaction</h3>
                            <div class="nk-block-des text-soft">
                                <p>Welcome to Learning Management Dashboard.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        

                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                                
                            </div>
                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <table class="datatable-init-export nowrap table" data-export-title="Export">
                                        <thead>
                                            <tr>
                                                <th> Account Name </th>
                                                <th> Account Number </th>
                                                <th> Loan Product </th>
                                                <th> Loan Principal Amount </th>
                                                <th> Interest Rate </th>
                                                <th> Total Repayment Amount </th>
                                                <th> Each Repayment Amount </th>
                                                <th> Repayment Period </th>
                                                <th> Application Date </th>
                                                <th> Status </th>    
                                                <th> Action </th>                                                   

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($loans as $loan)
                                                <tr>
                                                    
                                                    <td>{{ $loan->customer_id }}</td>
                                                    <td>{{ $loan->customer_id }}</td>
                                                    <td>{{ $loan->loan_product }}</td>
                                                    <td>{{ $loan->loan_amount }}</td>
                                                    <td>{{ $loan->interest_rate }}</td>
                                                    <td>{{ $loan->total_repayment_amount }}</td>
                                                    <td>{{ $loan->each_repayment_amount }}</td>
                                                    <td>{{ $loan->repayment_period }}</td>
                                                    <td>{{ $loan->application_date }}</td>
                                                    <td>{{ $loan->status }}</td>
                                                    <td>
                                                        <li>
                                                            <div class='drodown'>
                                                                <a href='' class='dropdown-toggle btn btn-icon btn-trigger' data-bs-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>
                                                                <div class='dropdown-menu dropdown-menu-end'>
                                                                <form method='get'>
                                                                    <ul class='link-list-opt no-bdr'>
                                                                      <li class="form-control"><span><em class='icon ni ni-eye'></em><input name='branch_details' style='border: 0px; background-color: white; float: center;' value='View Details' class='icon ni ni-eye' /></span></li>
                                                                      <br>
                                                                      <input type='text' name='bid' value='$bid' hidden />
                                                                      <li class="form-control"><em class='icon ni ni-activity-round'></em><input name='edit_branch'  type='submit' formaction='edit_branch' style='border: 0px; background-color: white; float: center;' value='Manage Loan' class='icon ni ni-eye' /></li>
                                                                        
                                                                    </ul>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </td>
                                                </tr>
                                            @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- .card-preview -->
                        </div> <!-- nk-block -->

                        <hr>

                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title"> Loan Repayment Perfomance Transaction</h3>
                            <div class="nk-block-des text-soft">
                                <p>Welcome to Learning Management Dashboard.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        

                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                                
                            </div>
                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <table class="datatable-init-export nowrap table" data-export-title="Export">
                                        <thead>
                                            <tr>
                                                <th> Account Name </th>
                                                <th> Account Number </th>
                                                <th> Loan Product </th>
                                                <th> Loan Principal Amount </th>
                                                <th> Interest Rate </th>
                                                <th> Total Repayment Amount </th>
                                                <th> Each Repayment Amount </th>
                                                <th> Repayment Period </th>
                                                <th> Application Date </th>
                                                <th> Status </th>    
                                                <th> Action </th>                                                   

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($loans as $loan)
                                                <tr>
                                                    
                                                    <td>{{ $loan->customer_id }}</td>
                                                    <td>{{ $loan->customer_id }}</td>
                                                    <td>{{ $loan->loan_product }}</td>
                                                    <td>{{ $loan->loan_amount }}</td>
                                                    <td>{{ $loan->interest_rate }}</td>
                                                    <td>{{ $loan->total_repayment_amount }}</td>
                                                    <td>{{ $loan->each_repayment_amount }}</td>
                                                    <td>{{ $loan->repayment_period }}</td>
                                                    <td>{{ $loan->application_date }}</td>
                                                    <td>{{ $loan->status }}</td>
                                                    <td>
                                                        <li>
                                                            <div class='drodown'>
                                                                <a href='' class='dropdown-toggle btn btn-icon btn-trigger' data-bs-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>
                                                                <div class='dropdown-menu dropdown-menu-end'>
                                                                <form method='get'>
                                                                    <ul class='link-list-opt no-bdr'>
                                                                      <li class="form-control"><span><em class='icon ni ni-eye'></em><input name='branch_details' style='border: 0px; background-color: white; float: center;' value='View Details' class='icon ni ni-eye' /></span></li>
                                                                      <br>
                                                                      <input type='text' name='bid' value='$bid' hidden />
                                                                      <li class="form-control"><em class='icon ni ni-activity-round'></em><input name='edit_branch'  type='submit' formaction='edit_branch' style='border: 0px; background-color: white; float: center;' value='Manage Loan' class='icon ni ni-eye' /></li>
                                                                        
                                                                    </ul>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </td>
                                                </tr>
                                            @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- .card-preview -->
                            </div><!-- .card-preview -->
                        </div> <!-- nk-block -->


                        <hr>

                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title"> Savings and Withdrawal Perfomance Transaction</h3>
                            <div class="nk-block-des text-soft">
                                <p>Welcome to Learning Management Dashboard.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        

                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                                
                            </div>
                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <table class="datatable-init-export nowrap table" data-export-title="Export">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Account Name</th>
                                                <th>Account Number</th>
                                                <th>Transaction Type</th>
                                                <th>Transaction ID</th>
                                                
                                                 
                                                <th>Amount Deposited</th>
                                                <th>Amount Withdrawn</th>
                                                <th>Narration</th>
                                                  
                                                <th>Transaction Date</th>                                                   

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transactions as $transaction)
                                                <tr>
                                                    <td> {{ $transaction->id }}</td>
                                                    <td> {{ $transaction->account_name }} </td>
                                                    <td>{{ $transaction->account_number }}</td>
                                                    <td>{{ $transaction->transaction_type }}</td>
                                                    <td>{{ $transaction->transaction_id }}</td>
                                                    
                                                    
                                                    <td>{{ $transaction->amount_paid }}</td>
                                                    <td>{{ $transaction->amount_received }}</td>
                                                    <td>{{ $transaction->narration }}</td>                                                  
                                                    <td>
                                                        {{ $transaction->created_at }}
                                                        {{-- <li>
                                                            <div class='drodown'>
                                                                <a href='' class='dropdown-toggle btn btn-icon btn-trigger' data-bs-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>
                                                                <div class='dropdown-menu dropdown-menu-end'>
                                                                <form method='get'>
                                                                    <ul class='link-list-opt no-bdr'>
                                                                      <li><span><em class='icon ni ni-eye'></em><input name='branch_details' formaction='branch_details' type='submit' style='border: 0px; background-color: white; float: center;' value='View Details' class='icon ni ni-eye' /></span></li>
                                                                      <br>
                                                                      <input type='text' name='bid' value='$bid' hidden />
                                                                      <li><em class='icon ni ni-activity-round'></em><input name='edit_branch' type='submit' formaction='edit_branch' style='border: 0px; background-color: white; float: center;' value='Edit Branch' class='icon ni ni-eye' /></li>
                                                                        
                                                                    </ul>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </li> --}}
                                                    </td>
                                                </tr>
                                                
                                            @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- .card-preview -->
                        </div> <!-- nk-block -->

                        <hr>

                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title"> Investment Perfomance Transaction</h3>
                            <div class="nk-block-des text-soft">
                                <p>Welcome to Learning Management Dashboard.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        

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
                                                    <td>a</td>
                                                    <td>s</td>
                                                    <td>as</td>
                                                    <td>sd</td>
                                                    <td>asd</td>
                                                    <td>asd</td>
                                                    {{-- <td> <img src="{{ asset('images/' . $customers->passport) }}" alt="" class="thumb" style="width: 30px; height: 30px;"> {{ $customers->first_name }} {{ $customers->last_name }} </td>
                                                    <td>{{ $customers->customer_id }}</td>
                                                    <td>{{ $customers->phone }}</td>
                                                    <td>{{ $customers->email }}</td>
                                                    <td>{{ $customers->address }}</td> 
                                                    <td>{{ $customers->status }}</td> --}}
                                                    <td>
                                                        <li>
                                                            <div class='drodown'>
                                                                <a href='' class='dropdown-toggle btn btn-icon btn-trigger' data-bs-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>
                                                                <div class='dropdown-menu dropdown-menu-end'>
                                                                <form method='get'>
                                                                    <ul class='link-list-opt no-bdr'>
                                                                      <li class="form-control"><span><em class='icon ni ni-eye'></em><input name='branch_details' formaction='customer_details' type='submit' style='border: 0px; background-color: white; float: center;' value='View Details' class='icon ni ni-eye' /></span></li>
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



    </div>
</div>
@endsection
