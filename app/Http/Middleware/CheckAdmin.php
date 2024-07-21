<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Xử lý yêu cầu đến.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Cho phép cả người dùng (role == 0) và quản trị viên (role == 1) truy cập
            if (Auth::user()->role == 1 || Auth::user()->role == 0) {
                return $next($request);
            } else {
                // Chuyển hướng nếu vai trò không phù hợp
                return redirect('user/login_form')->with('message', 'Bạn không có quyền truy cập.');
            }
        } else {
            // Chuyển hướng nếu chưa đăng nhập
            return redirect('user/login_form')->with('message', 'Vui lòng đăng nhập để truy cập.');
        }
    }
}
