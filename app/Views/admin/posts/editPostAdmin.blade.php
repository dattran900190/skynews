@extends('admin.layoutAdmin')

@section('title')
    Sửa bài viết
@endsection

@section('content')
<div class="container w-50 ">
    <br>
    <h2 class="mb-4">Sửa Bài Viết</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- Tiêu đề -->
        <div class="mb-3">
            <label class="form-label">Tiêu đề</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}">
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
            @if ($post->image)
                    <img src="{{ APP_URL . $post->image }}" alt="Current image" width="100">
                @endif
        </div>

        <!-- Mô tả -->
        <div class="mb-3">
            <label class="form-label">Mô tả ngắn</label>
            <input type="text" name="description" class="form-control" value="{{ $post->description }}">
            @isset($errors['description'])
                    <span class="text-center text-danger">{{ $errors['description'] }}</span>
                @endisset
        </div>

        <!-- Nội dung -->
        {{-- <div class="mb-3">
            <label class="form-label">Nội dung</label>
            <textarea name="content" class="form-control" rows="5">{{ $post->content }}</textarea>
        </div> --}}
        <div class="mb-3">
            <label class="form-label">Nội dung</label>
            <textarea name="content" class="form-control" rows="5">{{ $post->content }}</textarea>
            @isset($errors['content'])
                    <span class="text-center text-danger">{{ $errors['content'] }}</span>
                @endisset
            
        </div>
        

        <!-- Chọn danh mục -->
        <div class="mb-3">
            <label class="form-label">Danh mục</label>
            <select name="category_id" class="form-select">
                    @foreach ($categories as $cate)
                    <option value="{{ $cate->id }}" {{ $post->category_id == $cate->id ? 'selected' : '' }}>
                        {{ $cate->name }}
                    </option>
                    @endforeach
                </select>
        </div>

        <!-- Trạng thái -->
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="status" class="form-select">
                <option value="active" {{ $post->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $post->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        

        <!-- Ngày tạo -->
        <input type="hidden" name="creates_at" value="<?= date('Y-m-d H:i:s') ?>">
        <input type="hidden" name="update_at" value="<?= date('Y-m-d H:i:s') ?>">

        <button type="submit" class="btn btn-primary">Sửa Bài Viết</button>
    </form>
</div>
@endsection
