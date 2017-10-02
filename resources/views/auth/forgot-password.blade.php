@extends('layouts.master')
{{--@include('layouts.carousel')--}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Forgot Password</h3>
                    </div>

                    <div class="card-body">
                        <form class="form-horizontal" id="forgot-password-form">

                            <div class="alert alert-success" style="display: none;"></div>
                            <div class="alert alert-error" style="display: none;"></div>

                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Email</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="email" id="email"  placeholder="Your Email" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Send Code</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#forgot-password-form').submit(function(event) {
            event.preventDefault()

            var postData = {
                'email' : $('input[name=email]').val()
            }

            $.ajax({
                type: 'POST',
                url: '/forgot-password',
                data: postData,
                success: function (response) {
//                    window.location.href = response.redirect
                    $('.alert-success').text(response.success)
                    $('.alert-success').show()
                },
                error: function (response) {
                    $('.alert-danger').text(response.error)
                    $('.alert-danger').show()
                }
            })
        })
    </script>
@endsection