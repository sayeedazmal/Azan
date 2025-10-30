<?php

use App\Http\Controllers\Admin\AdminControllerDeshboard;
use App\Http\Controllers\User\UserControllerDeshboard;
use App\Http\Controllers\Vendor\VendorControllerDeshboard;
use Illuminate\Support\Facades\Route;

route::prefix('admin')->group(function(){
    route::middleware(['auth','role:admin'])->group(function(){
        route::get('/deshboard',[AdminControllerDeshboard::class, 'index'])->name('admin.deshboard');
    });

});

