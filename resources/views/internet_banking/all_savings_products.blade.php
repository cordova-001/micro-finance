@extends('layout.ibank');
@section('content')
  <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                                             

                                   

                               


                                <div class="nk-block nk-block-lg">
                                    <div class="nk-block-head">
                                        <div class="nk-block-between g-3">
                                            <div class="nk-block-head-content">
                                                <h3 class="nk-block-title page-title"> Savings Products  </h3>
                                                <div class="nk-block-des text-soft">
                                                    {{-- <p>Choose your pricing plan and start enjoying our service.</p> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->

                                    
                                    <div class="row g-gs">
                                        @foreach($getProduct as $getProducts)
                                        <div class="col-md-6 col-xxl-3">
                                            <div class="card card-bordered pricing text-center">
                                                <div class="pricing-body">
                                                    <div class="pricing-media">
                                                        <img src="./images/icons/plan-s1.svg" alt="">
                                                    </div>
                                                    <div class="pricing-title w-220px mx-auto">
                                                        <h5 class="title">{{ $getProducts->product_name }}</h5>
                                                        <span class="sub-text">  {{ $getProducts->description }} </span>
                                                    </div>
                                                    <div class="pricing-amount">
                                                        <div class="amount"> {{ $getProducts->interest_rate }}  <span>%</span></div>
                                                        <span class="bill"> Interest Rate</span>
                                                    </div>
                                                    <div class="pricing-action">
                                                        <a href="#" class="btn btn-primary"> Activate / Subscribe</a>
                                                    </div>
                                                </div>
                                            </div><!-- .pricing -->
                                        </div><!-- .col -->
                                        @endforeach

                                        
                                        
                                    </div>
                                </div><!-- .nk-block -->





                            </div>
                        </div>
                    </div>
                </div>
@endsection