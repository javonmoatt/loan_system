<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Approval;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Assuming you have a relationship to get the approvals for the current user
        // if (auth()->user()->approvals()->count() !== null) {
        //     $approvals = 0;
        // }
        // else {
        //     $approvalCount = auth()->user()->approvals()->count();# code...
        // }
        // $approvalCount = auth()->user()->;

        // view('dashboard.index', [
        //     'approvalCount' => $approvalCount,
        // ]);
    }
}
