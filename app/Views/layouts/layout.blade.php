<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/PHP_2/web_tin_tuc/css/style.css">
</head>

<body>


    <nav>
        <div class="container menu">
            <div class="logo">
                <img src="https://cdn.freebiesupply.com/logos/large/2x/sky-news-3-logo-png-transparent.png"
                    width="200" alt="Logo">
            </div>

            <ul class="menu-left">
                <li><a href="{{ APP_URL }}">Trang chủ</a></li>
                <li class="dropdown">
                    <a href="{{ APP_URL . 'listPost'}}">Danh mục <i class="fa-solid fa-angle-down"></i></a>
                    {{-- <ul class="dropdown-menu">
                        <li><a href="#">Sub Menu 1</a></li>
                        <li><a href="#">Sub Menu 2</a></li>
                        <li><a href="#">Sub Menu 3</a></li>
                        <li class="dropdown">
                            <a href="#">Sub Menu 4</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown">
                                    <a href="#">Deep Menu 1</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Sub Deep 1</a></li>
                                        <li><a href="#">Sub Deep 2</a></li>
                                        <li><a href="#">Sub Deep 3</a></li>
                                        <li><a href="#">Sub Deep 4</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Deep Menu 2</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Sub Menu 5</a></li>
                    </ul> --}}
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a href="{{ APP_URL . 'listPost/' . $category->id }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                    
                    
                </li>
                <li><a href="{{ APP_URL . 'contact'}}">Liên hệ</a></li>
                <li><a href="{{ APP_URL . 'aboutUs'}}">Giới thiệu</a></li>
            </ul>

            <ul class="menu-right">
                <li>
                    <div class="search-bar">
                        <input type="text" placeholder="Search">
                    </div>
                </li>
                <li><a href="login"><i class="fa-solid fa-circle-user"></i> Đăng nhập</a></li>
            </ul>
        </div>
    </nav>

    <div class="cagetory-menu">
        <ul>
            <li><a href="listPost">Tin tức</a></li>
            <li><a href="listPost">Thế giới</a></li>
            <li><a href="listPost">Kinh doanh</a></li>
            <li><a href="listPost">Giáo dục</a></li>
            <li><a href="listPost">Sức khỏe</a></li>
            <li><a href="listPost">Du lịch</a></li>
            <li><a href="listPost">Thể thao</a></li>
            <li><a href="listPost">Công nghệ</a></li>
            <li><a href="listPost">Pháp luật</a></li>
            <li><a href="listPost">Xe cộ</a></li>
        </ul>
    </div>

    {{-- <header>
        <div class="container">
            <h1 class="text-center">Website tin tức & bài viết</h1>
            
        </div>
    </header> --}}


    @yield('content');




    <footer>
        <div class="container">
            <div class="footer1">
                <h3>Giới thiệu</h3>
                <div class="logo">
                    <img src="https://cdn.freebiesupply.com/logos/large/2x/sky-news-3-logo-png-transparent.png"
                        width="200" alt="Logo">
                </div>
                <p class="detail-footer1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt deleniti
                    quisquam maiores maxime
                    earum nihil aspernatur accusantium amet nostrum, sint</p>
                <p class="contact-footer1">Email: dattlph49133@gmail.com</p>
                <p class="contact-footer1">Liên hệ: 0325836909</p>
            </div>
            <div class="footer2">
                <h3>Bài viết</h3>
                <div class="post-footer">
                    <div class="main-post-footer">
                        <img src="https://smartmag.theme-sphere.com/citybuzz/wp-content/uploads/sites/20/2020/01/Depositphotos_245296172_xl-2015-1-1024x686.jpg" alt="">
                        <div class="detail-post-footer">
                            <div class="content-post-footer">
                                <a>Lorem ipsum dolor sit amet consectetur adipisicing elit. </a>
                            </div>
                            <div class="date-post-footer">
                                Mar 12, 2024
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="main-post-footer">
                        <img src="https://smartmag.theme-sphere.com/citybuzz/wp-content/uploads/sites/20/2020/01/Depositphotos_245296172_xl-2015-1-1024x686.jpg" alt="">
                        <div class="detail-post-footer">
                            <div class="content-post-footer">
                                <a>Lorem ipsum dolor sit amet consectetur adipisicing elit. </a>
                            </div>
                            <div class="date-post-footer">
                                Mar 12, 2024
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="main-post-footer">
                        <img src="https://smartmag.theme-sphere.com/citybuzz/wp-content/uploads/sites/20/2020/01/Depositphotos_245296172_xl-2015-1-1024x686.jpg" alt="">
                        <div class="detail-post-footer">
                            <div class="content-post-footer">
                                <a>Lorem ipsum dolor sit amet consectetur adipisicing elit. </a>
                            </div>
                            <div class="date-post-footer">
                                Mar 12, 2024
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="footer3">
                <h3>Liên kết</h3>
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Danh mục</a></li>
                    <li><a href="#">Liên hệ</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Thế giới</a></li>
                    <li><a href="#">Kinh doanh</a></li>
                    <li><a href="#">Giáo dục</a></li>
                    <li><a href="#">Sức khỏe</a></li>
                    <li><a href="#">Du lịch</a></li>
                    <li><a href="#">Thể thao</a></li>
                    <li><a href="#">Công nghệ</a></li>
                    <li><a href="#">Pháp luật</a></li>
                    <li><a href="#">Xe cộ</a></li>
                </ul>
            </div>
        </div>
    </footer>

</body>

</html>
