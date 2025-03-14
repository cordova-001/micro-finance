@extends('layout.app');
@section('content')
  <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title"> Disbursed Loan </h3>
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
                                                    <tr style="background-color: rgb(207, 207, 229); font-weight: bold; font-size: 14px;">
                                                        <th> Account Name </th>
                                                        <th> Account Number </th>
                                                        <th> Loan Product </th>
                                                        <th> Principal  </th>
                                                        {{-- <th> Interest Rate</th> --}}
                                                        <th> Interest  </th>
                                                        <th> Total Due </th>
                                                        <th> Paid </th>
                                                        <th> Balance </th>
                                                        {{-- <th> Application Date </th> --}}
                                                         
                                                        <th> Action </th>                                                   

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($allLoans as $allLoan)
                                                        <tr>
                                                            
                                                            <td>{{ $allLoan->first_name }} {{ $allLoan->last_name }}</td>
                                                            <td>{{ $allLoan->customer_id }}</td>
                                                            <td>{{ $allLoan->loan_product }}</td>
                                                            <td>{{ $allLoan->loan_amount }}</td>
                                                            {{-- <td>{{ $allLoan->interest_rate }}</td> --}}
                                                            <td>{{ $allLoan->interest_amount }}</td>
                                                            <td>{{ $allLoan->total_due }}</td>
                                                            <td>{{ $allLoan->total_paid }}</td>
                                                            <td>{{ $allLoan->balance }}</td>
                                                            {{-- <td>{{ $allLoan->application_date }}</td> --}}
                                                            
                                                            <td>
                                                                <form action="{{ route('loan.manage.disbursed', $allLoan->id) }}" method="POST">                                                                    
                                                                    @csrf
                                                                    {{-- <input type="text" > --}}
                                                                    <button class="btn btn-primary"> View Details  </button>
                                                                </form>
                                                                
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
@endsection