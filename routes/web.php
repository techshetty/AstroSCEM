<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/rashi', function () {
    return view('index');
});

Route::get('/rashiphala', function () {
    return view('rashiphala');
});
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

Route::post('/proxy/planets/extended', function (Request $request) {
    $apiKey = '';

    $response = Http::withHeaders([
        'x-api-key' => $apiKey,
        'Content-Type' => 'application/json',
    ])->post('https://json.apiastro.com/planets/extended', $request->all());

    return response()->json($response->json(), $response->status())
                     ->withHeaders([
                         'Access-Control-Allow-Origin' => '*',
                         'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS',
                         'Access-Control-Allow-Headers' => 'Content-Type, x-api-key',
                     ]);
});