@extends('layout.app')

@section('content')
<div class="container checkout-container" style="height: 67.6vh">
    @if(session('success'))
        <h1 class="page-title" style="color: {{ session('primary_color')}}">Pedido realizado!</h1>
    @else
        <h1 class="page-title" style="color: {{ session('primary_color')}}">Finalizar Pedido</h1>
    @endif

    @php
        $cart = session('cart', []);
    @endphp

    <div class="checkout-grid">

        <div class="checkout-summary" style="background-color: {{ session('primary_color')}}; color: {{ session('second_color')}}">
            <h3>Itens Selecionados</h3>
            <div class="checkout-items-list">

                @if(count($cart) > 0)
                    @foreach ( $cart as $id => $details)
                    <div class="checkout-item">
                        <img src="{{ asset('storage/' . $details['image']) }}" alt="Produto" style="width: 2vw; height: 5vh;">
                        <div class="item-info">
                            <h4>{{$details['name']}}</h4>
                            <span style=" color: {{ session('second_color')}}">Quantidade: {{ $details['quantity'] }}</span>
                        </div>
                        <div class="item-price">R$ {{ number_format($details['price'], 2, ',','.') }}</div>
                    </div>
                    @endforeach

                    <div class="checkout-total">
                        <span>Total do Pedido:</span>
                        <strong style=" color: {{ session('second_color')}}">
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cart as $id => $details )
                            @php
                                $valor = $details['price'] * $details['quantity'];
                                $total += $valor;
                            @endphp
                        @endforeach
                        R$ {{ number_format($total, 2, ',','.') }}
                        </strong>
                    </div>

                @else
                    <div class="checkout-item" style="background-color: {{ session('primary_color')}}; color: {{ session('second_color')}}">
                        <div class="item-info">
                        @if(session('success'))
                            @session('success')
                            <h4 style="color: white">Pedido realizado, logo menos estará na sua mesa!</h4>
                             @endsession
                        @elseif(session('order_requested'))
                                <h4 style="color: white">Comanda solicitada</h4>
                        @else
                
                            <h4>Sem produtos no carrinho</h4>
                        @endif
                        
                        @if(session('order_check'))
                            <a href="{{ route('request.check', [session('slug'), session('order_check')]) }}" class="btn-checkout" style="text-align: center; display: block; text-decoration: none;">
                                Solicitar comanda
                            </a>
                        @endif
                        </div>
                    </div>
                @endif
            </div> 
        </div> 

        @if(count($cart) > 0)
            <div class="checkout-form-card" style="background-color: {{ session('second_color')}}; color: {{ session('primary_color')}}">
                <h3>Informações da Mesa</h3>
                <form action="{{ route('store.order',session('slug')) }}" method="POST">
                    @csrf
                    <div class="form-group" style="color: {{ session('primary_color')}}" >
                        <label for="nome" style="color: {{ session('primary_color')}}">Seu Nome</label>
                        <input type="text" id="name" name="name" style="background-color: {{ session('second_color')}}; color: {{ session('primary_color')}}; border: 1px solid {{ session('primary_color')}}; width: 96%; padding: 8px; border-radius: 5px; outline: none;"
                          required>
                    </div>

                    <div class="form-group" style="background-color: {{ session('second_color')}}; color: {{ session('primary_color')}}">
                        <label for="mesa" style="color: {{ session('primary_color')}}">Selecione a Mesa</label>
                        <select id="table" name="table" style="background-color: {{ session('second_color')}}; color: {{ session('primary_color')}}; border: 1px solid {{ session('primary_color')}}; padding: 8px; border-radius: 5px; outline: none;" required>
                            <option value="">Selecione...</option>
                            @foreach ($tables as $table )
                                <option value="{{ $table->id }}">Mesa {{ $table->number }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn-checkout" style="background-color: {{ session('second_color')}}; color: {{ session('primary_color')}}">FAZER PEDIDO</button>
                </form>
            </div>
        @endif

    </div> 
</div>
@endsection