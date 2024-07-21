@extends('client.layout.master')
@section('title', 'Create Appointment')
@section('content_title', 'Create Appointment')
@section('content')

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header font-bold bg-[#AAA] text-center">
            <h4 class="mb-0">Liên Hệ Với Chúng Tôi</h4>
        </div>
        <div class="card-body">
            @if(Auth::check())
            @if(Auth::user()->role == 0 || Auth::user()->role == 1)
            <form method="POST" action="{{ route('client.appointment.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled />
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                </div>
                <div class="mb-3">
                    <label for="service_id" class="form-label">Service</label>
                    <select class="form-select" name="service_id">
                        <option value="" class="italic">Lựa chọn dịch vụ</option>
                        @foreach ($ser as $items)
                        <option value="{{ $items->id }}">{{ $items->name_service }}</option>
                        @endforeach
                    </select>
                    @error('service_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="address" value="{{old('address')}}" />
                    @error('address')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Điện thoại</label>
                    <input type="number" class="border border-gray-200 rounded p-2 w-full" name="phone_number" value="{{old('phone_number')}}" />
                    @error('phone_number')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="schedule" class="form-label">Schedule</label>
                    <input type="datetime-local" class="form-control" name="schedule" value="{{ old('schedule') }}" />
                    @error('schedule')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Create a new appointment</button>
            </form>
            @else
            <p class="text-center">Bạn không có quyền truy cập vào trang này.</p>
            @endif
            @else
            <p class="text-center">Vui lòng đăng nhập để truy cập vào trang này.</p>
            <script>
                setTimeout(function() {
                    window.location.href = "{{ route('login') }}";
                }, 2000);
            </script>
            @endif
        </div>
    </div>
</div>
@endsection