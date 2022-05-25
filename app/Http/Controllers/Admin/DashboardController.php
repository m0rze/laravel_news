<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function show(): View|Factory|Application
    {

        return view("admin.dashboard.show", [
            "catsCount" => DB::table("categories")->count(),
            "newsCount" => DB::table("news")->count()
        ]);
    }
}
