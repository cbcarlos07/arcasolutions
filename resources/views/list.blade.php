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

                        <ol style="font-size: 23px;">
                            @if (!Auth::guest())
                                <div class="col-lg-6" style="text-align: left">
                                    Business
                                </div>
                                <div class="col-lg-6" style="text-align: right">
                                    <a href="{{ action('EmpresaController@addBusiness') }}" class="btn btn-default">Add Business </a>
                                </div>
                            @endif
                            <div class="row"></div>
                            @foreach( $empresa as $item )
                                <li>
                                    <a href="{{ action('EmpresaController@getEmpresa', $item->id) }}"><strong >{{ $item->title }}</strong><br></a>
                                    @if (!Auth::guest())
                                        <span style="font-size: 20px;"> in
                                         @foreach( $item->category as $categoria )
                                            {{ $categoria->descricao }}
                                         @endforeach
                                        </span>
                                    @endif
                                </li>
                            @endforeach
                        </ol>

                        {{ $empresa->links() }}


                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
