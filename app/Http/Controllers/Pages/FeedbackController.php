<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeedbackController extends Controller
{
    public function show()
    {
        return view("pages.feedback.show");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "message" => "required"
        ]);
        $messageToSave = "От {$data["name"]}\n";
        $messageToSave .= "Сообщение:\n";
        $messageToSave .= "{$data["message"]}\n\n";
        Storage::disk("local")->append("feedbacks.txt", $messageToSave);
        return response()->json(["status" => true], 201);
    }
}
