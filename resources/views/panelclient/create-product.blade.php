@extends('layout.panel')

@section('panel_content')
<div class="form-container-centered">
    <div class="admin-card form-card">
        <div class="form-header">
            <a href="" class="btn-back"><i class="fas fa-arrow-left"></i> Voltar</a>
            <h3>Cadastrar Novo Produto</h3>
        </div>

        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nome do Produto</label>
                <input type="text" name="name" class="input-dark" placeholder="Ex: Temaki de Salmão" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Preço (R$)</label>
                    <input type="number" step="0.01" name="price" class="input-dark" placeholder="0,00" required>
                </div>
                <div class="form-group">
                    <label>Disponibilidade</label>
                    <select name="available" class="select-gold">
                        <option value="1">Disponível</option>
                        <option value="0">Indisponível</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Descrição</label>
                <textarea name="description" class="input-dark" rows="4" placeholder="Descreva os ingredientes..."></textarea>
            </div>

            <div class="form-group">
                <label>Imagem do Produto</label>
                <input type="file" accept=".jpeg, .jpg, .png" name="image" class="input-dark">
            </div>

            <button type="submit" class="btn-finish">SALVAR PRODUTO</button>
        </form>
    </div>
</div>
@endsection