<?php

namespace App\Http\Controllers;

use App\Models\PayrollData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PayrollDataController extends Controller
{
    public function index(): JsonResponse
    {
        $payrolls = PayrollData::all()->map(function ($payroll) {
            return [
                'employee_number' => $payroll->payroll_number,
                'name' => $payroll->employee_name,
                'basic_salary' => $payroll->basic_salary,
                'allowances' => $payroll->allowances,
                'gross_pay' => $payroll->calculateGrossPay(),
                'deductions' => $payroll->deductions,
                'net_pay' => $payroll->calculateNetSalary(),
            ];
        });

        return response()->json($payrolls);
    }

    /**
     * Display a specific payroll record by employee number.
     */
    public function show($employee_number): JsonResponse
    {
        $payroll = PayrollData::where('payroll_number', $employee_number)->first();

        if (!$payroll) {
            return response()->json(['message' => 'Payroll data not found'], 404);
        }

        return response()->json([
            'employee_number' => $payroll->payroll_number,
            'name' => $payroll->employee_name,
            'basic_salary' => $payroll->basic_salary,
            'allowances' => $payroll->allowances,
            'gross_pay' => $payroll->calculateGrossPay(),
            'deductions' => $payroll->deductions,
            'net_pay' => $payroll->calculateNetSalary(),
        ]);
    }


}
