<?php 
namespace App\Controllers;

use App\Models\User;

class AuthController
{
    public function login()
    {
        return view('auth.login');
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

        if (!$user) {
            $errors['message'] = "Lỗi username hoặc password không chính xác";
        }else{
            if (password_verify($data['password'], $user->password)) {
                $_SESSION['user'] = $user;
                
                redirect('admin');
            }else{
                $errors['message'] = "Lỗi username hoặc password không chính xác";
            }
        }

        if (isset($errors)) {
            return view('auth.login', compact('data', 'errors'));
        }
    }
    public function register(){
        return view('auth.register');
    }
    public function store()
    {
        $data = $_POST;
        // Mã hoá mật khẩu
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        User::create($data);

        return redirect('login');
    }

    public static function user(){
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
?>