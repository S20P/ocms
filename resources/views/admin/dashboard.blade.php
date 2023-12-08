@extends('admin.layouts.master')
@section('content')
     <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
 
            <!-- coupon Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Coupon <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-percent"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{@$total_coupon ? $total_coupon : 0}}</h6>
                     </div>
                  </div>
                </div>

              </div>
            </div><!-- End coupon Card -->
          
          </div>
        </div><!-- End Left side columns -->

    
      </div>
    </section>
@endsection