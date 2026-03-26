<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller 
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);

       

        //$this->middleware(function ($request, $next) {
            #if (auth()->user()->role !== 'admin') 
            //if(!auth()->check() || auth()->user()->role !=='admin'){
                //abort(403, 'Yetkisiz işlem.');
            //}
            //return $next($request);
        //})->only(['create','store','edit','update','destroy']);
    }
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->category) {
            $query->where('category', $request->category);
        }

        if ($request->search) 
        {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->min_price) 
        {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->max_price) 
        {
            $query->where('price', '<=', $request->max_price);
        }
        if ($request->sort == 'sales') {
            $query->orderByDesc('sales_count');
        } elseif ($request->sort == 'views') {
            $query->orderByDesc('views');
        } else {
            $query->latest();
        }
        $trendProducts = Product::select('*')
            ->selectRaw('(sales_count * 2 + views) as trend_score')
            ->orderByDesc('trend_score')
            ->take(4)
            ->get();



        $products = $query->latest()->get();

        $categories = Product::select('category')
            ->selectRaw('count(*) as total')
            ->groupBy('category')
            ->get();
            

        return view('products.index', compact('products', 'categories','trendProducts'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
        

        $product=Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            //'image' => $imagePath,
            'specs' => $request->specs ? json_encode($request->specs) : null,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $product->images()->create(['image_path' => $path]);
            }
        }


        return redirect('/products');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('success', 'Ürün silindi.');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'images' => 'nullable|array|max:10',       
            'images.*' =>'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $specsRaw = $request->specs ?? [];
        $specs = array_filter($specsRaw, fn($v) => $v !== '' && $v !== null);

        $product->update([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'specs' => !empty($specs) ? json_encode($specs) : null,
        ]);
        //$product->update($request->only(['name','category','price','stock','description']));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('products', 'public');
                $product->images()->create([
                    #'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }
        return redirect('/products')->with('success', 'Güncellendi.');
    }
  
    public function show($id)
    {
        $product = Product::with('images')->findOrFail($id);

        $product->increment('views'); // 👀 görüntülenme arttır

        return view('products.show', compact('product'));
    }
    public function deleteImage($id)
    {
        $image = ProductImage::findOrFail($id);

        Storage::disk('public')->delete($image->image_path);

        $image->delete();

        return back();
    }


}


