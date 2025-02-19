@extends('layout.app');
@section('content')
  <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title"> Branch Management</h3>
                                            
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
                                                            <a class="btn btn-primary d-none d-md-inline-flex"  href="{{ route('branch.create') }}"><em class="icon ni ni-plus"></em><span>Add Branch</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
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
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card">
                                        <div class="card-inner-group">
                                            <div class="card-inner p-0">
                                                <div class="nk-tb-list nk-tb-ulist">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col nk-tb-col-check">
                                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                <input type="checkbox" class="custom-control-input" id="uid">
                                                                <label class="custom-control-label" for="uid"></label>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col"><span class="sub-text">Branch Name</span></div>
                                                        <div class="nk-tb-col"><span class="sub-text">Branch ID</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Phone</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Email</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Address</span></div>

                                                        <div class="nk-tb-col nk-tb-col-tools">
                                                            <ul class="nk-tb-actions gx-1 my-n1">
                                                                <li>
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">

                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                    @foreach ($branch as $branches)
                                                      
                                                   
                                                   <div class='nk-tb-item'>
                                                        <div class='nk-tb-col nk-tb-col-check'>
                                                            <div class='custom-control custom-control-sm custom-checkbox notext'>
                                                                <input type='checkbox' class='custom-control-input' id='uid1'>
                                                                <label class='custom-control-label' for='uid1'></label>
                                                            </div>
                                                        </div>
                                                        <div class='nk-tb-col'>
                                                            <a href='#'>
                                                                <div class='user-card'>

                                                                    <div class='user-info'>
                                                                        <span class='tb-lead'>{{ $branches->branch_name }} <span class='dot dot-success d-md-none ms-1'></span></span>

                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class='nk-tb-col tb-col-md'>
                                                            <span>{{ $branches->branch_no }}</span>
                                                        </div>
                                                        <div class='nk-tb-col tb-col-lg'>
                                                            <span>{{ $branches->phone }}</span>
                                                        </div>
                                                        <div class='nk-tb-col tb-col-lg'>
                                                            <span>{{ $branches->email }}</span>
                                                        </div>
                                                        <div class='nk-tb-col tb-col-md'>
                                                            <span class='tb-status text-success'>{{ $branches->address }}</span>
                                                        </div>

                                                       
                                                        <div class='nk-tb-col nk-tb-col-tools'>
                                                            <ul class='nk-tb-actions gx-1'>

                                                                <li>
                                                                    <div class='drodown'>
                                                                        <a href='' class='dropdown-toggle btn btn-icon btn-trigger' data-bs-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>
                                                                        <div class='dropdown-menu dropdown-menu-end'>
                                                                        
                                                                            <ul class='link-list-opt no-bdr'>
                                                                              
                                                                              <a href="{{ route('branch.edit', $branches->id) }}" class="dropdown-item"><em class='icon ni ni-eye'></em>Edit Branch </a>
                                                                              <hr>
                                                                              <a href="{{ route('branch.show', $branches->id) }}" class="dropdown-item"> <em class='icon ni ni-activity-round'></em> View Details</a>
                                                                                
                                                                            </ul>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                    @endforeach
                                                    




                                                </div><!-- .nk-tb-list -->
                                            </div>
                                            <div class="card-inner">
                                                <div class="nk-block-between-md g-3">

                                                    <div class="g">

                                                    </div><!-- .pagination-goto -->
                                                </div><!-- .nk-block-between -->
                                            </div>
                                            <!--card inner-->
                                        </div>
                                    </div>
                                    <!--card-->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
@endsection