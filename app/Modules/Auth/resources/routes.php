<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Auth\LoginController;
use App\Modules\Auth\ForgotPasswordController;
use App\Modules\Auth\ResetPasswordController;

$showLoginForm = route_handler(LoginController::class, 'showLoginForm');
$login = route_handler(LoginController::class, 'login');
$logout = route_handler(LoginController::class, 'logout');

// Authentication Routes...
Route::get('login', $showLoginForm)->name('login');
Route::post('login', $login);
Route::post('logout', $logout)->name('logout');

$showLinkRequestForm = route_handler(ForgotPasswordController::class, 'showLinkRequestForm');
$sendResetLinkEmail = route_handler(ForgotPasswordController::class, 'sendResetLinkEmail');
$showResetForm = route_handler(ResetPasswordController::class, 'showResetForm');
$reset = route_handler(ResetPasswordController::class, 'reset');

// Password Reset Routes...
Route::get('password/reset', $showLinkRequestForm)->name('password.request');
Route::post('password/email', $sendResetLinkEmail)->name('password.email');
Route::get('password/reset/{token}', $showResetForm)->name('password.reset');
Route::post('password/reset', $reset);
