@extends('layout.app')
@section('content')

<style>
  body {
      font-family: Arial, sans-serif;
      margin: 20px;
  }

  .file-upload-container {
      margin-bottom: 20px;
  }

  .preview-container {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      padding: 10px;
      border: 2px dashed #ddd;
      min-height: 150px;
      align-items: center;
  }

  .preview-box {
      width: 120px;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
      text-align: center;
      position: relative;
      background: #f9f9f9;
  }

  .preview-box img {
      width: 100%;
      height: auto;
      border-radius: 5px;
  }

  .preview-box p {
      font-size: 12px;
      margin: 5px 0;
  }

  .delete-btn {
      position: absolute;
      top: 5px;
      right: 5px;
      background: red;
      color: white;
      border: none;
      cursor: pointer;
      padding: 3px 6px;
      border-radius: 50%;
      font-size: 12px;
  }

  .file-input {
      display: none;
  }

  .upload-btn {
      background-color: #007bff;
      color: white;
      padding: 10px 15px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      display: inline-block;
  }

  .upload-btn:hover {
      background-color: #0056b3;
  }
</style>

  <div class="nk-content ">
          <div class="container-fluid">
            <div class="nk-content-inner">
              <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                  <div class="nk-block-between">
                    <div class="nk-block-head-content">
                      <h3 class="nk-block-title page-title"> Create Corporate Account</h3>
                    </div><!-- .nk-block-head-content -->
                  </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
              
                <div class="nk-block nk-block-lg">
                  <div class="card">
                    <div class="card-inner">
                      <div class="tab-content">
                        <div class="tab-pane active" id="tabItem5">
                          <h5 class="title">Add Corporate Details  </h5>
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
                          
                          <form action="{{ route('customer.create_corporate') }}" class="pt-2" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Company Name <sup>*</sup></label>
                                  <input type="text" name="company_name" required class="form-control" id="company-name" placeholder="Company Name">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="company-address">Company Address</label>
                                  <input type="text" name="company_address" class="form-control" id="company-address" placeholder="Company Address">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Company Email <sup>*</sup></label>
                                  <input type="email" name="company_email" required class="form-control" id="company-email" placeholder="Company Email">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="first-name">Company Phone Number <sup>*</sup></label>
                                  <input type="text" name="company_phone" required class="form-control" id="company-phone" placeholder="Company Phone Number">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="tin">TIN</label>
                                  <input type="text" name="tin" class="form-control" id="tin" placeholder="TIN">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="bvn">BVN</label>
                                  <input type="number" name="bvn" class="form-control" id="bvn" placeholder="BVN">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st"> Account Number</label>
                                  <input type="text" name="customer_id" maxlength="6" class="form-control" id="address-st" value="{{ rand(100000, 999999) }}">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Branch</label>
                                  <select class='form-select js-select2' id='branch' name='branch_id'>
                                   @foreach ($branch as $branches)
                                    <option value="{{ $branches->id }}">{{ $branches->branch_name }}</option>
                                    @endforeach

                                  </select>
                                </div>
                              </div>
                              <hr>
                              <h4>Director / Proprietor (1)</h4>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="phone-no">First Name</label>
                                  <input type="text" name="director_1_fname" class="form-control" id="" placeholder="First Name ">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-l1">Middle Name</label>
                                  <input type="text" class="form-control" name="director_1_mname" placeholder="Middlename">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-line2">Surname</label>
                                  <input type="text" class="form-control" name="director_1_surname" id="surname">
                                </div>
                              </div>
                              
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Address</label>
                                  <input type="text" name="director_1_address" class="form-control" id="address-st" placeholder="Address">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Telephone Number</label>
                                  <input type="text" name="director_1_phone" class="form-control" id="address-st" placeholder="Telephone Number">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Email Address</label>
                                  <input type="email" name="director_1_email" class="form-control" id="email" placeholder="Email">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Passport Photograph</label>
                                  <input type="file" name="passport1" class="form-control" id="address-st" placeholder="Passport Photograph">
                                </div>
                              </div>

                            <hr>
                              <h4>Director / Proprietor (2)</h4>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="phone-no">First Name</label>
                                  <input type="text" name="director_2_fname" class="form-control" id="" placeholder="First Name ">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-l1">Middle Name</label>
                                  <input type="text" class="form-control" name="director_2_mname" placeholder="Middlename">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-line2">Surname</label>
                                  <input type="text" class="form-control" name="director_2_surname" id="surname">
                                </div>
                              </div>
                              
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Address</label>
                                  <input type="text" name="director_2_address" class="form-control" id="address-st" placeholder="Address">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Telephone Number</label>
                                  <input type="text" name="director_2_phone" class="form-control" id="address-st" placeholder="Telephone Number">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Email Address</label>
                                  <input type="email" name="director_2_email" class="form-control" id="email" placeholder="Email">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label" for="address-st">Passport Photograph</label>
                                  <input type="file" name="passport2" class="form-control" id="address-st" placeholder="Passport Photograph">
                                </div>
                              </div>

                              
                            <hr>
                            <h4>Director / Proprietor (3)</h4>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="form-label" for="phone-no">First Name</label>
                                <input type="text" name="director_3_fname" class="form-control" id="" placeholder="First Name ">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="form-label" for="address-l1">Middle Name</label>
                                <input type="text" class="form-control" name="director_3_mname" placeholder="Middlename">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="form-label" for="address-line2">Surname</label>
                                <input type="text" class="form-control" name="director_3_surname" id="surname">
                              </div>
                            </div>
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="form-label" for="address-st">Address</label>
                                <input type="text" name="director_3_address" class="form-control" id="address-st" placeholder="Address">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="form-label" for="address-st">Telephone Number</label>
                                <input type="text" name="director_3_phone" class="form-control" id="address-st" placeholder="Telephone Number">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="form-label" for="address-st">Email Address</label>
                                <input type="email" name="director_3_email" class="form-control" id="email" placeholder="Email">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="form-label" for="address-st">Passport Photograph</label>
                                <input type="file" name="passport3" class="form-control" id="address-st" placeholder="Passport Photograph">
                              </div>
                            </div>

                            <hr>
                            <div class="col-md-12">
                              <div class="form-group">
                                
                                  <div class="file-upload-container">
                                    <label class="form-label" for="address-st">Upload other files </label>
                                    <input type="file" name="uploads[]" id="file-upload" multiple class="form-control" id="address-st"  placeholder="Upoads">
                                    <div id="preview-container" class="preview-container"></div>
                                  </div>
                                {{-- </div> --}}
                              </div>
                            </div>

                              <div class="col-md-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                  <li>
                                    <button name="create_customer" class="btn btn-primary">Add Corporate Customer</button>
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
        <script>
          document.getElementById('file-upload').addEventListener('change', function(event) {
              let previewContainer = document.getElementById('preview-container');
              previewContainer.innerHTML = ''; // Clear previous previews
  
              let files = event.target.files;
              if (files.length > 0) {
                  for (let file of files) {
                      let reader = new FileReader();
                      reader.onload = function(e) {
                          let preview = document.createElement('div');
                          preview.className = 'preview-box';
                          preview.innerHTML = `
                              <img src="${e.target.result}" alt="${file.name}">
                              <p>${file.name}</p>
                              <span>${(file.size / 1024).toFixed(1)}KB</span>
                              <button class="delete-btn" onclick="removeFile(this)">🗑️</button>
                          `;
                          previewContainer.appendChild(preview);
                      };
                      reader.readAsDataURL(file);
                  }
              } else {
                  previewContainer.innerHTML = '<p>No files selected yet...</p>';
              }
          });
  
          function removeFile(button) {
              button.parentElement.remove();
          }
      </script>
@endsection