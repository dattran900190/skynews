@extends('admin.layoutAdmin')

@section('title')
    Quản lý danh mục bài viết
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <h1>Quản lý danh mục bài viết</h1>
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                        <div class="card-title">Danh mục bài viết</div>
                        <div class="card-tools">
                            <a href="{{ APP_URL . 'admin/listCategoryPostAdmin/add' }}" class="btn btn-sm btn-success">Thêm
                                danh mục</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center">STT</th>
                                    <th scope="col" class="text-center">Tên danh mục</th>
                                    <th scope="col" class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $category->id }}</th>
                                        <td class="text-center">{{ $category->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ APP_URL . 'admin/listCategoryPostAdmin/edit/' . $category->id }}" class="btn btn-sm btn-info">Sửa</a>
                                            <form action="{{ APP_URL . 'admin/listCategoryPostAdmin/delete/' . $category->id }}" method="post" class="d-inline ">
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
