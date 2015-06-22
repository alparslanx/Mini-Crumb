@extends('app')
@section('content')

    <div class="row">

        <div>
            {!! Form::open(array('route' => 'login', 'method' => 'POST')) !!}
            <div>
                {!! Form::label('email', 'E-Mail Adresi'); !!
                {!! Form::text('email'); !!}
            </div>


            <div>
                {!! Form::label('password', 'Şifre'); !!
                {!! Form::password('password'); !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection