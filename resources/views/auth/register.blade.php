@extends('layouts.master')
{{--@include('layouts.carousel')--}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Register</h3>
                    </div>

                    <div class="card-body">
                        <form class="form-horizontal" method="post" action="/register">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label for="first_name" class="cols-sm-2 control-label">First Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="first_name" id="first_name"  placeholder="First Name"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="last_name" class="cols-sm-2 control-label">Last Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="last_name" id="last_name"  placeholder="Last Name"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Email</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="email" id="email"  placeholder="Your Email"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="cols-sm-2 control-label required">Password</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password" id="password"  placeholder="Your Password"/>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group ">
                                <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop