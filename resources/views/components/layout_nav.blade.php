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
                        <span class="nk-menu-text">Branch Management</span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                        <li class="nk-menu-item">
                            <!-- <a href="#" class="nk-menu-link"><span class="nk-menu-text">Manage Roles</span></a> -->
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('branch.create') }}" class="nk-menu-link"><span class="nk-menu-text">Add Branch</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('branch.index') }}" class="nk-menu-link"><span class="nk-menu-text">Manage Branch</span></a>
                        </li>
                        {{-- <li class="nk-menu-item">
                            <a href="{{ route('branch.index') }}" class="nk-menu-link"><span class="nk-menu-text">Generate Branch Report</span></a>
                        </li> --}}
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-user-fill"></em></span>
                        <span class="nk-menu-text"> User Management </span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                        <li class="nk-menu-item">
                            <a href="{{ route('create_officer') }}" class="nk-menu-link"><span class="nk-menu-text"> Add Account Officer </span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('account_officer') }}" class="nk-menu-link"><span class="nk-menu-text"> Manage Account Officer </span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('customer.index') }}" class="nk-menu-link"><span class="nk-menu-text">  Account Officer Roles </span></a>
                        </li>


                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->
                

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-user-fill"></em></span>
                        <span class="nk-menu-text">Customer Management</span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                        <li class="nk-menu-item">
                            <a href="{{ route('customer.create') }}" class="nk-menu-link"><span class="nk-menu-text"> Add Customer </span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('customer.index') }}" class="nk-menu-link"><span class="nk-menu-text"> Manage All Customer </span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('customer.register_corporate') }}" class="nk-menu-link"><span class="nk-menu-text"> Add Corporate Customer </span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('customer.createCorporateCustomer') }}" class="nk-menu-link"><span class="nk-menu-text"> All Corporate Customer </span></a>
                        </li>


                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-book-fill"></em></span>
                        <span class="nk-menu-text">Product Management </span>
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
                            <a href="{{ route('loan.product') }}" class="nk-menu-link"><span class="nk-menu-text">Loan Products</span></a>
                        </li>

                        <li class="nk-menu-item">
                            <a href="{{ route('loan.create_product') }}" class="nk-menu-link"><span class="nk-menu-text">Create Loan Product</span></a>
                        </li>
                       
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->
                
                

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-book-fill"></em></span>
                        <span class="nk-menu-text">Transaction Management </span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                        <li class="nk-menu-item">
                            <!-- <a href="#" class="nk-menu-link"><span class="nk-menu-text">Manage Roles</span></a> -->
                        </li>
                        
                       
                        <li class="nk-menu-item">
                         
                            <a href="{{ route('customer.for.transaction') }}" class="nk-menu-link"><span class="nk-menu-text">Add Savings</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('manage_deposit') }}" class="nk-menu-link"><span class="nk-menu-text">View All Savings</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('add.withdrawal') }}" class="nk-menu-link"><span class="nk-menu-text">Add Withdrawal</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('manage_withdrawal') }}" class="nk-menu-link"><span class="nk-menu-text">View Withdrawal</span></a>
                        </li>
                        {{-- <li class="nk-menu-item">
                            <a href="{{ route('center.index') }}" class="nk-menu-link"><span class="nk-menu-text">Upload Bulk Savings</span></a>
                        </li> --}}
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

               

                

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-property-add"></em></span>
                        <span class="nk-menu-text">Loan Management </span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                       
                        <li class="nk-menu-item">
                            <a href="{{ route('loan.loan_request') }}" class="nk-menu-link"><span class="nk-menu-text"> Request Loan </span></a>
                        </li>
                        

                        <li class="nk-menu-item">
                            <a href="{{ route('disbursed_loans') }}" class="nk-menu-link"><span class="nk-menu-text">Open Loan </span></a>
                        </li>

                        {{--  --}}

                        

                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text"> One Month Late Loans </span></a>
                        </li>

                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Three Months Late Loans </span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('loan.guarantor') }}" class="nk-menu-link"><span class="nk-menu-text"> Guarantors  </span></a>
                        </li>

                        {{--  --}}
                        

                        
                        {{-- <li class="nk-menu-item">
                            <a href="approve_loan" class="nk-menu-link"><span class="nk-menu-text">Disburse Loan</span></a>
                        </li> --}}
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->
                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-property-add"></em></span>
                        <span class="nk-menu-text">Repayment </span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                        <li class="nk-menu-item">
                            <a href="{{ route('view_repayment') }}" class="nk-menu-link"><span class="nk-menu-text">View Repayment</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('pending_repayment') }}" class="nk-menu-link"><span class="nk-menu-text"> Pending Repayment</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('due_loan_today') }}" class="nk-menu-link"><span class="nk-menu-text"> Due Loans </span></a>
                        </li>

                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text"> Missed Repayment</span></a>
                        </li>

                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text"> No Repayment</span></a>
                        </li>

                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text"> Past Maturity Date</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="bulkRepayment" class="nk-menu-link"><span class="nk-menu-text">Bulk Repayment </span></a>
                        </li>
                        {{-- <li class="nk-menu-item">
                            <a href="approve_repayment" class="nk-menu-link"><span class="nk-menu-text">Approve Repayment </span></a>
                        </li> --}}
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub" >
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-book-fill"></em></span>
                        <span class="nk-menu-text">Approval Management </span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                        <li class="nk-menu-item">
                            <!-- <a href="#" class="nk-menu-link"><span class="nk-menu-text">Manage Roles</span></a> -->
                        </li>
                        <li class="nk-menu-item">
                            <a href="add_investment_product" class="nk-menu-link"><span class="nk-menu-text"> Deposit</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('loan.loan_mgt') }}" class="nk-menu-link"><span class="nk-menu-text">Loan Management</span></a>
                        </li>
                        
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text"> Loan Disbursement</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text"> Withdrawal</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">  </span></a>
                        </li>
                        
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->
                
                {{-- <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-book-fill"></em></span>
                        <span class="nk-menu-text">Transfers Management </span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Manage Roles</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('start_transfer') }}" class="nk-menu-link"><span class="nk-menu-text">Intra-Bank Transfer</span></a>
                        </li>                                                                        
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item --> --}}

                <li class="nk-menu-item has-sub" >
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-book-fill"></em></span>
                        <span class="nk-menu-text">Investment Management </span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                        <li class="nk-menu-item">
                            <!-- <a href="#" class="nk-menu-link"><span class="nk-menu-text">Manage Roles</span></a> -->
                        </li>
                        <li class="nk-menu-item">
                            <a href="add_investment_product" class="nk-menu-link"><span class="nk-menu-text">Add Investment Product</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Manage Investment Product</span></a>
                        </li>
                        
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Add Investor</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text"> Manage  Investor</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Manage Investment</span></a>
                        </li>
                        
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                {{-- <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-property-add"></em></span>
                        <span class="nk-menu-text">Approval Management </span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                        <li class="nk-menu-item">
                            <a href="view_repayment" class="nk-menu-link"><span class="nk-menu-text"> Withdrawal Approval </span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="bulkRepayment" class="nk-menu-link"><span class="nk-menu-text"> Loan Approval  </span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="approve_repayment" class="nk-menu-link"><span class="nk-menu-text"> Investment Withdrawal Approval </span></a>
                        </li>
                    </ul>
                </li> --}}
                

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-property-add"></em></span>
                        <span class="nk-menu-text">Payroll Management </span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                        <li class="nk-menu-item">
                            <a href="add_payroll" class="nk-menu-link"><span class="nk-menu-text">Add Payroll</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="manage_payroll" class="nk-menu-link"><span class="nk-menu-text">Manage Payroll </span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="chart_of_account" class="nk-menu-link" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-property-add"></em></span>
                        <span class="nk-menu-text">Chart of Account </span>
                    </a>

                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-property-add"></em></span>
                        <span class="nk-menu-text">Expenses </span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                        <li class="nk-menu-item">
                            <a href="add_expenses" class="nk-menu-link"><span class="nk-menu-text">Add Expenses</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="all_expenses" class="nk-menu-link"><span class="nk-menu-text">View Expenses </span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-property-add"></em></span>
                        <span class="nk-menu-text">Income </span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                        <li class="nk-menu-item">
                            <a href="add_income" class="nk-menu-link"><span class="nk-menu-text">Add Income</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="all_income" class="nk-menu-link"><span class="nk-menu-text">View Income </span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->



                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                        <span class="nk-menu-text">Reports</span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                        <li class="nk-menu-item">
                            <a href="disbursement_report" class="nk-menu-link"><span class="nk-menu-text">Disbursement</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="customer_report" class="nk-menu-link"><span class="nk-menu-text">Customer Report</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="loan_report" class="nk-menu-link"><span class="nk-menu-text">Loan Report</span></a>
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
                    <a href="#" class="nk-menu-link nk-menu-toggle" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                        <span class="nk-menu-text">Accounting Report</span>
                    </a>
                    <ul class="nk-menu-sub" style="background-color: aliceblue;">
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text"> Cash Flow Accumulated</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Cash Flow Monthly</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('general_ledger') }}" class="nk-menu-link"><span class="nk-menu-text">General Ledger</span></a>
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
                    <a href="settings" class="nk-menu-link" style="background-color: aliceblue;">
                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                        <span class="nk-menu-text">Settings</span>
                    </a>
                </li><!-- .nk-menu-item -->
                {{-- <li class="nk-menu-item">
                    <a href="#" class="nk-menu-link">
                        <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
                        <span class="nk-menu-text">All Components</span>
                    </a>
                </li><!-- .nk-menu-item --> --}}
                
            </ul><!-- .nk-menu -->
        </div><!-- .nk-sidebar-menu -->
    </div><!-- .nk-sidebar-content -->
</div><!-- .nk-sidebar-element -->