<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkUserType:admin');
    }

    public function dashboard()
    {
        $total_users = User::count();
        $total_sellers = User::where('user_type', 'seller')->count();
        $total_buyers = User::where('user_type', 'buyer')->count();
        $total_stores = Store::count();
        $today_orders = Order::whereDate('created_at', Carbon::today())->count();
        $today_revenue = Order::withTrashed()->whereDate('deleted_at', Carbon::today())->where('status', 'completed')->sum('total_price');
        $today_completed_orders = Order::withTrashed()->whereDate('deleted_at', Carbon::today())->where('status', 'completed')->count();
        // dd($today_revenue);
        return view('admin.dashboard', [
            'total_users' => $total_users,
            'total_sellers' => $total_sellers,
            'total_buyers' => $total_buyers,
            'total_stores' => $total_stores,
            'today_orders' => $today_orders,
            'today_revenue' => $today_revenue,
            'today_completed_orders' => $today_completed_orders
        ]);
    }

    public function sellers()
    {
        $sellers = User::where('user_type', 'seller')->orderBy('id', 'desc')->paginate(10);
        return view('admin.sellers', ['sellers' => $sellers]);
    }

    public function destroyUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('status', 'User deleted successfully');
    }

    public function buyers()
    {
        $buyers = User::where('user_type', 'buyer')->orderBy('id', 'desc')->paginate(10);
        return view('admin.buyers', ['buyers' => $buyers]);
    }

    public function orders()
    {
        $orders = Order::withTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('admin.orders', ['orders' => $orders]);
    }

    public function products()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('admin.products')->with('products', $products);
    }

    public function destroyProduct($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('status', 'Product deleted successfully');
    }

    public function stores()
    {
        $stores = Store::orderBy('id', 'desc')->paginate(10);
        return view('admin.stores', ['stores' => $stores]);
    }
}
