@extends('layouts.layout')

@section('title')
    Đăng ký
@endsection

@section('content')
<div class="container form-login" id="container">
    <div class="form-container sign-in-container">
        <form action="" method="POST">
            <h1>Tạo Tài Khoản</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>hoặc sử dụng email của bạn để đăng ký</span>
            <input type="text" name="username" placeholder="Họ tên" />
            <input type="email" name="email" placeholder="Email" />
            <input type="password" name="password" placeholder="Mật khẩu" />
            <button type="submit">Đăng Ký</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-right">
                <h1>Chào Mừng <br> Trở Lại!</h1>
                <p>Để giữ kết nối với chúng tôi, vui lòng đăng nhập với thông tin cá nhân của bạn</p>
                {{-- <button class="ghost" id="signIn">Sign In</button> --}}
                <button class="ghost">
                    <a href="{{ APP_URL . 'login' }}" style="color: #fff">Đăng Nhập</a>
                </button>
            </div>
            
        </div>
    </div>
</div>

@endsection