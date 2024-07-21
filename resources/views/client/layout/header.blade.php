<style>
    .menu.header li a {
        font-family: "Roboto", sans-serif;
        font-weight: 500;
        font-size: 16px;
        color: #333;
        text-decoration: none;
        transition: color 0.3s;
        color: #fff;
    }

    .menu.header li a:hover {
        color: #ff9900;
    }

    .menu.header li a::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 100%;
        height: 2px;
        background-color: #ccc;
        visibility: hidden;
        transform: scaleX(0);
        transition: all 0.3s ease-in-out;
    }

    .menu.header li a:hover::after {
        visibility: visible;
        transform: scaleX(1);
    }

    .menu.header li a.active {
        color: #ff9900;
    }

    .menu.header li a.active::after {
        visibility: visible;
        transform: scaleX(1);
        background-color: #ff9900;
    }

    .menu.header li a.active1 {
        color: #ff9900;
    }

    .menu.header li a.active1::after {
        visibility: visible;
        transform: scaleX(1);
        background-color: #ff9900;
    }

    .logo-img {
        width: 90%;
        max-width: 180px;
        height: auto;
        border-radius: 10cap;
    }

    .menu.header li form {
        display: flex;
        align-items: center;
    }

    .menu.header li form .flex {
        display: flex;
        align-items: center;
    }

    .menu.header li form .border {
        border: 1px solid #dddd;
        padding: 5px;
    }

    .menu.header li form button {
        background: none;
        border: none;
        cursor: pointer;
        padding-left: 10px;
    }

    .menu.header li form button i {
        color: #fff;
    }
</style>
<ul class="flex items-center gap-2 bg-[#555] justify-center menu header">
    <li><a href="{{ route('client.home') }}" class="{{ request()->is('/') ? 'active1' : '' }}">TRANG CHỦ</a></li>
    <li><a href="{{ route('client.album') }}" class="{{ request()->is('album') ? 'active1' : '' }}">THƯ VIỆN ẢNH</a></li>
    <li><a href="{{ route('client.about') }}" class="{{ request()->is('about') ? 'active1' : '' }}">GIỚi THIỆU</a></li>
    <li><a href="{{ route('client.price') }}" class="{{ request()->is('price') ? 'active1' : '' }}">BẢNG GIÁ</a></li>
    <li><a href="{{ route('client.contact') }}" class="{{ request()->is('contact') ? 'active1' : '' }}">LIÊN HỆ</a></li>
    <li>
        <form action="{{ route('client.search') }}" method="GET" class="flex gap-3 items-center ">
            @csrf
            <div class="flex">
                <input type="text" name="keyword" class="border border-[#dddd] px-3 py-0" placeholder="Tìm kiếm dịch vụ ..." value="{{ old('keyword') }}">
                <button type="submit" class="pl-5">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>
    </li>
    <div class="flex gap-2 items-center justify-center text-white">
        @auth
        <a class="text-black-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" href="{{ route('client.userDetail') }}">
            <span class="font-bold uppercase">
                {{ auth()->user()->name }}
            </span>
        </a>
        <form class="inline" method="POST" action="{{ route('user.logout') }}">
            @csrf
            @method('get')
            <button type="submit">
                <a href="{{ route('user.logout') }}" class="text-black-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                    <i class="fa-solid fa-door-closed"></i>
                </a>
            </button>
        </form>
        @if (auth()->user()->role == 1)
        <a href="{{ route('admin.index') }}" class="text-black-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
            <i class="fa-solid fa-house"></i>
        </a>
        @endif
        @else
        <a href="{{ route('user.register') }}" class="text-black-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
            <i class="fa-solid fa-user-plus"></i> Register
        </a>
        <a href="{{ route('user.login_form') }}" class="text-black-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
            <i class="fa-solid fa-arrow-right-to-bracket"></i> Login
        </a>
        @endauth
    </div>
</ul>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const currentLocation = location.href;
        const menuItems = document.querySelectorAll('.menu.header li a');

        menuItems.forEach(item => {
            if (item.href === currentLocation) {
                item.classList.add('active1');
            }
        });
    });
</script>
