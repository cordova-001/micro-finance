<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    {{-- <script src="https://code.highcharts.com/highcharts.js"></script> --}}
    <!-- Page Title  -->
    <title>:: Primax | Microfinance Automation Software</title>
    <!-- StyleSheets  -->

    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css') }}?ver=3.0.3">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css') }}?ver=3.0.3">

</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">


                    <div class="nk-sidebar-element nk-sidebar-head">
    <div class="nk-sidebar-brand">
        <a href="index" class="logo-link nk-sidebar-logo">
            {{-- <h2>PRIMAX</h2> --}}
            <img class="logo-light logo-img" src="./images/cordovalogo.png" srcset="./images/cordovalogo.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src="./images/cordovalogo.png" srcset="./images/cordovalogo.png 2x" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small" src="./images/cordovalogo.png" srcset="./images/cordovalogo.png 2x" alt="logo-small"> 
        </a>
    </div>
    <div class="nk-menu-trigger me-n2">
        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
    </div>
</div>
<!-- .nk-sidebar-element -->

{{-- <div class="nk-sidebar-element nk-sidebar-head">


</div><!-- .nk-sidebar-element --> --}}
<div class="nk-sidebar-element" style="background-color: rgb(31, 10, 107); color:aliceblue;">
    <div class="nk-sidebar-content">
        <div class="nk-sidebar-menu" data-simplebar>
            <ul class="nk-menu">
                <li class="nk-menu-item">
                    <a href="{{ route('dashboard') }}" class="nk-menu-link" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                        <span class="nk-menu-text">Dashboard</span>
                    </a>
                </li><!-- .nk-menu-item -->
                <!-- <li class="nk-menu-item">
                    <a href="settings.php" class="nk-menu-link">
                        <span class="nk-menu-icon"><em class="icon ni ni-setting-alt-fill"></em></span>
                        <span class="nk-menu-text">Settings</span>
                    </a> -->
                </li><!-- .nk-menu-item -->
                <li class="nk-menu-item has-sub" >
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-book-fill"></em></span>
                        <span class="nk-menu-text">Savings </span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                        <li class="nk-menu-item">
                            <!-- <a href="#" class="nk-menu-link"><span class="nk-menu-text">Manage Roles</span></a> -->
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('ibank.get_product') }}" class="nk-menu-link"><span class="nk-menu-text"> Products  </span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="my_savings" class="nk-menu-link"><span class="nk-menu-text"> My Savings  </span></a>
                        </li>
                        
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->  
                
                <li class="nk-menu-item has-sub" >
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-book-fill"></em></span>
                        <span class="nk-menu-text">Loans </span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                        <li class="nk-menu-item">
                            <!-- <a href="#" class="nk-menu-link"><span class="nk-menu-text">Manage Roles</span></a> -->
                        </li>
                        <li class="nk-menu-item">
                            <a href="my_loans" class="nk-menu-link"><span class="nk-menu-text"> Loan Applications  </span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('branch.index') }}" class="nk-menu-link"><span class="nk-menu-text"> Loan Repayment  </span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('branch.index') }}" class="nk-menu-link"><span class="nk-menu-text"> Loan Status  </span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->  

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-user-fill"></em></span>
                        <span class="nk-menu-text">  Investment  </span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                        <li class="nk-menu-item">
                            <a href="my_investments" class="nk-menu-link"><span class="nk-menu-text"> All Investment </span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="all_investments" class="nk-menu-link"><span class="nk-menu-text"> Manage All Customer </span></a>
                        </li>


                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->
                
                

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-book-fill"></em></span>
                        <span class="nk-menu-text">  Transactions  </span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                        <li class="nk-menu-item">
                            <!-- <a href="#" class="nk-menu-link"><span class="nk-menu-text">Manage Roles</span></a> -->
                        </li>
                        
                        <li class="nk-menu-item">
                            <a href="{{ route('savings.product') }}" class="nk-menu-link"><span class="nk-menu-text">Add Savings Product</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('all.savings.product') }}" class="nk-menu-link"><span class="nk-menu-text"> Manage Savings Product</span></a>
                        </li>
                        <li class="nk-menu-item">
                            @php
                                // dd(route('customer.for.transaction'));
                            @endphp
                            <a href="{{ route('customer.for.transaction') }}" class="nk-menu-link"><span class="nk-menu-text">Add Savings</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('manage_deposit') }}" class="nk-menu-link"><span class="nk-menu-text">Manage All Savings</span></a>
                        </li>
                        {{-- <li class="nk-menu-item">
                            <a href="{{ route('center.index') }}" class="nk-menu-link"><span class="nk-menu-text">Upload Bulk Savings</span></a>
                        </li> --}}
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-book-fill"></em></span>
                        <span class="nk-menu-text">  Reports  </span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                        <li class="nk-menu-item">
                            <!-- <a href="#" class="nk-menu-link"><span class="nk-menu-text">Manage Roles</span></a> -->
                        </li>
                        
                        <li class="nk-menu-item">
                            <a href="{{ route('savings.product') }}" class="nk-menu-link"><span class="nk-menu-text"> Generate Account Statement </span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('all.savings.product') }}" class="nk-menu-link"><span class="nk-menu-text"> Manage Savings Product</span></a>
                        </li>
                        <li class="nk-menu-item">
                            @php
                                // dd(route('customer.for.transaction'));
                            @endphp
                            <a href="{{ route('customer.for.transaction') }}" class="nk-menu-link"><span class="nk-menu-text">Add Savings</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('manage_deposit') }}" class="nk-menu-link"><span class="nk-menu-text">Manage All Savings</span></a>
                        </li>
                        {{-- <li class="nk-menu-item">
                            <a href="{{ route('center.index') }}" class="nk-menu-link"><span class="nk-menu-text">Upload Bulk Savings</span></a>
                        </li> --}}
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

               
                
               
               
                

            </ul><!-- .nk-menu -->
        </div><!-- .nk-sidebar-menu -->
    </div><!-- .nk-sidebar-content -->
