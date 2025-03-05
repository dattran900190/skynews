@extends('admin.layoutAdmin')

@section('title')
    Quản lý tài khoản
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <h1>Quản lý tài khoản</h1>
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                        <div class="card-title">Danh sách tài khoản</div>
                        <div class="card-tools">
                            <a href="{{ APP_URL . 'admin/accounts/add' }}" class="btn btn-sm btn-success">Thêm tài khoản</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center">STT</th>
                                    <th scope="col" class="text-center">Tên tài khoản</th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col" class="text-center">Hình ảnh</th>
                                    <th scope="col" class="text-center">Vai trò</th>
                                    <th scope="col" class="text-center">Ngày tạo</th>
                                    <th scope="col" class="text-center">Cập nhật lần cuối</th>
                                    <th scope="col" class="text-center">Trạng thái</th>
                                    <th scope="col" class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accounts as $account)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $account->id }}</th>
                                        <td class="text-center">{{ $account->username }}</td>
                                        <td class="text-center">{{ $account->email }}</td>
                                        <td class="text-center">
                                            <img src="{{ APP_URL . $account->image }}" alt="Hình ảnh" width="50">
                                        </td>
                                        <td class="text-center">
                                            @if ($account->role == 'admin')
                                                <span class="badge bg-success">Admin</span>
                                            @else
                                                <span class="badge bg-info">User</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $account->created_at }}</td>
                                        <td class="text-center">{{ $account->updated_at }}</td>
                                        <td class="text-center">
                                            @if ($account->status == 0)
                                                <span style="color: red;">Bị cấm</span>
                                            @else
                                                <span style="color: green;">Hoạt động</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ APP_URL . 'admin/accounts/edit/' . $account->id }}"
                                                class="btn btn-sm btn-info">Sửa</a>
                                            @if ($account->status == 0)
                                                <form action="{{ APP_URL . 'admin/accounts/unban/' . $account->id }}"
                                                    method="post" class="d-inline">
                                                    <button onclick="return confirm('Bạn có muốn huỷ cấm không?')"
                                                        type="submit" class="btn btn-warning btn-sm">
                                                        Huỷ cấm
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ APP_URL . 'admin/accounts/delete/' . $account->id }}"
                                                    method="post" class="d-inline">
                                                    <button onclick="return confirm('Bạn có muốn cấm không?')"
                                                        type="submit" class="btn btn-danger btn-sm">
                                                        Cấm
                                                    </button>
                                                </form>
                                            @endif

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
