@extends('layouts.master')
{{--@include('layouts.carousel')--}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Login</h3>
                    </div>

                    <div class="card-body">
                        <form class="form-horizontal" id="login-form">

                            <div class="alert alert-danger" style="display: none;"></div>

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="email" id="email"  placeholder="Your Email" required/>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="cols-sm-2 control-label required">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password" id="password"  placeholder="Your Password" required/>
                                    </div>
                            </div>

                            <div class="form-group">
                                    <div class="input-group">
                                        <label class="control-label">
                                            Remember Me
                                            <input type="checkbox" name="remember_me" id="remember_me"/>
                                        </label>
                                    </div>
                            </div>

                            <p><a href="/forgot-password">Forgot your password?</a></p>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#login-form').submit(function(event) {
            event.preventDefault()

            var postData = {
                'email' : $('input[name=email]').val(),
                'password' : $('input[name=password]').val(),
                'remember_me' : $('input[name=remember_me]').is(':checked')
            }

            $.ajax({
                type: 'POST',
                url: '/login',
                data: postData,
                success: function (response) {
                    window.location.href = response.redirect
                },
                error: function (response) {
                    $('.alert-danger').text(response.responseJSON.error)
                    $('.alert-danger').show()
                }
            })
        })
    </script>
@endsection
