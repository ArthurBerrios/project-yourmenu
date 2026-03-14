@extends('layout.panel')

@section('panel_content')
<div class="product-list-container">
    <div class="header-actions">
        <h2>Gerenciar mesas</h2>
        <a href="{{ route('create-table') }}" class="btn-add-main">
            <i class="fas fa-plus"></i> Nova mesa
        </a>
    </div>

    <div class="admin-card">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Ativo</th>
                    <th>Reservada</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $tables as $table )
                    <tr>
                        <td>{{ $table->number }}</td>
                        <td>
                            <span class="badge {{ $table->active ? 'badge-active' : 'badge-inactive' }}">
                                {{ $table->active ? 'Ativo' : 'Inativa' }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $table->reserved ? 'badge-active' : 'badge-inactive' }}">
                                {{ $table->reserved ? 'Sim' : 'Não' }}
                            </span>
                        </td>
                        <td class="table-actions">
                            <a href="{{ route('edit-table', $table->id) }}">
                                <button class="btn-edit"><i class="fas fa-edit"></i></button>
                            </a>
                            <a href="{{ route('delete-table', $table->id) }}">
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