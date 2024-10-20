<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayrollData extends Model
{
    protected $table = 'payroll_data';

    protected $fillable = [
        'employee_name',
        'payroll_number',
        'basic_salary',
        'allowances',
        'deductions'
    ];

    protected $casts = [
        'allowances' => 'json',
        'deductions' => 'json',
        'basic_salary' => 'decimal:2'
    ];

    public function getAllowancesAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }

    public function getDeductionsAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }

    public function calculateNetSalary(): float
    {
        $totalAllowances = collect($this->allowances)->sum(function ($allowance) {
            return $allowance['is_cash_benefit'] ? ($allowance['amount'] ?? 0) : 0;
        });
        $totalDeductions = collect($this->deductions)->sum(function ($deduction) {
            return $deduction['amount'] ?? 0;
        });
        return $this->basic_salary + $totalAllowances - $totalDeductions;
    }

    public function calculateGrossPay(): float
    {
        $totalAllowances = collect($this->allowances)->sum('amount');
        $totalDeductionsAffectingGross = collect($this->deductions)
            ->where('has_relief', false)
            ->sum('amount');

        return $this->basic_salary + $totalAllowances - $totalDeductionsAffectingGross;
    }
}
