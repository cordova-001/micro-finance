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
                          
                          <form action="{{ route('add.new.deposit') }}" class="pt-2" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                              <div class="col-md-12">
                                <div class="form-group">
                                  {{-- <label class="form-label" for="first-name">Account Number Name</label> --}}
                                  {{-- <input type="text" name="account_number" class="form-control" id="accountNumberInput" placeholder="Account Number"> --}}
                                  <div class="form-group">
                                    <label class="form-label">Account Number</label>
                                    <div class="form-control-wrap">
                                       
                                        
                                     
                                        <select class="form-select js-select2" data-search="on" name="account_number">
                                          @foreach ($customers as $customer) 
                                          <option value="">Enter Account Number</option>
                                            <option value="{{ $customer->customer_id }} ">  
                                              {{ $customer->customer_id }} - {{ $customer->first_name }} {{ $customer->last_name }}
                                            </option>
                                           
                                          @endforeach      
                                        </select>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>                                                           
                              
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-line2">Deposit Amount</label>
                                  <input type="number" step="0.1" class="form-control" name="deposit_amount" id="deposit_amount" >
                                </div>
                              </div>
                             
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Depositor </label>
                                  <input type="text" name="depositor_name" class="form-control" id="depositor_name" >
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Depositor Phone Number </label>
                                  <input type="text" name="depositor_phone" class="form-control" id="depositor_phone" >
                                </div>
                              </div>

                              <div class="col-md-6">
                                {{-- {{-- <div class="form-group"> --}}
                                  <label class="form-label" for="address-st"> Branch </label>
                                  {{-- <input type="text" name="branch" readonly value="{{ $branch->branch_name }}" class="form-control" id="branch" > --}}
                                {{-- </div>  --}}
                                <select class="form-select"  name="branch">
                                  <option value="">Select Branch</option>
                                  @foreach ($branches as $branch) 
                                  
                                    <option value="{{ $branch->id }} ">  
                                      {{ $branch->branch_name }}
                                    </option>
                                   
                                  @endforeach      
                                </select>
                              </div>


                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Deposit Date </label>
                                  <input type="date" name="deposit_date" class="form-control" id="deposit_date" >
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="phone-no">Savings Product</label>
                                  {{-- <input type="text" name="savings_product" class="form-control" id="account_name"  placeholder="Account Name"> --}}
                                  <select name="savings_product" id="" class="form-control">
                                    @foreach($sproducts as $sproduct)
                                    <option value="{{ $sproduct->product_name }}"> {{ $sproduct->product_name }} </option>
                                    
                                    @endforeach
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="phone-no">Narration</label>
                                  
                                  <textarea name="narration" id="" cols="30" rows="10" class="form-control"></textarea>
                                  
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