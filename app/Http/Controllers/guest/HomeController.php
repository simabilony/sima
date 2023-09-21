<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $categories =  [
        //     [
        //         'id' => 1,
        //         'name' => "first category",
        //         "description" => "test test test"
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => "second category",
        //         "description" => "test test test"
        //     ],
        //     [
        //         'id' => 3,
        //         'name' => "third category",
        //         "description" => "test test test"
        //     ],
        //     [
        //         'id' => 4,
        //         'name' => "fourth category",
        //         "description" => "test test test"
        //     ],
        // ];

        $categories = Category::all();


        return view('guest.pages.index', [
            'categories' => $categories
        ]);
    }
    public function about()
    {
        return view('guest.pages.about');

    }

}
