@extends('layout.panel')

@section('panel_content')
<div class="product-list-container">

    @session('success')
        <span style="color:black">{{ $value }}</span>
    @endsession
    
    <div class="admin-card">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Mesa</th>
                    <th>Nome do cliente</th>
                    <th>Itens</th>
                    <th>Status do Pedido</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order )
                
                <tr>
                    <td>
                        <span class="badge" style="background-color: #1976d2; color: white;">
                            Mesa {{ $order->table->number }}
                        </span>
                    </td>
                    <td><span style="font-weight: 500; color: #333;">{{ $order->name_client }}</span></td>
                    <td>
                        <span style="font-size: 13px; color: #666;">
                            {{ $order->items->map(fn($item) => $item->quantity . 'x '. $item->product->name)->implode(', ') }}
                        </span>
                    </td>
                    <td>
                        <span class="badge {{ $order->status->value === 'entregue' ? 'badge-active' : 'badge-inactive' }}">
                            {{ $order->status->type() }}
                        </span>
                    </td>
                    <td>
                        <span style="color: #888; font-size: 12px; white-space: nowrap;">
                            <i class="far fa-clock"></i> {{ $order->created_at->format('d/m/Y H:i') }}
                        </span>
                    </td>
                    <td class="table-actions">
                        <a href="{{ route('order.edit', $order->id) }}">
                            <button class="btn-edit" title="Editar"><i class="fas fa-edit"></i></button>
                        </a>
                        <a href="{{ route('order.destroy', $order->id) }}" onclick="return confirm('Excluir este pedido permanentemente?')">
                            <button class="btn-delete" title="Excluir"><i class="fas fa-trash"></i></button>
                        </a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection