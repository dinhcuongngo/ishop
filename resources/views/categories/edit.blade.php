@extends('layouts.master')

@section('title','Category')

@section('content')

<!-- START OF CONTENT -->
<section class="body">
    <div class="container">
        <div class="form_content">
            <p class="form_title">Update Category</p>
            <form action="/categories/{{ $category->id }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <div>
                    <label>Name:</label>
                    <input type="text" name="name" value="{{ $category->name }}" placeholder="">
                </div>
                <div>
                    <label>Description:</label>
                    <input type="text" name="description" value="{{ $category->description }}">
                </div>
                <div>
                    <label></label>
                    <button type="submit" name="btnAdd"><i class="fas fa-pencil-alt"></i> Update</button>
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