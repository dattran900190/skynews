@extends('admin.layoutAdmin')

@section('title')
    Thêm bài viết
@endsection

@section('content')
    <div class="container w-50 ">
        <br>
        <h2 class="mb-4">Thêm Bài Viết</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- Tiêu đề -->
            <div class="mb-3">
                <label class="form-label">Tiêu đề</label>
                <input type="text" name="title" class="form-control">
                @isset($errors['title'])
                    <span class="text-center text-danger">{{ $errors['title'] }}</span>
                @endisset
            </div>

            <!-- Ảnh -->
            <div class="mb-3">
                <label class="form-label">Ảnh bài viết</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                @isset($errors['image'])
                    <span class="text-center text-danger">{{ $errors['image'] }}</span>
                @endisset
            </div>

            <!-- Mô tả -->
            <div class="mb-3">
                <label class="form-label">Mô tả ngắn</label>
                <input type="text" name="description" class="form-control">
                @isset($errors['description'])
                    <span class="text-center text-danger">{{ $errors['description'] }}</span>
                @endisset
            </div>

            <!-- Nội dung -->
            {{-- <div class="mb-3">
            <label class="form-label">Nội dung</label>
            <textarea name="content" class="form-control" rows="5"></textarea>
        </div> --}}

            <!-- Nội dung -->
            <div class="mb-3">
                <label class="form-label">Nội dung</label>
                <textarea name="content" class="form-control" rows="5"></textarea>
                @isset($errors['content'])
                    <span class="text-center text-danger">{{ $errors['content'] }}</span>
                @endisset
            </div>


            <!-- Chọn danh mục -->
            <div class="mb-3">
                <label class="form-label">Danh mục</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}">
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Trạng thái -->
            <div class="mb-3">
                <label class="form-label">Trạng thái</label>
                <select name="status" class="form-select">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <!-- Ngày tạo -->
            <input type="hidden" name="creates_at" value="<?= date('Y-m-d H:i:s') ?>">
            <input type="hidden" name="update_at" value="<?= date('Y-m-d H:i:s') ?>">

            <button type="submit" class="btn btn-primary">Thêm Bài Viết</button>
        </form>
    </div>
@endsection
