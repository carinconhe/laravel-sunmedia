@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Component
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header"></div>
                            <div class="navbar-header float-right">
                                <a class="btn btn-primary btn-sm" href="/home">Back</a>
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="card-body">

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <!-- {{ session('status') }} -->
                    </div>
                    @endif

                    {!! Form::open(['route' => 'component.store','method' => 'POST']) !!}
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Name</strong>
                                {!! Form::text('name','',array('id'=>'name','class'=>'form-control','placeholder'=>'Enter Name')) !!}
                                @if ($errors->has('name'))<span class="text-danger">{{ $errors->first('name') }}</span>@endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>component's types</strong>
                                {!! Form::select('type',$types,'',['class' => 'form-control mb-4','id' =>'type']) !!}
                                @if ($errors->has('type'))<span class="text-danger">{{ $errors->first('type') }}</span>@endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Url</strong>
                                {!! Form::text('url','',array('id'=>'url','class'=>'form-control','placeholder'=>'Enter Url')) !!}
                                @if ($errors->has('url'))<span class="text-danger">{{ $errors->first('url') }}</span>@endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Image</strong>
                                {!! Form::file('image') !!}
                                @if ($errors->has('image'))<span class="text-danger">{{ $errors->first('image') }}</span>@endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Format</strong>
                                {!! Form::text('format','',array('id'=>'format','class'=>'form-control','placeholder'=>'Enter Format')) !!}
                                @if ($errors->has('format'))<span class="text-danger">{{ $errors->first('format') }}</span>@endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Size</strong>
                                {!! Form::text('size','',array('id'=>'size','class'=>'form-control','placeholder'=>'Enter Size')) !!}
                                @if ($errors->has('size'))<span class="text-danger">{{ $errors->first('size') }}</span>@endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Text</strong>
                                {!! Form::text('text','',array('id'=>'text','class'=>'form-control','placeholder'=>'Enter Text')) !!}
                                @if ($errors->has('text'))<span class="text-danger">{{ $errors->first('text') }}</span>@endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="d-flex">
                                    <strong>Width</strong><br>
                                    {!! Form::number('width','',array('id'=>'width','class'=>'form-control','placeholder'=>'Enter Width')) !!}
                                    @if ($errors->has('width'))<span class="text-danger">{{ $errors->first('width') }}</span>@endif
                                    <span>px</span>
                                    <strong>Height</strong>
                                    {!! Form::number('height','',array('id'=>'height','class'=>'form-control','placeholder'=>'Enter Height')) !!}
                                    @if ($errors->has('height'))<span class="text-danger">{{ $errors->first('height') }}</span>@endif
                                    <span>px</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Location</strong>
                                <div class="d-flex">
                                    <strong>x:</strong>
                                    {!! Form::number('location_x','',array('id'=>'location_x','class'=>'ftext-center','maxlength' => '3', 'max' => '100', 'min' => '0')) !!}
                                    @if ($errors->has('location_x'))<span class="text-danger">{{ $errors->first('location_x') }}</span>@endif
                                    <strong>y:</strong>
                                    {!! Form::number('location_y','',array('id'=>'location_y','class'=>'ftext-center','maxlength' => '3', 'max' => '100', 'min' => '0')) !!}
                                    @if ($errors->has('location_y'))<span class="text-danger">{{ $errors->first('location_y') }}</span>@endif
                                    <strong>z:</strong>
                                    {!! Form::number('location_z','',array('id'=>'location_z','class'=>'ftext-center','maxlength' => '3', 'max' => '100', 'min' => '0')) !!}
                                    @if ($errors->has('location_z'))<span class="text-danger">{{ $errors->first('location_z') }}</span>@endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Status</strong>
                                {!! Form::select('status',[''=>'Select one ..','0'=>'Inactive','1'=>'Active'],'',['class' => 'form-control mb-4','id' =>'status']) !!}
                                @if ($errors->has('status'))<span class="text-danger">{{ $errors->first('status') }}</span>@endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection