@extends('layout.panel')

@section('panel_content')
<div class="product-list-container">
    <div class="header-actions">
        <h2>Comandas</h2>
    </div>

    <div class="admin-card">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Número de mesa</th>
                    <th>Status</th>
                    <th>Valor total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $checks as $check )
                    <tr>
                        <td>
                            <span class="badge" style="background-color: #1976d2; color: white;">
                                Mesa {{ $check->orders->first()->table->number}}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $check->requested ? 'badge-active' : 'badge-inactive' }}">
                                {{ $check->requested ? 'Solicitada' : 'Não solicitada' }}
                            </span>
                        </td>
                        <td>
                            <span class="badge" style="background-color: #f8f9fa; color: #333; border: 1px solid #ddd;">
                                {{ 'R$ ' . number_format($check->orders->sum('price'), 2, ',', '.') }}
                            </span>
                        </td>
                        <td class="table-actions">
                            <a href="{{ route('check.edit', $check->id) }}">
                                <button class="btn-edit"><i class="fas fa-edit"></i></button>
                            </a>
                        </td>
                    </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection