@extends('layout.panel')

@section('panel_content')
<div class="form-container-centered">
    <div class="admin-card form-card">
        <div class="form-header">
            <a href="" class="btn-back"><i class="fas fa-arrow-left"></i> Voltar</a>
            <h3>Editar comanda</h3>
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label>Pagamento da comanda</label>
                    <select name="paid" class="select-gold">
                        <option value="">Selecione</option>
                        <option value="1">Pago</option>
                        <option value="0">A pagar</option>
                    </select>
                </div>
            </div>
            <form action="{{ route('check.update', $check->id) }}" method="POST">
                <button type="submit" class="btn-finish">SALVAR</button>
                <input type="hidden" name="id" value="{{ $check->id }}">
            </form>
        </form>
    </div>
</div>
@endsection