@extends('layouts.main')

@section('content')
    <br>
    <br>
    <br>

    <div class="row">
        <div class="col s12 m12 l12">

            <div class="card">
                <div class="card-content">
                    <ul>
                        <li>
                            <h5> <em>search results........................</em> </h5>
                        </li>
                    </ul>
                </div>

            </div>

        </div>



    </div>



    <div class="row">
        <div class="col s12 m12 l12">

            @forelse($item->chunk(4) as $chunk)
                @foreach($chunk as $shirt)

                    <div class="col s12 m4 l4">

                        <div class="card hover-reveal">
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
                <h3>No Results found</h3>
            @endforelse
        </div>

    </div>


@endsection