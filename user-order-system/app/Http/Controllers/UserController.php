<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        return User::all();
    }

    public function getOrders($userId)
    {

        try{
            //Eager Loading user to order relationships avoiding n+1 query problems
            $user=User::with('orders')->findOrFail($userId);
            return $user->orders;
        } catch(\Exception $e){
           return [];
        }

    }
}
