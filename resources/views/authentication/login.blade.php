@extends('layouts.master')

@section('content')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/login" method="POST">
                            {{csrf_field()}}

                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                    <input type="email" name="email" class="form-control" placeholder="example@example.com" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                            </div>

                            <a href="/forgot-password">Forgot your password ?</a>

                            <div class="form-group">
                                <input type="submit" value="Login"  class="btn btn-success pull-right" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
