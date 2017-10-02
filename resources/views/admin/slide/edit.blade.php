@extends('admin.layout.admin')
@section('content')

    <h5>EDit slide</h5>
    <div class="clearfix"></div>
    <hr>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::model($slides,['route' => ['slide.update'], 'method' => 'PUT', 'files' => true]) !!}
            <div class="row">

                <div class="form-group">
                    <div class="col-sm-2">
                        {{ Form::label('title', 'Name') }}
                    </div>
                    <div class="col-sm-10">

                        {{ Form::text('title', null, array('class' => 'form-control','required'=>'',)) }}
                    </div>

                </div>
            </div>
            {{csrf_field()}}
            <br>

            <div class="row">

                <div class="form-group">
                    <div class="col-sm-2">
                        {{ Form::label('description', 'Description') }}
                    </div>
                    <div class="col-sm-10">

                        {{ Form::textarea('description', null, array('class' => 'form-control','required'=>'','rows'=>'2')) }}
                    </div>

                </div>
            </div>
            <br>
            <div class="row">

                <div class="form-group">
                    <div class="col-sm-2">
                        {{ Form::label('alt_text', 'Alt Text') }}
                    </div>
                    <div class="col-sm-10">

                        {{ Form::text('alt_text', null, array('class' => 'form-control','required'=>'','rows'=>'2')) }}
                    </div>

                </div>
            </div>
            <br>
            <div class="row">

                <div class="form-group">
                    <div class="col-sm-2">
                        {{ Form::label('Product Link', 'Link') }}
                    </div>
                    <div class="col-sm-10">

                        {{ Form::select('product_id',$products, null, array('class' => 'form-control','placeholder'=>'select product to link to')) }}
                    </div>

                </div>
            </div>
            <br>
            <input type="hidden" name="id" value={{$slides->id}}>
            <div class="row">

                <div class="form-group">
                    <div class="col-sm-2">
                        {{ Form::label('image', 'Image') }}
                    </div>
                    <div class="col-sm-10">

                        {{ Form::file('image', null, array('class' => 'form-control','required'=>'',)) }}
                    </div>

                </div>
            </div>
            <br>


            {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
            {!! Form::close() !!}


        </div>

@endsection