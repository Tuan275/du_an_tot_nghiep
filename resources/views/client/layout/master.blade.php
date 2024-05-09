<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="../../../ckeditor/ckeditor.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="../../../css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="../../../css/style.css" rel='stylesheet' type='text/css' />
    <script src="../../../js/jquery.min.js"></script>
    <!---- start-smoth-scrolling---->
    <script type="text/javascript" src="../../../js/move-top.js"></script>
    <script type="text/javascript" src="../../../js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!--start-smoth-scrolling-->

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        li {
            list-style: none;
        }

        a {
            text-decoration: none;
            color: #000;
        }

        header {
            display: flex;
            justify-content: space-between;
            padding: 12px 70px;
            height: 90px;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1;
            background: rgba(225, 225, 225, 0.4);

        }

        header.sticky {
            background: rgba(255, 255, 255, 1);
        }

        header:hover {
            background: rgba(255, 255, 255, 1);
        }


        .menu {
            flex: 3;
            display: flex;
        }

        .menu>li {
            padding: 0 12px;
            position: relative;
        }


        .menu>li:hover .sub-menu {
            visibility: visible;
            top: 55px;
        }

        .sub-menu {
            position: absolute;
            width: 160px;
            border: 1px solid #ccc;
            padding: 10px 0 10px 20px;
            visibility: hidden;
            top: 60px;
            transition: 0.1s;
            z-index: 1;
            background: #fff;
        }

        .sub-menu ul {
            padding-left: 15px;
        }

        .sub-menu li a {
            font-weight: normal;
            font-size: 12px !important;
        }

        .menu li a {
            font-size: 14px;
            font-weight: bold !important;
            display: block;
            line-height: 20px;
        }

        #slider {
            padding: 0 30px 30px 30px;
            border-bottom: 2px solid #000;
            overflow: hidden;
        }

        .aspect-ratio-169 {
            display: block;
            position: relative;
            padding-top: 56.25%;
            transition: 0.4s;
        }

        .aspect-ratio-169 img {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
        }

        .dot-container {
            position: absolute;
            height: 30px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .dot {
            height: 18px;
            width: 18px;
            background-color: #ccc;
            border-radius: 50%;
            margin-right: 10px;
            cursor: pointer;

        }

        .dot.active {
            background-color: #333;
        }

        /* -------------------------footer---------------------- */

        .footer {
            text-align: center;
        }

        .footer-top {
            display: flex;
            text-align: center;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            height: 70px;
        }

        .footer-top li {
            padding: 0 12px;
            position: relative;
        }

        .footer-top li::after {
            content: "";
            display: block;
            width: 1px;
            height: 80%;
            background: #ccc;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        .footer-top li:last-child::after {
            display: none;
        }

        .footer-top li:last-child a {
            margin-right: 12px;
            color: #434040;
            ;
        }

        .footer-center {
            text-align: center;
        }


        #scrollToTopBtn {
            display: none;
            /* Ẩn nút ban đầu */
            position: fixed;
            /* Nút ở vị trí cố định trên màn hình */
            bottom: 50px;
            left: 20px;
            z-index: 99;
            /* Đảm bảo nút hiển thị trên mọi nội dung khác */
            background-color: #ccc;
            color: white;
            border: none;
            border-radius: 50%;
            padding: 15px;
            cursor: pointer;
            font-size: 16px;
        }

        #scrollToTopBtn:hover {
            background-color: #555;
        }

        /*zalo*/
        #floatingButton {
            position: fixed;
            bottom: 50px;
            right: 20px;
            z-index: 999;
        }

        #floatingButton img {
            width: 50px;
            /* Điều chỉnh kích thước hình ảnh theo ý muốn */
            height: auto;
            /* Đảm bảo tỷ lệ khung hình ảnh không bị méo */
            border-radius: 50%;
            /* Làm tròn góc hình ảnh */
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
            /* Hiệu ứng khi hover */
        }

        #floatingButton img:hover {
            transform: scale(1.1);
            /* Hiển thị hình ảnh lớn hơn khi hover */
        }
    </style>
</head>

<body>

    @include('client.layout.header')

    <section class="content">
        @yield('content')
    </section>
    @include('client.layout.footer')

    <div id="floatingButton">
        <a href="https://zalo.me/0886868836" target="_blank"><img src="data:image/png;base64,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" alt="Zalo"></a>
    </div>
    <button id="scrollToTopBtn" title="Go to top"><i class="fa fa-angle-up"></i></button>
    <script>
        // Hiển thị hoặc ẩn nút nổi khi cuộn trang
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("scrollToTopBtn").style.display = "block";
            } else {
                document.getElementById("scrollToTopBtn").style.display = "none";
            }
        }

        // Cuộn về đầu trang khi nhấp vào nút nổi
        document.getElementById("scrollToTopBtn").addEventListener("click", function() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        });

    </script>

</body>

</html>