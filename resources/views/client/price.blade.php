@extends('client.layout.master')
@section('content')

<div class="">
    @foreach ($price as $items)
    <div class="py-5 bg-[#333] border-b border-white">
        <div class="container flex gap-5 items-center">

            <div class="grid gap-2 text-white w-[50%]">
                <p class="text-2xl font-bold">{{ $items->name_service }}</p>
                <p class="text-base">{!! $items->price_table !!}</p>
                <p class="text-2xl font-bold text-yellow ">{{ number_format($items->price, 0, ',', '.') }} VNĐ</p>
                <div class="flex gap-3">
                    <button class="py-2 px-3 border border-[#ccc] bg-gray hover:opacity-70" onclick=" navigateTo('{{ route('client.album')}}')">
                        Thư viện ảnh
                    </button>
                    <button class="py-2 px-3 border border-[#ccc] bg-gray hover:opacity-70" onclick=" navigateTo('{{ route('client.contact')}}')">
                        Đặt lịch ngay
                    </button>
                </div>
            </div>
            <div class="w-[50%]">
                <img width="100" class="w-full h-[full] rounded" src="../../../{{ $items->image }}" alt="">
            </div>
        </div>
    </div>
    <script>
        function navigateTo(url) {
            window.location.href = url;
        }
    </script>
    @endforeach

    <style>
        .elementor-toggle-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            overflow: hidden;
        }

        .elementor-tab-title {
            background-color: #f5f5f5;
            cursor: pointer;
            padding: 15px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .elementor-tab-title:hover {
            background-color: #e0e0e0;
        }

        .elementor-toggle-icon {
            margin-right: 10px;
        }

        .elementor-toggle-icon-closed,
        .elementor-toggle-icon-opened {
            display: none;
        }

        .elementor-tab-title[aria-expanded="false"] .elementor-toggle-icon-closed {
            display: inline;
        }

        .elementor-tab-title[aria-expanded="true"] .elementor-toggle-icon-opened {
            display: inline;
        }

        .elementor-toggle-title {
            text-decoration: none;
            color: #333;
            display: inline;
        }

        .elementor-tab-content {
            display: none;
            padding: 15px;
            background-color: #fff;
        }

        .elementor-tab-title[aria-expanded="true"]+.elementor-tab-content {
            display: block;
        }

        .elementor-tab-content p {
            margin: 0 0 10px;
            line-height: 1.6;
            color: #666;
        }

        .elementor-tab-content p:last-child {
            margin-bottom: 0;
        }
    </style>


    <div class="elementor-element elementor-element-6066f6b elementor-widget elementor-widget-toggle" data-id="6066f6b" data-element_type="widget" data-widget_type="toggle.default">
        <div class="elementor-widget-container">
            <div class="elementor-toggle">
                <div class="elementor-toggle-item">
                    <div id="elementor-tab-title-1011" class="elementor-tab-title" data-tab="1" role="button" aria-controls="elementor-tab-content-1011" aria-expanded="false">
                        <span class="elementor-toggle-icon elementor-toggle-icon-left" aria-hidden="true">
                            <span class="elementor-toggle-icon-closed"><i class="fas fa-caret-right"></i></span>
                            <span class="elementor-toggle-icon-opened"><i class="elementor-toggle-icon-opened fas fa-caret-up"></i></span>
                        </span>
                        <a class="elementor-toggle-title" tabindex="0">Phụ thu</a>
                    </div>

                    <div id="elementor-tab-content-1011" class="elementor-tab-content elementor-clearfix" data-tab="1" role="region" aria-labelledby="elementor-tab-title-1011">
                        <p>Đối với các trang phục, phụ kiện, bối cảnh đặc biệt, hoành tráng vượt quá gói. Studio sẽ có phụ thu (có tư vấn trước).</p>
                    </div>
                </div>
                <div class="elementor-toggle-item">
                    <div id="elementor-tab-title-1012" class="elementor-tab-title" data-tab="2" role="button" aria-controls="elementor-tab-content-1012" aria-expanded="false">
                        <span class="elementor-toggle-icon elementor-toggle-icon-left" aria-hidden="true">
                            <span class="elementor-toggle-icon-closed"><i class="fas fa-caret-right"></i></span>
                            <span class="elementor-toggle-icon-opened"><i class="elementor-toggle-icon-opened fas fa-caret-up"></i></span>
                        </span>
                        <a class="elementor-toggle-title" tabindex="0">Chọn ảnh</a>
                    </div>

                    <div id="elementor-tab-content-1012" class="elementor-tab-content elementor-clearfix" data-tab="2" role="region" aria-labelledby="elementor-tab-title-1012">
                        <p>Khách hàng được chuyên viên hướng dẫn chọn ảnh ngay sau buổi chụp &amp; trao đổi, đóng góp ý kiến xây dựng bộ ảnh đẹp nhất theo sở thích. Studio khuyến khích việc tự chọn ảnh vì sẽ cảm nhận được phong cách mình yêu thích.</p>
                    </div>
                </div>
                <div class="elementor-toggle-item">
                    <div id="elementor-tab-title-1013" class="elementor-tab-title" data-tab="3" role="button" aria-controls="elementor-tab-content-1013" aria-expanded="false">
                        <span class="elementor-toggle-icon elementor-toggle-icon-left" aria-hidden="true">
                            <span class="elementor-toggle-icon-closed"><i class="fas fa-caret-right"></i></span>
                            <span class="elementor-toggle-icon-opened"><i class="elementor-toggle-icon-opened fas fa-caret-up"></i></span>
                        </span>
                        <a class="elementor-toggle-title" tabindex="0">Sửa ảnh</a>
                    </div>

                    <div id="elementor-tab-content-1013" class="elementor-tab-content elementor-clearfix" data-tab="3" role="region" aria-labelledby="elementor-tab-title-1013">
                        <p>Khách hàng sẽ làm việc trực tiếp với Retoucher (chuyên gia sửa ảnh) để tự do chỉnh sửa, chọn màu sắc và cân đối tỉ lệ mặt theo ý thích. Khách hàng có thể lấy ý kiến từ chuyên gia để đảm bảo sở thích và nghệ thuật.</p>
                    </div>
                </div>
                <div class="elementor-toggle-item">
                    <div id="elementor-tab-title-1014" class="elementor-tab-title" data-tab="4" role="button" aria-controls="elementor-tab-content-1014" aria-expanded="false">
                        <span class="elementor-toggle-icon elementor-toggle-icon-left" aria-hidden="true">
                            <span class="elementor-toggle-icon-closed"><i class="fas fa-caret-right"></i></span>
                            <span class="elementor-toggle-icon-opened"><i class="elementor-toggle-icon-opened fas fa-caret-up"></i></span>
                        </span>
                        <a class="elementor-toggle-title" tabindex="0">Ảnh thô</a>
                    </div>

                    <div id="elementor-tab-content-1014" class="elementor-tab-content elementor-clearfix" data-tab="4" role="region" aria-labelledby="elementor-tab-title-1014">
                        <p>Khách hàng nhận bản ảnh gốc được upload lưu trữ bên nền tảng thứ 3 giúp khách hàng dễ dàng tải ảnh và lưu trữ. Ảnh sẽ được lưu trữ trên nền tảng 2 tháng, sau 2 tháng link ảnh sẽ khóa hoặc tự động xóa và không thể tải về.</p>
                    </div>
                </div>
                <div class="elementor-toggle-item">
                    <div id="elementor-tab-title-1015" class="elementor-tab-title" data-tab="5" role="button" aria-controls="elementor-tab-content-1015" aria-expanded="false">
                        <span class="elementor-toggle-icon elementor-toggle-icon-left" aria-hidden="true">
                            <span class="elementor-toggle-icon-closed"><i class="fas fa-caret-right"></i></span>
                            <span class="elementor-toggle-icon-opened"><i class="elementor-toggle-icon-opened fas fa-caret-up"></i></span>
                        </span>
                        <a class="elementor-toggle-title" tabindex="0">Phản hồi và ý kiến</a>
                    </div>

                    <div id="elementor-tab-content-1015" class="elementor-tab-content elementor-clearfix" data-tab="5" role="region" aria-labelledby="elementor-tab-title-1015">
                        <p>Sau khi nhận được bộ ảnh, layout ảnh, khách hàng có quyền đóng góp ý kiến, phản hồi để hoàn thành bộ ảnh cuối cùng (Final).</p>
                    </div>
                </div>
                <div class="elementor-toggle-item">
                    <div id="elementor-tab-title-1016" class="elementor-tab-title" data-tab="6" role="button" aria-controls="elementor-tab-content-1016" aria-expanded="false">
                        <span class="elementor-toggle-icon elementor-toggle-icon-left" aria-hidden="true">
                            <span class="elementor-toggle-icon-closed"><i class="fas fa-caret-right"></i></span>
                            <span class="elementor-toggle-icon-opened"><i class="elementor-toggle-icon-opened fas fa-caret-up"></i></span>
                        </span>
                        <a class="elementor-toggle-title" tabindex="0">Đúng lịch hẹn</a>
                    </div>

                    <div id="elementor-tab-content-1016" class="elementor-tab-content elementor-clearfix" data-tab="6" role="region" aria-labelledby="elementor-tab-title-1016">
                        <p>Khách hàng vui lòng đến đúng giờ đã đặt lịch. Trường hợp trễ giờ sẽ ảnh hưởng đến trải nghiệm dịch vụ và Studio sẽ có cộng thêm chi phí hoặc huỷ lịch nếu ảnh hưởng đến những khách hàng khác.</p>
                        <p>Thời gian trễ sau 15 phút thì có thể phải dời lịch hoặc tính phụ thu 1 triệu/show</p>
                    </div>
                </div>
                <div class="elementor-toggle-item">
                    <div id="elementor-tab-title-1017" class="elementor-tab-title" data-tab="7" role="button" aria-controls="elementor-tab-content-1017" aria-expanded="false">
                        <span class="elementor-toggle-icon elementor-toggle-icon-left" aria-hidden="true">
                            <span class="elementor-toggle-icon-closed"><i class="fas fa-caret-right"></i></span>
                            <span class="elementor-toggle-icon-opened"><i class="elementor-toggle-icon-opened fas fa-caret-up"></i></span>
                        </span>
                        <a class="elementor-toggle-title" tabindex="0">Thời gian hoàn thành</a>
                    </div>

                    <div id="elementor-tab-content-1017" class="elementor-tab-content elementor-clearfix" data-tab="7" role="region" aria-labelledby="elementor-tab-title-1017">
                        <p>Tùy theo số lượng Layout, và số lượng ảnh, chuyên viên sẽ thông báo thời gian hoàn thành tác phẩm. Với quy trình chuẩn, bộ ảnh sẽ được hoàn thành rất nhanh (thông thường 2-5 ngày).</p>
                    </div>
                </div>
                <div class="elementor-toggle-item">
                    <div id="elementor-tab-title-1018" class="elementor-tab-title" data-tab="8" role="button" aria-controls="elementor-tab-content-1018" aria-expanded="false">
                        <span class="elementor-toggle-icon elementor-toggle-icon-left" aria-hidden="true">
                            <span class="elementor-toggle-icon-closed"><i class="fas fa-caret-right"></i></span>
                            <span class="elementor-toggle-icon-opened"><i class="elementor-toggle-icon-opened fas fa-caret-up"></i></span>
                        </span>
                        <a class="elementor-toggle-title" tabindex="0">Dời lịch/Hủy lịch</a>
                    </div>

                    <div id="elementor-tab-content-1018" class="elementor-tab-content elementor-clearfix" data-tab="8" role="region" aria-labelledby="elementor-tab-title-1018">
                        <p>Trong trường hợp cần dời hoặc huỷ lịch, khách hàng phải báo trước 7 ngày và có lý do thoả đáng. Studio có thể hỗ trợ tối đa dời 02 lần.</p>
                        <p>*Trường hợp hủy lịch trong thời gian 7 ngày trước buổi chụp sẽ bị mất cọc.</p>
                    </div>
                </div>
                <div class="elementor-toggle-item">
                    <div id="elementor-tab-title-1019" class="elementor-tab-title" data-tab="9" role="button" aria-controls="elementor-tab-content-1019" aria-expanded="false">
                        <span class="elementor-toggle-icon elementor-toggle-icon-left" aria-hidden="true">
                            <span class="elementor-toggle-icon-closed"><i class="fas fa-caret-right"></i></span>
                            <span class="elementor-toggle-icon-opened"><i class="elementor-toggle-icon-opened fas fa-caret-up"></i></span>
                        </span>
                        <a class="elementor-toggle-title" tabindex="0">Thời gian chụp ảnh</a>
                    </div>

                    <div id="elementor-tab-content-1019" class="elementor-tab-content elementor-clearfix" data-tab="9" role="region" aria-labelledby="elementor-tab-title-1019">
                        <p>Thời gian chụp không giới hạn,số lượng ảnh cũng không giới hạn và cam kết đủ số lượng ảnh chỉnh sửa trong gói.</p>
                    </div>
                </div>
                <div class="elementor-toggle-item">
                    <div id="elementor-tab-title-10110" class="elementor-tab-title" data-tab="10" role="button" aria-controls="elementor-tab-content-10110" aria-expanded="false">
                        <span class="elementor-toggle-icon elementor-toggle-icon-left" aria-hidden="true">
                            <span class="elementor-toggle-icon-closed"><i class="fas fa-caret-right"></i></span>
                            <span class="elementor-toggle-icon-opened"><i class="elementor-toggle-icon-opened fas fa-caret-up"></i></span>
                        </span>
                        <a class="elementor-toggle-title" tabindex="0">Thanh toán và đặt cọc</a>
                    </div>

                    <div id="elementor-tab-content-10110" class="elementor-tab-content elementor-clearfix" data-tab="10" role="region" aria-labelledby="elementor-tab-title-10110">
                        <p>Khách hàng cọc trước 30% &#8211; 50% tổng chi phí trước buổi chụp và thanh toán 100% ngay sau khi hoàn thành buổi chụp.</p>
                    </div>
                </div>
                <div class="elementor-toggle-item">
                    <div id="elementor-tab-title-10111" class="elementor-tab-title" data-tab="11" role="button" aria-controls="elementor-tab-content-10111" aria-expanded="false">
                        <span class="elementor-toggle-icon elementor-toggle-icon-left" aria-hidden="true">
                            <span class="elementor-toggle-icon-closed"><i class="fas fa-caret-right"></i></span>
                            <span class="elementor-toggle-icon-opened"><i class="fas fa-caret-up"></i></span>
                        </span>
                        <a class="elementor-toggle-title" tabindex="0">Chính sách hoàn/hoãn lịch</a>
                    </div>

                    <div id="elementor-tab-content-10111" class="elementor-tab-content elementor-clearfix" data-tab="11" role="region" aria-labelledby="elementor-tab-title-10111">
                        <p>Trong trường hợp bất khả kháng phải rời lịch trong 7 ngày trước buổi chụp, khách hàng liên hệ bạn tư vấn viên để check và được sắp xếp một buổi chụp mới. Studio chỉ hỗ trợ dời 01 lần trong thời gian báo trước buổi chụp, khách hàng dời lịch lần 2 sẽ tính phí 500k/lần dời lịch.</p>
                        <p>*Trường hợp khách hàng không thể thực hiện buổi chụp, khách hàng có thể nhượng lại khoản cọc cho bạn bè hoặc người thân. Khách hàng liên hệ bạn tư vấn viên để hỗ trợ nhượng lại cọc và sắp xếp lại lịch chụp.</p>
                        <p>*Lưu ý: Gạo Nâu sẽ không hoàn lại cọc với bất kì lý do gì nếu không phải lỗi do phía studio.</p>
                    </div>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const toggleItems = document.querySelectorAll('.elementor-toggle-item');

                        toggleItems.forEach(item => {
                            const title = item.querySelector('.elementor-tab-title');
                            const content = item.querySelector('.elementor-tab-content');

                            title.addEventListener('click', function() {
                                const isExpanded = title.getAttribute('aria-expanded') === 'true';

                                // Close all toggle items
                                toggleItems.forEach(i => {
                                    i.querySelector('.elementor-tab-title').setAttribute('aria-expanded', 'false');
                                    i.querySelector('.elementor-tab-content').style.display = 'none';
                                });

                                // Toggle the clicked item
                                if (!isExpanded) {
                                    title.setAttribute('aria-expanded', 'true');
                                    content.style.display = 'block';
                                }
                            });
                        });
                    });
                </script>

            </div>

            @endsection