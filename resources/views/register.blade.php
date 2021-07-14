@extends('app')

@section('content')

<div class="row">
    <div class="col-md-4 container card box shadow-lg p-5 my-5">
        <form class="form-signin" method="POST" action="{{ route('register') }}">
            @csrf
            <h1 class="h3 mb-2 text-center" style="color: #1f60ad;">Registration Form</h1>
            <div class="form-group">
                <label class="font-weight-light mb-2 mt-3">Name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" placeholder="Must be min. 6 chars" required autofocus>
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-light mb-2 mt-3">Email</label>
                <input type="email" name="email" value="{{ old('email')}}" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="Email address" required>
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-light mb-2 mt-3">Password</label>
                <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" placeholder="Must be min. 8 chars and alphanumeric" required>
               @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-light mb-2 mt-3">Password Confirmation</label>
                <input type="password"  name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : ''}}" placeholder="Must be same as password" required>
                @error('password_confirmation')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button class="btn btn-lg btn-primary btn-block mt-3 no-change" type="submit">Register</button>
            <p class="mt-3 mb-3 text-muted">Already a member? <a href="{{route('login')}}" id="login">Sign in</a></p> 
            <p class="mt-3 mb-3 text-muted">&copy;2015-2016</p>
        </form>
    </div>
</div>
@endsection