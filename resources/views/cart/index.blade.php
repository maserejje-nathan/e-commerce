@extends('layouts.main')

@section('content')

    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="row">

        <div class="col s12 m2 l2">


<div class="card">
    <div class="card-content center-align">
        <h5> <u>Cart Items: </u> </h5>
    </div>

</div>

        </div>

        <div class="col s12 m8 l8">

          <div class="card">
            <div class="card-content">

                <table class=" bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>qty</th>
                        <th>size</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartItems as $cartItem)
                        <tr>
                            <td>{{$cartItem->name}}</td>
                            <td>{{$cartItem->price}}</td>
                            <td width="50px">
                                {!! Form::open(['route' => ['cart.update',$cartItem->rowId], 'method' => 'PUT']) !!}
                                <input name="qty" type="text" value="{{$cartItem->qty}}">


                            </td>
                            <td>
                                <div > {!! Form::select('size', ['small'=>'Small','medium'=>'Medium','large'=>'Large'] , $cartItem->options->has('size')?$cartItem->options->size:'' ) !!}
                                </div>

                            </td>

                            <td>
                                <input style="float: left"  type="submit" class="button success small" value="Ok">
                                {!! Form::close() !!}

                                <form action="{{route('cart.destroy',$cartItem->rowId)}}"  method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <input class="button small alert" type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    <tr>
                        <td></td>
                        <td>
                            Tax: ${{Cart::tax()}} <br>
                            Sub Total: UGX {{Cart::subtotal()}} <br>
                            Grand Total: UGX {{Cart::total()}}
                        </td>
                        <td>Items: {{Cart::count()}}

                        </td>
                        <td></td>
                        <td></td>

                    </tr>
                    </tbody>
                </table>

                <a href="{{route('checkout.shipping')}}" class="btn waves-effect purple">Checkout</a>
            </div>


    </div>
        </div>

        <div class="col s12 m2 l2">


        </div>


    </div>



@endsection