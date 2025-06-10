<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\Testimonial;
use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        return view('owner.index', [
            'productCount' => Product::count(),
            'orderCount' => Order::count(),
            'testimonialCount' => Testimonial::count(),
            'newsCount' => News::count(),
        ]);
    }
}
