<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        if (view()->exists($id)) {
            return view($id);
        } else {
            return view('404');
        }
    }
}
