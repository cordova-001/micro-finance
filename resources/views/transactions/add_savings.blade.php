@extends('layout.app');
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#confirmAccountNumberBtn').on('click', function (e) {
            e.preventDefault();

            let accountNumber = $('#accountNumberInput').val();

            $.ajax({
                url: '{{ route("validate.account.number") }}',
                method: 'POST',
                data: {
                    account_number: accountNumber,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        // Populate the form fields with data from response
                        $('#accountNameInput').val(response.data.account_name);
                        $('#branchNameInput').val(response.data.branch_name);
                        // Populate other fields as needed
                    } else {
                        alert(response.message); // Show error message
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error); // Handle error
                    alert('An error occurred while validating the account number.');
                }
            });
        });
    });
</script>

  <div class="nk-content ">
          <div class="container-fluid">
            <div class="nk-content-inner">
              <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                  <div class="nk-block-between">
                    <div class="nk-block-head-content">
                      <h3 class="nk-block-title page-title">Add Savings</h3>
                    </div><!-- .nk-block-head-content -->
                  </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                  <div class="card">
                    <div class="card-inner">
                      <div class="tab-content">
                        <div class="tab-pane active" id="tabItem5">
                          <h5 class="title">Add Deposit </h5>
                          
                          <form action="" class="pt-2" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                              <div class="col-md-12">
                                <div class="form-group">
                                  {{-- <label class="form-label" for="first-name">Account Number Name</label> --}}
                                  {{-- <input type="text" name="account_number" class="form-control" id="accountNumberInput" placeholder="Account Number"> --}}
                                  <div class="form-group">
                                    <label class="form-label">Account Number</label>
                                    <div class="form-control-wrap">
                                       @foreach ($customers as $customer) 
                                        
                                     
                                        <select class="form-select js-select2" data-search="on" name="account_number">
                                            <option value=""> {{  $customer->account_number }}  </option>
                                            <option value="the account number">Account number and other details like the name and etc</option>
                                            
                                        </select>
                                      @endforeach
                                    </div>
                                </div>
                                </div>
                              </div>                                                           
                              
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-line2">Deposit Amount</label>
                                  <input type="number" step="0.1" class="form-control" name="amount" id="amount" >
                                </div>
                              </div>
                             
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Depositor </label>
                                  <input type="text" name="depositor" class="form-control" id="depositor" >
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Depositor Phone Number </label>
                                  <input type="text" name="depositor_phone" class="form-control" id="depositor_phone" >
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Branch </label>
                                  <input type="text" name="branch" class="form-control" id="branch" >
                                </div>
                              </div>


                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Deposit Date </label>
                                  <input type="date" name="depositor" class="form-control" id="depositor" >
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="phone-no">Savings Product</label>
                                  {{-- <input type="text" name="savings_product" class="form-control" id="account_name"  placeholder="Account Name"> --}}
                                  <select name="savings_product" id="" class="form-control">
                                    <option value="">Select a Savings Product</option>
                                    <option value="">Target Savings</option>
                                  </select>
                                </div>
                              </div>







                              <div class="col-md-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                  <li>
                                    <button name="create_branch" class="btn btn-primary">Add Deposit</button>
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
                  <!--card-->
                </div>
                <!--nk-block-->
              </div>
            </div>
          </div>
        </div>
@endsection