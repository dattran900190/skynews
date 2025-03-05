@extends('layouts.layout')

@section('title')
    Trang chủ
@endsection

@section('content')
    <div class="container top">
        <div class="top-main">
            <div class="post-left">
                @php $count = 0; @endphp

                @foreach ($posts as $post)
                    @if ($count < 1)
                        <a href="{{ APP_URL . 'detailPost/' . $post->id }}"><img src="{{ APP_URL . $post->image }}"
                                alt=""></a>
                        <div class="overlay">
                            <div class="top-category">
                                <a href="">{{ $post->cagetory_name }}</a>
                            </div>
                            <div class="top-title">
                                <a href="{{ APP_URL . 'detailPost/' . $post->id }}">{{ $post->title }}</a>
                            </div>
                            <div class="top-date">
                                {{ date('d/m/Y H:i:s', strtotime($post->creates_at)) }}
                            </div>
                        </div>
                        @php $count++; @endphp
                    @else
                        @break
                    @endif
                @endforeach

            </div>
            <div class="post-right">
                @php $count = 0; @endphp

                @foreach ($posts as $post)
                    @if ($count >= 2 && $count <= 3)
                        <div class="top-post">
                            <a href="{{ APP_URL . 'detailPost/' . $post->id }}"><img src="{{ APP_URL . $post->image }}"
                                alt=""></a>
                        <div class="overlay">
                            <div class="top-category">
                                <a href="">{{ $post->cagetory_name }}</a>
                            </div>
                            <div class="top-title">
                                <a href="{{ APP_URL . 'detailPost/' . $post->id }}">{{ $post->title }}</a>
                            </div>
                            <div class="top-date">
                                {{ date('d/m/Y H:i:s', strtotime($post->creates_at)) }}
                            </div>
                        </div>
                        </div>
                    @endif

                    @php $count++; @endphp

                    @if ($count > 3)
                        @break
                    @endif
                @endforeach


                {{-- <div class="top-post">
                    <a href="#"><img
                            src="https://smartmag.theme-sphere.com/citybuzz/wp-content/uploads/sites/20/2020/01/Depositphotos_245296172_xl-2015-1-1024x686.jpg"
                            alt=""></a>
                    <div class="overlay">
                        <div class="top-category">
                            <a href="">People</a>
                        </div>
                        <div class="top-title">
                            Lifestyle Can Be Making You Tired
                        </div>
                        <div class="top-date">
                            Shane Doe — Jan 15, 2020
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

        <div class="mid-main">
            <div class="mid-left">
                <div class="post">
                    @foreach ($posts as $post)
                        <div class="mid-post">
                            <div class="poster">
                                <a href="{{ APP_URL . 'detailPost/' . $post->id }}"><img src="{{ APP_URL . $post->image }}"
                                        style="width: 250px;" alt=""></a>
                            </div>
                            <div class="infoma">
                                <div class="category-date-populer">
                                    <a href="">{{ $post->cagetory_name }}</a>
                                    <span>{{ date('d/m/Y H:i:s', strtotime($post->creates_at)) }}</span>
                                    {{-- <span>Shane Doe — Jan 15, 2020</span> --}}
                                </div>
                                <div class="mid-title">
                                    <a href="{{ APP_URL . 'detailPost/' . $post->id }}">{{ $post->title }}</a>
                                </div>
                                <div class="description">
                                    <a href="{{ APP_URL . 'detailPost/' . $post->id }}"
                                        style="text-decoration: none; color: #E3526C;">{{ $post->description }}</a>
                                </div>
                                <div class="read-more">
                                    <a href="{{ APP_URL . 'detailPost/' . $post->id }}">Đọc thêm</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>

                <div class="trend">
                    <h5>Bài Viết Phổ Biến</h5>
                    {{-- @foreach ($posts as $post) --}}
                    <div class="trend-above">
                        <img src="{{ APP_URL . $post->image }}" alt="">
                        <div class="overlay">
                            <div class="trend-above-title">
                                <a href="{{ APP_URL . 'detailPost/' . $post->id }}"
                                    style="color: #ffff; text-decoration: none;">{{ $post->title }}</a>
                            </div>
                            <div class="trend-above-date">
                                <a href="">{{ $post->cagetory_name }}</a>
                                <span>{{ date('d/m/Y', strtotime($post->creates_at)) }}</span>
                            </div>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                    <div class="trend-below">

                        @php $count = 0; @endphp

                        @foreach ($posts as $post)
                            @if ($count < 3)
                                <div class="trend-post">
                                    <div class="img-trend">
                                        <img src="{{ APP_URL . $post->image }}" alt="">
                                    </div>
                                    <div class="trend-post-title">
                                        <a href="{{ APP_URL . 'detailPost/' . $post->id }}">{{ $post->title }}</a>
                                    </div>
                                    <div class="category-date-populer">
                                        <a href="">{{ $post->cagetory_name }}</a>
                                        <span>{{ date('d/m/Y', strtotime($post->creates_at)) }}</span>
                                    </div>
                                </div>
                                @php $count++; @endphp
                            @else
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="post">
                    @foreach ($posts as $post)
                        <div class="mid-post">
                            <div class="poster">
                                <a href="#"><img src="{{ APP_URL . $post->image }}" style="width: 250px;"
                                        alt=""></a>
                            </div>
                            <div class="infoma">
                                <div class="category-date-populer">
                                    <a href="">{{ $post->cagetory_name }}</a>
                                    <span>{{ date('d/m/Y H:i:s', strtotime($post->creates_at)) }}</span>
                                    {{-- <span>Shane Doe — Jan 15, 2020</span> --}}
                                </div>
                                <div class="mid-title">
                                    <a href="">{{ $post->title }}</a>
                                </div>
                                <div class="description">
                                    <a href=""
                                        style="text-decoration: none; color: #E3526C;">{{ $post->description }}</a>
                                </div>
                                <div class="read-more">
                                    <a href="detailPost">Đọc thêm</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>

                <div class="load-more">
                    <a href="{{ APP_URL . 'listPost' }}">Xem Thêm Bài Viết</a>
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

                        @foreach ($posts as $post)
                            @if ($count < 5)
                                <div class="main-post-populer">
                                    <a href="{{ APP_URL . 'detailPost/' . $post->id }}"><img src="{{ APP_URL . $post->image }}" alt=""></a>
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
                                Bằng cách đăng ký, bạn đồng ý với các <a href="#">Điều khoản và thỏa thuận chính sách
                                    quyền riêng tư</a> của chúng tôi
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
