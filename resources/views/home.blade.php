@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <!-- {{ session('status') }} -->
                        </div>
                    @endif
                    <div class="links">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{ route('adverts') }}">Adverts</a></li>
                            <li class="list-group-item"><a href="{{ route('components') }}">Components</a></li>
                            <li class="list-group-item"><a href="{{ route('types-of-components') }}">Types of components</a></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
