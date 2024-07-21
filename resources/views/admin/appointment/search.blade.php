@extends('admin.layout.master')

@section('content')
<div class="container mx-auto mt-5">
    <h2 class="text-xl font-bold mb-6">Kết quả tìm kiếm cho: "{{ request()->input('keyword') }}"</h2>

    @if($appointments->isEmpty())
    <p class="text-gray-500">Không tìm thấy lịch trình nào.</p>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($appointments as $appointment)
        <div class="bg-white p-5 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-2">{{ $appointment->services->name_service }}</h3>
            <p class="text-gray-700 mb-4">{{ $appointment->schedule }}</p>

            @if ($appointment->status == 0)
            <button class="btn btn-success">
                <a class="text-white" href="{{ route('admin.appointment.update_status', ['id' => $appointment->id, 'status' => 1]) }}" onclick="return confirm('Bạn có muốn chuyển lịch hẹn này sang trạng thái đang chờ?')">Đã xác nhận</a>
            </button>
            @else
            <button class="btn btn-info">
                <a class="text-white" href="{{ route('admin.appointment.update_status', ['id' => $appointment->id, 'status' => 0]) }}" onclick="return confirm('Bạn có muốn xác nhận lịch hẹn này không?')">Đang chờ</a>
            </button>
            @endif

            <form action="{{ route('admin.appointment.updatePhotograp', $appointment->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mt-4">
                    <label for="photographer" class="block text-sm font-medium text-gray-700">Chọn nhiếp ảnh gia:</label>
                    <div class="mt-1">
                        <select name="photographer_id" id="photographer" class="form-select">
                            <option class="italic text-sm">Lựa chọn thợ ảnh</option>
                            @foreach($photographers as $photographer)
                            <option value="{{ $photographer->id }}" {{ $photographer->id == $appointment->photographer_id ? 'selected' : '' }}>
                                {{ $photographer->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="mt-2 btn btn-info" type="submit">Cập nhật thợ</button>
            </form>
            <button class="mt-2 btn btn-danger">
                <a class="text-white" onclick="return confirm('Really delete this appointment?')" href="{{ route('admin.appointment.delete', $appointment->id) }}">Xóa Lịch</a>
            </button>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection