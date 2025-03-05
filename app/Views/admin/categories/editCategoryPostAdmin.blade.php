@extends('admin.layoutAdmin')

@section('title')
    Sửa Danh Mục
@endsection

@section('content')
<div class="container w-50 ">
    <br>
    <h2 class="mb-4">Sửa Danh Mục</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- Tiêu đề -->
        <div class="mb-3">
            <label class="form-label">Tên danh mục</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
            @isset($errors['name'])
                    <span class="text-center text-danger">{{ $errors['name'] }}</span>
                @endisset
        </div>

        <button type="submit" class="btn btn-primary">Sửa Danh Mục</button>
    </form>
</div>
@endsection
