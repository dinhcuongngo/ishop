@extends('layouts.master')

@section('title','Welcome')

@section('content')

<!-- START OF CONTENT -->
<section class="body">
    <div class="container">
        <div class="form_content">
            <p class="form_title">Add New User</p>
            <form action="/signup" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div>
                    <label>Name:</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="">
                </div>
                <div>
                    <label>Email:</label>
                    <input type="text" name="email" value="{{ old('email') }}">
                </div>
                <div>
                    <label>Password:</label>
                    <input type="password" name="password">
                </div>
                <div>
                    <label>Confirm password:</label>
                    <input type="password" name="password_confirmation">
                </div>
                <div>
                    <label>Profile's photo:</label>
                    <input type="file" name="photo">
                </div>
                <div>
                    <label></label>
                    <button type="submit" name="btnAdd"><i class="fas fa-user-plus"></i> Add new user</button>
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
            @include('users.list')
        <!-- END -->
    </div>
</section>
<!-- END OF CONTENT -->
@endsection