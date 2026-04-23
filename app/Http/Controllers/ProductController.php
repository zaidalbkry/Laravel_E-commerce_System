<?php

namespace App\Http\Controllers;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
    use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('dashbord.products.index', compact('products'));
    }

    public function index2()
    {
        $products = Product::with('category')
            ->orderByDesc('is_important') // ترتيب المنتجات بحيث تكون المنتجات المهمة أولاً
            ->get();

        return view('dashbord.products.indexBestProducts', compact('products'));
    }

public function index3(Request $request)
{
    $query = Product::query();


    $categories = Category::all(); // ✅ جلب جميع الفئات
    $products = $query->paginate(12); // ✅ عرض 12 منتجًا لكل صفحة

    return view('frontend.all-products', compact('products', 'categories'));
}


public function filteredResults(Request $request)
{
    $query = Product::query();

    // ✅ تصفية حسب الفئة فقط إذا تم إدخالها
    if (!empty($request->category)) {
        $query->where('category_id', $request->category);
    }

    // ✅ تصفية حسب السعر بناءً على القيم المدخلة
    if (!empty($request->min_price)) {
        $query->where('price', '>=', $request->min_price);
    }

    if (!empty($request->max_price)) {
        $query->where('price', '<=', $request->max_price);
    }

    // ✅ ترتيب المنتجات إذا تم تحديد خيار الفرز
    if (!empty($request->sort_by)) {
        if ($request->sort_by == 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort_by == 'price_desc') {
            $query->orderBy('price', 'desc');
        } elseif ($request->sort_by == 'newest') {
            $query->orderBy('created_at', 'desc');
        }
    }

    $categories = Category::all(); // ✅ جلب جميع الفئات
    $products = $query->paginate(12); 

    return view('frontend.filtered-products', compact('products', 'categories'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashbord.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'category_id' => 'required|exists:categories,id'
        ]);

        $data = $request->all();


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }
        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    /**
     * Display the specified resource.
     */
public function show($id)
{
    $product = Product::findOrFail($id);
    $favorites = auth()->check() ? Favorite::where('user_id', auth()->id())->pluck('product_id')->toArray() : [];
    $productwithreviews = Product::with('reviews')->find($id);
    // ✅ حساب متوسط التقييمات لهذا المنتج
    $averageRating = $productwithreviews->reviews()->avg('rating') ?? 0;
        // المنتجات المترابطة: نفس التصنيف، بدون تكرار المنتج الحالي
    $relatedProducts = Product::where('category_id', $product->category_id)
                        ->where('id', '!=', $product->id)
                        ->latest()
                        ->take(4)
                        ->get();

 

    return view('frontend.product-details', compact('product', 'favorites', 'averageRating','relatedProducts'));
}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id); // البحث عن المنتج أو عرض خطأ 404 إذا لم يتم العثور عليه
        $categories = Category::all(); // جلب جميع الأصناف لاختيار واحد منها

        return view('dashbord.products.edit', compact('product', 'categories'));
    }

    public function edit2($id)
    {
        $product = Product::findOrFail($id); // البحث عن المنتج أو عرض خطأ 404 إذا لم يتم العثور عليه

        // عكس قيمة is_important
        $product->is_important = !$product->is_important;
        $product->save();

        return redirect()->back()->with('success', 'Product importance updated successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = Product::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }

            // حفظ الصورة الجديدة
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

     public function search(Request $request)
    {
        // ✅ تحقق من أن المستخدم أدخل كلمة للبحث
        $request->validate([
            'query' => 'required|string|min:1'
        ]);

        // ✅ البحث في قاعدة البيانات حسب الاسم أو الوصف
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")
                            ->orWhere('description', 'LIKE', "%{$query}%")
                            ->get();

        return view('frontend.search_results', compact('products'));
    }


public function addFavorite(Request $request)
{
    $request->validate([
        'product_id' => 'required|integer|exists:products,id'
    ]);

    if (!Favorite::where('user_id', Auth::id())->where('product_id', $request->product_id)->exists()) {
        Favorite::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id
        ]);
    }

    return response()->json(['success' => true]);
}
    public function removeFavorite(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id'
        ]);

        Favorite::where('user_id', Auth::id())->where('product_id', $request->product_id)->delete();

        return redirect()->back()->with('success', 'Product removed from favorites.');

    }

    public function favoriteProducts()
    {
        $favorites = Favorite::where('user_id', Auth::id())->with('product')->get();

        return view('frontend.my-favorite', compact('favorites'));
    }


}
