<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('products')
            ->select('category', DB::raw('count(*) as total'))
            ->groupBy('category')
            ->get();
        return view('categories.index', compact('categories'));
    }
}