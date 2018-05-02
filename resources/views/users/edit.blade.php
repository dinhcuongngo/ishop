@extends('layouts.master')

@section('title','Welcome')

@section('content')
<!-- START OF CONTENT -->
<section class="body">
    <div class="container">
        <div class="form_content">
            <p class="form_title">Update User</p>
            <form action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <div>
                    <label>Name:</label>
                    <input type="text" name="name" value="{{ $user->name }}" placeholder="">
                </div>
                <div>
                    <label>Email:</label>
                    <input type="text" name="email" value="{{ $user->email }}">
                </div>
                <div>
                    <label>Profile's photo:</label>
                    <input type="file" name="photo">
                </div>
                @if($user->photo != "")
                <div>
                    <label></label>
                    <img src="{{ asset('storage/'.$user->photo) }}" class="photo-thumb">
                </div>
                @endif
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