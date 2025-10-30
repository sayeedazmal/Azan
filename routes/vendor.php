<?php


use App\Http\Controllers\Vendor\VendorControllerDeshboard;
use Illuminate\Support\Facades\Route;


route::prefix('vendor')->group(function(){
    route::middleware(['auth','role:vendor'])->group(function(){
        route::get('/deshboard',[VendorControllerDeshboard::class, 'index'])->name('vendor.deshboard');
    });

});
