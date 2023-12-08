@extends('admin.layouts.master')
@section('content')
   <div class="pagetitle">
      <h1>Denominations </h1>
      <nav>
        <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
           <li class="breadcrumb-item"><a href="{{route('admin.denomination.index')}}">Denominations</a></li>
          <li class="breadcrumb-item active">list</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @include('admin.partials.flash')
       <div class="card">
            <div class="card-body">
                 <div class="d-flex card-header-flex">
                 <h5 class="card-title flex">Denominations</h5>                 
                
                </div>
                       <div class="row">
                        <div class="col-md-12">         
                                
                                    <table  class="table">
                                        <thead>
                                        <tr>
                                            <th> Name </th>   
                                            <th> Email </th> 
                                            <th> Mobile No </th> 
                                            <th> Amount </th>
                                            <th> Coupon No </th>
                                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($denominations as $employee)
                                                <tr>                                                                        
                                                    <td>{{ $employee->name }}</td>                                                 
                                                    <td>{{ $employee->email }}</td>
                                                    <td>{{ $employee->mobile_number }}</td>                                                   
                                                    <td>{{ $employee->amount }}</td>
                                                    <td>{{ $employee->coupon_code }}</td>

                                                    <td class="text-center">
                                                        <div class="btn-group" role="group" aria-label="Second group">
                                                            <a href="{{ route('admin.denomination.delete', $employee->id) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {!! $denominations->links() !!}
                                        
                        </div>
                        </div>
          </div>
      </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush