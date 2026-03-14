@extends('layout.panel')

@section('panel_content')
<div class="product-list-container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <div class="admin-card">
        <form action="{{ route('search.panel') }}" method="get">
            <label for="date">Data:</label>
            <input type="date" id="date" name="date" @if(empty(request('date'))) value="{{ \Carbon\Carbon::today()->toDateString() }}" @else value="{{request('date')}}" @endif>
            <input type="submit">
        </form>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Número da mesa</th>
                    <th>Nome do cliente</th>
                    <th>Telefone do cliente</th>
                    <th>Pessoas</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $reserves as $reserve )               
                    <tr>
                        <td><span class="badge" style="background-color: #1976d2; color: #fff;">Mesa {{ $reserve->table->number }}</span></td>
                        <td>{{ $reserve->name_client }}</td>
                        <td>{{ $reserve->phone_client }}</td>
                        <td><i class="fas fa-users" style="font-size: 12px; margin-right: 5px; color: #666;"></i>{{ $reserve->peoples }}</td>
                        <td style="font-weight: 500; color: #444;">{{ \Carbon\Carbon::parse($reserve->date)->format('d/m/Y H:i') }}</td>
                        <td class="table-actions">
                            <a href="{{ route('reserve.edit', $reserve->id) }}">
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