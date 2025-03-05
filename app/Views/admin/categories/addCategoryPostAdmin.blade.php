@extends('admin.layoutAdmin')

@section('title')
    Thêm Danh Mục
@endsection

@section('content')
<div class="container w-50 ">
    <br>
    <h2 class="mb-4">Thêm Danh Mục</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- Tiêu đề -->
        <div class="mb-3">
            <label class="form-label">Tên danh mục</label>
            <input type="text" name="name" class="form-control">
            @isset($errors['name'])
                    <span class="text-center text-danger">{{ $errors['name'] }}</span>
                @endisset
        </div>

        <button type="submit" class="btn btn-primary">Thêm Danh Mục</button>
    </form>
</div>
@endsection
