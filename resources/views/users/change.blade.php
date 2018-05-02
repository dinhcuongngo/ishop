@extends('layouts.master')

@section('title','Users')

@section('content')
<!-- START OF CONTENT -->
<section class="body">
    <div class="container">
        <div class="form_content">
            <p class="form_title">Change User's password</p>
            <form action="/users/{{ $id }}/change" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <div>
                    <label>Current Password:</label>
                    <input type="password" name="current_password">
                </div>
                <div>
                    <label>New Password:</label>
                    <input type="password" name="password">
                </div>
                <div>
                    <label>Confirm password:</label>
                    <input type="password" name="password_confirmation">
                </div>
                <div>
                    <label></label>
                    <button type="submit" name="btnAdd"><i class="fas fa-key"></i> Change password</button>
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