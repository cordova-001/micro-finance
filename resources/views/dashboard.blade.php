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

{{-- @dd($customer) --}}

@extends('layout.app')
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Dashboard</h3>
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

                                <form action="{{ route('loan.loan_process') }}" class="pt-2" method="POST" enctype="multipart/form-data">
                                <div class="col-md-12" >
                                    <div class="card" style="background-color: rgb(220, 228, 233);">
                                        <div class="card-inner">
                                            
                                                {{-- <div class="row gy-4">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                          <div class="form-group">
                                                            <label class="form-label">Account Number</label>
                                                            <div class="form-control-wrap">                                                                      
                                                                <select class="form-select js-select2" required data-search="on" name="account_number">
                                                                    
                                                                  @foreach ($customer as $customers) 
                                                                  <option value="">Enter Account Number</option>
                                                                    <option value="{{ $customers->customer_id }} ">  
                                                                      {{ $customers->customer_id }} - {{ $customers->first_name }} {{ $customers->last_name }}
                                                                    </option>
                                                                   
                                                                  @endforeach      
                                                                </select>
                                                                <br>
                                                                <button class="btn btn-primary">Try this</button>
                                                              
                                                            </div>
                                                            <br>
                                                            
                                                          </div>
                                                        </div>
                                                      </div>
                                                      
                                                </div> --}}
                                            
                                            
                                           
                                        </div>
                                    </div>
                                </div><!-- .col -->
                                
                            </form>

                                

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
                                                        <h6 class="title"> Interest outstanding open loans </h6>
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
                       



                       
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection
