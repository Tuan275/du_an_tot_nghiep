<?php

namespace App\Http\Controllers;

use App\Models\AboutStudio;
use App\Models\Appointments;
use App\Models\Products;
use App\Models\Reviews;
use App\Models\Services;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function show_home()
    {
        $reviews=Reviews::all();
        $ser = Services::all();
        $product = Products::all();
        return view('client.home', compact('ser', 'product','reviews'));
    }



    public function show_product()
    {
        $product = Products::all();
        return view('client.album', compact('product'));
    }

    public function show_price()
    {

        $price = Services::all();
        return view('client.price', compact('price'));
    }

    public function dashboard()
    {
        // Đếm số lượng lịch đã đặt
        $totalAppointments = Appointments::count();

        $totalRevenue = Appointments::join('services', 'appointments.service_id', '=', 'services.id')
                                    ->sum('services.price');

        // Lấy dịch vụ được sử dụng nhiều nhất
        $mostUsedService = Services::withCount('appointments')
            ->orderBy('appointments_count', 'desc')
            ->first();

         // Lấy tất cả dịch vụ và số lượng sử dụng
         $servicesUsage = Services::withCount('appointments')->get();

         // Thống kê doanh thu theo tháng
         $monthlyRevenue = DB::table('appointments')
         ->join('services', 'appointments.service_id', '=', 'services.id')
         ->selectRaw('SUM(services.price) as total, MONTH(appointments.schedule) as month')
         ->whereYear('appointments.schedule', Carbon::now()->year)
         ->groupBy('month')
         ->orderBy('month')
         ->get();
         


        return view('admin.dashboard.home', compact('totalAppointments', 'mostUsedService','totalRevenue','servicesUsage','monthlyRevenue'));
    }

    public function show_appointment()
    {
       
        $service = Services::all();
       
        // Lấy lịch hẹn của người dùng đang đăng nhập
        $user = Auth::user();
        $appointment = Appointments::where('user_id',$user->id)->get();
        return view('client.userDetail', compact('appointment', 'user', 'service'));
    }


    public function show_about()
    {
        $about = AboutStudio::all();
        return view('client.about', compact('about'));
    }
    
}
