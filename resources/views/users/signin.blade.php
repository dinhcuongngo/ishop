@extends('layouts.master')

@section('title','Signin')

@section('content')

<!-- START OF CONTENT -->
<section class="body">
    <div class="container">
        <div class="form_content">
            <p class="form_title">Signin</p>
            <form action="/signin" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div>
                    <label>Email:</label>
                    <input type="text" name="email" value="{{ old('email') }}">
                </div>
                <div>
                    <label>Password:</label>
                    <input type="password" name="password">
                </div>
                <div>
                    <label></label>
                    <button type="submit" name="btnAdd"><i class="fas fa-sign-in-alt"></i> Signin</button>
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
                @if(Session::has('fail'))
                    <p>{{ Session::get('fail') }}</p>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- END OF CONTENT -->
@endsection