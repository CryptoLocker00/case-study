<?php

use App\Http\Controllers\Backend\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Backend\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Backend\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Backend\Auth\NewPasswordController;
use App\Http\Controllers\Backend\Auth\PasswordResetLinkController;
use App\Http\Controllers\Backend\Auth\RegisteredUserController;
use App\Http\Controllers\Backend\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('backend.register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('backend.login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('backend.password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('backend.password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('backend.password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('backend.password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth')
                ->name('backend.verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('backend.verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('backend.verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('backend.password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('backend.logout');
