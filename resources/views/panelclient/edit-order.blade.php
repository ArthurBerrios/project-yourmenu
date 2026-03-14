@extends('layout.panel')

@section('panel_content')
<div class="form-container-centered">
    <div class="admin-card form-card">
        <div class="form-header">
            <a href="" class="btn-back"><i class="fas fa-arrow-left"></i> Voltar</a>
            <h3>Editar pedido</h3>
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label>Status do pedido</label>
                    <select name="status" class="select-gold">
                        <option value="{{ $order->status->type() }}">Selecione</option>
                        <option value="1">Em preparo</option>
                        <option value="2">Entregue</option>
                    </select>
                </div>
            </div>
            <form action="{{ route('order.update', $order->id ) }}" method="POST">
                <input type="hidden" name="id" value="{{ $order->id }}">
                <button type="submit" class="btn-finish">SALVAR MESA</button>
            </form>
        </form>
    </div>
</div>
@endsection