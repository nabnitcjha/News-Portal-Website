@extends('frontend.user_layout')

@section('user_content')

<div class="contact-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="contact-wrpp">
                    <h4 class="contactAddess-title text-center">Register</h4>
                    <div role="form" class="wpcf7" id="wpcf7-f437-o1" lang="en-US" dir="ltr">
                        <div class="screen-reader-response">
                            <p role="status" aria-live="polite" aria-atomic="true"></p>
                            <ul></ul>
                        </div>
                        <form action="{{ route('user.store') }}" method="post" class="wpcf7-form init" enctype="multipart/form-data" novalidate="novalidate" data-status="init">
                            @csrf
                            <div style="display: none"></div>

                            <div class="main_section">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="contact-title">Name *</div>
                                        <div class="contact-form">
                                            <span class="wpcf7-form-control-wrap sub_title"><input id="name" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Name" type="text" name="name" /></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <div class="contact-title">Email *</div>
                                        <div class="contact-form">
                                            <span class="wpcf7-form-control-wrap sub_title"><input value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Email" type="email" name="email" id="email"/></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <div class="contact-title">Password *</div>
                                        <div class="contact-form">
                                            <span class="wpcf7-form-control-wrap sub_title"><input  value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Password" type="password" name="password" required id="password"/></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <div class="contact-title">Confirm Password *</div>
                                        <div class="contact-form">
                                            <span class="wpcf7-form-control-wrap sub_title"><input id="password_confirmation" name="password_confirmation" type="password" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Confirm Password" required /></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="contact-btn">
                                            <input type="submit" value="Register Now" class="wpcf7-form-control has-spinner wpcf7-submit" /><span class="wpcf7-spinner"></span>
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
@endSection