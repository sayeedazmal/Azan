<?php

use App\Http\Controllers\User\UserControllerDeshboard;
use Illuminate\Support\Facades\Route;


route::prefix('user')->group(function(){
    route::middleware(['auth','role:user'])->group(function(){
        route::get('/deshboard',[UserControllerDeshboard::class, 'index'])->name('user.deshboard');
    });

});
