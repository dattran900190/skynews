<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class AdminController
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function listPostAdmin()
    {
        $posts = Post::select(['posts.*', 'name as cagetory_name'])
            ->join('categories', 'category_id', 'id')
            ->orderBy('id', 'DESC')
            ->get();
        // dd($posts);
        return view('admin.posts.listPostAdmin', compact('posts'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.posts.addPostAdmin', compact('categories'));
    }
    public function store()
    {
        $data = $_POST;
        $image = "";
        $errors = []; // Cần khai báo mảng lỗi

        // Validate title
        if (trim($data['title']) == '') {
            $errors['title'] = 'Bạn chưa nhập tiêu đề';
        }
        if (trim($data['description']) == '') {
            $errors['description'] = 'Bạn chưa nhập mô tả';
        }
        if (trim($data['content']) == '') {
            $errors['content'] = 'Bạn chưa nhập nội dung';
        }

        $file = $_FILES['image'];
        $imgs = ['jpg', 'jpeg', 'png', 'gif'];
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

        // Validate image
        if ($file['size'] == 0) {
            $errors['image'] = "Bạn chưa thêm ảnh";
        } else if (!in_array($ext, $imgs)) {
            $errors['image'] = "Ảnh không đúng định dạng";
        }

        // Nếu có lỗi validate, trả về form
        if (!empty($errors)) {
            $categories = Category::all();
            return view('admin.posts.addPostAdmin', compact('categories', 'errors', 'data'));
        }

        // Xử lý ảnh
        if ($file['size'] > 0) {
            $image = 'images/' . $file['name'];
            move_uploaded_file($file['tmp_name'], $image);
        }

        // Gán ảnh vào $data
        $data['image'] = $image;

        // 💡 Đảm bảo có `status`, nếu không thì đặt mặc định là `inactive`
        $data['status'] = $data['status'] ?? 'inactive';

        // Thêm bài viết
        Post::create($data);

        return redirect('admin/listPostAdmin');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.posts.editPostAdmin', compact('post', 'categories'));
    }
    public function update($id)
    {
        $data = $_POST;
        $post = Post::find($id); // Lấy dữ liệu cũ

        $errors = []; // Cần khai báo mảng lỗi

        // Validate title
        if (trim($data['title']) == '') {
            $errors['title'] = 'Bạn chưa nhập tiêu đề';
        }
        if (trim($data['description']) == '') {
            $errors['description'] = 'Bạn chưa nhập mô tả';
        }
        if (trim($data['content']) == '') {
            $errors['content'] = 'Bạn chưa nhập nội dung';
        }
        // dd($data);
        // Xử lý file upload
        if ($_FILES['image']['size'] > 0) {

            $oldImage = $post->image;
            if ($oldImage && file_exists($oldImage)) {
                unlink($oldImage);
            }

            $file = $_FILES['image'];
            $image = 'images/' . $file['name'];
            move_uploaded_file($file['tmp_name'], $image);
            $data['image'] = $image;
        } else {
            // Giữ nguyên image cũ nếu không upload mới
            $data['image'] = $post->image;
        }

        if (!empty($errors)) {
            $categories = Category::all();

            return view('admin.posts.editPostAdmin', compact('categories', 'errors', 'data', 'post'));
        }

        // Nếu `status` không được gửi lên, giữ nguyên giá trị cũ
        if (!isset($data['status'])) {
            $data['status'] = $post->status;
        }

        // Gọi phương thức update của model
        Post::update($data, $id);

        // Chuyển hướng về trang danh sách phim
        return redirect('admin/listPostAdmin');
    }
    public function destroy($id)
    {
        Post::delete($id);
        return redirect('admin/listPostAdmin');
    }

    public function listCategoryPostAdmin()
    {
        $categories = Category::select(['categories.*'])
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin.categories.listCategoryPostAdmin', compact('categories'));
    }

    public function addCategory()
    {
        $categories = Category::select(['categories.name'])->get();
        return view('admin.categories.addCategoryPostAdmin', compact('categories'));
    }
    public function storeCategory()
    {
        $data = $_POST;
        $errors = []; // Cần khai báo mảng lỗi

        // Validate name
        if (trim($data['name']) == '') {
            $errors['name'] = 'Bạn chưa nhập tên danh mục';
        }

        // Nếu có lỗi validate, trả về form
        if (!empty($errors)) {
            $categories = Category::all();
            return view('admin.categories.addCategoryPostAdmin', compact('categories', 'errors', 'data'));
        }

        // Thêm bài viết
        Category::create($data);

        return redirect('admin/listCategoryPostAdmin');
    }
    public function editCategory($id)
    {
        $category = Category::find($id);
        // dd($categories);
        return view('admin.categories.editCategoryPostAdmin', compact('category'));
    }
    public function updateCategory($id)
    {
        $data = $_POST;
        $category = Category::find($id); // Lấy dữ liệu cũ
        $errors = []; // Cần khai báo mảng lỗi

        // Validate name
        if (trim($data['name']) == '') {
            $errors['name'] = 'Bạn chưa nhập tên danh mục';
        }

        if (!empty($errors)) {
            $categories = Category::all();
            return view('admin.categories.editCategoryPostAdmin', compact('categories', 'errors', 'data'));
        }
        // Gọi phương thức update của model
        Category::update($data, $id);

        // Chuyển hướng về trang danh sách phim
        return redirect('admin/listCategoryPostAdmin');
    }

    public function destroyCategory($id)
    {
        Category::delete($id);
        return redirect('admin/listCategoryPostAdmin');
    }
    public function detailPostAdmin($id)
    {

        $detail = User::find($id);
        return view('admin/detailPostAdmin', compact('detail'));
    }

    public function listUser()
    {
        $accounts = User::select(['users.*'])
            ->orderBy('id', 'DESC')
            ->get();
        // dd($accounts);
        return view('admin.accounts.listUser', compact('accounts'));
    }

    public function addUser()
    {
        
        return view('admin.accounts.addUser');
    }

    public function storeUser()
    {
        $data = $_POST;
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT); // Hash password
        $errors = []; // Cần khai báo mảng lỗi

        // Validate title
        if (trim($data['username']) == '') {
            $errors['username'] = 'Bạn chưa nhập tên';
        }
        if (trim($data['email']) == '') {
            $errors['email'] = 'Bạn chưa nhập email';
        }
        if (trim($data['password']) == '') {
            $errors['password'] = 'Bạn chưa nhập mật khẩu';
        }

        if ($_FILES['image']['size'] > 0) {
            // Upload ảnh mới
            $file = $_FILES['image'];
            $image = 'images/' . $file['name'];
            move_uploaded_file($file['tmp_name'], $image);
            $data['image'] = $image;
        }

        if (!empty($errors)) {
            return view('admin.accounts.addUser', compact('errors', 'data'));
        }

        User::create($data); // Lưu vào DB
        return redirect('admin/listUser');
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('admin.accounts.editUser', compact('user'));
    }

    public function updateUser($id)
    {
        $data = $_POST;
        $user = User::find($id); // Lấy dữ liệu user cũ

        // $errors = []; // Cần khai báo mảng lỗi

        // // Validate title
        // if (trim($data['username']) == '') {
        //     $errors['username'] = 'Bạn chưa nhập tên';
        // }
        // if (trim($data['email']) == '') {
        //     $errors['email'] = 'Bạn chưa nhập email';
        // }
        // if (trim($data['password']) == '') {
        //     $errors['password'] = 'Bạn chưa nhập mật khẩu';
        // }

        // Kiểm tra xem có upload ảnh mới không
        if ($_FILES['image']['size'] > 0) {
            // Xóa ảnh cũ trước khi lưu ảnh mới
            $oldImage = $user->image;
            if ($oldImage && file_exists($oldImage)) {
                unlink($oldImage);
            }

            // Upload ảnh mới
            $file = $_FILES['image'];
            $image = 'images/' . $file['name'];
            move_uploaded_file($file['tmp_name'], $image);
            $data['image'] = $image;
        } else {
            // Giữ nguyên ảnh cũ nếu không upload mới
            $data['image'] = $user->image;
        }

        // Nếu `role` không được gửi lên, giữ nguyên giá trị cũ
        if (!isset($data['role'])) {
            $data['role'] = $user->role;
        }

        // Nếu không nhập mật khẩu, giữ nguyên mật khẩu cũ
        if (empty($data['password'])) {
            $data['password'] = $user->password;
        } else {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        // if (!empty($errors)) {
        //     return view('admin.accounts.editUser', compact('errors', 'user'));
        // }
        // Cập nhật thông tin user
        User::update($data, $id);

        return redirect('admin/listUser');
    }

    // public function destroyUser($id)
    // {
    //     User::delete($id);
    //     return redirect('admin/listUser');
    // }

    public function banUser($id)
    {
        $user = User::find($id);
    
        if ($user) {
            User::updateStatus($id, 0); // Gọi hàm cập nhật trạng thái
        }
    
        return redirect('admin/listUser');
    }

    public function unBanUser($id)
    {
        $user = User::find($id);
    
        if ($user) {
            User::updateStatus($id, 1); // Gọi hàm cập nhật trạng thái
        }
    
        return redirect('admin/listUser');
    }
    
    

}
