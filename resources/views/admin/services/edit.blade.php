@extends('admin.layout.admin')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::model($service,['route' => ['service.update'], 'method' => 'PUT', 'files' => true]) !!}
            <div class="row">

                <div class="form-group">
                    <div class="col-sm-2">
                        {{ Form::label('name', 'Name') }}
                    </div>
                    <div class="col-sm-10">

                        {{ Form::text('name', null, array('class' => 'form-control','required'=>'',)) }}
                    </div>

                </div>
            </div>

            <br>

            <input type="hidden" name="id" value={{$service->id}}>

            <div class="row">

                <div class="form-group">
                    <div class="col-sm-2">
                        {{ Form::label('description', 'Description') }}
                    </div>
                    <div class="col-sm-10">

                        {{ Form::textarea('description', null, array('class' => 'form-control','required'=>'',)) }}
                    </div>

                </div>
            </div>
            <br>
            <div class="row">

                <div class="form-group">
                    <div class="col-sm-2">
                        {{ Form::label('price', 'Price') }}
                    </div>
                    <div class="col-sm-10">

                        {{ Form::text('price', null, array('class' => 'form-control','required'=>'',)) }}
                    </div>

                </div>
            </div>

            <br>


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