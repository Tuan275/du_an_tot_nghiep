<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Photographer;
use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class AppointmentsController extends Controller
{
    public function index()
    {

        // // Lấy thời điểm hiện tại trừ đi một ngày
        // $oneDayAgo = Carbon::now()->subDay();

        // // Xóa các lịch đã đặt trước thời điểm hiện tại một ngày
        // Appointments::where('schedule', '<', $oneDayAgo)->delete();

        // Lấy dữ liệu cần thiết sau khi xóa
        $appointment = Appointments::all();
        
        $photographers = Photographer::all();
        $user = User::all();
        $service = Services::all();

        return view('admin.appointment.list', compact('appointment', 'photographers', 'service', 'user'));
    }

    public function create()
    {
        $ser = Services::all();
        //
        return view('client.contact', [
            'ser' => $ser,
        ]);
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'user_id' => 'required',
            'service_id' => 'required',
            'schedule' => 'required|date|after:today',
            'address' => 'required',
            'phone_number' => 'required',
            
        ]);

        Appointments::create($validated);
        $services = Services::find($request->service_id);


        return redirect()->route('client.userDetail');
    }

    //sửa - xóa

    public function edit($id)
    {
        $user = User::all();
        $service = Services::all();
        $appointment = Appointments::find($id);
        return view('admin.appointment.edit', [
            'appointment' => $appointment,
            'user' => $user,
            'service' => $service
        ]);
    }

    public function update(Request $request)
    {
        $formFields = $request->validate([
            'service_id' => 'required',
            'schedule' => 'required',
            'status' => 'required',
            'user_id' => 'required',
            'phone_number'=>'required',
            'address'=>'required'

        ]);
        // dd($formFields);
        $appointment = Appointments::find($formFields['id']);

        $appointment->service_id = $formFields['service_id'];
        $appointment->schedule = $formFields['schedule'];
        $appointment->status = $formFields['status'];
        $appointment->user_id = $formFields['user_id'];
        $appointment->phone_number = $formFields['phone_number'];
        $appointment->address = $formFields['address'];
        $appointment->created_at = Carbon::now();


        $appointment->save();
        return redirect()->route('admin.appointment.list');
    }

    public function update_status(Request $request)
    {
        $appointment = Appointments::find($request->id);
        if ($appointment) {
            $appointment->status = $request->status;
        }
        $appointment->save();
        return redirect()->route('admin.appointment.list');
    }

    public function delete($id)
    {
        Appointments::where('id', $id)->delete();
        return redirect('admin/appointment/list')->with('message', 'Delete appointment successfully');
    }

    public function deleteAll()
    {
        // Xóa tất cả các lịch hẹn
        Appointments::truncate();

        return redirect()->back()->with('success', 'Tất cả lịch hẹn đã được xoá thành công.');
    }

    // update thợ ảnh vào lịch đã đặt
    public function updatePhotograp(Request $request, $id)
    {
        $request->validate([
            'photographer_id' => 'required|exists:photographers,id',
        ]);

        $appointment = Appointments::findOrFail($id);

        $appointment->photographer_id = $request->input('photographer_id');
        $appointment->save();

        return redirect()->route('admin.appointment.list')->with('success', 'Cập nhật nhiếp ảnh gia thành công!');
    }


    //update lịch trình từ phía Client

    public function updateClient(Request $request, $id)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'schedule' => 'required|date_format:Y-m-d\TH:i',
        ]);

        // Find the appointment and update its data
        $appointment = Appointments::findOrFail($id);
        $appointment->service_id = $request->service_id;
        $appointment->schedule = $request->schedule;
        $appointment->address = $request->address;
        $appointment->phone_number = $request->phone_number;
        // Đặt lại thông tin nhiếp ảnh gia và trạng thái cần xác nhận
        $appointment->photographer_id = 0;
        $appointment->status = 1; // Đang chờ xác nhận

        $appointment->save();

        return redirect()->back()->with('success', 'Lịch hẹn đã được cập nhật thành công.');
    }

    // xóa lịch trình từ phía Client
    public function destroy($id)
    {
        Appointments::where('id', $id)->delete();
        return redirect('userDetail')->with('message', 'Delete appointment successfully');
    }


    //tìm kiếm theo lịch
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
    
        // Validate the format of the keyword
        if (!preg_match('/^\d{4}-\d{2}$/', $keyword)) {
            return back()->with('error', 'Please enter the month in the format YYYY-MM.');
        }
    
        // Extract year and month from the keyword
        list($year, $month) = explode('-', $keyword);
    
        // Search appointments by year and month
        $appointments = Appointments::whereYear('schedule', $year)
                                    ->whereMonth('schedule', $month)
                                    ->get();
    
        // Retrieve all photographers
        $photographers = Photographer::all();
    
        return view('admin.appointment.search', compact('appointments', 'photographers'));
    }
}
