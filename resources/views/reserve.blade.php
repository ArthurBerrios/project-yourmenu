@extends('layout.app')

@section('content')

<div class="reservation-container" style="background-color: {{ session('second_color')}}; color: {{ session('second_color')}};min-height: 65vh;">
    <div class="reservation-grid" style="background-color: {{ session('primary_color')}}; color: {{ session('second_color')}};">
        @if(isset($reserve))
            <h3 class="form-title" style="color:{{session('second_color')}};padding-left:20px">
                Reserva feita para {{ \Carbon\Carbon::parse($reserve->date)->format('d/m/Y H:i') }} , mesa {{ $reserve->table->number }}, para {{ $reserve->peoples }} pessoas.
            </h3>
        </div>
        @else
        <div class="reservation-form-section" style="background-color: {{ session('primary_color')}}; color: {{ session('second_color')}}">
            <h3 class="form-title" style="color: {{ session('second_color')}}">Dados da Reserva</h3>
            @if(empty($tables))
                <form action="{{ route('search.reserve', session('slug')) }}" method="POST">
            @else
                <form action="{{ route('store.reserve', session('slug')) }}" method="POST">
            @endif
                @csrf
                @if(!empty($tables))
                    <div class="form-group">
                        <label style="color: {{ session('second_color')}};">Nome do Cliente</label>
                        <input type="text" name="name_client" class="input-dark" placeholder="Nome completo" style="background-color: {{ session('second_color')}}; color: {{ session('primary_color')}}; border: 1px solid {{ session('primary_color')}}; padding: 8px; border-radius: 5px; outline: none;"  required>
                    </div>

                    <div class="form-group">
                        <label style="color: {{ session('second_color')}};">Número de Telefone</label>
                        <input type="tel" name="phone_client" class="input-dark" placeholder="(00) 00000-0000" style="background-color: {{ session('second_color')}}; color: {{ session('primary_color')}}; border: 1px solid {{ session('primary_color')}}; padding: 8px; border-radius: 5px; outline: none; required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label style="color: {{ session('second_color')}};">Mesa Selecionada</label>
                            <select name="table_id" id="table_id" class="select-gold" style="background-color: {{ session('second_color')}}; color: {{ session('primary_color')}}; border: 1px solid {{ session('primary_color')}}; padding: 8px; border-radius: 5px; outline: none;" required>
                                <option value="">Selecione...</option>
                                @foreach ($tables as $table )
                                    <option value="{{ $table->id }}">{{ $table->number }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
                    <div class="form-row">
                        <div class="form-group">
                            <label style="color: {{ session('second_color')}};">Pessoas</label>
                            <select name="capacity" class="select-gold" style="background-color: {{ session('second_color')}}; color: {{ session('primary_color')}}; border: 1px solid {{ session('primary_color')}}; padding: 8px; border-radius: 5px; outline: none;" required>
                                <option value="{{ request('capacity') }}">{{ request('capacity') }} Pessoa(s)</option>
                                <option value="1">1 Pessoa</option>
                                <option value="2">2 Pessoas</option>
                                <option value="4">4 Pessoas</option>
                                <option value="6">6 Pessoas</option>
                            </select>
                        </div>
                    </div>
                <div class="form-group">
                    <label style="color: {{ session('second_color')}};">Data e Horário</label>
                    <input type="datetime-local" value="{{ request('date') }}"  name="date" class="input-gold" style="background-color: {{ session('second_color')}}; color: {{ session('primary_color')}}; border: 1px solid {{ session('primary_color')}}; padding: 8px; border-radius: 5px; outline: none;"  required>
                </div>

                <button type="submit" class="btn-checkout" style="background-color: {{ session('second_color')}}; color: {{ session('primary_color')}}">
                    @if(empty($tables))
                        Buscar mesas
                    @else
                        Fazer reserva
                    @endif
                </button>
            </form>
        </div>
        <div class="tables-map-section" style="background-color: {{ session('second_color')}}; color: {{ session('primary_color')}}">
            <h2 class="floor-title" style="color: {{ session('primary_color')}}">Mesas Disponíveis</h2>
            <div class="tables-grid">
                @foreach ($tables as $table )
                    <div class="table-item available">  
                            <div class="table-circle">{{$table->number}}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
@endsection