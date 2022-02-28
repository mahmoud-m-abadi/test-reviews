<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::prefix('v1')->group(function () {
    /** Manager side */
    Route::prefix('manager')->group(function () {
        foreach (File::allFiles(__DIR__ . '/Routes/Manager') as $routeFile) {
            require $routeFile->getPathname();
        }
    });

    /** Client side */
    Route::prefix('client')->group(function () {
        foreach (File::allFiles(__DIR__ . '/Routes/Client') as $routeFile) {
            require $routeFile->getPathname();
        }
    });
});
