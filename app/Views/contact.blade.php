@extends('layouts.layout')

@section('title')
    Liên hệ
@endsection

@section('content')
    <div class="container contact">
        <div class="left-contact">
            <h4>Liên hệ với chúng tôi</h4>
            <form action="">
                <label for="">Họ tên</label>
                <input type="text" placeholder="Họ và tên">

                <div class="input-group">
                    <div>
                        <label for="">Email</label>
                        <input type="email" placeholder="Email">
                    </div>
                    <div>
                        <label for="">Số điện thoại</label>
                        <input type="text" placeholder="Số điện thoại">
                    </div>
                </div>

                <label for="">Tiêu đề</label>
                <input type="text" placeholder="Tiêu đề">

                <label for="">Nội dung</label>
                <textarea name="" id="" cols="30" rows="10" placeholder="Nội dung"></textarea>
                <button>Gửi</button>
            </form>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8679632343506!2d105.74435187448127!3d21.037968487463715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455305afd834b%3A0x17268e09af37081e!2sT%C3%B2a%20nh%C3%A0%20FPT%20Polytechnic.!5e0!3m2!1svi!2s!4v1738391140313!5m2!1svi!2s"></iframe>
        </div>
        <div class="right-contact">
            <h4>Thông tin liên hệ</h4>
            <p><b>Địa chỉ:</b> Tòa nhà FPT Polytechnic, phố Trịnh Văn Bô, phường Phương Canh, quận Nam Từ Liêm, TP Hà Nội.
            </p>

            <b>Liên hệ Văn phòng tuyển sinh:</b>

            <p><i class="fa-solid fa-circle"></i> Tư vấn 1: (024) 8582 0808 <br>
               <i class="fa-solid fa-circle"></i> Tư vấn 2: (024) 6684 0713 <br>
               <i class="fa-solid fa-circle"></i> Tư vấn 3: 0988 866 377<br>
                Email : caodangfpt.hn@fpt.edu.vn
            </p>

            <b>Liên hệ các phòng ban khác:</b>

            <p> <b>Phòng Dịch vụ sinh viên:</b><br>
                Tel: 1900 99 66 86<br>
                Email: dvsvpoly.hn@poly.edu.vn
            </p>

            <p>
                <b>Phòng Giáo vụ Đào tạo:</b><br>
                Tel: (024) 7300 1955 – Nhánh số 2 hoặc (024) 6259 4013<br>
                Email: daotaopoly.hn@fe.edu.vn
            </p>

            <b> Phòng Hành chính – Kế toán:</b>

            <p>
               <i class="fa-solid fa-circle"></i> (024) 6327 6306<br>
               <i class="fa-solid fa-circle"></i> (024) 6682 2713<br>
               <i class="fa-solid fa-circle"></i> (024) 6327 6305<br>
                Email: hanhchinhpoly.hn@poly.edu.vn
            </p>
            <p>
                <b>Phòng Quan hệ doanh nghiệp:</b><br>
                Tel: 024 6327 6803<br>
                Email: qhdn.poly@fpt.edu.vn
            </p>

            <p>
                <b>Phòng Công tác sinh viên:</b><br>
                Tel: (024) 6260 4013<br>
                Email: ctsvpoly.hn@fe.edu.vn
            </p>
        </div>
    </div>
@endsection
