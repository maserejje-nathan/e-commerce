@extends('admin.layout.admin')

@section('content')

    <a class="btn btn-primary pull-right" data-toggle="modal" href="#category">Add Category</a>

    @if(!empty($categories))

        <table class="table table-bordered">
            <tr>

                <th>#</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td> <a href="{{route('category.show',$category->id)}}">{{$category->name}}</a></td>
                <td>
                    <form action="{{route('category.destroy',$category->id)}}"  method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>


          @else
        <div> No category </div>
                @endif






    <div class="modal fade" id="category">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add New</h4>
                </div>
                {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Title') }}
                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                    </div>
                    {{csrf_field()}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                {!! Form::close() !!}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    {{--products--}}
    @if(isset($products))

    <h3>Products</h3>

    <table class="table table-bordered">
    	<thead>
    		<tr>

    			<th>Products</th>
    		</tr>
    	</thead>
    	<tbody>

    @forelse($products as $product)
       <tr>
          <td>{{$product->title}}</td>
       </tr>

    @empty
        <tr><td>No products in this category</td></tr>

    @endforelse

        </tbody>
    </table>
    @endif


@endsection
    
    
    