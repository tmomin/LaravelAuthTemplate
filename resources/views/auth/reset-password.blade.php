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
                        <form class="form-horizontal" method="post" action="">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{ csrf_field() }}

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