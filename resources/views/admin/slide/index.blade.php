@extends('admin.layout.admin')
@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>alt</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
@foreach($slides as $slide)
        <tr>
            <td>{{$slide->id}}</td>
            <td>{{$slide->title}}</td>
            <td>{{$slide->description}}</td>
            <td>{{$slide->alt_text}}</td>
            <td><a href="{{route('slide.edit',$slide->id)}}" type="button" class="btn btn-xs btn-primary">Edit</a></td>

            <td><form action="{{route('slide.del',$slide->id)}}"  method="POST">
                    <button type="submt" class="btn btn-xs btn-danger">Delete</button>
                    {{csrf_field()}}
                </form>
            </td>
        </tr>
    @endforeach

    </table>
@endsection