</div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light" style="background-color: rgb(190, 186, 190); color: white;">
                    <div class="container-fluid">
                        <div class="nk-header-wrap" >
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="index.php" class="logo-link">
                                    <a href="index" class="logo-link nk-sidebar-logo">
                                        {{-- <h2>PRIMAX</h2> --}}
                                        <img class="logo-light logo-img" src="./images/cordovalogo.png" srcset="./images/cordovalogo.png 2x" alt="logo">
                                                        <img class="logo-dark logo-img" src="./images/cordovalogo.png" srcset="./images/cordovalogo.png 2x" alt="logo-dark">
                                                        <img class="logo-small logo-img logo-img-small" src="./images/logo-small.png" srcset="./images/logo-small2x.png 2x" alt="logo-small"> 
                                    </a>
                                </a>
                            </div><!-- .nk-header-brand -->
                            

                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-xl-block">
                                                    <!-- <div class="user-status user-status-active">Administator</div> -->
                                                    <div class="user-name dropdown-indicator">{{ Auth::user()->name }}</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    
                                                    <div class="user-info">
                                                        <span class="lead-text">{{ Auth::user()->name }}</span>
                                                        <!-- <span class="sub-text">info@softnio.com</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="html/lms/admin-profile.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                    <li><a href="html/lms/admin-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a>
                                                    </li>

                                                    <form action="{{ route('logout') }}" method="POST">
                                                        @csrf
                                                        <input type="submit" class="icon ni ni-signout form-control " name="logout" value="Logout">
                                                    </form>


                                                </ul>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <!-- content @s -->




                @yield('content')


                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                  <div class="container-fluid">
                      <div class="nk-footer-wrap">
                          <div class="nk-footer-copyright"> &copy; <?php echo date('Y') ?> PRIMAX. Powered by <a href="https://cordova.ng" target="_blank">Cordova Business Solution Ltd</a>
                          </div>
                          <div class="nk-footer-links">
                              <ul class="nav nav-sm">

                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- select region modal -->

    <!-- Add instructor-->

    <!-- JavaScript -->
    <script src="{{ asset('assets/js/bundle.js') }}?ver=3.0.3"></script>
    <script src="{{ asset('assets/js/scripts.js') }}?ver=3.0.3"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    {{-- <script src="./assets/js/bundle.js?ver=3.2.3"></script>
    <script src="./assets/js/scripts.js?ver=3.2.3"></script> --}}
    <script src="{{ asset('assets/js/libs/datatable-btns.js') }}?ver=3.2.3"></script>
</body>

</html>
