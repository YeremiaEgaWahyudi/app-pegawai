<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::with('department', 'position')->latest()->paginate(5);

        return view('employees.index', compact('employees'));
    }


    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.create', compact('departments', 'positions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'email'         => 'required|email|max:255|unique:employees,email',
            'nomor_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'status'        => 'required|string|in:aktif,nonaktif',
            'departemen_id' => 'required|exists:departments,id',
            'jabatan_id'    => 'required|exists:positions,id',
        ]);
        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil ditambahkan');
    }


    public function show(Employee $employee)
    {
        $employee->load('department', 'position');
        return view('employees.show', compact('employee'));
    }


    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.edit', compact('employee', 'departments', 'positions'));
    }


    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'email'         => 'required|email|max:255|unique:employees,email,' . $employee->id,
            'nomor_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'status'        => 'required|string|in:aktif,nonaktif',
            'departemen_id' => 'required|exists:departments,id',
            'jabatan_id'    => 'required|exists:positions,id',
        ]);

        $employee->update($request->only([
            'nama_lengkap',
            'email',
            'nomor_telepon',
            'tanggal_lahir',
            'alamat',
            'tanggal_masuk',
            'status',
            'departemen_id',
            'jabatan_id',
        ]));

        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil diperbarui');
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
