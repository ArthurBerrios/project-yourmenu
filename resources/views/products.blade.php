@extends('layout.app') 

@section('content')
<section class="menu-section" style="background-color: {{ session('second_color') }}; min-height: 100vh; padding-bottom: 50px;">
    <div class="container" id="products">
        <div class="product-grid">
            @foreach ( $products as $product )
                <div class="product-card" style="background-color: {{ session('primary_color') }}; border-color: {{ session('second_color') }}22;">
                    <div class="image-container">
                        <img src="{{ asset('storage/'. $product->image) }}" alt="{{ $product->name }}">
                    </div>
                    <div class="card-body">
                        <h3 style="color: {{ session('second_color') }}">{{ $product->name }}</h3>
                        <p style="color: {{ session('second_color') }}; opacity: 0.9;">{{ $product->description }}</p>
                        
                        <div class="card-footer-item">
                            <span class="price" style="color: {{ session('second_color') }}">
                                R$ {{ number_format($product->price, 2, ',','.') }}
                            </span>
                            
                            <form action="{{ route('add_cart', [session('slug'), $product->id]) }}" method="POST">
                                @csrf
                                <button class="btn-add-cart" style="background-color: {{ session('second_color') }}; color: {{ session('primary_color') }}">
                                    <i class="fas fa-plus"></i> Adicionar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
             @endforeach
        </div>
    </div>
</section>
@endsection