@section('sitebar')
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
            @foreach ($posts as $post)
            <div class="main-post-populer">
                <img src="{{ APP_URL . $post->image }}"
                    alt="">
                <div class="title-populer">
                    <a href="">{{ $post->title }}</a>
                </div>
                <div class="category-date-populer">
                    <a href="">{{ $post->cagetory_name }}</a>
                    <p>{{ date('d/m/Y', strtotime($post->creates_at)) }}</p>
                </div>
            </div>
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
@endsection
