<!DOCTYPE html>
<html lang="en">
    @include('layouts.includes_painel.head')
<body>

    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <form action="{{ route('painel.autentica') }}" method="POST">
                 @csrf

                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="feather icon-unlock auth-icon"></i>
                    </div>
                    <h3 class="mb-4">Login</h3>
                    <div class="input-group mb-3">
                        <input name="email" value="{{ old('email') }}" type="email" class="form-control" placeholder="Email">
                        {{ $errors->has('email') ? $errors->first('email') : '' }}
                    </div>
                    <div class="input-group mb-4">
                        <input name="password" value="{{ old('password') }}" type="password" class="form-control" placeholder="password">
                        {{ $errors->has('password') ? $errors->first('password') : '' }}
                    </div>
                    <div class="form-group text-left">
                        <div class="checkbox checkbox-fill d-inline">
                            <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                            <label for="checkbox-fill-a1" class="cr"> Save Details</label>
                        </div>
                    </div>
                    <button class="btn btn-primary shadow-2 mb-4">Login</button>
                    <p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html">Reset</a></p>
                    <p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html">Signup</a></p>
                </div>
               </form>
               {{ isset($erro) && $erro != '' ? $erro : '' }}
            </div>
        </div>
    </div>
</body>
    <!-- Required Js -->
    @include('layouts.includes_painel.footer')
