<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function totalRevenue()
    {
        //Return total compeleted sales revenue
        $orders = Order::where('status','completed')->sum('total_amount');
        return number_format($orders,2);
    }

    public function generateReport()
    {
        // Retrieve all users along with their successfully sales orders
        $users = User::with('revenueorders')->get();

        // Initialize an empty array to store the report data
        $report = [];

        // Loop through each user
        foreach ($users as $user) {
            // Retrieve all orders for the user
            //With Eager Loading avoiding n+2 loops problems
            $totalRevenue=$user->revenueorders->sum('total_amount');

            $totalOrders = $user->revenueorders->count();
            $avgOrderValue = $totalRevenue==0?1:$totalRevenue / $totalOrders;//Avoiding 0/1 problem issue

             // Add sales data to the report
             $report[] = [
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email,
                'total_revenue' => $totalRevenue,
                'avg_order_value' => $avgOrderValue,
                'total_orders' => $totalOrders,
            ];

            // // Loop through each order
            // foreach ($user->revenueorders as $order) {

            //     // Calculate total revenue, average order value, and total orders for the user





            // }
        }

        return $report;
    }
}
