<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function show()
    {
        return view("pages.orders.show");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "phone" => "required",
            "email" => "required|email",
            "order_info" => "required",
        ]);

        $messageToSave = "От {$data["name"]}\n";
        $messageToSave .= "Телефон: {$data["phone"]}\n";
        $messageToSave .= "Email: {$data["email"]}\n";
        $messageToSave .= "Заказ: \n {$data["order_info"]}\n\n";
        Storage::disk("local")->append("orders.txt", $messageToSave);
        return response()->json(["status" => true], 201);
    }
}
