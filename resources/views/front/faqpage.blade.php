@extends('layouts.main')

@section('content')
    <br>
    <br>
    <br>
<div class="row">
    <div class="col s12 m12 l12">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    @foreach($faq as $svr)


                        <div class="col s12">
                            <ul class="collection with-header">
                                <li class="collection-header"> <h5>{{$svr->question}}</h5></li>
                                <li class="collection-item"> {{$svr->answer}}</li>
                            </ul>
                        </div>



                    @endforeach

                </div>


                {{ $faq->links() }}

            </div>

        </div>
    </div>

</div>


@endsection