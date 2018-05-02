@extends('layouts.master')

@section('title','Shop')

@section('content')

<!-- START OF CONTENT -->
<section class="body">
    <div class="container">
        <div class="form_content">
            <p class="form_title">Add New Shop</p>
            <form action="/shops" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div>
                    <label>Name:</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="">
                </div>
                <div>
                    <label>Description:</label>
                    <input type="text" name="description" value="{{ old('description') }}">
                </div>
                <div>
                    <label>Shop's logo:</label>
                    <input type="file" name="logo">
                </div>
                <div>
                    <label></label>
                    <button type="submit" name="btnAdd"><i class="fas fa-plus-circle"></i> Add new shop</button>
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
            @include('shops.list')
        <!-- END -->
    </div>
</section>
<!-- END OF CONTENT -->
@endsection