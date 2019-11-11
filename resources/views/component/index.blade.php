@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{$title}}
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a href="/dashboard/components/new">New {{$title}}</a>
                            </div>
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

                    @if(count($components))
                    <div class="css-flex-table d-flex justify-content-center">

                        <div class="css-flex-table-header row">
                            <div>Id</div>
                            <div>Name</div>
                            <div>Content</div>
                            <div>component's types</div>
                            <div>width</div>
                            <div>height</div>
                            <div>location</div>
                            <div>Status</div>
                        </div>

                        
                            @foreach ($components as $component)
                                <div class="css-flex-table-body row">
                                    <div>{{ $component->id }}</div>
                                    <div>{{ $component->name }}</div>
                                    <div>
                                        @if($component->type_compoents == 1)
                                            {{ $component->text }}
                                        @else
                                            {{ $component->url }}
                                        @endif
                                        
                                    </div>
                                    <div>{{ $component->typeComponents->name }}</div>
                                    <div>{{ $component->width}} px</div>
                                    <div>{{ $component->height}} px</div>
                                    <div>
                                        <span class="row ml-2">x : {{ $component->location_x}}</span> 
                                        <span class="row ml-2">y : {{ $component->location_y}}</span> 
                                        <span class="row ml-2">z : {{ $component->location_z}}</span>
                                    </div>
                                    <div>
                                        <a href="/dashboard/components/checked/{{$component->id}}">
                                            @if($component->status == 1)
                                            Active
                                            @else
                                                Inactive
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        
                    </div>                    
                    @else
                    <div> No existe datos</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection