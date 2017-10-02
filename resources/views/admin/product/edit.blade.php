@extends('admin.layout.admin')

@section('content')

    <h3>Add Product</h3>

    <div class="row">
        <div class="col-md-6">
            {!! Form::model($product,['route' => ['product.update',$product->id], 'method' => 'PUT', 'files' => true]) !!}
            <div class="row">
                <div class="form-group">
                    {{ Form::label('name', 'Name',['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-8">
                        {{ Form::text('title', null, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}
                    </div>

                </div>
            </div>
            <br>
            {{csrf_field()}}
            <div class="row">
                <div class="form-group">
                    {{ Form::label('description', 'Description',['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-8">
                        {{ Form::textarea('description', null, array('class' => 'form-control','rows'=>'2')) }}
                    </div>

                </div>
            </div>

            <br>

            <div class="row">
                <div class="form-group">
                    {{ Form::label('brand', 'Product Brand',['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-8">
                        {{ Form::text('brand', null, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}
                    </div>

                </div>
            </div>
            <br>
            <div class="row">

                <div class="form-group">
                    {{ Form::label('price', 'Price',['class' => 'col-md-4 control-label']) }}

                    <div class="col-md-8">
                        {{ Form::text('price', null, array('class' => 'form-control')) }}
                    </div>

                </div>
            </div>

            <br>
            <div class="row">
                <div class="form-group">
                    {{ Form::label('condition', 'Product Condition',['class' => 'col-md-4 control-label']) }}

                    <div class="col-md-8">
                        {{ Form::select('condition', [ 'New' => 'New', 'Refurbished' => 'Refurbished','Used'=>'Used'], null, ['class' => 'form-control']) }}
                    </div>

                </div>
            </div>

            <br>
            <div class="row">
                <div class="form-group">
                    {{ Form::label('availability', 'Number of Pieces',['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-8">
                        {{ Form::number('availability', null, array('class' => 'form-control','rows'=>'2')) }}
                    </div>

                </div>
            </div>

            <br>

            <div class="row">
                <div class="form-group">
                    {{ Form::label('category_id', 'Categories',['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-8">
                        {{ Form::select('category_id', $categories, null, ['class' => 'form-control','onchange'=>'yesnoCheck(this);','placeholder'=>'Select Category']) }}
                    </div>

                </div>
            </div>

            <br>

            <div class="row">

                <div class="form-group">
                    {{ Form::label('image', 'Image',['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-8">
                        {{ Form::file('image_link',array('class' => 'form-control')) }}

                    </div>

                </div>
            </div>
            <br>
            <div class="row">

                <div class="form-group">
                    {{ Form::label('thumb', 'ThumbNail Image',['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-8">
                        {{ Form::file('thumb',array('class' => 'form-control')) }}

                    </div>

                </div>
            </div>
            <br>






        </div>

        <div class="col-md-6">
            <div id="ifYes" style="display: none;">

                <div class="row">

                    <div class="form-group">
                        {{ Form::label('cpu', 'Processor Type',['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-8">
                            {{ Form::text('cpu', null, array('class' => 'form-control')) }}

                        </div>

                    </div>
                </div>
                <br>
                <div class="row">

                    <div class="form-group">
                        {{ Form::label('ram', 'Ram Capacity',['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-8">
                            {{ Form::text('ram', null, array('class' => 'form-control')) }}

                        </div>

                    </div>
                </div>
                <br>
                <div class="row">

                    <div class="form-group">
                        {{ Form::label('drive', 'Hard Drive',['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-8">
                            {{ Form::text('drive', null, array('class' => 'form-control')) }}

                        </div>

                    </div>
                </div>
                <br>
                <div class="row">

                    <div class="form-group">
                        {{ Form::label('ssd', 'SSD Present',['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-8">
                            {{ Form::select('ssd',['Yes'=>'Yes','No'=>'No'], null, array('class' => 'form-control')) }}

                        </div>

                    </div>
                </div>
                <br>

                <div class="row">

                    <div class="form-group">
                        {{ Form::label('usb', 'Usb Ports',['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-8">
                            {{ Form::number('usb', null, array('class' => 'form-control')) }}

                        </div>

                    </div>
                </div>
                <br>

                <div class="row">

                    <div class="form-group">
                        {{ Form::label('wifi', 'WiFi',['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-8">
                            {{ Form::select('wifi',['Yes'=>'Yes','No'=>'No'], null, array('class' => 'form-control')) }}

                        </div>

                    </div>
                </div>
                <br>

                <div class="row">

                    <div class="form-group">
                        {{ Form::label('vga', 'VGA Port',['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-8">
                            {{ Form::select('vga',['Yes'=>'Yes','No'=>'No'], null, array('class' => 'form-control')) }}

                        </div>

                    </div>
                </div>
                <br>

                <div class="row">

                    <div class="form-group">
                        {{ Form::label('hdmi', 'HDMI Port',['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-8">
                            {{ Form::select('hdmi',['Yes'=>'Yes','No'=>'No'], null, array('class' => 'form-control')) }}

                        </div>

                    </div>
                </div>
                <br>


                <div class="row">

                    <div class="form-group">
                        {{ Form::label('dvd', 'DVD Writer',['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-8">
                            {{ Form::select('dvd',['Yes'=>'Yes','No'=>'No'], null, array('class' => 'form-control')) }}

                        </div>

                    </div>
                </div>
                <br>

                <div class="row">

                    <div class="form-group">
                        {{ Form::label('webcam', 'Web Cam',['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-8">
                            {{ Form::select('webcam',['Yes'=>'Yes','No'=>'No'], null, array('class' => 'form-control')) }}

                        </div>

                    </div>
                </div>
                <br>

                <div class="row">

                    <div class="form-group">
                        {{ Form::label('touch', 'Touch Screen',['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-8">
                            {{ Form::select('touch',['Yes'=>'Yes','No'=>'No'], null, array('class' => 'form-control')) }}

                        </div>

                    </div>
                </div>
                <br>
                <div class="row">

                    <div class="form-group">
                        {{ Form::label('graphics', 'Graphics Card',['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-8">
                            {{ Form::textarea('graphics', null, array('class' => 'form-control','rows'=>'2')) }}

                        </div>

                    </div>
                </div>
                <br>








            </div>

        </div>
        {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
        {!! Form::close() !!}
    </div>

    <script>
        function yesnoCheck(that) {
            if (that.value == 1) {

                document.getElementById("ifYes").style.display = "block";
            } else {
                document.getElementById("ifYes").style.display = "none";
            }
        }
    </script>




@endsection