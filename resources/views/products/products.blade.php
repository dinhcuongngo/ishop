@extends('layouts.master')

@section('title','Product')

@section('content')

<!-- START OF CONTENT -->
<section class="body">
    <div class="container">
        <div class="form_content">
            <p class="form_title">Add New Product</p>
            <form action="/products" method="POST"  enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div>
                    <label>Name:</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="">
                </div>
                <div>
                    <label>Code:</label>
                    <input type="text" name="code" value="{{ old('code') }}" placeholder="">
                </div>
                <div>
                    <label>Cost Price:</label>
                    <input type="text" name="cost_price" value="{{ old('cost_price') }}">
                </div>
                <div>
                    <label>Sale Price:</label>
                    <input type="text" name="sale_price" value="{{ old('sale_price') }}">
                </div>
                <div>
                    <label>Product's photo:</label>
                    <input type="file" name="photo">
                </div>
                <div>
                    <label></label>
                    <button type="submit" name="btnAdd"><i class="fas fa-plus-circle"></i> Add new product</button>
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
        <!-- LIST OF USERS -->
            @include('products.list')
        <!-- END -->
    </div>
</section>
<!-- END OF CONTENT -->
@endsection