@extends('layouts.layout')

@section('title')
    Danh sách bài viết
@endsection

@section('content')
    <div class="container top">

        <div class="top-main-category">

            <div class="mid-main">
                <div class="mid-left">
                    <div class="post-category">

                        @if (empty($posts))
                            <p>Không có bài viết nào trong danh mục này.</p>
                        @else
                            @foreach ($posts as $post)
                                <div class="main-category">
                                    <a href="{{ APP_URL . 'detailPost/' . $post->id }}"><img
                                            src="{{ APP_URL . $post->image }}" alt=""></a>
                                    <div class="category-date-populer">
                                        <a href="">{{ $post->cagetory_name }}</a>
                                        <span>{{ date('d/m/Y H:i:s', strtotime($post->creates_at)) }}</span>
                                    </div>
                                    <div class="main-category-title">
                                        <a href="{{ APP_URL . 'detailPost/' . $post->id }}">{{ $post->title }}</a>
                                    </div>
                                    <div class="detail-category">
                                        <a href="{{ APP_URL . 'detailPost/' . $post->id }}">{{ $post->description }}</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="mid-right">
                    <div class="populer">
                        <div class="ads">
                            <img src="https://propellerads.com/blog/wp-content/uploads/2024/03/Screenshot-2024-03-04-at-16.57.33.png"
                                alt="">
                        </div>
                        <div class="social">
                            <a href="" style="background-color: #1A6DD4">
                                <i class="fab fa-facebook-f"></i>
                                Facebook
                            </a>
                            <a href="" style="background-color: #55ACEF">
                                <i class="fab fa-twitter"></i>
                                Twitter
                            </a>
                            <a href="" style="background-color: #E4223E">
                                <i class="fab fa-pinterest"></i>
                                Priterest
                            </a>
                            <a href="" style="background-color: #C13584">
                                <i class="fab fa-instagram"></i>
                                Instagram
                            </a>
                        </div>
                        <hr>
                        <div class="post-populer">
                            <h5>Tin nổi bật</h5>
                            @php $count = 0; @endphp

                            @foreach ($postsSidebar as $post)
                                @if ($count < 5)
                                    <div class="main-post-populer">
                                        <a href="{{ APP_URL . 'detailPost/' . $post->id }}"><img
                                                src="{{ APP_URL . $post->image }}" alt=""></a>
                                        <div class="title-populer">
                                            <a href="{{ APP_URL . 'detailPost/' . $post->id }}">{{ $post->title }}</a>
                                        </div>
                                        <div class="category-date-populer">
                                            <a href="">{{ $post->cagetory_name }}</a>
                                            <p>{{ date('d/m/Y', strtotime($post->creates_at)) }}</p>
                                        </div>
                                    </div>
                                    @php $count++; @endphp
                                @else
                                    @break
                                @endif
                            @endforeach


                        </div>
                        <div class="subcribe-email">
                            <h5>Đăng ký nhận bản tin</h5>
                            <p>Nhận tin tức mới nhất thông qua Email của bạn!</p>
                            <form action="">
                                <input type="email" placeholder="Nhập email của bạn...">
                                <button type="submit">Đăng ký</button>
                            </form>
                            <div class="terms">
                                <label>
                                    <input type="checkbox" name="terms" id="terms">
                                    Bằng cách đăng ký, bạn đồng ý với các <a href="#">Điều khoản và thỏa thuận chính
                                        sách
                                        quyền riêng tư</a> của chúng tôi
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
