@extends('client.layout.master')

@section('title', 'User Profile')
@section('content_title', 'User Profile')
@section('content')

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header font-bold bg-primary text-center text-white">
            <h4 class="mb-0">Thông Tin Người Dùng</h4>
        </div>
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="d-flex mb-3">
                <div class="mr-4">
                    <img src="../../../{{ Auth::user()->image }}" alt="Profile Picture" class="img-fluid rounded border" style="width: 100px; height: 150px; object-fit: cover;">
                </div>
                <div>
                    <h5 class="font-bold">Tên: {{ Auth::user()->name }}</h5>
                    <h5>Email: {{ Auth::user()->email }}</h5>
                </div>
            </div>

            <div class="appointments">
                @foreach ($appointment as $key => $appointments)
                @php
                $appointmentTime = \Carbon\Carbon::parse($appointments->schedule);
                $now = \Carbon\Carbon::now();
                @endphp
                @if ($now->lt($appointmentTime))
                <div class="appointment-item shadow-sm p-3 mb-3 bg-white rounded flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="category-right-content-item">
                            <img src="../../../{{ $appointments->services->image }}" alt="" class="w-24 h-24 object-contain mr-4">
                        </div>
                        <div>
                            <h5 class="font-bold text-primary">Dịch Vụ: {{ $appointments->services->name_service }}</h5>
                            <p class="text-purple-600">Lịch Hẹn: {{ date('d-m-Y', strtotime($appointments->schedule)) }}</p>
                            <p>Nhiếp Ảnh Gia:
                                @if ($appointments->photographer)
                                <a href="javascript:void(0);" title="click xem chi tiết" class="photographer-info-link" data-photographer="{{ json_encode([
                    'name' => $appointments->photographer->name,
                    'address' => $appointments->photographer->address,
                    'description' => $appointments->photographer->description,
                    'phone' => $appointments->photographer->phone_number,
                    'image' => asset($appointments->photographer->image)]) }}">
                                    {{ $appointments->photographer->name }}
                                </a>
                                @else
                            <p class="italic text-amber-400">Chưa cập nhật</p>
                            @endif
                            </p>
                            <div class="flex items-center">
                                <label class="mr-2"> Trạng thái: </label>
                                <p class="font-bold {{ $appointments->status == 1 ? 'text-amber-600' : 'text-green-600' }}"> {{ $appointments->status == 1 ? 'Đang chờ' : 'Đã xác nhận' }}</p>
                            </div>
                            <div class="flex items-center">
                                <label class="mr-2"> Địa chỉ lịch trình: </label>
                                <p class="font-bold" >{{ $appointments->address}}</p>
                            </div>
                            <div class="flex items-center">
                                <label class="mr-2"> Điện thoại: </label>
                                <p class="font-bold" >{{ $appointments->phone_number}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="buttons text-right">
                        <button class="btn btn-primary text-white mb-2 update-appointment" data-id="{{ $appointments->id }}" data-service="{{ $appointments->services->id }}" data-address="{{ $appointments->address }}" data-phone_number="{{ $appointments->phone_number }}" data-schedule="{{ $appointments->schedule }}">Đổi Lịch</button>
                        <a class="btn btn-danger text-white" onclick="return confirm('Thật sự muốn xoá lịch hẹn này?')" href="{{ route('client.appointment.delete', $appointments->id) }}">Xoá</a>
                    </div>
                </div>
                @else
                <div class="appointment-item shadow-sm p-3 mb-3 bg-white rounded flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="category-right-content-item">
                            <img src="../../../{{ $appointments->services->image }}" alt="" class="w-24 h-24 object-contain mr-4">
                        </div>
                        <div>
                            <h5 class="font-bold text-primary">Dịch Vụ: {{ $appointments->services->name_service }}</h5>
                            <p class="text-purple-600">Lịch Hẹn: {{ date('d-m-Y', strtotime($appointments->schedule)) }}</p>
                            <p>Nhiếp Ảnh Gia:
                                @if ($appointments->photographer)
                                <a href="javascript:void(0);" title="click xem chi tiết" class="photographer-info-link" data-photographer="{{ json_encode([
                    'name' => $appointments->photographer->name,
                    'address' => $appointments->photographer->address,
                    'description' => $appointments->photographer->description,
                    'phone' => $appointments->photographer->phone_number,
                    'image' => asset($appointments->photographer->image)]) }}">
                                    {{ $appointments->photographer->name }}
                                </a>
                                @else
                            <p class="italic text-amber-400">Chưa cập nhật</p>
                            @endif
                            </p>
                            <div class="flex items-center">
                                <label class="mr-2"> Trạng thái: </label>
                                <p class="font-bold text-red-600">Lịch trình đã hoàn thành</p>
                            </div>
                            <button class="btn btn-success text-white mb-2 review-appointment" data-id="{{ $appointments->id }}">Đánh Giá</button>
                            <p><a href="" class="italic text-blue-500 text-sm" title="Click để xem chi tiết">Chi tiết lịch chụp</a></p>
                        </div>
                    </div>
                    <div class="buttons text-right">
                        <a class="btn btn-danger text-white" onclick="return confirm('Thật sự muốn xoá lịch hẹn này?')" href="{{ route('client.appointment.delete', $appointments->id) }}">Xoá</a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Update Appointment Modal -->
<div id="updateAppointmentModal" class="modal">
    <div class="modal-content">
        <span class="modal-close">&times;</span>
        <form id="updateAppointmentForm" method="POST" action="{{ route('client.appointment.updateAppointment', ['id' => 0]) }}">
            @csrf
            <div class="form-group">
                <label for="modalService">Dịch Vụ</label>
                <select class="form-control" id="modalService" name="service_id">
                    @foreach($service as $items)
                    <option value="{{ $items->id }}">{{ $items->name_service }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="modalAddress">Địa Chỉ</label>
                <input type="text" class="form-control" id="modalAddress" name="address">
            </div>
            <div class="form-group">
                <label for="modalPhone">Điện Thoại</label>
                <input type="number" class="form-control" id="modalPhone" name="phone_number">
            </div>
            <div class="form-group">
                <label for="modalSchedule">Lịch Hẹn</label>
                <input type="datetime-local" class="form-control" id="modalSchedule" name="schedule">
            </div>
            <input type="hidden" id="appointmentId" name="appointment_id">
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </form>
    </div>
</div>

<!-- Photographer Info Modal -->
<div id="photographerInfoModal" class="modal">
    <div class="modal-content">
        <span class="modal-close">&times;</span>
        <img id="modalPhotographerImage" src="" alt="Photographer Image" style="width: 150px; height: 150px; object-fit: cover; margin-bottom: 15px;">
        <h2 id="modalPhotographerName" class="font-bold"></h2>
        <p id="modalPhotographerAddress"></p>
        <p id="modalPhotographerPhone"></p>
        <p id="modalPhotographerDescription"></p>
    </div>
</div>

<!-- Review Modal -->
<div id="reviewModal" class="modal">
    <div class="modal-content">
        <span class="modal-close">&times;</span>
        <form id="reviewForm" method="POST" action="{{ route('client.review.store') }}">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled />
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                </div>
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label for="service_id" class="form-label">Service</label>
                    <select class="form-select" name="service_id">
                        <option value="" class="italic">Lựa chọn dịch vụ</option>
                        @foreach ($service as $items)
                        <option value="{{ $items->id }}">{{ $items->name_service }}</option>
                        @endforeach
                    </select>
                    @error('service_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="reviewComment">Nhận Xét</label>
                <textarea class="form-control" id="reviewComment" name="description" value="{{old('description')}}" rows="4"></textarea>
            </div>
            <input type="hidden" id="appointmentIdForReview" name="appointment_id">
            <button type="submit" class="btn btn-primary">Gửi Đánh Giá</button>
        </form>
    </div>
</div>

<style>
    .appointments .appointment-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 20px;
        background-color: #f9f9f9;
    }

    .appointments .appointment-item .buttons {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    .appointments .appointment-item .buttons .btn {
        width: 100%;
        margin-bottom: 5px;
    }

    .appointments .appointment-item .buttons .btn:last-child {
        margin-bottom: 0;
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        border-radius: 10px;
    }

    .modal-close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .modal-close:hover,
    .modal-close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .zoomed-image {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: contain;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 9999;
        cursor: pointer;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var updateModal = document.getElementById("updateAppointmentModal");
        var photographerModal = document.getElementById("photographerInfoModal");
        var reviewModal = document.getElementById("reviewModal");
        var closeUpdateModal = document.getElementsByClassName("modal-close")[0];
        var closePhotographerModal = document.getElementsByClassName("modal-close")[1];
        var closeReviewModal = document.getElementsByClassName("modal-close")[2];

        document.querySelectorAll('.update-appointment').forEach(function(element) {
            element.addEventListener('click', function() {
                var appointmentId = this.getAttribute('data-id');
                var serviceId = this.getAttribute('data-service');
                var address = this.getAttribute('data-address');
                var phone_number = this.getAttribute('data-phone_number');
                var schedule = this.getAttribute('data-schedule');

                document.getElementById('appointmentId').value = appointmentId;
                document.getElementById('modalService').value = serviceId;
                document.getElementById('modalAddress').value = address;
                document.getElementById('modalPhone').value = phone_number;
                document.getElementById('modalSchedule').value = schedule.replace(' ', 'T');

                updateModal.style.display = "block";

                var formAction = document.getElementById('updateAppointmentForm').action;
                document.getElementById('updateAppointmentForm').action = formAction.replace('/0', '/' + appointmentId);
            });
        });

        document.querySelectorAll('.photographer-info-link').forEach(function(element) {
            element.addEventListener('click', function() {
                var photographer = JSON.parse(this.getAttribute('data-photographer'));

                document.getElementById('modalPhotographerName').innerText = photographer.name;
                document.getElementById('modalPhotographerAddress').innerText = photographer.address;
                document.getElementById('modalPhotographerPhone').innerText = photographer.phone;
                document.getElementById('modalPhotographerDescription').innerText = photographer.description;
                document.getElementById('modalPhotographerImage').src = photographer.image;

                photographerModal.style.display = "block";
            });
        });

        document.querySelectorAll('.review-appointment').forEach(function(element) {
            element.addEventListener('click', function() {
                var appointmentId = this.getAttribute('data-id');
                document.getElementById('appointmentIdForReview').value = appointmentId;
                reviewModal.style.display = "block";
            });
        });

        closeUpdateModal.onclick = function() {
            updateModal.style.display = "none";
        }

        closePhotographerModal.onclick = function() {
            photographerModal.style.display = "none";
        }

        closeReviewModal.onclick = function() {
            reviewModal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == updateModal) {
                updateModal.style.display = "none";
            }
            if (event.target == photographerModal) {
                photographerModal.style.display = "none";
            }
            if (event.target == reviewModal) {
                reviewModal.style.display = "none";
            }
        }
    });

    //zoom ảnh
    document.addEventListener("DOMContentLoaded", function() {
        var images = document.querySelectorAll('.category-right-content-item img');
        var zoomedImageContainer = null;
        var isZoomed = false;

        images.forEach(function(image) {
            image.addEventListener('click', function() {
                if (isZoomed && zoomedImageContainer.contains(event.target)) {
                    // Nếu đã phóng to và click vào ảnh phóng to, không làm gì cả
                    return;
                }

                if (isZoomed) {
                    zoomedImageContainer.remove();
                    isZoomed = false;
                } else {
                    var largerImageSrc = this.src; // Giả sử ảnh lớn có cùng nguồn
                    var largerImage = document.createElement('img');
                    largerImage.src = largerImageSrc;
                    largerImage.classList.add('zoomed-image');

                    zoomedImageContainer = document.createElement('div');
                    zoomedImageContainer.classList.add('zoomed-image-container');
                    zoomedImageContainer.appendChild(largerImage);

                    zoomedImageContainer.addEventListener('click', function() {
                        zoomedImageContainer.remove();
                        isZoomed = false;
                    });

                    document.body.appendChild(zoomedImageContainer);
                    isZoomed = true;
                }
            });
        });
    });


    // Thêm phần script đánh giá dịch vụ khi thành công
    $(document).ready(function() {
        $('#reviewForm').on('submit', function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của form

            var formData = $(this).serialize(); // Lấy tất cả dữ liệu từ form

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: formData,
                success: function(response) {
                    // Hiển thị thông báo cảm ơn sau khi review thành công
                    var userChoice = confirm("Cảm ơn bạn đã đánh giá! Bạn có muốn ở lại trang này không?");
                    if (!userChoice) {
                        window.location.href = '/'; // Điều hướng về trang chủ nếu người dùng chọn không ở lại trang
                    } else {
                        location.reload(); // Tải lại trang hiện tại nếu người dùng chọn ở lại
                        // Ẩn lịch hẹn đã hoàn thành - bạn có thể di chuyển đoạn mã này vào trong success callback của location.reload() nếu cần
                        $('.appointment[data-id="' + appointmentId + '"]').hide();
                    }


                },
                error: function(response) {
                    // Xử lý lỗi nếu có
                    alert('Đã xảy ra lỗi. Vui lòng thử lại sau.');
                }
            });
        });
    });


    $(document).ready(function() {
        $('#updateAppointmentForm').on('submit', function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của form

            var formData = $(this).serialize(); // Lấy tất cả dữ liệu từ form

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: formData,
                success: function(response) {
                    // Hiển thị thông báo sau khi cập nhật thành công
                    var userChoice = confirm("Lịch trình đã được cập nhật thành công! Bạn có muốn ở lại trang này không?");
                    if (!userChoice) {
                        window.location.href = '/'; // Điều hướng về trang chủ nếu người dùng chọn không ở lại trang
                    } else {
                        location.reload(); // Tải lại trang hiện tại nếu người dùng chọn ở lại
                    }
                },
                error: function(response) {
                    // Xử lý lỗi nếu có
                    alert('Đã xảy ra lỗi. Vui lòng thử lại sau.');
                }
            });
        });
    });
</script>
@endsection