<!-- -----------------------------footer------------------------------- -->
<div class="footer-top">
    <li><a href="{{route('client.home')}}">Trang chủ</a></li>
    <li><a href="">Bảng giá</a></li>
    <li><a href="">Giới thiệu</a></li>
    <li><a href="{{route('client.contact')}}">Liên hệ</a></li>
    <li>
        <a href="https://www.facebook.com/HaikeoPhoto" class="fab fa-facebook"></a>
        <a href="" class="fab fa-tiktok"></a>
        <a href="" class="fab fa-instagram"></a>
    </li>
</div>
<div class="footer-center">
    <i class="fas fa-map-marker-alt"></i>
    Cơ sở 1: xã Phú Lương, huyện Đông Hưng, tỉnh Thái Bình, Việt Nam<br>
    <i class="fas fa-map-marker-alt"></i>
    Cơ sở 2: xã Thạch Hòa, huyện Thạch Thất, TP.Hà Nội, Việt Nam<br>
    Điện thoại: <b>08.86.86.88.36</b>
</div>
<div class="py-3 px-3 border border-[#ccc] bg-[#333]">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3087.1299881353098!2d106.32277240771964!3d20.57165528706652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ee148d892fd7%3A0x754d1b3cc1b79e48!2zTmjDoCBWxINuIEhvw6EgVGjDtG4gRHV5w6puIFThu6Vj!5e0!3m2!1svi!2s!4v1715156433118!5m2!1svi!2s" width="100%" height="50%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<div class="footer-bottom">
    <div class="running-text-container">
        <p class="running-text text-lime-700 text-lg">© Trường Đại học Tài nguyên và Môi trường Hà Nội - Trần Thanh Tuấn - 20111062342 - Xây dựng hệ thống Hải Kẹo Studio</p>
    </div>
</div>

<style>
    .footer-bottom {
        overflow: hidden;
        /* Thêm các thuộc tính khác nếu cần */
    }

    .running-text-container {
        width: 100%;
        overflow: hidden;
    }

    .running-text {
        animation: marquee 30s linear infinite;
    }

    @keyframes marquee {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }
</style>
