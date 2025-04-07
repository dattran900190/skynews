@extends('layouts.layout')

@section('title')
    Đăng nhập
@endsection

@section('content')
    <div class="container form-login" id="container">
        <div class="form-container sign-in-container">
            <form action="" method="POST">
                <h1>Đăng Nhập</h1>
                @isset($errors)
                    <div class="alert alert-danger mb-3">
                        {{ $errors['message'] }}
                    </div>
                @endisset
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>hoặc sử dụng tài khoản của bạn</span>
                <input type="text" name="username" placeholder="Tên đăng nhập" />
                <input type="password" name="password" placeholder="Mật khẩu" />
                <a href="#">Quên mật khẩu của bạn?</a>
                <button type="submit">Đăng Nhập</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Chào Bạn!</h1>
                    <p>Nhập chi tiết cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
                    {{-- <button class="ghost" id="signUp">Sign Up</button> --}}
                    <button class="ghost">
                        <a href="{{ APP_URL . 'register' }}" style="color: #fff">Đăng Ký</a>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script> --}}
@endsection
