@extends('layouts.backend.app')

@push('css')


@endpush

@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Table</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Table</li>
                </ol>
            </div>
            <div class="col-md-7 col-4 align-self-center">

                 <a href="{{ route('admin.category.create') }}" class="btn waves-effect btn-success pull-right hidden-sm-down">
                     <i class="material-icons">add_circle</i>
                     <sup>Add Category</sup>
                </a>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">All category</h4>

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Category</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($categories as $key=>$category)


                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-success btn-sm"><i class="material-icons">edit</i></a>

                                        <button class="btn btn-danger waves-effect btn-sm" type="button" onclick="deleteCategory({{ $category->id }})">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form id="delete-form-{{ $category->id }}" action="{{ route('admin.category.destroy',$category->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>

                                    </td>
                                </tr>


                            @endforeach

                            </tbody>
                        </table>

                     </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>

@endsection

@push('js')

 <!--javascripts swwtalert start-->


 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script>

     function deleteCategory(id)
     {

         swal({
             title:"Red Stapler",
             text: "Are You Sure? you want to delete this?",
             buttons: {
                 cancel: true,
                 confirm: "delete"
             }
         }).then( val => {
             if(val)  {
                 event.preventDefault();
                 document.getElementById('delete-form-'+id).submit();
             }
             else {
                 swal("Your data is safe!");
             }

         });
     }

 </script>


 <!--javascripts sweet alert end-->



    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

     <script>

            $(document).ready(function() {
                $('#example').DataTable();
            } );

     </script>




@endpush