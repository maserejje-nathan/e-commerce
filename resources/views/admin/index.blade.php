@extends('admin.layout.admin')
@section('content')
    <h3>Admin Dashboard</h3>

    <div class="row">

        <div class="col-sm-4">
            <div class="jumbotron">
                <div>
                    <h3>Number of Users</h3> <i class="fa fa-users fa-5x" ></i>
                </div>
                <h4>{{$users}}</h4>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="jumbotron">
                <div>
                    <h3>Total Products</h3> <i class="fa fa-product-hunt fa-5x"></i>
                </div>
                <h4>{{$products}}</h4>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="jumbotron">
                <div>
                    <h3>Total Categories</h3> <i class="fa fa-cogs fa-5x"></i>
                </div>
                <h4>{{$cat}}</h4>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-sm-4">
            <div class="jumbotron">
                <div>
                    <h3>Pending Orders</h3> <i class="fa fa-shopping-bag fa-5x"></i>
                </div>
                <h4>{{$pend}}</h4>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="jumbotron">
                <div>
                    <h3>Delivered Orders</h3> <i class="fa fa-handshake-o fa-5x"></i>
                </div>
                <h4>{{$del}}</h4>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="jumbotron">
                <div>
                    <h3>Number of Services</h3> <i class="fa fa-wrench fa-5x"></i>
                </div>
                <h4>{{$svr}}</h4>
            </div>
        </div>

    </div>

    {!! $chart->render() !!}
@endsection
