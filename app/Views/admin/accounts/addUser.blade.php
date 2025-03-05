@extends('admin.layoutAdmin')

@section('title')
    Thêm Người Dùng
@endsection

@section('content')
<div class="container w-50">
    <br>
    <h2 class="mb-4">Thêm Người Dùng</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- Username -->
        <div class="mb-3">
            <label class="form-label">Tên người dùng</label>
            <input type="text" name="username" class="form-control">
            @isset($errors['username'])
                    <span class="text-center text-danger">{{ $errors['username'] }}</span>
                @endisset
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
            @isset($errors['email'])
                    <span class="text-center text-danger">{{ $errors['email'] }}</span>
                @endisset
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label class="form-label">Mật khẩu</label>
            <input type="password" name="password" class="form-control">
            @isset($errors['password'])
                    <span class="text-center text-danger">{{ $errors['password'] }}</span>
                @endisset
        </div>

        <!-- Ảnh đại diện -->
        <div class="mb-3">
            <label class="form-label">Ảnh đại diện</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <!-- Role -->
        <div class="mb-3">
            <label class="form-label">Quyền</label>
            <select name="role" class="form-select">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <!-- Ngày tạo -->
        <input type="hidden" name="created_at" value="<?= date('Y-m-d H:i:s') ?>">
        <input type="hidden" name="updated_at" value="<?= date('Y-m-d H:i:s') ?>">

        <button type="submit" class="btn btn-primary">Thêm Người Dùng</button>
    </form>
</div>
@endsection
