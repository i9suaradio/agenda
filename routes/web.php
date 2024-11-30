<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/clientes', function () {
    return view('clientes');
});

Route::get('/cliente', function () {
    return view('cliente');
});

Route::get('/agenda', function () {
    return view('agenda');
});

Route::get('/agendadodia', function () {
    return view('agendadodia');
});