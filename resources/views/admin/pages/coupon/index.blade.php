@extends('admin.layouts.master')
@section('content')
     <div class="pagetitle">
      <h1>Coupons </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
           <li class="breadcrumb-item"><a href="{{route('admin.coupon.index')}}">Companies</a></li>
          <li class="breadcrumb-item active">list</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @include('admin.partials.flash')

    <div class="card">
        <div class="card-body">
           <div class="d-flex card-header-flex">
             <h5 class="card-title flex">Coupons</h5>  
             <a class="btn btn-primary mt-3" href="{{asset('sample-excel-file/import-coupons-sample.xlsx')}}" download>Download sample file from here!</a> 
            </div>
               <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.coupon.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="file">Choose Excel File</label>
                            <input type="file" name="file" id="file" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="control-label" for="categories">Brands</label>
                            <select name="category_name" id="categories" class="form-select" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->shortcode }}">{{ $category->name."-(".$category->shortcode.")" }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Import Coupons</button>
                    </form>
                </div>
            </div>
           </div>
         </div>
    
           <div class="card">
            <div class="card-body">
               <div class="d-flex card-header-flex">
                 <h5 class="card-title flex">Coupons</h5>                 
                 <a href="{{ route('admin.coupon.create') }}" class="btn btn-primary flex">Add Coupon</a>
                     </div>
                     <button class="btn btn-danger mb-3" id="deleteCouponsAllBtn">Delete All</button>
                        <div class="row">
                            <div class="col-md-12">
                 
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>  
                            <th scope="col"> Coupon Code </th>                                            
                            <th scope="col"> Amount </th>  
                            <th scope="col"> Status </th>  
                            <th scope="col"> Brand </th>  
                            <th scope="col" style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        
                            @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{ $coupon->coupon_code }}</td> 
                                    <td>{{ $coupon->amount }}</td> 
                                    <td>{{ $coupon->status? "Claimed" : "Unclaimed" }}</td>       
                                    <td>{{ $coupon->category_name }}</td>                                                                
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.coupon.edit', $coupon->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                            <a href="{{ route('admin.coupon.delete', $coupon->id) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
                    </div>
                    </div>
              
        </div>
    </div>
@endsection
@push('scripts')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="{{asset('AdminThemes/js/coupon.js')}}"></script>
@endpush