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
            width: 70%;
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

        /*------------------------------- app ------------------------------ */

        .app-container {
            text-align: center;
            align-items: center;
            padding: 150px 0 50px 0;
        }

        .app-google {
            margin: 50px;
        }

        .app-google img {
            height: 50px;
            cursor: pointer;
        }

        .app-container p {
            line-height: 20px;
            letter-spacing: 1px;
            font-size: 17px;
            color: #000;
            font-weight: bold;
        }

        .app-container input {
            margin-top: 50px;
            border: none;
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
            width: 400px;
            text-align: center;
            outline: none;
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

        .footer-bottom {
            margin: 20px 0;
            text-align: center;
            background: #cbc8c8;
            font-family: var(--main-text-font);
            width: 100%;
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>

<body>

    @include('client.layout.header')

    <section class="content">
        @yield('content')
    </section>
    @include('client.layout.footer')
</body>

</html>