@extends('layout.panel')

@section('panel_content')
<div class="form-container-centered">
    <div class="admin-card form-card">
        <div class="form-header">
            <a href="" class="btn-back"><i class="fas fa-arrow-left"></i> Voltar</a>
            <h3>Editar Produto</h3>
        </div>

        <form action="{{ route('product.update', $product->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nome do Produto</label>
                <input type="text" name="name" value="{{ $product->name }}" class="input-dark" placeholder="{{$product->name}}">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Preço (R$)</label>
                    <input type="number" value="{{ $product->price }}" step="0.01" name="price" class="input-dark" placeholder="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label>Disponibilidade</label>
                    <select name="available" class="select-gold">
                        <option value="{{ $product->available }}">{{ $product->available ? 'Disponível' : 'Indisponível'  }}</option>
                        <option value="1">Disponível</option>
                        <option value="0">Indisponível</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Descrição</label>
                <textarea name="description" class="input-dark" rows="4" placeholder="{{ $product->description }}">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Imagem do Produto</label>
                <input type="file" value="{{ $product->image }}" accept=".jpeg, .jpg, .png" name="image" class="input-dark">
            </div>
            <div class="form-group">
                <img src="{{asset("storage/{$product->image}")}}" class="img-thumb">
            </div>
            <button type="submit" class="btn-finish">SALVAR PRODUTO</button>
        </form>
    </div>
</div>
@endsection