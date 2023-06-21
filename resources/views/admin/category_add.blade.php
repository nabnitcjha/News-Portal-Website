@extends('admin.admin_layout')

@section('admin')

<!-- Form row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{route('category.add')}}">

                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3"> 
                            <label for="category_name" class="form-label">Name</label> 
                            <input type="text" name="category_name" class="form-control" id="category_name" placeholder="category_name">
                        </div>
                        
                    </div>

                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>

                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->

@endSection