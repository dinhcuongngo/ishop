<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Product;
use App\Respositories\ProductRepository;
use App\Respositories\ShopRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $productRepository, $shopRepository;

    public function __construct(ProductRepository $productRepository,  ShopRepository $shopRepository)
    {
        $this->middleware('auth');
        $this->productRepository    = $productRepository;
        $this->shopRepository       = $shopRepository;
    }

    public function index()
    {
        //
        $shops      = $this->shopRepository->listActiveShopByOwner();
        $products   = $this->productRepository->listAllProducts();

        return view('products.products',['products'=>$products,'shops'=>$shops]);
    }


    public function store(Request $request)
    {
        //
        $rules  = [
            'shop' => 'required',
            'name' => 'required',
            'code' => 'required',
            'description' => 'required',
            'cost_price' => 'required',
            'sale_price' => 'required',
        ];
        $msg    = [
            'shop.required' => 'The shop is requried.',
            'name.required' => 'The name is requried.',
            'code.required' => 'The code is requried.',
            'description.required' => 'The description is requried.',
            'cost_price.required' => 'The cost price is requried.',
            'sale_price.required' => 'The sale price is requried.',
        ];

        $this->validate($request,$rules,$msg);

        $data = $request->all();

        if(!$request->has('shop'))
        {
            return back()->withErrors('Please select a shop for product.');
        }
        
        if($request->has('photo'))
        {
            $data['photo'] = $request->file('photo')->store('images');
        }

        $data['shop_id']    = $request->shop;
        $data['status']     = Product::AVAILABLE_PRODUCT;

        Product::create($data);

        return back()->with('success','Successfully added new product.');
    }


    public function show(Product $product)
    {
        $shops      = $this->shopRepository->listActiveShopByOwner();
        return view('products.edit',['product'=>$product,'shops'=>$shops]);
    }


    public function update(Request $request, Product $product)
    {
        ////
        $product->fill($request->only([
            'shop',
            'name',
            'code',
            'description',
            'cost_price',
            'sale_price',
        ]));
        if(!$request->has('shop'))
        {
            return back()->withErrors('Please select a shop for product.');
        }
        if($request->has('photo'))
        {
            Storage::delete($product->photo);
            $product->photo = $request->file('photo')->store('images');
        }
        if($product->isClean())
        {
            return back()->withErrors('You need to specify the differen value for update.');
        }

        $product->save();

        return back()->with('success','Successfully updated.');
    }

    public function setStatus($id,$status)
    {
        $product = $this->productRepository->listProductByID($id);

        $product->status = $status;

        $product->save();

        return back();
    }

    public function destroy(Product $product)
    {
        //
        $product->delete();

        return back();
    }
}
