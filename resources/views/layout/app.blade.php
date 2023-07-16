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
    <!-- Page Title  -->
    <title>Financial Automation Software</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=3.0.3">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=3.0.3">
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
            <h2>E<sup>2</sup>PAI</h2>
            <!-- <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small" src="./images/logo-small.png" srcset="./images/logo-small2x.png 2x" alt="logo-small"> -->
        </a>
    </div>
    <div class="nk-menu-trigger me-n2">
        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
    </div>
</div>
<!-- .nk-sidebar-element -->

<div class="nk-sidebar-element nk-sidebar-head">
    
    
</div><!-- .nk-sidebar-element -->
<div class="nk-sidebar-element">
    <div class="nk-sidebar-content">
        <div class="nk-sidebar-menu" data-simplebar>
            <ul class="nk-menu">
                <li class="nk-menu-item">
                    <a href="index" class="nk-menu-link">
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
                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-book-fill"></em></span>
                        <span class="nk-menu-text">Branch Management</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <!-- <a href="#" class="nk-menu-link"><span class="nk-menu-text">Manage Roles</span></a> -->
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('branch.create') }}" class="nk-menu-link"><span class="nk-menu-text">Create Branch</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('branch.index') }}" class="nk-menu-link"><span class="nk-menu-text">View All Branch</span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->
                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-book-fill"></em></span>
                        <span class="nk-menu-text">Center Management</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <!-- <a href="#" class="nk-menu-link"><span class="nk-menu-text">Manage Roles</span></a> -->
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('center.create') }}" class="nk-menu-link"><span class="nk-menu-text">Create Center</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('center.index') }}" class="nk-menu-link"><span class="nk-menu-text">View All Center</span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->
                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-book-fill"></em></span>
                        <span class="nk-menu-text">Staff Management</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <!-- <a href="#" class="nk-menu-link"><span class="nk-menu-text">Manage Roles</span></a> -->
                        </li>
                        <li class="nk-menu-item">
                            <a href="manage_staff" class="nk-menu-link"><span class="nk-menu-text">Manage Staff</span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->
                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-user-fill"></em></span>
                        <span class="nk-menu-text">Customer</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="{{ route('customer.create') }}" class="nk-menu-link"><span class="nk-menu-text"> Add Customer </span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('customer.index') }}" class="nk-menu-link"><span class="nk-menu-text"> View All Customer </span></a>
                        </li>


                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-property-add"></em></span>
                        <span class="nk-menu-text">Loan </span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="{{ route('loan.product') }}" class="nk-menu-link"><span class="nk-menu-text">Loan Products</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="loan_request" class="nk-menu-link"><span class="nk-menu-text">Loan Request</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="loan_management" class="nk-menu-link"><span class="nk-menu-text">Loan Management</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="approve_loan" class="nk-menu-link"><span class="nk-menu-text">Approve Loan</span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->
                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-property-add"></em></span>
                        <span class="nk-menu-text">Repayment </span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="view_repayment" class="nk-menu-link"><span class="nk-menu-text">View Repayment</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="bulkRepayment" class="nk-menu-link"><span class="nk-menu-text">Bulk Repayment </span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="approve_repayment" class="nk-menu-link"><span class="nk-menu-text">Approve Repayment </span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->
                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-property-add"></em></span>
                        <span class="nk-menu-text">Transactions</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="savings" class="nk-menu-link"><span class="nk-menu-text">Savings</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="withdrawal" class="nk-menu-link"><span class="nk-menu-text">Withdrawal </span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-property-add"></em></span>
                        <span class="nk-menu-text">Payroll </span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="add_payroll" class="nk-menu-link"><span class="nk-menu-text">Add Payroll</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="manage_payroll" class="nk-menu-link"><span class="nk-menu-text">Manage Payroll </span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="chart_of_account" class="nk-menu-link">
                        <span class="nk-menu-icon"><em class="icon ni ni-property-add"></em></span>
                        <span class="nk-menu-text">Chart of Account </span>
                    </a>

                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-property-add"></em></span>
                        <span class="nk-menu-text">Expenses </span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="add_expenses" class="nk-menu-link"><span class="nk-menu-text">Add Expenses</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="view_expenses" class="nk-menu-link"><span class="nk-menu-text">View Expenses </span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-property-add"></em></span>
                        <span class="nk-menu-text">Income </span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="add_income" class="nk-menu-link"><span class="nk-menu-text">Add Income</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="view_income" class="nk-menu-link"><span class="nk-menu-text">View Income </span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->



                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                        <span class="nk-menu-text">Reports</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="disbursement_report" class="nk-menu-link"><span class="nk-menu-text">Disbursement</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="expected_loan_report" class="nk-menu-link"><span class="nk-menu-text">Expected Loan</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="savings_report" class="nk-menu-link"><span class="nk-menu-text">Savings</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="withdrawal_report" class="nk-menu-link"><span class="nk-menu-text">Withdrawal</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="fees_report" class="nk-menu-link"><span class="nk-menu-text">Fees</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="loan_product_report" class="nk-menu-link"><span class="nk-menu-text">Loan Products</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="portfolio_at_risk_report" class="nk-menu-link"><span class="nk-menu-text">Portfolio at Risk</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="provisioning_report" class="nk-menu-link"><span class="nk-menu-text">Provisioning</span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                        <span class="nk-menu-text"> Accounting</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <!-- <li class="nk-menu-item">
                            <a href="chart_of_account" class="nk-menu-link"><span class="nk-menu-text">Chart of Account</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="income_and_expenditure" class="nk-menu-link"><span class="nk-menu-text">Inome and Expenditure</span></a>
                        </li> -->
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">NAIC Account</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Closure Account</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Processing Account</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Cards Account</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Miscellaneous Account</span></a>
                        </li>

                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->
                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                        <span class="nk-menu-text">Accounting Report</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">General Ledger</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Trial Balance</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Profit and Loss</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Balance Sheet
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->
                <li class="nk-menu-item">
                    <a href="#" class="nk-menu-link">
                        <span class="nk-menu-icon"><em class="icon ni ni-dashlite-alt"></em></span>
                        <span class="nk-menu-text">Main Dashboard</span>
                    </a>
                </li><!-- .nk-menu-item -->
                <li class="nk-menu-item">
                    <a href="#" class="nk-menu-link">
                        <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
                        <span class="nk-menu-text">All Components</span>
                    </a>
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
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="index.php" class="logo-link">
                                    <h2>E<sup>2</sup>PAI</h2>
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-search ms-3 ms-xl-0">
                                <em class="icon ni ni-search"></em>
                                <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search anything">
                            </div><!-- .nk-header-news -->
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
                                                    <div class="user-name dropdown-indicator">Super Admin</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">Super Admin</span>
                                                        <!-- <span class="sub-text">info@softnio.com</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="html/lms/admin-profile.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                    <li><a href="html/lms/admin-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a>
                                                    </li>


                                                    <li><a href="#"><em class="icon ni ni-signout"></em><span>Sign out</span></a>
                                                    </li>
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
                          <div class="nk-footer-copyright"> &copy; <?php echo date('Y') ?> E-PAI. Powered by <a href="https://articulate.ng" target="_blank">Articulate Tech</a>
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
    <script src="./assets/js/bundle.js?ver=3.0.3"></script>
    <script src="./assets/js/scripts.js?ver=3.0.3"></script>
</body>

</html>