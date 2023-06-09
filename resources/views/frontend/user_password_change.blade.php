@extends('frontend.user_layout')

@section('user_content')
<div class="contact-page">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="contact-wrpp">
                            <figure class="authorPage-image">
                                @if ($userData->photo == null)
                                <img id="showImage" src="{{ asset('upload/admin_image/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                @else
                                <img id="showImage" src="{{ asset('storage/'.$userData->photo )}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                @endif
                            </figure>
                            <h1 class="authorPage-name">
                                <a href=" "> {{$userData->name}} </a>
                            </h1>
                            <h6 class="authorPage-name">{{$userData->email}}</h6>

                            <ul>
                                <li><a href="{{route('user.dashboard')}}"><b>🟢 Your Profile </b></a> </li>

                                <li>
                                    <a href="{{route('user.password.change.page')}}"> <b>🔵 Change Password </b> </a>
                                </li>
                                <li>
                                    <a href=""> <b>🟠 Read Later List </b> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="contact-wrpp">
                            <h4 class="contactAddess-title text-center">
                                Change Password
                            </h4>
                            <div role="form" class="wpcf7" id="wpcf7-f437-o1" lang="en-US" dir="ltr">
                                <div class="screen-reader-response">
                                    <p role="status" aria-live="polite" aria-atomic="true"></p>
                                    <ul></ul>
                                </div>
                                <form action="{{ url('/user/password/change') }}" method="post" class="wpcf7-form init" enctype="multipart/form-data" novalidate="novalidate" data-status="init">
                                    @csrf
                                    <div style="display: none"></div>

                                    <div class="main_section">
                                        <div class="row">


                                            <div class="col-md-12 col-sm-12">
                                                <div class="contact-title">New Password *</div>
                                                <div class="contact-form">
                                                    <span class="wpcf7-form-control-wrap sub_title"><input type="password" name="password" id="password" value="" size="40" class="form-control" aria-invalid="false" /></span>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12">
                                                <div class="contact-title">
                                                    Confirm Password *
                                                </div>
                                                <div class="contact-form">
                                                    <span class="wpcf7-form-control-wrap sub_title">
                                                        <input type="password" name="password_confirmation" id="password_confirmation" value="" size="40" class="form-control" aria-invalid="false" /></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="contact-btn">
                                                    <input type="submit" value="Save Changes" class="wpcf7-form-control has-spinner wpcf7-submit" /><span class="wpcf7-spinner"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpcf7-response-output" aria-hidden="true"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  // end row -->
    </div>
</div>
@endSection