@extends('layouts.main')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>

        <div class="row">


                        <div class="col s12 m2 l2">
                                Registration Form
                        </div>

                        <div class="col s12 m8 l8">

                            <div class="card">

                                <div class="card-content">
                            <form class="form-horizontal" method="POST" action="{{ url('/register') }}">
                                {{ csrf_field() }}


                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" class="validate" value="{{ old('name') }}" required autofocus name="name">
                                        <label for="name">Name </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="email" class="validate" value="{{ old('email') }}" required autofocus name="email">
                                        <label for="name">E-Mail Address </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" class="validate"  required autofocus name="password">
                                        <label for="name">Password </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password_confirmation" type="password" class="validate"  required autofocus name="password_confirmation">
                                        <label for="password_confirmation">Confirm Password </label>
                                    </div>
                                </div>


                                <div class="row">
                                    <button class="btn waves-effect waves-light purple" type="submit" name="action">Register
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </form>
                        </div>
                            </div>
                        </div>

                        <div class="col s12 m2 l2">

                        </div>


            </div>

@endsection
