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

                    @if(count($typesComponents))
                    <div class="css-flex-table d-flex justify-content-center">

                        <div class="css-flex-table-header row">
                            <div>Id</div>
                            <div>Name</div>
                            <div>Status</div>
                        </div>

                        
                            @foreach ($typesComponents as $type)
                                <div class="css-flex-table-body row">
                                    <div>{{ $type->id }}</div>
                                    <div>{{ $type->name }}</div>
                                    <div>
                                        <a href="/dashboard/types-of-components/checked/{{$type->id}}">
                                            @if($type->status == 1)
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