@extends('layouts.main')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="row">

    <div class="card-content">





            @foreach($services as $svr)


                <div class="col s12 m4 l4">
                    <ul class="collection with-header">
                        <li class="collection-header"><h5>{{$svr->name}}</h5></li>
                        <li class="collection-item"><div><img src="{{url('images/thumbs',$svr->image)}}"><a href="#!" class="secondary-content"></a></div></li>
                        <li class="collection-item"><div>{{$svr->description}}<a href="#!" class="secondary-content"></a></div></li>
                        <li class="collection-item"><div>UGX {{$svr->price}}/=<a href="#!" class="secondary-content"></a></div></li>

                    </ul>
                </div>



            @endforeach

        </div>



    </div>

@endsection