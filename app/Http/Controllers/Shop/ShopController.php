<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Respositories\ShopRepository;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    // protected $shopRepository;

    public function __construct(ShopRepository $shopRepository)
    {
        $this->middleware('auth');
        $this->shopRepository = $shopRepository;
    }
    public function index(Request $request)
    {
        // $data = $shop->select('shops.*', 'users.email')->join('users', 'users.id', '=', 'shops.user_id')->get();

        // foreach ($data as $key => $shop) {
        //     // echo $shop->user;
        // }
        // // dd($data);
        //

        if(Auth::user()->admin == 'true')
        {
            $shops = $this->shopRepository->searchShop($request->name, $request->status);
        }
        else
        {
            $shops = $this->shopRepository->listShopByOwner();
        }

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
            $shop['logo']   = $request->file('logo')->store('images');
        }

        $shop['user_id']    = Auth::user()->id;
        $shop['status']     = Shop::INACTIVE_SHOP;     
        
        Shop::create($shop);

        return back()->with('success','Successfully added.');
    }   

    public function show(Shop $shop)
    {
        //
        return view('shops.edit',['shop'=>$shop]);
    }

    public function update(Request $request, Shop $shop)
    {
        //
        if($request->has('logo'))
        {
            Storage::delete($shop->logo);
        }

        $shop->fill($request->only([
            'name', 
            'description',
            'logo',
        ]));

        if($shop->isClean())
        {
            return back()->withErrors('You need to specify the different value for update.');
        }

        
        $shop->logo = $request->file('logo')->store('images');

        $shop->save();

        return back()->with('success','Successfully updated.');
    }

    public function setStatus($id, $status)
    {
        $shop = $this->shopRepository->findShopById($id);

        $shop->status = $status;

        $shop->save();

        return back();
    }

    public function destroy(Shop $shop)
    {
        //
    }
}
