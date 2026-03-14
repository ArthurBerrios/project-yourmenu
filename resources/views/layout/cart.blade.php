
 
<button class="cart-floating-btn" onclick="toggleCart()" style="background-color: {{ session('primary_color')}};color: {{ session('second_color') }}">
    <span class="cart-count" style="background-color: {{ session('second_color')}};color: {{ session('primary_color') }}">
    @php $cart = session('cart', []); @endphp
    @php
        $quant = 0;
    @endphp
    @if (count($cart) > 0) 
    @foreach (session('cart') as $id => $details )
        @php
            $quant += $details['quantity'];
        @endphp
    @endforeach
    @endif
        {{$quant}}
    </span>
    🛒
</button>

<div id="cart-sidebar" class="cart-sidebar" style="background-color: {{ session('primary_color')}};color: {{ session('second_color') }}">
    <div class="cart-header">
        <h2>Seu Carrinho</h2>
        <button class="close-cart" onclick="toggleCart()">&times;</button>
    </div>

@if(count($cart) > 0)
    @foreach ($cart as $id => $details )
        <div class="cart-items">
            <p>{{ $details['name'] }} - R$ {{ number_format($details['price'], 2, ',','.') }} - {{ $details['quantity'] }} itens</p>
        </div>
@endforeach
@else
        <div class="cart-items">
            <p>Carrinho vazio</p>
        </div>

        @if(session('order_requested'))
            <div class="cart-items">
                <p>Comanda solicitada</p>
            </div>
        @endif
@endif
        <div class="cart-footer" style="background-color: {{ session('primary_color')}};color: {{ session('second_color') }}">
            <div class="total">Total: <span>
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
        </span></div>
        @if(!empty($cart))
            <a href="{{ route('create.order', session('slug')) }}" class="btn-checkout" style="background-color: {{ session('second_color')}};color: {{ session('primary_color') }}">
                Finalizar pedido
            </a>
        @endif
        </div>
</div>

<div id="cart-overlay" class="cart-overlay" onclick="toggleCart()"></div>

<script>
    function toggleCart() {
        document.getElementById('cart-sidebar').classList.toggle('active');
        document.getElementById('cart-overlay').classList.toggle('active');
    }
</script>
