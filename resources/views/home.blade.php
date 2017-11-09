@extends('layouts.app')

@section('content')
<div class="container">


            <h1 style="text-align: center; margin-top: 3%">Business Finder</h1>
            <br>
            {{ Form::open(array('url' => './find', 'method' => 'post')) }}
                {{ Form::hidden( '_token', csrf_token() ) }}
                <div class="col-lg-3"></div>
                <div class="form-group col-lg-6 row">
                    {{ Form::text( 'search',
                                                   null,
                                                   array(        'class' => 'form-control col-lg-3',
                                                           'placeholder' => 'What are you looking for',
                                                                 'style' => 'text-align:center',
                                                                  'size' => 50 ))
                     }}
                    @if( $errors->has('search') )
                        <p style="color: red; text-align: center"> {{ $errors->first('search') }} </p>
                    @endif
                </div>

                <div class="col-lg-3"></div>

                <div class="row"></div>
                <div class="row" style="text-align: center; margin-top: 15px;">
                    <button class="btn btn-default row">Search</button>
                </div>



            {{ Form::close() }}



</div>
@endsection
