@extends('layouts.admin')

@section('content')

<h3 class="mb-4">Siparişler</h3>

<div class="card shadow border-0 p-4">

    <table class="table table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Kullanıcı</th>
                <th>Email</th>
                <th>Tutar</th>
                <th>Tarih</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->user->email }}</td>
                    <td>{{ number_format($order->total_price, 2) }} ₺</td>
                    <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        Henüz sipariş yok.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection