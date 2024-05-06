@extends('client.layout.master')
@section('content')
    <div class="clearfix">
        <section id="slider">
            <div class="aspect-ratio-169">
                <img
                    src="https://scontent.fhan5-2.fna.fbcdn.net/v/t39.30808-6/274896823_4682998905163051_1767615307293580911_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGbKGAcPKYNpfyIm2NSzjNfKNcPzxTUYE0o1w_PFNRgTey4QK6ILf-IbRBilToGL8NP8iuloFPetRaV0L0SJ9k6&_nc_ohc=fUbPwe9syZEQ7kNvgFkx6gH&_nc_zt=23&_nc_ht=scontent.fhan5-2.fna&oh=00_AfBRokykKWK4OYZSDxnGSA5giDzY66eDDFgf1h_ZaOi9Lw&oe=663E6030"style="width: 90%; height: 80%">


                <img
                    src="https://scontent.fhan5-10.fna.fbcdn.net/v/t39.30808-6/269756987_4417312281731716_3519165989556630283_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGnLurobEQjmI9pr_RXt7mj-9HTTXozdyj70dNNejN3KK9bv2X0KrzKFYZh5w_cWqCvQqwUtGvt19x8qsh8hyuC&_nc_ohc=KD8kYBi2dKcQ7kNvgEHobyC&_nc_zt=23&_nc_ht=scontent.fhan5-10.fna&oh=00_AfBZcya_iY1sOoh_Ht7eTNL3XB929ZT_1pDWPBsAZOQrkw&oe=663E635D"style="width: 90%; height: 80%">


                <img
                    src="https://scontent.fhan5-2.fna.fbcdn.net/v/t39.30808-6/307181135_5199079590221644_6462100771164916241_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeEJoUI4ImlND59DpGho6IDDpxUe7p_G28anFR7un8bbxpVviJ1PI4F8GeEm7TviG1DB1ttyPTTjnpkbbNrPMZOT&_nc_ohc=syYZX50w0E4Q7kNvgHgIaI9&_nc_zt=23&_nc_ht=scontent.fhan5-2.fna&oh=00_AfBJ_7vAP7lmyos4pIowe2Euo8s7jmolIY2x6AO553-ygQ&oe=663E82DF"style="width: 90%; height: 80%">


                <img
                    src="https://congstudio.vn/wp-content/uploads/2022/04/Bang-gia-chup-anh-ky-yeu-cap-3-gia-re-29.jpg"style="width: 90%;
                                                                                                                                                                                                                                                                                                              height: 80%">


                <img
                    src="https://scontent.fhan5-2.fna.fbcdn.net/v/t39.30808-6/274344314_4632882440174698_8966130345885983664_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeFZzWH_SMu-ETFWeAbnn8tUGFMhYVgC9_MYUyFhWAL3860H8rzoIwdiAui03HuugAFylMjnFJgdANpDuJb_H6ad&_nc_ohc=sXOw1dd-7EUQ7kNvgHUDa1x&_nc_zt=23&_nc_ht=scontent.fhan5-2.fna&oh=00_AfCk_OjU5cuzEar057izxUU0LqKsa9ztmhRy_xPI9ox1qA&oe=663E8D74"style="width: 90%; height: 80%">

            </div>

            <div class="dot-container hidden">
                <div class="dot active"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </section>
        <script>
            /*-----------------------js ----------------------------*/
            const header = document.querySelector("header")
            window.addEventListener("scroll", function() {
                x = window.pageYOffset
                if (x > 0) {
                    header.classList.add("sticky")
                } else {
                    header.classList.remove("sticky")
                }
            })

            /*-----------------js slider-------------------*/
            const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
            // console.log(imgPosition);
            const imgContainer = document.querySelector(".aspect-ratio-169")
            const dotItem = document.querySelectorAll(".dot")
            let index = 0
            let imgNumber = imgPosition.length
            imgPosition.forEach(function(image, index) {
                image.style.left = index * 100 + "%"
                dotItem[index].addEventListener("click", function() {
                    slider(index)
                })
            })

            function imgSlide() {
                index++;
                if (index >= imgNumber) {
                    index = 0;
                }
                slider(index);
            }

            function slider(index) {
                imgContainer.style.left = "-" + index * 100 + "%";
                const dotActive = document.querySelector(".active")
                dotActive.classList.remove("active")
                dotItem[index].classList.add("active")
            }
            setInterval(imgSlide, 5000)
        </script>
    </div>
    <div class="grid">
        @foreach ($ser as $items)
            <div class="py-5 bg-[#333] border-b border-white">
                <div class="container flex gap-5 items-center">
                    <div class="w-[50%]">
                        <img width="100" class="w-full h-[90%]" src="../../../{{ $items->image }}" alt="">
                    </div>
                    <div class="grid gap-2 text-white w-[50%]">
                        <p class="text-2xl font-bold">{{ $items->name_service }}</p>
                        <p class="text-base">{{ $items->description }}</p>
                        <div class="flex gap-3">
                            <button class="py-2 px-3 border border-[#ccc] bg-gray hover:opacity-70">
                                Thư viện ảnh
                            </button>
                            <button class="py-2 px-3 border border-[#ccc] bg-gray hover:opacity-70">
                                Đặt lịch ngay
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
