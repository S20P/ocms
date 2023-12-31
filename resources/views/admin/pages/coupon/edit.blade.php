@extends('admin.layouts.master')
@section('content')
   <div class="pagetitle">
      <h1>Coupons </h1>
      <nav>
        <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
           <li class="breadcrumb-item"><a href="{{route('admin.coupon.index')}}">Coupons</a></li>
          <li class="breadcrumb-item active">edit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @include('admin.partials.flash')


     <div class="card">
            <div class="card-body">
              <h5 class="card-title">Coupons Information</h5>

              <!-- Vertical Form -->
                       
                    <div class="tile">
                        <form  class="row g-3" action="{{ route('admin.coupon.update') }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                           
                             <input type="hidden" name="id" value="{{$coupon->id}}">
                            
                            <div class="tile-body">
                                <div class="form-group col-md-12 mb-3">
                                    <label class="control-label" for="coupon_code">Coupon Code</label>
                                    <input
                                        class="form-control @error('coupon_code') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter coupon code"
                                        id="coupon_code"
                                        name="coupon_code"
                                        value="{{ old('coupon_code', $coupon->coupon_code) }}"
                                    />
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('coupon_code') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                  <div class="form-group col-md-12 mb-3">
                                    <label class="control-label" for="amount">Amount</label>
                                    <input
                                        class="form-control @error('amount') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter amount"
                                        id="amount"
                                        name="amount"
                                        value="{{ old('amount', $coupon->amount) }}"
                                    />
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('amount') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="control-label" for="categories">Brands</label>
                                    <select name="category_name" id="categories" class="form-select">
                                        @foreach($categories as $category)
                                            @php $check = ($category->shortcode==$coupon->category_name) ? 'selected' : ''@endphp
                                            <option value="{{ $category->shortcode }}" {{ $check }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="control-label" for="status">Status</label>
                                    <select name="status" id="status" class="form-select">                                       
                                        <option value="0" {{($coupon->status == 0) ? 'selected' : ''}}>Unclaimed</option>
                                        <option value="1" {{($coupon->status == 1) ? 'selected' : ''}}>Claimed </option>
                                    </select>
                                </div>  
                               
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-center">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                                        <a class="btn btn-danger" href="{{ route('admin.coupon.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>             
          </div>
     </div>
 
@endsection
