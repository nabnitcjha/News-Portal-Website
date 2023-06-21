@extends('admin.admin_layout')

@section('admin')

<!-- Form row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Gutters</h4>
                <p class="text-muted font-13">More complex layouts can also be created with the grid system.</p>

                <form method="post" action="{{route('category.add')}}">

                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
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