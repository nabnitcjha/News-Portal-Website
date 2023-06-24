@extends('admin.admin_layout')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a type="button" class="btn btn-success btn-lg waves-effect waves-light mb-4" href="{{route('category.all')}}">All Category</a>
                        </ol>
                    </div>
                    <h4 class="page-title">All SubCategory</h4>
                </div>
            </div>
        </div>
        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{route('subcategory.add')}}" id="add_category">

                            @csrf

                            <div class="row">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Category</label>
                                    <select class="form-select" id="example-select" name="category_id">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="subcategory_name" class="form-label">SubCategory Name</label>
                                    <input type="text" name="subcategory_name" class="form-control" id="subcategory_name" placeholder="subcategory_name">
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>

                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#add_category').validate({
            rules: {
                category_name: {
                    required: true,
                },
            },
            messages: {
                category_name: {
                    required: 'Please Enter Category Name',
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>

@endSection