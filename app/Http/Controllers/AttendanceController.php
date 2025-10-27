<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('employee')->latest()->paginate(5);
        return view('attendances.index', compact('attendances'));
    }

    public function create()
    {
        $employees = Employee::where('status', 'aktif')->get(['id', 'nama_lengkap']);

        return view('attendances.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id'    => 'required|exists:employees,id',
            'tanggal'        => 'required|date',
            'waktu_masuk'    => 'required|date_format:H:i',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        if ($request->status_absensi == 'hadir') {
            $existing = Attendance::where('karyawan_id', $request->karyawan_id)
                ->where('tanggal', $request->tanggal)
                ->first();
            if ($existing) {
                return back()->with('error', 'Karyawan sudah tercatat hadir pada tanggal tersebut.');
            }
        }

        Attendance::create($request->all());

        return redirect()->route('attendances.index')->with('success', 'Data absensi berhasil ditambahkan.');
    }
    
    public function show(Attendance $attendance)
    {
        $attendance->load('employee');
        return view('attendances.show', compact('attendance'));
    }

    public function edit(Attendance $attendance)
    {
        $employees = Employee::where('status', 'aktif')->get(['id', 'nama_lengkap']);
        return view('attendances.edit', compact('attendance', 'employees'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            //'waktu_masuk' => 'nullable|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        $attendance->update($request->all());

        return redirect()->route('attendances.index')->with('success', 'Data absensi berhasil diperbarui.');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendances.index')->with('success', 'Data absensi berhasil dihapus.');
    }
}
