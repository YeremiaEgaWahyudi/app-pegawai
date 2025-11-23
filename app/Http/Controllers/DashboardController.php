<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use App\Models\Attendance;
use App\Models\Salary;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Count statistics
        $totalEmployees = Employee::count();
        $totalDepartments = Department::count();
        $totalPositions = Position::count();

        // Attendance stats for today
        $todayAttendance = Attendance::whereDate('tanggal', Carbon::today())->get();
        $presentToday = $todayAttendance->where('status_absensi', 'hadir')->count();
        $absentToday = $todayAttendance->where('status_absensi', 'alpha')->count();

        // Recent employees
        $recentEmployees = Employee::orderBy('created_at', 'desc')
            ->with('department', 'position')
            ->take(5)
            ->get();

        // Department distribution
        $departmentStats = Department::withCount('employees')
            ->orderByDesc('employees_count')
            ->take(5)
            ->get();

        // Attendance this month
        $currentMonth = Carbon::now();
        $monthlyAttendance = Attendance::whereYear('tanggal', $currentMonth->year)
            ->whereMonth('tanggal', $currentMonth->month)
            ->groupBy('status_absensi')
            ->selectRaw('status_absensi, COUNT(*) as total')
            ->get();

        // Latest salaries
        $latestSalaries = Salary::orderBy('created_at', 'desc')
            ->with('employee')
            ->take(5)
            ->get();

        return view('dashboard.index', [
            'totalEmployees' => $totalEmployees,
            'totalDepartments' => $totalDepartments,
            'totalPositions' => $totalPositions,
            'presentToday' => $presentToday,
            'absentToday' => $absentToday,
            'recentEmployees' => $recentEmployees,
            'departmentStats' => $departmentStats,
            'monthlyAttendance' => $monthlyAttendance,
            'latestSalaries' => $latestSalaries,
        ]);
    }
}
