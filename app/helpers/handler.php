<?php

use eftec\bladeone\BladeOne;

function view($pathView, $data = [])  {

    $views = __DIR__ . '/../Views';
    $cache = __DIR__ . '/../cache';
    $blade = new BladeOne($views,$cache,BladeOne::MODE_DEBUG); // MODE_DEBUG allows to pinpoint troubles.
    return $blade->run($pathView, $data); // it calls /views/hello.blade.php
}

function dd($data) {
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die;
}

// hàm di chuyển website theo đường dẫn
function redirect($path)  {
    $path = APP_URL . $path;
   header("Location: $path");
   die; 
}

// function deleteImage($imagePath)
// {
//     // Kiểm tra xem ảnh có tồn tại không trước khi xóa
//     if ($imagePath && file_exists(public_path($imagePath))) {
//         unlink(public_path($imagePath));
//         return true; // Xóa thành công
//     }
//     return false; // Ảnh không tồn tại hoặc xóa thất bại
// }
