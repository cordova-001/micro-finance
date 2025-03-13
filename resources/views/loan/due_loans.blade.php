@extends('layout.app');
@section('content')
  <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title"> Due Loans </h3>
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
                                    <div class="card">
                                        <div class="card-inner">
                                          <div class="tab-content">
                                            <div class="tab-pane active" id="tabItem5">
                                              <h5 class="title"> Select Date Range </h5>
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
                                              
                                              <form action="{{ route('branch.store') }}" class="pt-2" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row gy-4">
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label class="form-label" for="first-name"> Start Date </label>
                                                      <input type="date" name="start_date" class="form-control" id="start_date" placeholder="">
                                                    </div>
                                                  </div>
                                                  
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label class="form-label" for="last-name"> End Date</label>
                                                      <input type="date" name="end_date" class="form-control" id="email" placeholder="Email">
                                                    </div>
                                                  </div>
                                                 
                                                  
    
                                                  <div class="col-md-12">
                                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                                      <li>
                                                        <button name="create_branch" class="btn btn-primary"> Search </button>
                                                      </li>
                    
                                                    </ul>
                                                  </div>
                                                </div>
                                              </form>
                                            </div>
                                            <!--tab pan -->
                    
                    
                                          </div>
                                        </div>
                                        <!--card inner-->
                                      </div>

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
                                                    @foreach ($dueLoans as $loans)
                                                        <tr>
                                                            
                                                            
                                                            <td>{{ $loans->customer_id }}</td>
                                                            <td>{{ $loans->loan_id }}</td>
                                                            <td>{{ $loans->principal_amount }}</td>
                                                            <td>{{ $loans->interest_amount }}</td>
                                                            <td>{{ $loans->total_amount_due }}</td>
                                                            
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
                                                                                <a href="{{ route('loan.manage', $loans->id) }}" class="dropdown-item"> <em class='icon ni ni-activity-round'></em> Manage Loan</a>
                                                                                  
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