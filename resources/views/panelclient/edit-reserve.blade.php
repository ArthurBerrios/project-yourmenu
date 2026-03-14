@extends('layout.panel')

@section('panel_content')
<div class="form-container-centered">
    <div class="admin-card form-card">
        <div class="form-header">
            <a href="" class="btn-back"><i class="fas fa-arrow-left"></i> Voltar</a>
            <h3>Editar comanda</h3>
        </div>

        <form action="{{ route('reserve.update', $reserve) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label>Reserva finalizada?</label>
                    <select name="finished" class="select-gold">
                        <option value="">Selecione</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                </div>
            </div>
                <button type="submit" class="btn-finish">SALVAR</button>
            </form>
        </form>
    </div>
</div>
@endsection