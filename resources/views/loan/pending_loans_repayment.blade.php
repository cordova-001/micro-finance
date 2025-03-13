@extends('layout.app');
@section('content')
  <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title"> Pending Loan Repayment</h3>
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
                                                            {{-- <a class="btn btn-primary d-none d-md-inline-flex"  href="#"><em class="icon ni ni-plus"></em><span>Request Loan</span></a> --}}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->                                

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
                                                        
                                                        <th> Account Number </th>
                                                        <th> Loan ID </th>
                                                        <th> Loan Principal Amount </th>
                                                        <th> Interest Amount </th>
                                                        <th> Total Repayment Amount </th>                                                                                                                
                                                        <th> Due Date </th>
                                                        <th> Status </th>    
                                                        <th> Action </th>                                                   
        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pendingLoans as $loans)
                                                  
                                                        <tr>
                                                            
                                                            
                                                            <td>{{ $loans->customer_id }}</td>
                                                            <td>{{ $loans->loan_id }}</td>
                                                            <td>{{ $loans->total_principal }}</td>
                                                            <td>{{ $loans->total_interest }}</td>
                                                            <td>{{ $loans->total_repayment }}</td>
                                                            
                                                            <td>{{ $loans->due_date }}</td>
                                                            <td>{{ $loans->status }}</td>
                                                            <td>
                                                                <li>
                                                                    <div class='drodown'>
                                                                        <a href='' class='dropdown-toggle btn btn-icon btn-trigger' data-bs-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>
                                                                        <div class='dropdown-menu dropdown-menu-end'>
                                                                            <ul class='link-list-opt no-bdr'>
                                                                              
                                                                                {{-- <a href="{{ route('branch.edit', $branches->id) }}" class="dropdown-item"><em class='icon ni ni-eye'></em>  Edit Loan  </a> --}}
                                                                                <hr>
                                                                                {{-- <a href="{{ route('loan.manage', $loans->id) }}" class="dropdown-item"> <em class='icon ni ni-activity-round'></em> Manage Loan</a> --}}
                                                                                  
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
@endsection