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
                                        
                                        
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->   
                               @include('Components.loan_nav')
                                                       

                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

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
                                                        {{-- <th> Interest Rate</th> --}}
                                                        <th> Interest  </th>
                                                        <th> Total Repayment Amount </th>
                                                        <th> Each Repayment Amount </th>
                                                        <th> Repayment Period </th>
                                                        <th> Application Date </th>
                                                        <th> Status </th>    
                                                        <th> Action </th>                                                   

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($allLoans as $allLoan)
                                                        <tr>
                                                            
                                                            <td>{{ $allLoan->first_name }} {{ $allLoan->last_name }}</td>
                                                            <td>{{ $allLoan->customer_id }}</td>
                                                            <td>{{ $allLoan->loan_product }}</td>
                                                            <td>{{ number_format($allLoan->loan_amount) }}</td>
                                                            {{-- <td>{{ $allLoan->interest_rate }}</td> --}}
                                                            <td>{{ number_format($allLoan->interest_amount) }}</td>
                                                            <td>{{ number_format($allLoan->total_repayment_amount) }}</td>
                                                            <td>{{ number_format($allLoan->each_repayment_amount) }}</td>
                                                            <td>{{ $allLoan->repayment_period }}</td>
                                                            <td>{{ $allLoan->application_date }}</td>
                                                            <td>{{ $allLoan->status }}</td>
                                                            <td>
                                                                <li>
                                                                    <div class='drodown'>
                                                                        <a href='' class='dropdown-toggle btn btn-icon btn-trigger' data-bs-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>
                                                                        <div class='dropdown-menu dropdown-menu-end'>
                                                                            <ul class='link-list-opt no-bdr'>
                                                                              
                                                                                {{-- <a href="{{ route('branch.edit', $branches->id) }}" class="dropdown-item"><em class='icon ni ni-eye'></em>  Edit Loan  </a> --}}
                                                                                <hr>
                                                                                <a href="{{ route('loan.manage', $allLoan->id) }}" class="dropdown-item"> <em class='icon ni ni-activity-round'></em> Manage Loan</a>
                                                                                {{-- <a href="{{ route('loan.manage', $allLoan->id) }}" class="dropdown-item"> <em class='icon ni ni-activity-round'></em> Generate Repayment Schedule</a> --}}
                                                                                {{-- <a href="{{ route('loan.manage', $allLoan->id) }}" class="dropdown-item"> <em class='icon ni ni-activity-round'></em> Manage Loan</a> --}}
                                                                                  
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
                                </div>





                            </div>
                        </div>
                    </div>
                </div>
@endsection