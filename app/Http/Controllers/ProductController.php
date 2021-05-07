<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // sa saad kustutada pilte sellega
use App\Models\Cart;
use Auth; // for logout
use Session;
use Image;


class ProductController extends Controller
{


    public function show($id)
    {
        $product = Product::findOrFail($id);
       // $comment = Comment::find($id);
        $comments = Comment::orderBy('id','DESC')->where('product_id', $id)->paginate(10); // ->paginate(5)
        //$comments = \DB::table('comments')->orderBy('id','DESC')->where('product_id', $id)->get();   // no pagination using direct
        //$comments = Comment::orderBy('id','DESC')->where('product_id', $id)->get(); // no pagination using comment model
        //dd($comments);

        return view('products.show', ['product' => $product, 'comments' => $comments]);
    }


    public function products(){
        //$product = Product::all();
        $product = Product::orderBy('created_at', 'desc')->paginate(21);
        //dd($product);
        return view('products', ['products' => $product]);
    }

    public function posts(){
        //$product = Product::all();
        $product = Product::orderBy('created_at', 'desc')->paginate(21);
        return view('posts', ['products' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        request()->validate([                          // siia saab lisada näiteks kui pikk tekst võib olla, või kas formi peab kindlasti andmeid sisestama
            'product_name' => ['required', 'min:2', 'max:50'],
            'product_price' => 'required',
            'product_desc' => ['required', 'min:2', 'max:400'],
            'product_img' => 'image|nullable|max:1999'	// 1999-just under 2MB
        ]);

        // Handle File Upload
        if($request->hasFile('product_img')){
            // Get filename with the extension
            $filenameWithExt = $request->file('product_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('product_img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('product_img')->storeAs('public/uploads', $fileNameToStore);
        }


        $product = new Product();
        $product->product_name = request('product_name');
        $product->product_price = request('product_price');
        $product->product_desc = request('product_desc');
        $user_id = Auth::id();
        $product->user_id = $user_id;

        if($request->hasFile('product_img')){
            $product->product_img = $fileNameToStore;
        }
        $product->save();

           /*thumbnail*/

            $image = $request->file('product_img');    
           // $filename = $image->getClientOriginalName();   // Get filename with the extension
            $filename = $fileNameToStore;
            $image_resize = Image::make($image->getRealPath());
            //$image_resize->resize(300,300); // juhul kui tahad thumbnaili mis on 300x300 px
            $image_resize->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('storage/thumbnails/'.$filename)); // salvestab thumbnaili storage/thumbnails
          


        return redirect('/products');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', ['product' => $product]);
    }

   
    public function update(Request $request, $id)
    {
        request()->validate([                          // siia saab lisada näiteks kui pikk tekst võib olla, või kas formi peab kindlasti teksti sisestama
            'product_name' => ['required', 'min:2', 'max:50'],
            'product_price' => 'required',
            'product_desc' => ['required', 'min:2', 'max:400'],
            'product_img' => 'image|nullable|max:1999'    // 1999-just under 2MB
        ]);

        // Handle File Upload
        if ($request->hasFile('product_img')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('product_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('product_img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('product_img')->storeAs('public/uploads', $fileNameToStore);

        }

        $product = Product::findOrFail($id);
        $product->product_name = request('product_name');
        $product->product_price = request('product_price');
        $product->product_desc = request('product_desc');

        if ($request->hasFile('product_img')) {

            Storage::delete('public/uploads/' . $product->product_img);
            $product->product_img = $fileNameToStore;

        }
        $product->save();

           /*thumbnail*/

           $image = $request->file('product_img');    
           // $filename = $image->getClientOriginalName();   // Get filename with the extension
            $filename = $fileNameToStore;
            $image_resize = Image::make($image->getRealPath());
            //$image_resize->resize(300,300); // juhul kui tahad thumbnaili mis on 300x300 px
            $image_resize->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('storage/thumbnails/'.$filename));

        return redirect('/products');
        //return redirect('/products/' . $product->id);
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Storage::delete('public/uploads/' . $product->product_img);
        Storage::delete('public/thumbnails/' . $product->product_img);
        $product->delete();
        return redirect('/products');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/products');
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        //dd($request->session()->get('cart'));
        return redirect('/products');
        //return redirect()->route('product.index');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('checkout', ['total' => $total]);
    }

}

