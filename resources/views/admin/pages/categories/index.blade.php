@extends('admin.layouts.master')
@section('content')
   <div class="pagetitle">
      <h1>Categories </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
           <li class="breadcrumb-item"><a href="{{route('admin.categories.index')}}">Categories</a></li>
          <li class="breadcrumb-item active">list</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @include('admin.partials.flash')
       <div class="card">
            <div class="card-body">
                 <div class="d-flex card-header-flex">
                 <h5 class="card-title flex">Categories</h5>                 
                 <a href="{{ route('admin.categories.create') }}" class="btn btn-primary flex">Add category</a>
                </div>
                       <div class="row">
                        <div class="col-md-12">         
                                
                                    <table  class="table">
                                        <thead>
                                        <tr>
                                            <th> Image </th>                        
                                            <th> Name </th>                                           
                                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $category)
                                                <tr>
                                                       <td>
                                    @if($category->image)
                  <img src="{{ asset('images/category/'.$category->image) }}" style="height: 100px; width: 100px;">
                                    @endif
                                    </td>                               
                                                    <td>{{ $category->name }}</td>
                                     

                                                    <td class="text-center">
                                                        <div class="btn-group" role="group" aria-label="Second group">
                                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                                            <a href="{{ route('admin.categories.delete', $category->id) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {!! $categories->links() !!}
                                        
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