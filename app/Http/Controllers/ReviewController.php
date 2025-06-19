<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
   public function store(Request $request)
{

  

  $validatedData = $request->validate([
        'product_id' => 'required|integer|exists:products,id',
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string'
    ]);

       Review::create([
        'user_id' => Auth::id(),
        'product_id' => $validatedData['product_id'],
        'rating' => $validatedData['rating'],
        'comment' => $validatedData['comment']
    ]);

    return response()->json(['success' => true]); // ✅ تأكد من أن الاستجابة تعيد JSON فقط
}


}
