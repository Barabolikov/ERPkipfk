<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
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

Route::get('/', function () {
    return redirect('home');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//ADM route
Route::controller(AdminController::class)->group(function () {
    Route::get('home', [AdminController::class, 'Home'])->middleware(['auth', 'verified'])->name('home');;
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'Profile'])->name('admin.profile');
    Route::get('/edit/profile', [AdminController::class, 'EditProfile'])->name('edit.profile');
    Route::post('/update/profile', [AdminController::class, 'UpdateProfile'])->name('update.profile');
    Route::get('/change/password', [AdminController::class, 'ChangePassword'])->name('change.password');
    Route::post('/update/password', [AdminController::class, 'UpdatePassword'])->name('update.password');
});
Route::prefix('users')->group(function () {
    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('user.add');
    Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');

});
Route::prefix('students')->group(function () {
    Route::get('/department/view', [DepartmentController::class, 'DepartmentView'])->name('department.view');
    Route::get('/department/view/{id}', [DepartmentController::class, 'DepartmentViewOne'])->name('department.view_one');
    Route::get('/department/add', [DepartmentController::class, 'DepartmentAdd'])->name('department.add');
    Route::post('/department/store', [DepartmentController::class, 'DepartmentStore'])->name('department.store');
    Route::get('/department/edit/{id}', [DepartmentController::class, 'DepartmentEdit'])->name('department.edit');
    Route::post('/department/update/{id}', [DepartmentController::class, 'DepartmentUpdate'])->name('department.update');
    Route::get('/department/delete/{id}', [DepartmentController::class, 'DepartmentDelete'])->name('department.delete');

    Route::get('/group/view', [GroupController::class, 'GroupView'])->name('group.view');
    Route::get('/group/add', [GroupController::class, 'GroupAdd'])->name('group.add');
    Route::post('/group/store', [GroupController::class, 'GroupStore'])->name('group.store');
    Route::get('/group/edit/{id}', [GroupController::class, 'GroupEdit'])->name('group.edit');
    Route::post('/group/update/{id}', [GroupController::class, 'GroupUpdate'])->name('group.update');
    Route::get('/group/delete/{id}', [GroupController::class, 'GroupDelete'])->name('group.delete');

    Route::get('/student/view', [StudentController::class, 'StudentView'])->name('student.view');
    Route::get('/student/view/{id}', [StudentController::class, 'StudentViewOne'])->name('student.view_one');
    Route::get('/student/grview/{id}', [StudentController::class, 'StudentGrView'])->name('student.grview');
    Route::get('/student/add', [StudentController::class, 'StudentAdd'])->name('student.add');
    Route::post('/student/store', [StudentController::class, 'StudentStore'])->name('student.store');
    Route::get('/student/edit/{id}', [StudentController::class, 'StudentEdit'])->name('student.edit');
    Route::post('/student/update/{id}', [StudentController::class, 'StudentUpdate'])->name('student.update');
    Route::get('/student/delete/{id}', [StudentController::class, 'StudentDelete'])->name('student.delete');
});

require __DIR__.'/auth.php';
