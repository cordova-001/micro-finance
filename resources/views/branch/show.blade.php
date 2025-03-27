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
                                <!-- <p></p> -->
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
                                
                                <div class="col-md-4">
                                    <div class="card" style="border: 1px solid;">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Number of Customers  </h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <span> <strong> Total  {{ number_format($all_customers) }}<br>
                                                        This Year {{ $all_customers_this_year }} <br>
                                                        This Month {{ $all_customers_this_month }} </strong> 
                                                    </span>                                                  
                                                </div>
                                            </div><!-- .card-inner -->
                                           
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->
                                <div class="col-md-4">
                                    <div class="card" style="border: 1px solid;">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">PRINCIPAL RELEASED  </h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data">
                                                        <div class="data-group">
                                                        <p> <strong> Total Loan disbursement -  &#8358;{{ number_format($totalPrincipalLoan) }} <br>
                                                            Disbursement (this Year) - &#8358;{{ number_format($totalPrincipalLoanThisYear) }} <br>
                                                            Disbursement this Month - &#8358;{{ number_format($totalPrincipalLoanThisMonth) }} </strong> </p>                                                  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                           
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->
                                <div class="col-md-4">
                                    <div class="card" style="border: 1px solid;">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title"> COLLECTIONS  </h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data">
                                                        <p> <strong> Total no of collections - &#8358;{{ number_format($getLoanRepayment) }} <br>
                                                            Collections (this Year) - &#8358;{{ number_format($getLoanRepaymentThisYear) }} <br>
                                                            Collections this Month - &#8358;{{ number_format($getLoanRepaymentThisMonth) }} </strong> </p>                                                  
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                           
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->
                                

                                
                                <div class="col-md-4">
                                    <div class="card" style="border: 1px solid;">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title"> Total Savings</h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount fw-normal"> &#8358;{{ number_format($totalSavings) }}</div>
                                                        <a href=""><span> View <em class="icon ni ni-arrow-right-round"></em></span></a>  
                                                       
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                            
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->
                                <div class="col-md-4">
                                    <div class="card" style="border: 1px solid;">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Withdrawal </h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount fw-normal"> &#8358;{{ number_format($totalWithdrawal) }}</div>
                                                        <a href=""><span> View <em class="icon ni ni-arrow-right-round"></em></span></a>  
                                                       
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                            
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->

                                <div class="col-md-4" >
                                    <div class="card" style="border: 1px solid;">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Balance</h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount fw-normal"> &#8358;{{ number_format($totalBalance) }}</div>
                                                        <a href=""><span> View <em class="icon ni ni-arrow-right-round"></em></span></a>  
                                                       
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                           
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->

                                

                                <div class="col-md-4">
                                    <div class="card" style="border: 1px solid;">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">	Total outstanding open loans</h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount fw-normal"> &#8358;{{ number_format($totalPrincipalLoan) }}</div>
                                                        <a href=""><span> View <em class="icon ni ni-arrow-right-round"></em></span></a>  
                                                        

                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                           
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->

                                

                                <div class="col-md-4">
                                    <div class="card" style="border: 1px solid;">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title"> Principal outstanding open loans </h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount fw-normal">&#8358;{{ number_format($getOpenPrincipalRepayment) }}</div>
                                                        <a href=""><span> View <em class="icon ni ni-arrow-right-round"></em></span></a>  

                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                           
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->

                                <div class="col-md-4">
                                    <div class="card" style="border: 1px solid;">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title"> Interest outstanding open loans </h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount fw-normal">&#8358;{{ number_format($getOpenInterestRepayment) }}</div>
                                                        <a href=""><span> View <em class="icon ni ni-arrow-right-round"></em></span></a>  

                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                           
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->

                                

                                <div class="col-md-4">
                                    <div class="card" style="border: 1px solid;">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title"> Open loans </h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount fw-normal">&#8358;0</div>
                                                        <a href=""><span> View <em class="icon ni ni-arrow-right-round"></em></span></a>  

                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                           
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->

                                <div class="col-md-4">
                                    <div class="card" style="border: 1px solid;">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title"> Fully paid loans  </h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <p> <strong> 
                                                             This Year  &#8358;{{ number_format($fullyPaidLoanThisYear) }}<br>
                                                             This Month &#8358;{{ number_format($fullyPaidLoanThisMonth) }} <br> </strong> </p>     
                                                    </div>                                             
                                                    
                                                </div>
                                            </div><!-- .card-inner -->
                                           
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->

                                <div class="col-md-4">
                                    <div class="card" style="border: 1px solid;">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title"> Restructured loans  </h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <p> <strong> 
                                                            This Year <br>
                                                            This Month  <br></strong> </p>  

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
                                <p></p>
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
                                <p></p>
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
                                                <th>Loan ID</th>
                                                
                                                <th> Account Number </th>
                                                <th> Name </th>
                                                <th> Repayment Amount </th>
                                                
                                                <th> Repayment Date  </th>
                                                <th> Collected By </th>
                                                <th> Payment Method </th>
                                                                                               

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($repayments as $repayment)
                                                <tr>
                                                    <td>{{ $repayment->loan_id }}</td>
                                                    {{-- <td>{{ $repayment->first_name }} </td> --}}
                                                    <td>{{ $repayment->customer_id }}</td>
                                                    <td>Ahmad</td>
                                                    <td>{{ $repayment->paid_amount }}</td>
                                                    
                                                    <td>{{ $repayment->paid_date }}</td>
                                                    <td>{{ $repayment->collected_by }}</td>
                                                    <td>{{ $repayment->payment_means }}</td>
                                                    
                                                    <td>
                                                        <li>
                                                            <div class='drodown'>
                                                                <a href='' class='dropdown-toggle btn btn-icon btn-trigger' data-bs-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>
                                                                <div class='dropdown-menu dropdown-menu-end'>
                                                                    <ul class='link-list-opt no-bdr'>
                                                                        
                                                                      
                                                                         {{-- <a href="{{ route('branch.edit', $branches->id) }}" class="dropdown-item"><em class='icon ni ni-eye'></em>  Edit Loan  </a>  --}}
                                                                        <hr>
                                                                        as
                                                                        {{-- <a href="{{ route('loan.manage', $allLoan->id) }}" class="dropdown-item"> <em class='icon ni ni-activity-round'></em> Manage Loan</a>
                                                                        <a href="{{ route('loan.manage', $allLoan->id) }}" class="dropdown-item"> <em class='icon ni ni-activity-round'></em> Manage Loan</a>
                                                                        <a href="{{ route('loan.manage', $allLoan->id) }}" class="dropdown-item"> <em class='icon ni ni-activity-round'></em> Manage Loan</a> --}}
                                                                          
                                                                      </ul>
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
                            <h3 class="nk-block-title page-title"> Savings and Withdrawal Perfomance Transaction</h3>
                            <div class="nk-block-des text-soft">
                                <p></p>
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
                                                    
                                                    
                                                    <td>{{ $transaction->inflow_amount }}</td>
                                                    <td>{{ $transaction->outflow_amount }}</td>
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
                                <p></p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        

                        
                       



                       
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection
