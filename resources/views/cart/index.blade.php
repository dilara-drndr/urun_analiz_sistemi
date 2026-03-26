<!DOCTYPE html>
<html>
<head>
    <title>Sepetim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Sepetim</h2>

    @if($cart && $cart->items->count())
        @foreach($cart->items as $item)
            <div class="card mb-3 p-3">
                <h5>{{ $item->product->name }}</h5>

                <p>Fiyat: {{ number_format($item->product->price, 2) }} ₺</p>

                <!-- Adet Artır / Azalt -->
                <div class="d-flex align-items-center gap-2 mb-2">

                    <form action="{{ route('cart.decrease', $item->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-outline-danger">-</button>
                    </form>

                    <strong>{{ $item->quantity }}</strong>

                    <form action="{{ route('cart.increase', $item->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-outline-success">+</button>
                    </form>

                </div>

                <!-- Ara Toplam -->
                <p>
                    Ara Toplam:
                    <strong>
                        {{ number_format($item->product->price * $item->quantity, 2) }} ₺
                    </strong>
                </p>

                <!-- Sepetten Sil -->
                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm mt-2">
                        Sepetten Sil
                    </button>
                </form>
            </div>
        @endforeach
        @if(isset($total))
            <div class="card p-3 mt-3">
                <h4>Toplam Tutar: 
                    <span class="text-success">
                        {{ number_format($total, 2) }} ₺
                    </span>
                </h4>
            </div>
        @endif
    @else
        <div class="alert alert-warning">
            Sepetiniz boş.
        </div>
    @endif
    <div class ="mt-4">

        <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">
            Alışverişe Devam Et
        </a>
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <button class="btn btn-success w-100">
                Siparişi Tamamla
            </button>
        </form>
    </div>

</div>

</body>
</html>
