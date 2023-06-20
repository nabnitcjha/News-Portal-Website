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
                                <!-- <img alt="" src="{{asset('frontend/assets/images/lazy.jpg')}}" class="avatar avatar-96 photo" height="96" width="96" loading="lazy"> -->
                            </figure>
                            <h1 class="authorPage-name">
                                <a> {{$userData->name}} </a>
                            </h1>
                            <h6 class="authorPage-name">
                                {{$userData->email}}
                            </h6>



                            <ul>
                                <li><a href="{{route('user.dashboard')}}"><b>🟢 Your Profile </b></a> </li>
                                <li> <a href="{{ route('user.password.change.page') }}"> <b>🔵 Change Password </b> </a> </li>
                                <li> <a href=""> <b>🟠Read Later List </b> </a> </li>
                                <li><a onclick="event.preventDefault(); document.getElementById('user-logout-form').submit();"><b>🟢 Logout </b></a> </li>

                                <li>
                                    <form id="user-logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
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
                                User Account </h4>
                            <div role="form" class="wpcf7" id="wpcf7-f437-o1" lang="en-US" dir="ltr">
                                <div class="screen-reader-response">
                                    <p role="status" aria-live="polite" aria-atomic="true"></p>
                                    <ul></ul>
                                </div>
                                <form action="{{ url('/user/profile/update') }}" method="post" class="wpcf7-form init" enctype="multipart/form-data" novalidate="novalidate" data-status="init">
                                    @csrf
                                    <div style="display: none;">

                                    </div>

                                    <div class="main_section">
                                        <div class="row">


                                            <div class="col-md-12 col-sm-12">
                                                <div class="contact-title ">
                                                    User Name *
                                                </div>
                                                <div class="contact-form">
                                                    <span class="wpcf7-form-control-wrap sub_title"><input type="text" value="{{$userData->name}}" name="name" id="name" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Name"></span>
                                                </div>
                                            </div>



                                            <div class="col-md-12 col-sm-12">
                                                <div class="contact-title ">
                                                    Email *
                                                </div>
                                                <div class="contact-form">
                                                    <span class="wpcf7-form-control-wrap sub_title"><input type="email" value="{{$userData->email}}" name="email" id="email" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Email"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12">
                                                <div class="contact-title ">
                                                    Phone *
                                                </div>
                                                <div class="contact-form">
                                                    <span class="wpcf7-form-control-wrap sub_title"><input type="phone" value="{{$userData->phone}}" name="phone" id="phone" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Phone"></span>
                                                </div>
                                            </div>


                                            <div class="col-md-12 col-sm-12">
                                                <div class="contact-title ">
                                                    Photo *
                                                </div>
                                                <div class="contact-form">
                                                    <span class="wpcf7-form-control-wrap sub_title"><input type="file" name="avatar" id="user_photo" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span>
                                                </div>
                                                @if ($userData->photo == null)
                                                <img id="user_showImage" src="{{ asset('upload/admin_image/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                                @else
                                                <img id="user_showImage" src="{{ asset('storage/'.$userData->photo )}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                                @endif
                                            </div>



                                        </div>




                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="contact-btn">
                                                    <input type="submit" value="Save Changes" class="wpcf7-form-control has-spinner wpcf7-submit"><span class="wpcf7-spinner"></span>
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

        </div> <!--  // end row -->




    </div>
</div>

<script type=text/javascript>
    var fileTag = document.getElementById("user_photo"),
        preview = document.getElementById("user_showImage");

    fileTag.addEventListener("change", function() {
        changeImage(this);
    });

    function changeImage(input) {
        var reader;

        if (input.files && input.files[0]) {
            reader = new FileReader();

            reader.onload = function(e) {
                preview.setAttribute('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endSection