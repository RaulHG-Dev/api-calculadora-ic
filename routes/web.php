<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

Route::get('/', function () {
    abort(Response::HTTP_FORBIDDEN, 'You are not allowed to access this route');
});
