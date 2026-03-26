<x-app-layout>

<div class="py-10">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<h2 class="text-3xl font-bold text-center mb-6">
Ürün Listesi
</h2>

<div class="flex justify-center gap-2 mb-6 flex-wrap">

<a href="{{ route('products.index') }}"
class="px-4 py-2 rounded {{ request('category') ? 'bg-gray-200' : 'bg-black text-white' }}">
Tüm Ürünler
</a>

@foreach($categories as $cat)

<a href="{{ route('products.index', ['category' => $cat->category]) }}"
class="px-4 py-2 rounded border
{{ request('category') == $cat->category ? 'bg-blue-600 text-white' : 'bg-white' }}">
{{ $cat->category }} ({{$cat->total}})
</a>

@endforeach

</div>

<form method="GET" action="{{ route('products.index') }}" class="mb-6">

<select name="sort" onchange="this.form.submit()"
class="border rounded px-3 py-2">

<option value="">Varsayılan Sıralama</option>

<option value="sales"
{{ request('sort') == 'sales' ? 'selected' : '' }}>
🔥 En Çok Satanlar
</option>

<option value="views"
{{ request('sort') == 'views' ? 'selected' : '' }}>
⭐ En Çok Görüntülenenler
</option>

</select>

</form>

<form method="GET"
action="{{ route('products.index') }}"
class="grid md:grid-cols-4 gap-3 mb-6">

<input
type="text"
name="search"
value="{{ request('search') }}"
class="border rounded px-3 py-2"
placeholder="Ürün ara...">

<input
type="number"
name="min_price"
value="{{ request('min_price') }}"
class="border rounded px-3 py-2"
placeholder="Min Fiyat">

<input
type="number"
name="max_price"
value="{{ request('max_price') }}"
class="border rounded px-3 py-2"
placeholder="Max Fiyat">

<button class="bg-black text-white rounded px-4 py-2">
Filtrele
</button>

</form>

<a href="{{ route('products.index') }}"
class="text-sm text-gray-500 underline">
Filtreleri Temizle
</a>

@auth
@if(auth()->user()->role=='admin')

<div class="text-right mb-4">

<a href="{{ route('products.create') }}"
class="bg-green-600 text-white px-4 py-2 rounded">
+ Yeni Ürün Ekle
</a>

</div>

@endif
@endauth


<div class="grid md:grid-cols-3 gap-6 mt-6">

@forelse($products as $product)

<div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4">

@if($product->images && $product->images->count() > 0)
    <div class="relative w-full h-[200px] mb-2 overflow-hidden rounded" id="carousel-{{ $product->id }}">
        @foreach($product->images as $key => $image)
            <img src="{{ asset('storage/' . $image->image_path) }}"
                class="carousel-img-{{ $product->id }} w-full h-[200px] object-cover rounded absolute top-0 left-0 transition-opacity duration-300"
                style="{{ $key == 0 ? 'opacity:1;' : 'opacity:0;' }}">
        @endforeach

        @if($product->images->count() > 1)
            <button onclick="changeSlide({{ $product->id }}, -1)"
                class="absolute left-1 top-1/2 -translate-y-1/2 bg-black bg-opacity-40 text-white rounded-full w-7 h-7 text-sm">‹</button>
            <button onclick="changeSlide({{ $product->id }}, 1)"
                class="absolute right-1 top-1/2 -translate-y-1/2 bg-black bg-opacity-40 text-white rounded-full w-7 h-7 text-sm">›</button>
        @endif
    </div>
@endif

<h3 class="text-lg font-bold text-blue-600">
{{ $product->name }}
</h3>

<p class="text-sm mt-1">
<b>Kategori:</b> {{ $product->category }}
</p>

<p class="text-sm mt-1">
<b>Fiyat:</b>
<span class="text-green-600 font-bold">
{{ number_format($product->price,2) }} ₺
</span>
</p>

<p class="text-sm mt-1 mb-3">
<b>Stok:</b>
<span class="bg-gray-200 px-2 py-1 rounded text-xs">
{{ $product->stock }}
</span>
</p>

<a
href="{{ route('products.show',$product->id) }}"
class="block text-center border rounded py-2 mb-2">
Detay Gör
</a>

@auth
    @if(auth()->user()->role !== 'admin')

        <form action="{{ route('cart.add',$product->id) }}" method="POST">
            @csrf
            <button class="w-full bg-blue-600 text-white rounded py-2">
                Sepete Ekle
            </button>

        </form>
    @endif
@else
    <a href="{{ route('login') }}"
        class="block text-center border border-blue-600 text-blue-600 rounded py-2">
        Sepete eklemek için giriş yap
    </a>

@endauth


@auth

@if(auth()->user()->role === 'admin')

<a
href="{{ route('products.edit',$product->id) }}"
class="block text-center bg-gray-700 text-white rounded py-2 mt-2">
Güncelle
</a>

<form
action="{{ route('products.destroy',$product->id) }}"
method="POST"
onsubmit="return confirm('Silmek istediğine emin misin?')">

@csrf
@method('DELETE')

<button class="w-full bg-red-600 text-white rounded py-2 mt-2">
Sil
</button>

</form>

@endif

@endauth

</div>

@empty

<div class="col-span-3 text-center">

<p class="bg-yellow-200 p-4 rounded">
Henüz ürün yok.
</p>

</div>

@endforelse

</div>

</div>
</div>
<script>
    let currentSlide = {};
    function changeSlide(id, dir) {
        let imgs = document.querySelectorAll('.carousel-img-' + id);
        if (!currentSlide[id]) currentSlide[id] = 0;
        imgs[currentSlide[id]].style.opacity = 0;
        currentSlide[id] = (currentSlide[id] + dir + imgs.length) % imgs.length;
        imgs[currentSlide[id]].style.opacity = 1;
    }
</script>

</x-app-layout>

