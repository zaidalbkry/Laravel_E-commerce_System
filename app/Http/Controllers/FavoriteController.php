<?php

namespace App\Http\Controllers;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function favoriteProducts()
{
    $favorites = Favorite::where('user_id', Auth::id())->with('product')->get();
    return view('frontend.my-favorite', compact('favorites'));
}



public function removeFavorite(Request $request)
{
    $request->validate([
        'product_id' => 'required|integer|exists:products,id'
    ]);

    Favorite::where('user_id', Auth::id())->where('product_id', $request->product_id)->delete();

   return redirect()->back()->with('success', 'Product removed from favorites.');

}

}
