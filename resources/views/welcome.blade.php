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
                                <div class="col-md-12" >
                                    <div class="card" style="background-color: rgb(14, 11, 103)">
                                        <div class="card-inner">
                                            <div class="card-title-group align-start mb-2">
                                                <div class="card-title">
                                                    <h6 class="title">Loan Performances</h6>
                                                    <p>In last 30 days</p>
                                                </div>
                                                <div class="card-tools">
                                                    <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Financial System"></em>
                                                </div>
                                            </div>
                                            <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                                                <div class="nk-sale-data-group flex-md-nowrap g-4">
                                                     <div class="nk-sale-data">
                                                        <span class="amount">5490 <span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>16.93%</span></span>
                                                        <span class="sub-title">This Month</span>
                                                    </div>
                                                    <div class="nk-sale-data">
                                                        <span class="amount">1480<span class="change up text-success"><em class="icon ni ni-arrow-long-up"></em>4.26%</span></span>
                                                        <span class="sub-title">This Week</span>
                                                    </div> 
                                                </div>
                                                <div class="nk-sales-ck sales-revenue">
                                                    <canvas class="student-enrole" id="enrolement"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .col -->
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">123  </h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount fw-normal"></div>
                                                        <div class="info text-end">
                                                            <h6> 123 </h6>
                                                             <h5> Pending Loan Application</h5> 
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
                                                        <h6 class="title">Pending Loan Application</h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount fw-normal">123</div>
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
                                                        <div class="amount fw-normal">123</div>
                                                        <h5> 12345 Customers</h5>
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
                                                        <div class="amount fw-normal">2234</div>
                                                        <h5> 2345 Customers</h5>
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
                                                        <div class="amount fw-normal">#21</div>

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
                                                        <div class="amount fw-normal">#21</div>

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
                                                        <div class="amount fw-normal">#21</div>

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
                                                        <div class="amount fw-normal">#281</div>

                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                           
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->

                            </div><!-- .row -->
                        </div><!-- .col -->
                        <div class="col-md-6 col-xxl-4">
                            <div class="card h-100">
                                <div class="card-inner">
                                    <div class="card-title-group mb-2">
                                        <div class="card-title">
                                            <h6 class="title">Recent Loan Disbursed</h6>
                                        </div>
                                    </div>
                                    <ul class='nk-top-products'>
                                        <li class='item'>

                                            <div class='info'>
                                                <div class='title'><b>Customer</b></div>
                                            </div>
                                            <div class='total'>
                                                <div class='amount'><b>Repayment Amount</b>
                                                </div>
                                        </li>
                                    </ul>

                                    <?php
                                    // include 'php/connect.inc.php';
                                    // $select = "SELECT * FROM loan WHERE status = 'Disbursed' ";
                                    // $query = mysqli_query($connect, $select);
                                    // if (mysqli_num_rows($query) == 0) {
                                        // echo "<span style='text-align: center;'>This is no loan that has been disbursed</span>";
                                    // } else {
                                        // while ($row = mysqli_fetch_assoc($query)) {
                                            // $fname = $row['fname'];
                                            // $lname = $row['lname'];
                                            // $customer_id = $row['customer_id'];
                                            // $repayment = $row['repayment'];

                                            // echo "<ul class='nk-top-products'>
                                        // <li class='item'>

                                        //     <div class='info'>
                                        //         <div class='title'>$fname $lname ($customer_id)</div>
                                        //     </div>
                                        //     <div class='total'>
                                        //         <div class='amount'>$repayment
                                        //     </div>
                                        // </li>
                                    // </ul>";
                                    //     }
                                    // }
                                    // ?>


                                </div><!-- .card-inner -->
                            </div><!-- .card -->
                        </div><!-- .col -->



                        <div class="col-md-6 col-xxl-4">
                            <div class="card h-100">
                                <div class="card-inner">
                                    <div class="card-title-group mb-2">
                                        <div class="card-title">
                                            <h6 class="title">Recent Loan Repaid</h6>
                                        </div>
                                        <!-- <div class="card-tools">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle link link-light link-sm dropdown-indicator" data-bs-toggle="dropdown">Weekly</a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>Daily</span></a></li>
                                                        <li><a href="#" class="active"><span>Weekly</span></a></li>
                                                        <li><a href="#"><span>Monthly</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <ul class='nk-top-products'>
                                        <li class='item'>

                                            <div class='info'>
                                                <div class='title'><b>Customer</b></div>
                                            </div>
                                            <div class='total'>
                                                <div class='amount'><b>Repayment Amount</b>
                                                </div>
                                        </li>
                                    </ul>

                                    <?php
                                    // include 'php/connect.inc.php';
                                    // $select = "SELECT * FROM loan WHERE status = 'Pending' ";
                                    // $query = mysqli_query($connect, $select);
                                    // while ($row = mysqli_fetch_assoc($query)) {
                                    //     $fname = $row['fname'];
                                    //     $lname = $row['lname'];
                                    //     $customer_id = $row['customer_id'];
                                    //     $repayment = $row['repayment'];

                                    //     echo "<ul class='nk-top-products'>
                                    //     <li class='item'>

                                    //         <div class='info'>
                                    //             <div class='title'>)</div>
                                    //         </div>
                                    //         <div class='total'>
                                    //             <div class='amount'>
                                    //         </div>
                                    //     </li>
                                    // </ul>";
                                    // }
                                    // ?>
                                </div><!-- .card-inner -->
                            </div><!-- .card -->
                        </div><!-- .col -->
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection
