@extends('layout.panel')

@section('panel_content')
<div class="form-container-centered">
    <div class="admin-card form-card">
        <div class="form-header">
            <a href="" class="btn-back"><i class="fas fa-arrow-left"></i> Voltar</a>
            <h3>Cadastrar nova mesa</h3>
            @session('success')
                <span style="color:black">{{ $value }}</span>
            @endsession
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Número da mesa</label>
                <input type="text" name="number" class="input-dark" placeholder="Ex: 1" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Ativo</label>
                    <select name="active" class="select-gold">
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn-finish">SALVAR MESA</button>
        </form>
    </div>
</div>
@endsection