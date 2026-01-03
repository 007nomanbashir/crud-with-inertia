<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('check', [AuthController::class, 'check']);
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Home');
    });
    Route::get('settings', function () {
        return Inertia::render('Settings');
    });
    Route::get('users', function () {
        return Inertia::render(
            'user/Index',
            [
                'users' => User::query()
                    ->when(Request::input('search'), function ($query, $search) {
                        $query->where('name', 'like', "%{$search}%");
                    })
                    ->paginate(10)
                    ->withQueryString()
                    ->through(fn($user) => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email
                    ]),
                'filters' => Request::only(['search'])
            ]
        );
    })->name('users');
    Route::get('users/create', function () {
        return Inertia::render('user/Create');
    });
    Route::post('users/{user?}', function (User $user) {
        $validated = Request::validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),

            ],
            'password' => 'nullable|min:6',
        ]);
        User::updateOrCreate(
            ['id' => $user->id],
            $validated
        );
        return redirect('/users');
    });
    Route::delete('delete/{user?}', function (User $user) {
        $user->delete();
        return back();
    })->name('delete');
    Route::get('edit/{id?}', function (User $id) {
        return Inertia::render('user/Edit', ['data' => $id]);
    })->name('edit');
    Route::post('logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');
});
