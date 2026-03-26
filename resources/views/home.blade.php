
<x-app-layout>

<div class="max-w-7xl mx-auto px-6 py-8">

<!-- HERO BANNER -->
<section class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl p-10 flex items-center justify-between mb-12">

<div>
<h1 class="text-4xl font-bold mb-4">
Teknoloji Ürünlerini Keşfet
</h1>

<p class="mb-6 text-lg">
Telefon, laptop ve aksesuarların en yeni modelleri burada
</p>

<a href="{{ route('products.index') }}"
class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold shadow hover:bg-gray-100">
Ürünleri Gör
</a>
</div>
<img src="{{ asset('storage/product/site_resim.png') }}" 
     class="w-[350px] md:w-[400px] object-contain">
</section>     


<!-- KATEGORİLER -->

<section class="mb-16">

<h2 class="text-2xl font-bold text-gray-800 mb-6">
Kategoriler
</h2>

<div class="grid grid-cols-2 md:grid-cols-5 gap-6">

@foreach($categories as $cat)

<a href="{{ route('products.index',['category'=>$cat]) }}"
class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-xl transition">

<div class="text-4xl mb-2">
📱
</div>

<p class="font-semibold text-gray-800">
{{ $cat }}
</p>

</a>

@endforeach

</div>

</section>



<!-- TREND ÜRÜNLER -->

<section class="mb-16">

<h2 class="text-2xl font-bold text-gray-800 mb-6">
🔥 Trend Ürünler
</h2>

<div class="grid grid-cols-1 md:grid-cols-4 gap-8">

@foreach($featuredProducts as $product)

<div class="bg-white rounded-xl shadow-md hover:shadow-xl transition p-5">

@if($product->image)
<img src="{{ asset('storage/'.$product->image) }}"
class="h-40 w-full object-cover rounded-lg mb-4">
@endif

<h3 class="font-bold text-lg text-gray-900">
{{ $product->name }}
</h3>

<p class="text-gray-500 text-sm mb-2">
{{ $product->category }}
</p>

<p class="text-xl font-bold text-blue-600 mb-4">
₺{{ number_format($product->price,2) }}
</p>

<a href="{{ route('products.show',$product->id) }}"
class="block text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
Detay Gör
</a>

</div>

@endforeach

</div>

</section>



<!-- AVANTAJLAR -->

<section class="mb-16">

<div class="grid md:grid-cols-3 gap-6 text-center">

<div class="bg-white p-6 rounded-xl shadow">

<div class="text-3xl mb-2">
🚚
</div>

<h3 class="font-bold text-gray-800">
Ücretsiz Kargo
</h3>

<p class="text-gray-500 text-sm">
1000₺ üzeri alışverişlerde
</p>

</div>



<div class="bg-white p-6 rounded-xl shadow">

<div class="text-3xl mb-2">
🔒
</div>

<h3 class="font-bold text-gray-800">
Güvenli Ödeme
</h3>

<p class="text-gray-500 text-sm">
SSL ile güvenli ödeme
</p>

</div>



<div class="bg-white p-6 rounded-xl shadow">

<div class="text-3xl mb-2">
⭐
</div>

<h3 class="font-bold text-gray-800">
Kaliteli Ürünler
</h3>

<p class="text-gray-500 text-sm">
En iyi teknoloji markaları
</p>

</div>

</div>

</section>



<!-- FOOTER -->

<footer class="text-center text-gray-500 text-sm border-t pt-6">

<p>
© {{ date('Y') }} Teknoloji Mağazası
</p>

</footer>

</div>

</x-app-layout>