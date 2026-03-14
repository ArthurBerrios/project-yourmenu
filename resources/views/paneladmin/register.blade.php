@extends('layout.admin')

@section('admin_content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <i class="fas fa-utensils logo-icon"></i>
            <h2>Cadastre seu Restaurante</h2>
            <p>Comece a gerenciar seu cardápio e reservas hoje mesmo.</p>
        </div>

        @if(session()->has('success'))
               <span style="color:black">{{ session()->get('success') }}</span> 
        @endif
        @error('error')
            <span>{{ $message }}</span>
        @enderror
        <form action="{{ route('store.user') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name"><i class="fas fa-store"></i> Nome do Restaurante</label>
                <input type="text" id="name" name="name" class="input-dark" placeholder="Nome restaurante"  autofocus>
            </div>

            <div class="form-group">
                <label for="name"><i class="fas fa-store"></i> Slug da url</label>
                <input type="text" id="slug" name="slug" class="input-dark" placeholder="meu-restaurante"  autofocus>
            </div>

            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> E-mail Administrativo</label>
                <input type="text" id="email" name="email" class="input-dark" placeholder="admin@restaurante.com" >
            </div>

            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Senha</label>
                <input type="text" id="password" name="password" class="input-dark" placeholder="Mínimo 6 caracteres">
            </div>

            <button type="submit" class="btn-finish">CRIAR CONTA</button>
        </form>
    </div>
</div>
@endsection