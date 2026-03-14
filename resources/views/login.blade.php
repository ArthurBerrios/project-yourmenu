@extends('layout.app')
@section('content')
<h2 class="login" >Login</h2>

@if(session()->has('success') )
    {{ session()->get('success') }}
@endif

@if( auth()->check())
    <a href="{{ route('login.destroy') }}">Sair</a>
@else
    @error('error')
        <span>{{ $message }}</span>
    @enderror

    <form action="{{ route('login.store') }}" class="login" method="post">
        @csrf
        <input type="text" class="inputlogin" name="email" value ="">
        @error('email')
            <span>{{ $message }}</span>
        @enderror

        <input type="password" class="inputlogin" name="password" value="">
        @error('password')
        <span>{{ $message }}</span>
        @enderror
        <button type="submit" class="submitlogin" >Login</button>
@endif
</form>
@endsection