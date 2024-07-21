@extends('admin.layout.master')
@section('title', 'List Appointment')
@section('content_title', 'List Appointment')
@section('content')

<form action="{{ route('admin.appointment.search') }}" method="GET" class="flex gap-3 items-center ">
    @csrf
    <div class="flex">
        <input type="text" name="keyword" class="border border-[#dddd] px-3 py-0" placeholder="Tìm kiếm lịch theo tháng ..." value="{{ old('keyword') }}">
        <button type="submit" class="pl-5" title="Nhập thông tin tìm kiếm theo năm - tháng">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </div>
</form>
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Service</th>
            <th scope="col">Schedule</th>
            <th scope="col">Photographer</th>
            <th scope="col">Status</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($appointment as $key => $appointments)
        <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <td>{{$appointments->users->name}}</td>
            <td>{{ $appointments->services->name_service }}</td>
            <td>{{ date('d-m-Y', strtotime($appointments->schedule)) }}</td>
            <td>
                <form action="{{ route('admin.appointment.updatePhotograp', $appointments->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="input-group">
                        <select name="photographer_id" class="form-control">
                            <option class="italic text-sm">Lựa chọn thợ ảnh</option>
                            @foreach($photographers as $photographer)
                            <option value="{{ $photographer->id }}" {{ $photographer->id == $appointments->photographer_id ? 'selected' : '' }}>
                                {{ $photographer->name }}
                            </option>
                            @endforeach
                        </select>
                        <button class="btn btn-info" type="submit">Cập nhật</button>
                </form>
            </td>
            <td>
                @if ($appointments->status == 0)
                <button class="btn btn-success w-20">
                    <a class="text-white" href="{{ route('admin.appointment.update_status', ['id' => $appointments->id, 'status' => 1]) }}" onclick="return confirm('Bạn có muốn chuyển lịch hẹn này sang trạng thái đang chờ?')">Đã xác nhận</a>
                </button>
                @else
                <button class="btn btn-info w-20">
                    <a class="text-white" href="{{ route('admin.appointment.update_status', ['id' => $appointments->id, 'status' => 0]) }}" onclick="return confirm('Bạn có muốn xác nhận lịch hẹn này không?')">Đang chờ</a>
                </button>
                @endif
            </td>
            <td>{{ ($appointments->phone_number)}}</td>
            <td>{{ ($appointments->address) }}</td>
            <td>
                <div class="grid gap-2 items-center">
                    <!-- <button class="btn btn-primary">
                        <a class="text-white" href="{{ route('admin.appointment.edit', $appointments->id) }}">Edit</a>
                    </button> -->
                    <button class="btn btn-danger">
                        <a class="text-white" onclick="return confirm('Really delete this appointment?')" href="{{ route('admin.appointment.delete', $appointments->id) }}">Delete</a>
                    </button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection