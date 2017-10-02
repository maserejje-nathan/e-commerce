@extends('admin.layout.admin')

@section('content')

    <h3>Products</h3>


    <a HREF="{{url('admin/export')}}" class="btn btn-info pull-right" >Export CSV </a>
    <table class=" table table-bordered">
        <tr>
            <th>Name of Product</th>
            <th>Category</th>
            <th>EDit Product</th>
            <th>Delete</th>

        </tr>
        @forelse($products as $product)
        <tr>
        <td>{{$product->title}}</td>
            <td>{{count($product->category)?$product->category->name:"N/A"}}</td>
            <td><a href="{{route('product.edit',$product->id)}}" class="btn btn-xs btn-primary btn-sm ">Edit Product</a></td>
            <td> <form action="{{route('product.destroy',$product->id)}}"  method="POST">

                    {{method_field('DELETE')}}
                    <input class="btn btn-sm btn-xs btn-danger" type="submit" value="Delete">
                </form>
            </td>
        </tr>


        @empty

        <h3>No products</h3>

    @endforelse

    </table>

@endsection