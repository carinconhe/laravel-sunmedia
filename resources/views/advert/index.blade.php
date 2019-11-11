@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{$title}}
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a href="#">New {{$title}}</a>
                            </div>
                            <div class="navbar-header">
                                <a href="/home">Back</a>
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
                    @if(count($adverts))
                        @foreach ($adverts as $advert)
                            <div class="col-sm-4">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $advert->name }}</h5>
                                        <small class="text-muted">{{ $advert->status }}</small>
                                    </div>
                                </div>  
                            </div>
                        @endforeach
                    @else
                        <div> No existe datos</div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection