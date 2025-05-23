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
                                  <label class="form-label" for="address-st">Deposit Means </label>                                  
                                <select class="form-select"  name="transactions_means">
                                  <option value="">Select Deposit Means</option>                                                                    
                                    <option value="Bank">Bank </option>
                                    <option value="Transfer"> Transfer</option>
                                    <option value="Cash">Cash </option>
                                   
                                  
                                </select>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Upload Evidence of Payment </label>
                                  <input type="file" name="file" class="form-control" id="file" >
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
                                  <label class="form-label" for="address-line2"> Cash / Bank </label>
                                  {{-- <input type="text" required  class="form-control" name="staff" value="{{ $user->name }}" > --}}
                                  <select name="bank_account" id="bank_account" class="form-control">
                                    <option value="">Select Bank Account</option>
                                    @foreach ($bank_accounts as $bank_account)                                     
                                      <option value="{{ $bank_account->id }} ">  
                                        {{ $bank_account->bank_name }}
                                      </option>
                                      
                                    @endforeach
                                    
                                  </select>
                                  <strong type="button" style="color: rgb(37, 31, 70);" class="" data-bs-toggle="modal" data-bs-target="#modalForm"> Click here to add Cash / Bank Account for Journal Posting</strong>
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

                        <div class="modal fade" id="modalForm">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title"> Add Cash/Bank Account </h5>
                                      <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                          <em class="icon ni ni-cross"></em>
                                      </a>
                                  </div>
                                  <div class="modal-body">
                                      <form action="{{ route('bank_account.create') }}" method="POST" class="form-validate is-alter">
                                        @csrf
                                          <div class="form-group">
                                              <label class="form-label" for="full-name"> Branch </label>
                                              <div class="form-control-wrap">
                                                  {{-- <input type="text" class="form-control" id="full-name" required> --}}
                                                  <select name="branch" class="form-control" id="">
                                                    <option value="">Select a Branch</option>
                                                    @foreach ($branches as $branch) 
                                                    
                                                      <option value="{{ $branch->id }} ">  
                                                        {{ $branch->branch_name }} {{ $branch->id }}
                                                      </option>
                                                     
                                                    @endforeach
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="form-label" for="full-name"> Code </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="code" name="code" required>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                              <label class="form-label" for="email-address">Bank Account Name </label>
                                              <div class="form-control-wrap">
                                                  <input type="text" class="form-control" id="bank_name" name="bank_name" required>
                                              </div>
                                          </div>
                                          
                                          
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                                          </div>
                                      </form>
                                  </div>
                                 
                              </div>
                          </div>
                      </div>


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