<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Respositories\ShopRepository;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    protected $shopRepository;

    public function __construct(ShopRepository $shopRepository)
    {
        $this->middleware('auth');
        $this->shopRepository = $shopRepository;
    }
    public function index()
    {
        //
        $shops = $this->shopRepository->listAllShop();

        return view('shops.shops',['shops'=>$shops]);
    }

    public function store(Request $request)
    {
        //
        $rules  = [
            'name' => 'required', 
            'description' => 'required', 
            'logo' => 'required',
        ];
        $msg    = [
            'name.required' => 'The name is required.',
            'description.required' => 'The description is required.',
            'logo.required' => 'The logo is required.', 
        ]; 

        $this->validate($request, $rules, $msg);

        $shop = $request->all();

        if($request->has('logo'))
        {
            $shop['logo'] = $request->file('logo')->store('images');
        }
        $shop['user_id'] = Auth::user()->id;
        Shop::create($shop);

        return back()->with('success','Successfully added.');
    }   

    public function show(Shop $shop)
    {
        //
    }

    public function update(Request $request, Shop $shop)
    {
        //
    }

    public function destroy(Shop $shop)
    {
        //
    }
}
