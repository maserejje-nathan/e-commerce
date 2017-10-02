@extends('layouts.main')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="row">
        <div class="col s12 m2 l2">
       <div><h4>Login Form </h4> </div>
        </div>
        <div class="col s12 m8 l8">
            <div class="card">

                <div class="card-content">

                    <form  method="POST" action="{{ url('/login') }}">


                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" value="{{ old('email') }}" name="email" required autofocus>

                                <label for="email">E-Mail Address</label>
                            </div>
                        </div>

                        {!! csrf_field() !!}

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="password" required>
                                <label for="password">Password</label>
                            </div>
                        </div>

                        <input type="checkbox" class="filled-in" name="remember" id="filled-in-box" checked="checked" />
                        <label for="filled-in-box">Remember me </label>

                        <div class="row">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </div>

                    </form>



                    <div class="row">

                        <div class="col s12 m2 l2">  </div>

                        <div class="col s12 m8 l8">

                              <div class="row">

                                  <a  href="{{ url('/password/reset') }}">
                                      Forgot Your Password?
                                  </a>
                              </div>
                            <div class="row">
                                <a href="login/google" class="waves-effect waves-light red col s12 btn social google">
                                    <i class="fa fa-google-plus"></i> Sign in with Google</a>

                            </div>




                            <div class="row">
                                <a href="login/facebook" class="waves-effect waves-light blue darken-4 btn col s12 social facebook">
                                    <i class="fa fa-facebook"></i> Sign in with facebook</a>
                            </div>

                            <div class="row">
                                <a href="login/twitter" class="waves-effect waves-light blue btn col s12 social twitter">
                                    <i class="fa fa-twitter"></i> Sign in with twitter</a>
                            </div>


                        </div>
                        <div class="col s12 m2 l2">

                        </div>


                    </div>




                </div>
            </div>
        </div>
        <div class="col s12 m3 l3">


        </div>


    </div>



@endsection
