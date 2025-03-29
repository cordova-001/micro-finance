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
                            <h3 class="nk-block-title page-title"> {{ $savingsProduct->product_name }} - Details</h3>
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
                                                        <h6 class="title"> Total Savings</h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount fw-normal"> &#8358;{{ number_format($savings_product_credit) }}</div>
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
                                                        <div class="amount fw-normal"> &#8358;{{ number_format($savings_product_debit) }}</div>
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
                                                        <div class="amount fw-normal"> &#8358;{{ number_format($savings_product_balance) }}</div>
                                                        <a href=""><span> View <em class="icon ni ni-arrow-right-round"></em></span></a>  
                                                       
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
                            <h3 class="nk-block-title page-title"> Product Transaction</h3>
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
                                                <th> Transaction Type </th>
                                                <th> Savings Amount </th>
                                                <th> Withdrawal Amount </th>
                                                <th>Narration</th>
                                                <th> Balance </th>
                                                
                                                <th> Transaction Date  </th>
                                                                                               

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($savings_product_transactions as $transaction)
                                                <tr>
                                                    
                                                    <td>{{ $transaction->account_name }}</td>
                                                    <td>{{ $transaction->account_number }}</td>
                                                    <td>{{ $transaction->transaction_type }}</td>
                                                    <td>{{ number_format($transaction->inflow_amount) }}</td>
                                                    <td>{{ number_format($transaction->outflow_amount) }}</td>
                                                    <td> {{ $transaction->narration }} </td>
                                                    <td></td>
                                                    <td>{{ $transaction->created_at }}</td>
                                                    
                                                </tr>
                                            @endforeach
                                            <tr style="background-color: rgb(205, 205, 231); color:black; font-weight: bold;">
                                                <td>Total</td>
                                                <td></td>
                                                <td></td>
                                                <td>{{ number_format($savings_product_credit) }}</td>
                                                <td>{{ number_format($savings_product_debit) }}</td>
                                                
                                                <td></td>
                                                <td>{{ number_format($savings_product_balance) }}</td>
                                                <td></td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- .card-preview -->
                        </div> <!-- nk-block -->

                        <hr>

                       


                      
                       
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection
