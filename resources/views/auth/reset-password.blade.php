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
                        <form class="form-horizontal" id="reset-password-form">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="password" class="cols-sm-2 control-label">Password</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password" id="password"  placeholder="Password" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation" class="cols-sm-2 control-label">Confirm Password</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"  placeholder="Confirm Password" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Update Password</button>
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

        $('#reset-password-form').submit(function(event) {
            event.preventDefault()

            var postData = {
                'password' : $('input[name=password]').val(),
                'password_confirmation' : $('input[name=password_confirmation]').val(),
            }

            $.ajax({
                type: 'POST',
                url: this.url,
                data: postData,
                success: function (response) {
                    window.location.href = response.redirect
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