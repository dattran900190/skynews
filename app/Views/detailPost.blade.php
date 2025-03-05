@extends('layouts.layout')

@section('title')
    Chi tiết bài viết
@endsection

@section('content')
    <div class="container mid-main">
        <div class="mid-left">
            <div class="top-category">
                <a href="">{{ $post->category_name }}</a>
            </div>
            <div class="title-detail">
                <h4>{{ $post->title }}</h4>
            </div>
            <div class="author">
                <img src="https://media.istockphoto.com/id/1478316046/photo/portrait-of-high-school-teacher-at-school-library.jpg?s=612x612&w=0&k=20&c=sSU4PQgVZXW6jiddn8YcB3s2F_Vge5RekkWBlMiUKuU="
                    alt="">
                <span>By</span>
                <a href="">Admin</a>
                <span> - {{ date('d/m/Y H:i:s', strtotime($post->creates_at)) }}</span>
            </div>

            <div class="main-detail">
                <div class="img-detail">
                    {{ $post->description }}
                    <img src="{{ APP_URL . $post->image }}"
                    alt="" >
                </div>
                <div class="content-detail">
                    {!! $post->content !!}
                </div>

                <div class="related-post">
                    <hr>
                    <h5>Bài Viết Liên Quan</h5>
                    <div class="main-related">
                        <div class="main-related-post">
                            <img src="https://smartmag.theme-sphere.com/citybuzz/wp-content/uploads/sites/20/2020/01/Depositphotos_246170008_xl-2015-1-1024x683.jpg"
                                alt="">
                            <div class="category-date-populer">
                                <a href="">People</a>
                                <p>Shane Doe — Jan 15, 2020</p>
                            </div>
                            <div class="title-related-post">
                                <a href="">How A ‘Healthy’ Lifestyle Can Be Making You Tired</a>
                            </div>
                        </div>
                        <div class="main-related-post">
                            <img src="https://smartmag.theme-sphere.com/citybuzz/wp-content/uploads/sites/20/2020/01/Depositphotos_246170008_xl-2015-1-1024x683.jpg"
                                alt="">
                            <div class="category-date-populer">
                                <a href="">People</a>
                                <p>Shane Doe — Jan 15, 2020</p>
                            </div>
                            <div class="title-related-post">
                                <a href="">How A ‘Healthy’ Lifestyle Can Be Making You Tired</a>
                            </div>
                        </div>
                        <div class="main-related-post">
                            <img src="https://smartmag.theme-sphere.com/citybuzz/wp-content/uploads/sites/20/2020/01/Depositphotos_246170008_xl-2015-1-1024x683.jpg"
                                alt="">
                            <div class="category-date-populer">
                                <a href="">People</a>
                                <p>Shane Doe — Jan 15, 2020</p>
                            </div>
                            <div class="title-related-post">
                                <a href="">How A ‘Healthy’ Lifestyle Can Be Making You Tired</a>
                            </div>
                        </div>
                        <div class="main-related-post">
                            <img src="https://smartmag.theme-sphere.com/citybuzz/wp-content/uploads/sites/20/2020/01/Depositphotos_246170008_xl-2015-1-1024x683.jpg"
                                alt="">
                            <div class="category-date-populer">
                                <a href="">People</a>
                                <p>Shane Doe — Jan 15, 2020</p>
                            </div>
                            <div class="title-related-post">
                                <a href="">How A ‘Healthy’ Lifestyle Can Be Making You Tired</a>
                            </div>
                        </div>
                        <div class="main-related-post">
                            <img src="https://smartmag.theme-sphere.com/citybuzz/wp-content/uploads/sites/20/2020/01/Depositphotos_246170008_xl-2015-1-1024x683.jpg"
                                alt="">
                            <div class="category-date-populer">
                                <a href="">People</a>
                                <p>Shane Doe — Jan 15, 2020</p>
                            </div>
                            <div class="title-related-post">
                                <a href="">How A ‘Healthy’ Lifestyle Can Be Making You Tired</a>
                            </div>
                        </div>
                        <div class="main-related-post">
                            <img src="https://smartmag.theme-sphere.com/citybuzz/wp-content/uploads/sites/20/2020/01/Depositphotos_246170008_xl-2015-1-1024x683.jpg"
                                alt="">
                            <div class="category-date-populer">
                                <a href="">People</a>
                                <p>Shane Doe — Jan 15, 2020</p>
                            </div>
                            <div class="title-related-post">
                                <a href="">How A ‘Healthy’ Lifestyle Can Be Making You Tired</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="comment">
                    <hr>
                    <h5>2 Bình Luận</h5>
                    <div class="main-comment">
                        <div class="main-comment-post">
                            <img src="https://media.istockphoto.com/id/1478316046/photo/portrait-of-high-school-teacher-at-school-library.jpg?s=612x612&w=0&k=20&c=sSU4PQgVZXW6jiddn8YcB3s2F_Vge5RekkWBlMiUKuU="
                                width="50" style="  border-radius: 50px;" alt="">
                            <div class="content-comment">
                                <div class="author-comment">
                                    <a href="">Admin</a>
                                    <span> - August 9, 2021</span>
                                </div>
                                <p>It’s quite the statement to make, and one that requires some thought</p>
                            </div>
                        </div>
                        <hr style="border: none">
                        <div class="main-comment-post">
                            <img src="https://media.istockphoto.com/id/1478316046/photo/portrait-of-high-school-teacher-at-school-library.jpg?s=612x612&w=0&k=20&c=sSU4PQgVZXW6jiddn8YcB3s2F_Vge5RekkWBlMiUKuU="
                                width="50" style="  border-radius: 50px;" alt="">
                            <div class="content-comment">
                                <div class="author-comment">
                                    <a href="">Admin</a>
                                    <span> - August 9, 2021</span>
                                </div>
                                <p>It’s quite the statement to make, and one that requires some thought</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="write-comment">
                    <hr>
                    <h5>Viết Bình Luận</h5>
                    <div class="form-comment">
                        <form action="">
                            <textarea name="" id="" cols="90" rows="10" placeholder="  Nội dung bình luận..."></textarea>
                            <button type="submit">Gửi bình luận</button>
                        </form>
                    </div>
                </div>
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
@endsection
