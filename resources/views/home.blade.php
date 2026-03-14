@extends('layout.app')

@section('content')
<div class="home-hero" style="background-color: {{ session('second_color') }}; color: {{ session('primary_color') }}">
    <div class="hero-content">
        <h1 class="restaurant-name" style=" color: {{ session('primary_color') }}">
            <i class="fas fa-utensils"></i> {{ session('name') }}
        </h1>
        
        <div class="hero-actions">
            <a href="{{ session('slug') }}/products" class="btn-main" style=" color: {{ session('primary_color') }}">
                <i class="fas fa-shopping-bag"></i> FAÇA SEU PEDIDO
            </a>
            
            <span class="divider" style=" color: {{ session('primary_color') }}">OU</span>
            
            <a href="{{ session('slug') }}/reserve" class="btn-main" style=" color: {{ session('primary_color') }}">
                <i class="fas fa-calendar-check"></i> FAÇA SUA RESERVA
            </a>
        </div>
    </div>
</div>
@endsection