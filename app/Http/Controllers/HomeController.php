<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Trend ürünler: views ve sales_count ile örnek
        $featuredProducts = Product::orderByDesc('sales_count')->take(4)->get();
        
        // Öne çıkan kategoriler
        $categories = ['Telefon', 'Laptop', 'Kulaklık', 'Tablet', 'Monitör'];

        return view('home', compact('featuredProducts', 'categories'));
    }

    public function about() {
        return view('about');
    }

    public function contact() {
        return view('contact');
    }
}