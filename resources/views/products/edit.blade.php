@extends('layouts.master')

@section('title','Product')

@section('content')

<!-- START OF CONTENT -->
<section class="body">
    <div class="container">
        <div class="form_content">
            <p class="form_title">Update Product</p>
            <form action="/products/{{ $product->id }}" method="POST"  enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <div>
                    <label>Shop:</label>
                    <select name="shop">
                        <option value="">--Shop--</option>
                        @foreach($shops as $shop)
                            @php 
                                if($shop->id == $product->shop_id)  $selected = 'selected';
                                else $selected = '';
                            @endphp
                            <option value="{{ $shop->id }}" {{ $selected }}>{{ $shop->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Name:</label>
                    <input type="text" name="name" value="{{ $product->name }}" placeholder="">
                </div>
                <div>
                    <label>Code:</label>
                    <input type="text" name="code" value="{{ $product->code }}" placeholder="">
                </div>
                <div>
                    <label>Description:</label>
                    <input type="text" name="description" value="{{ $product->description }}" placeholder="">
                </div>
                <div>
                    <label>Cost Price:</label>
                    <input type="text" name="cost_price" value="{{ $product->cost_price }}">
                </div>
                <div>
                    <label>Sale Price:</label>
                    <input type="text" name="sale_price" value="{{ $product->sale_price }}">
                </div>
                <div>
                    <label>Product's photo:</label>
                    <input type="file" name="photo">
                </div>
                @if($shop->logo != "")
                <div>
                    <label></label>
                    <img src="{{ asset('storage/'.$product->photo) }}" class="photo-thumb">
                </div>
                @endif
                <div>
                    <label></label>
                    <button type="submit" name="btnAdd"><i class="fas fa-pencil-alt"></i> Update product</button>
                </div>
            </form>
            <div class="msg-errors">
                <ul>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @endif
                </ul>
            </div>
            <div class="msg-success">
                <p>
                    @if(Session::has('success'))
                        {{ Session::get('success') }}
                    @endif
                </p>
            </div>
        </div>
    </div>
</section>
<!-- END OF CONTENT -->
@endsection