@extends('app')
@section('content')

<div class="row">

    @if (session('error'))
asdasd
        <div data-alert class="alert-box alert round">
            {{ session('error') }}
            <a href="#" class="close">&times;</a>
        </div>

    @endif

    <div>
        {!! Form::open(array('route' => 'register', 'method' => 'POST')) !!}
            <div>
                {!! Form::label('email', 'E-Mail Adresi') !!}
                {!! Form::text('email') !!}
            </div>

            <div>
                {!! Form::label('username', 'Kullanıcı Adı') !!}
                {!! Form::text('username') !!}
            </div>

            <div>
                {!! Form::label('password', 'Şifre') !!}
                {!! Form::password('password') !!}
            </div>

            <div>

               {!! Form::submit('Gönder') !!}

            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection