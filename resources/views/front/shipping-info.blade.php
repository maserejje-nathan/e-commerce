@extends('layouts.main')

@section('content')
    <br>
    <br>
    <br>

    <div class="row">
        <div class="col s12 m2 l2 ">

        </div>
        <div class="col s12 m8 l8 ">

            <div class="card">

                <div class="card-content">
                    <div class="row">

                            <h4>Fill form to place order</h4>


                        <form method="POST" action="{{route('address.store')}}">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="addressline" type="text" class="validate" name="addressline" required>
                                    <label for="addressline">Address</label>
                                </div>
                            </div>


                            <div class="row">

                                <div class="input-field col s12">
                                    <input id="city" type="text" class="validate" name="city" required>
                                    <label for="city">City</label>
                                </div>
                            </div>

                            <div class="row">

                                <div class="input-field col s12">
                                    <input id="phone" type="number" class="validate" name="phone" required>
                                    <label for="phone">Phone Number</label>
                                </div>
                            </div>

                            <div class="row">
                                <button class="btn waves-effect waves-light" type="submit">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>





                    </div>

                </div>

            </div>
        </div>

        <div class="col s12 m2 l2 ">

        </div>

    </div>



@endsection