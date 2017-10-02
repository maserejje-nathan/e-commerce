@extends('layouts.main')

@section('title','Shirts')
@section('content')
    <br>
    <br>
    <br>

    @if($detect == true)
        <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large purple">
                <i class="large material-icons">call</i>
            </a>
            <ul>
                <li><a href="https://api.whatsapp.com/send?phone=+256702277475" class="btn-floating green"><i class="fa fa-whatsapp"></i></a></li>
                <li><a href="mailto:marketing@whitefalconug.com?subject=inquries%20to%20white%20falcon" class="btn-floating red"><i class="fa fa-envelope"></i></a></li>
                <li><a href="tel:+256774115475" class="btn-floating orange"><i class="fa fa-phone"></i></a></li>
                <li><a href="smsto:+256774115475" class="btn-floating blue"><i class="fa fa-envelope-o"></i></a></li>


            </ul>
        </div>
    @endif
    <!-- products listing -->
    <!-- Latest SHirts -->
    <div class="row">
        <div class="col s12 m12 l12">

            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12 m4 l4">
                           <h5>Price Range Filter</h5> <hr>
                            <form method="POST" action="filter_price">
                    <div class="row">
                        <div class="input-field col s12 m4 l4">
                            <input  id="first_name" name="from" type="number" class="validate">
                            <label for="first_name">FROM</label>
                        </div>
                        {{csrf_field()}}
                        <div class="input-field col s12 m4 l4">
                            <input id="last_name" name="to" type="number" class="validate">
                            <label for="last_name">TO</label>
                        </div>
                        <div class="input-field col s12 m4 l4">
                        <button class="btn purple" type="submit">Apply</button>
                        </div>

                    </div>
                            </form>

                        </div>

                        <div class="col s12 m4 l4">
                            <h5> Filter By Category  </h5> <hr>
                            <form>
                            <div class="row">
                                <div class="input-field col s12 m8 l8">
                                    <select name="" id="cat">
                                        <option value="" disabled selected>Choose a Category</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                    </select>
                                    <label for="cat">Category</label>
                                </div>
                                <div class="col s12 m4 l4">
                                    <button class="btn purple" type="submit">Apply</button>
                                </div>

                            </div>
                            </form>

                        </div>
                        <div class="col s12 m4 l4">
                           <h5> Filter By Brand </h5> <hr>
                            <form>
                                <div class="row">
                                    <div class="input-field col s12 m8 l8">
                                        <select name="" id="brand">
                                            <option value="" disabled selected>Choose a Brand</option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>
                                        <label for="brand">Brand </label>
                                    </div>
                                    <div class="col s12 m4 l4">
                                        <button class="btn purple" type="submit">Apply</button>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>



    </div>



    <div class="row">
        @forelse($shirts->chunk(4) as $chunk)
            @foreach($chunk as $shirt)

                <div class="col s12 m4 l4">

                    <div class="card medium hover-reveal">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{url('images/thumbs/small/',$shirt->thumb)}}">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">{{$shirt->title}}</span>
                        </div>
                        <div class="card-action">
          <span class="chip">
              PRICE :<b>UGX {{ number_format($shirt->price)}} </b>

          </span>


                        </div>

                        <div class="card-reveal">
                            <span class="card-title activator grey-text text-darken-4"> {{$shirt->title}} <i class="material-icons right">close</i></span>
                            <p>Brand: {{$shirt->brand}}</p>
                            <p>Quantity in stock: {{$shirt->availability}}</p>
                            <p>Description: {{$shirt->description}}</p>

                            <a class="col s12 m5 l5 btn btn-large waves-effect waves-light purple btn pulse " href="{{route('cart.addItem',$shirt->id)}}">Add to Cart</a>
                            <div class="col m2 l2"></div>
                            <a href="{{route('shirt',$shirt->id)}}" class="col s12 m5 l5 btn btn-large waves-effect waves-light purple"> view Details </a>
                        </div>

                    </div>
                </div>
            @endforeach
        @empty
            <h3>No Products stored</h3>
        @endforelse
    </div>
@endsection