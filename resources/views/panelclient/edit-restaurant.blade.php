@extends('layout.panel')

@section('panel_content')
<div class="form-container-centered">
    <div class="admin-card form-card">
        <div class="form-header">
            <h3>Editar restaurante</h3>
            @session('success')
                <span style="color:black">{{ $value }}</span>
            @endsession
        </div>

        <form action="{{ route('restaurant.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="name" class="input-dark" value="{{Auth::user()->name}}" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Cor primária</label>
                    <input type="color" id="primary_color" name="primary_color" value="{{ Auth::user()->primary_color}}">
                </div>
                <div class="form-group">
                    <label>Cor secundária</label>
                    <input type="color" id="second_color" name="second_color" value="{{ Auth::user()->second_color}}">
                </div>
            </div>

            <button type="submit" class="btn-finish">Salvar</button>
        </form>
    </div>
</div>
@endsection