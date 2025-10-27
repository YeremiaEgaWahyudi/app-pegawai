<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class SalaryController extends Controller
{

    public function index()
    {
        $salaries = Salary::with('employee')->latest()->paginate(5);
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::with('position')->where('status', 'aktif')->get();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id|unique:salaries,karyawan_id,NULL,id,bulan,' . $request->bulan,
            'bulan' => 'required|string|max:10',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $data = $request->all();

        $gaji_pokok = $data['gaji_pokok'];
        $tunjangan = $data['tunjangan'] ?? 0;
        $potongan = $data['potongan'] ?? 0;

        $data['total_gaji'] = $gaji_pokok + $tunjangan - $potongan;

        Salary::create($data);

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil ditambahkan.');
    }


    public function show(Salary $salary)
    {
        $salary->load('employee');
        return view('salaries.show', compact('salary'));
    }

    public function edit(Salary $salary)
    {
        $employees = Employee::where('status', 'aktif')->get();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id|unique:salaries,karyawan_id,' . $salary->id . ',id,bulan,' . $request->bulan,
            'bulan' => 'required|string|max:10',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $data = $request->all();

        $gaji_pokok = $data['gaji_pokok'];
        $tunjangan = $data['tunjangan'] ?? 0;
        $potongan = $data['potongan'] ?? 0;

        $data['total_gaji'] = $gaji_pokok + $tunjangan - $potongan;

        $salary->update($data);

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil diperbarui.');
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil dihapus.');
    }
}
