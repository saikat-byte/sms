<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeeHeadController;
use App\Http\Controllers\FeeStructureController;
use App\Http\Controllers\StudentClassController;
use Illuminate\Support\Facades\Route;



Route::group(["prefix"=> "admin"], function(){

    Route::group(["middleware"=>"admin.guest"], function(){
        Route::get('login', [AdminController::class, 'index'])->name('admin.login');
        Route::post('login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
        Route::get('register', [AdminController::class, 'register'])->name('admin.register');
    });

    Route::group(["middleware"=>"admin.auth"], function(){

        // Academic year management

        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('form', [AdminController::class, 'form'])->name('form');
        Route::get('table', [AdminController::class, 'table'])->name('table');
        Route::get('academic-year-list', [AcademicYearController::class, 'index'])->name('academic.year.list');
        Route::get('academic-year', [AcademicYearController::class, 'create'])->name('academic.year');
        Route::get('academic-year/{id}/edit', [AcademicYearController::class, 'edit'])->name('academic.year.edit');
        Route::put('academic-year/update', [AcademicYearController::class, 'update'])->name('academic.year.update');
        Route::delete('academic-year/{id}/delete', [AcademicYearController::class, 'destroy'])->name('academic.year.delete');
        Route::post('academic-year', [AcademicYearController::class, 'store'])->name('academic.year.store');

         // Student class management
         Route::get('student-class-list', [StudentClassController::class, 'index'])->name('student.class.list');
         Route::get('student-class-create', [StudentClassController::class, 'create'])->name('student.class.create');
         Route::get('student-class/{id}/edit', [StudentClassController::class, 'edit'])->name('student.class.edit');
         Route::put('student-class/update', [StudentClassController::class, 'update'])->name('student.class.update');
         Route::delete('student-class/{id}/delete', [StudentClassController::class, 'destroy'])->name('student.class.delete');
         Route::post('student-class', [StudentClassController::class, 'store'])->name('student.class.store');

        //  Fee head management
        Route::get('fee-head-list', [FeeHeadController::class, 'index'])->name('fee.head.list');
        Route::get('fee-head-create', [FeeHeadController::class, 'create'])->name('fee.head.create');
        Route::get('fee-head/{id}/edit', [FeeHeadController::class, 'edit'])->name('fee.head.edit');
        Route::put('fee-head/update', [FeeHeadController::class, 'update'])->name('fee.head.update');
        Route::delete('fee-head/{id}/delete', [FeeHeadController::class, 'destroy'])->name('fee.head.delete');
        Route::post('fee-head', [FeeHeadController::class, 'store'])->name('fee.head.store');

        //  Fee structure management
        Route::get('fee-structure-create', [FeeStructureController::class, 'create'])->name('fee.structure.create');
        Route::post('fee-structure-store', [FeeStructureController::class, 'store'])->name('fee.structure.store');
        Route::get('fee-structure-list', [FeeStructureController::class, 'index'])->name('fee.structure.list');
        Route::delete('fee-structure/{id}/delete', [FeeStructureController::class, 'destroy'])->name('fee.structure.delete');
        Route::get('fee-structure/{id}/edit', [FeeStructureController::class, 'edit'])->name('fee.structure.edit');
        Route::put('fee-structure/{id}/update', [FeeStructureController::class, 'update'])->name('fee.structure.update');

    });

});






