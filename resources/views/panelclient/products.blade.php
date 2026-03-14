@extends('layout.panel')

@section('panel_content')
<div class="product-list-container">
    <div class="header-actions">
        <h2>Gerenciar Cardápio</h2>
        @session('success')
            <span style="color: black">{{ $value }}</span>
        @endsession
        <a href="{{ route('create-product') }}" class="btn-add-main">
            <i class="fas fa-plus"></i> Novo Produto
        </a>
    </div>

    <div class="admin-card">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product )
                    <tr>
                        <td><img src="{{asset("storage/{$product->image}")}}" class="img-thumb"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td><span class="badge {{ $product->available ? 'badge-active' : 'badge-inactive' }}">
                            {{ $product->available ? 'Disponível' : 'Indisponível' }}
                        </span></td>
                        <td class="table-actions">
                            <a href="{{ route('product.edit', $product->id) }}">
                                <button class="btn-edit"><i class="fas fa-edit"></i></button>
                            </a>
                            <a href="{{ route('product.destroy', $product->id) }}">
                                <button class="btn-delete"><i class="fas fa-trash"></i></button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection