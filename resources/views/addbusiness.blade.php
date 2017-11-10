@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ URL('css/bootstrap-chosen.css') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Business Finder Admin</div>

                    <div class="panel-body">
                        {{ Form::open(array( 'url' => './saveBusiness', 'method' => 'post' )) }}
                                <div class="form-group col-lg-6 row {{ $errors->has('title') ? ' has-error' : '' }}">
                                    {{ Form::hidden( 'token', csrf_token(), array('id'=> 'token') ) }}
                                    {{ Form::label( 'Title' ) }}
                                    {{ Form::text( 'title', null, array( 'class' => 'form-control', 'placeholder' => 'Title','id' => 'title', 'required' ) ) }}
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="row"></div>
                                <div class="form-group col-lg-6 row">
                                    {{ Form::label( 'Phone' ) }}
                                    {{ Form::tel( 'phone', null, array( 'class' => 'form-control', 'placeholder' => 'Phone','id' => 'phone','required' ) ) }}
                                </div>
                                <div class="row"></div>
                                <div class="form-group col-lg-6 row">
                                    {{ Form::label( 'Address' ) }}
                                    {{ Form::text( 'address', null, array( 'class' => 'form-control', 'placeholder' => 'Address','id' => 'address','required' ) ) }}
                                </div>
                                <div class="row"></div>
                                <div class="form-group col-lg-6 row">
                                    {{ Form::label( 'Zipcode' ) }}
                                    {{ Form::text( 'zipcode', null, array( 'class' => 'form-control', 'placeholder' => 'Zipcode','id' => 'zipcode', 'required' ) ) }}
                                </div>
                                <div class="row"></div>
                                <div class="form-group col-lg-6 row">
                                    {{ Form::select( 'city', $cidades ,null, array( 'class' => 'form-control', 'data-placeholder' => 'City','id' => 'city' ) ) }}
                                </div>
                                <div class="row"></div>

                                <div class="form-group col-lg-6 row">
                                    {{ Form::select( 'state', $estados ,null, array( 'class' => 'form-control', 'data-placeholder' => 'State','id' => 'state' ) ) }}
                                </div>
                                <div class="row"></div>
                                <div class="form-group col-lg-6 row">
                                    {{ Form::textarea( 'description', null, array( 'class' => 'form-control', 'placeholder' => 'Description','id' => 'description', 'required' ) ) }}
                                </div>
                                <div class="row"></div>
                                <div class="form-group col-lg-6 row">
                                    {{ Form::select( 'category[]', $categoria ,null, array( 'multiple' => 'multiple', 'class' => 'form-control', 'data-placeholder' => 'Category','id' => 'category', 'required') ) }}
                                </div>
                                <div class="row"></div>
                                <div style="text-align: center">
                                  <button class="btn btn-default btn-salvar">Save</button>
                                </div>
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="{{ URL('js/chosen.jquery.js') }}"></script>
    <script>
        $("#state").chosen( {allow_single_deselect: true} );
        $("#city").chosen( {allow_single_deselect: true} );
        $("#category").chosen( {allow_single_deselect: true} );
    </script>
    <script>
        $(document).ready( function () {
            var token = $('#token').val();
            var estados = $('#state');

            $.ajax({
                url : './estados',
                dataType : 'json',
                type : 'post',
                data : {
                    _token : token
                },
                cache : false,
                success : function ( data ) {

                    /*estados.find('option').remove();
                    estados.append( $('<option>').val( 0 ).text( '' ));*/
                    //console.log( data );
                    var option = "";
                    $.each(data, function (i, j) {
                      //  console.log( j.sigla+" "+j.descricao );
                       // var option  = $('<option>').val( j.sigla ).text( j.descricao ) ;
                        option = '<option value="'+ j.sigla +'">'+ j.descricao +'</option>';

                    });
                    estados.append( option );
                    estados.trigger('chosen:updated');
                }
            });
        });

        $('#state').on('change', function () {
            console.log('Selct: '+$(this).val() );
        })

    </script>

@endsection
