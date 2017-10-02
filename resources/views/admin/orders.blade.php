@extends('admin.layout.admin')
@section('content')
    <h3>Orders made</h3>
    <hr>

        @foreach($orders as $order)

                <div class="clearfix"></div>
                <hr>

                @if($order->delivered ==1)
                <h5>Delivered Order</h5>
                @else

                    <h5>Pending Order</h5>
                @endif
                <table class="table table-bordered">
                    <tr>
                        <th>Item Name</th>
                        <th>qty</th>
                        <th>price</th>
                        <th>Ordered By</th>
                        <th>Total order Cost</th>
                        <th>Action</th>

                    </tr>
                    @foreach($order->orderItems as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->pivot->qty}}</td>
                            <td>{{$item->pivot->total}}</td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->total}}</td>
                            <td>
                                <form action="{{route('toggle.deliver',$order->id)}}" method="POST" class="pull-right" id="deliver-toggle">
                                    {{csrf_field()}}
                                    <label for="delivered">Delivered</label>
                                    <input type="checkbox" value="1" name="delivered"  {{$order->delivered==1?"checked":"" }}>
                                    <input type="hidden" value="{{$item->pivot->product_id}}" name="product_id">
                                    <input type="hidden" value="{{$item->pivot->qty}}" name="quantity">
                                    <input class="btn btn-info" type="submit" value="Submit">
                                </form>

                            </td>
                        </tr>

                    @endforeach
                </table>


        @endforeach


@endsection

