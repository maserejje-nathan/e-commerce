@extends('admin.layout.admin')

@section('content')
  <h3>Services</h3>

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        @foreach($services as $svr)
        <tr>

            <td>{{$svr->id}}</td>
            <td>{{$svr->name}}</td>
            <td>{!!$svr->description!!}</td>
            <td>UGX{{number_format($svr->price)}}</td>
            <td>
           
                <div class="btn-group btn-group-xs">
                 <form action="{{route('services.destroy',$svr->id)}}"  method="POST">
                    <button type="submt" class="btn btn-xs btn-danger">Delete</button>
                    {{csrf_field()}}
                 </form>
                 <a href="{{route('services.edit',$svr->id)}}" type="button" class="btn btn-xs btn-primary">Edit</a>
                </div>
               
            </td>


        </tr>
        @endforeach

    </table>



@endsection