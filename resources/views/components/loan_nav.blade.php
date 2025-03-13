<div class="card card-bordered card-preview">
    <div class="card-inner">
            <ul class="nav nav-tabs mt-n3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('loan.loan_mgt') }}"><span> Pending Loan  </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{ route('approved_loans') }}"><span>  Approved Loan </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{ route('rejected_loans') }}"><span> Rejected Loan </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{ route('disbursed_loans') }}"><span> Disbursed Loan</span></a>
                </li>
                {{-- <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tabItem8"><span> Expenses  </span></a>
            </li> --}}


            </ul>
    </div>