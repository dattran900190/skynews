@extends('admin.layoutAdmin')

@section('title')
    Sửa Người Dùng
@endsection

@section('content')
<div class="container w-50">
    <br>
    <h2 class="mb-4">Sửa Người Dùng</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- Username -->
        {{-- <div class="mb-3">
            <label class="form-label">Tên người dùng</label>
            <input type="text" name="username" class="form-control" value="{{ $user->username }}">
            @isset($errors['username'])
                    <span class="text-center text-danger">{{ $errors['username'] }}</span>
                @endisset
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            @isset($errors['email'])
                    <span class="text-center text-danger">{{ $errors['email'] }}</span>
                @endisset
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label class="form-label">Mật khẩu (bỏ trống nếu không đổi)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <!-- Ảnh đại diện -->
        <div class="mb-3">
            <label class="form-label">Ảnh đại diện</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @if ($user->image)
                <br>
                <img src="{{ APP_URL . $user->image }}" width="100" alt="Ảnh hiện tại">
            @endif
        </div> --}}

        <!-- Role -->
        <div class="mb-3">
            <label class="form-label">Quyền</label>
            <select name="role" class="form-select">
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <!-- Ngày cập nhật -->
        <input type="hidden" name="updated_at" value="<?= date('Y-m-d H:i:s') ?>">

        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
</div>
@endsection
