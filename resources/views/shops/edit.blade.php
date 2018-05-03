@extends('layouts.master')

@section('title','Shop')

@section('content')

<!-- START OF CONTENT -->
<section class="body">
    <div class="container">
        <div class="form_content">
            <p class="form_title">Update Shop's Profile</p>
            <form action="/shops/{{ $shop->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <div>
                    <label>Name:</label>
                    <input type="text" name="name" value="{{ $shop->name }}" placeholder="">
                </div>
                <div>
                    <label>Description:</label>
                    <input type="text" name="description" value="{{ $shop->description }}">
                </div>
                <div>
                    <label>Shop's logo:</label>
                    <input type="file" name="logo">
                </div>
                @if($shop->logo != "")
                <div>
                    <label></label>
                    <img src="{{ asset('storage/'.$shop->logo) }}" class="photo-thumb">
                </div>
                @endif
                <div>
                    <label></label>
                    <button type="submit" name="btnAdd"><i class="fas fa-pencil-alt"></i> Update shop</button>
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