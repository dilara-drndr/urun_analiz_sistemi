<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (auth()->user()->role !== 'admin') {
                return redirect('/');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $productCount = Product::count();
        $userCount = User::count();
        $lowStock = Product::where('stock', '<', 5)->count();
        $totalRevenue = Order::sum('total_price');

        $monthlyRevenue = Order::selectRaw(
                'MONTH(created_at) as month,
                SUM(total_price) as total')
            
           ->groupByRaw('MONTH(created_at)')
            ->orderByRaw('MONTH(created_at)')
            ->get();

        $topCustomer = User::select(
            'users.id',
            'users.name',
            'users.email',
            DB::raw('SUM(orders.total_price) as total_spent')
        )
        ->join('orders', 'users.id', '=', 'orders.user_id')
        ->groupBy('users.id', 'users.name', 'users.email')
        ->orderByDesc('total_spent')
        ->first();

        return view('admin.dashboard', compact(
            'productCount',
            'userCount',
            'lowStock',
            'totalRevenue',
            'monthlyRevenue',
            'topCustomer'
        ));
    }


}
