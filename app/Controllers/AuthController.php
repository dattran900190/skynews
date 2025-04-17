<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\User;

class AuthController
{
    public function login()
    {
        $categories = Category::all();

        return view('auth.login', compact('categories'));
    }
    public function postLogin()
    {
        $data = $_POST;
        // dd($data);
        if (trim($data['username']) == "") {
            $errors['message'] = "Username hoặc password phải nhập";
        }
        if (trim($data['password']) == "") {
            $errors['message'] = "Username hoặc password phải nhập";
        }

        // if (isset($errors)) {
        //     return view('auth.login', compact('data', 'errors'));
        // }

        $user = User::where('username', '=', $data['username'])->first();

        if (!$user || !password_verify($data['password'], $user->password)) {
            $errors['message'] = "Lỗi username hoặc password không chính xác";
        } elseif ($user->status != 1) {
            $errors['message'] = "Tài khoản của bạn bị cấm";
        } else {
            // Đăng nhập thành công
            $_SESSION['user'] = $user;

            if ($user->role == 'admin') {
                return redirect('admin');
            } else {
                return redirect('');
            }
        }


        if (isset($errors)) {
            return view('auth.login', compact('data', 'errors'));
        }
    }
    public function register()
    {
        $categories = Category::all();

        return view('auth.register', compact('categories'));
    }
    public function store()
    {
        $data = $_POST;
        // Mã hoá mật khẩu
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        User::create($data);

        return redirect('login');
    }

    public static function user()
    {
        return $_SESSION['user'] ?? null;
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }

        redirect('login');
    }
}
