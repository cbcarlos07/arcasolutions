@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ URL('css/bootstrap-chosen.css') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Business Finder Admin</div>

                    <div class="panel-body">

                        {{--{{ $empresa }}--}}
                        <h2>{{ $empresa[0]->title }}</h2>
                        <span>in
                            @foreach( $empresa[0]->category as $item )
                                {{ $item->descricao }}
                            @endforeach
                        </span>

                        <div class="row"></div>
                        <br />
                        <h2>About</h2>
                        {{ $empresa[0]->descricao  }}<br>
                        {{ $empresa[0]->endereco }} - {{ $empresa[0]->endereco }}, {{ $empresa[0]->city->descricao }} - {{ $empresa[0]->estado }}, {{ $empresa[0]->cep }} <br>
                        {{ $empresa[0]->telefone }}

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
