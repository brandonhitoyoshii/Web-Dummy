@extends('app')

<!------ Include the above in your HEAD tag ---------->
@section('content')
<div class="row">
    <div class="col-md-3 card container box shadow-lg p-5 my-5">
        <form class="form-signin" method="POST" action="{{ route('login') }}">
            @csrf
            <h1 class="h2 pt-3 mb-5 text-center" style="color: #1f60ad;">Login</h1>
            <div class="form-group">
                <label class="font-weight-lighter mb-2">Email</label>
                <input type="email" name="email" class="form-control mb-3" placeholder="Email" required autofocus>
            </div>
            <div class="form-group">
                <label class="font-weight-lighter mb-2">Password</label>
                <input type="password" name="password"  class="form-control mb-3" placeholder="Password" required>
            </div>
            @error('error')
            <div class="alert alert-danger">
                <strong>
                    {{$message}}
                </strong>
            </div>
            @enderror
            <button class="btn btn-lg btn-primary btn-block mt-3 no-change" type="submit">Sign in</button>
            <p class="mt-3 mb-3 text-muted">Don't have an account? <a href="{{route('register')}}" id="register">Sign up</a></p> 
            <p class="mt-3 mb-3 text-muted">&copy;2015-2016</p>
        </form>
    </div>
</div>
@endsection