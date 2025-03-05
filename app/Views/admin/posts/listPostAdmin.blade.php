@extends('admin.layoutAdmin')

@section('title')
Quản lý bài viết
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <h1>Quản lý bài viết</h1>
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                        <div class="card-title">Danh sách bài viết</div>
                        <div class="card-tools">
                            <a href="{{ APP_URL . 'admin/listPostAdmin/add' }}" class="btn btn-sm btn-success">Thêm bài
                                viết</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <!-- Bảng danh sách bài viết -->
                        <table class="table align-items-center mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col" class="text-start">Tiêu đề</th>
                                    <th scope="col" class="text-center">Image</th>
                                    <th scope="col" class="text-center">Mô tả</th>
                                    <th scope="col" class="text-center">Danh mục</th>
                                    <th scope="col" class="text-center">Ngày đăng</th>
                                    <th scope="col" class="text-center">Ngày cập nhật</th>
                                    <th scope="col" class="text-center">Trạng thái</th>
                                    <th scope="col" class="text-end">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <th scope="row">{{ $post->id }}</th>
                                        <td class="text-start">{{ $post->title }}</td>
                                        <td class="text-start">
                                            <img src="{{ APP_URL . $post->image }}" width="100" alt="">
                                        </td>
                                        <td class="text-center">{{ $post->description }}</td>
                                        <td class="text-center">{{ $post->cagetory_name }}</td>
                                        <td class="text-center">{{ date('d/m/Y', strtotime($post->creates_at)) }}</td>
                                        <td class="text-center">{{ date('d/m/Y', strtotime($post->update_at)) }}</td>
                                        <td class="text-center">
                                            @if ($post->status == 'active')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            {{-- <a href="detailPostAdmin" class="btn btn-sm btn-primary">Xem</a> --}}
                                            <a href="{{ APP_URL . 'admin/listPostAdmin/edit/' . $post->id }}" class="btn btn-sm btn-info">Sửa</a>
                                            
                                                <form action="{{ APP_URL . 'admin/listPostAdmin/delete/' . $post->id }}" method="post" class="d-inline ">
                                                    <button onclick="return confirm('Bạn có muốn xoá không?')" type="submit" class="btn btn-danger btn-sm">
                                                         Xoá
                                                    </button>
                                                </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
