<?php

namespace App\Services;

class LoanCalculator
{
    public static function calculateEMI($principal, $annualInterestRate, $term)
    {
        $monthlyInterestRate = ($annualInterestRate / 12) / 100;
        $emi = $principal * $monthlyInterestRate * pow(1 + $monthlyInterestRate, $term) / (pow(1 + $monthlyInterestRate, $term) - 1);
        return round($emi, 2);
    }

    public static function generateSchedule($loan)
    {
        $principal = $loan->loan_amount;
        $annualInterestRate = $loan->interest_rate;
        $term = $loan->term;
        $monthlyInterestRate = ($annualInterestRate / 12) / 100;
        $emi = self::calculateEMI($principal, $annualInterestRate, $term);

        $schedules = [];
        $remainingPrincipal = $principal;

        for ($i = 1; $i <= $term; $i++) {
            $interestAmount = $remainingPrincipal * $monthlyInterestRate;
            $principalAmount = $emi - $interestAmount;
            $remainingPrincipal -= $principalAmount;

            $schedules[] = [
                'loan_id' => $loan->id,
                'due_date' => now()->addMonths($i)->toDateString(),
                'amount_due' => $emi,
                'principal_amount' => round($principalAmount, 2),
                'interest_amount' => round($interestAmount, 2),
                'status' => 'pending',
            ];
        }

        return $schedules;
    }
}
