<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RenstraController;
use App\Http\Controllers\Api\V0\DescController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/idgenerator', function () {
    return view('generator_id');
});

Route::group(['prefix' => 'renstra'], function () {
    Route::get('/', [RenstraController::class, 'index'])->name('renstra.index');
    Route::get('/jelajah', [RenstraController::class, 'jelajah'])->name('renstra.jelajah');
    Route::get('/detail/{master_id}', [RenstraController::class, 'detail'])->name('renstra.detail');
    Route::get('/view/{master_ik}', [RenstraController::class, 'indi_view'])->name('edit.view');
});

Route::group(['prefix'=>'edit'], function(){
    Route::get('/deskripsi/{master_id}', [RenstraController::class, 'desc_edit'])->name('edit.deskripsi');
    Route::get('/indikator/{master_id}', [RenstraController::class, 'indi_edit'])->name('edit.indikator');
});


// Route To API/V0
Route::group(['prefix' => 'api/v0'], function () {
    Route::get('/desc', [DescController::class, 'index'])->name('api_v0_desc.index');
    Route::get('/desc/fetch', [DescController::class, 'fetch'])->name('api_v0_desc.fetch');
    Route::get('/desc/getTujuan', [DescController::class, 'getTujuan'])->name('api_v0_desc.getTujuan');
    Route::get('/desc/getSasaran/{master_id}', [DescController::class, 'getSasaran'])->name('api_v0_desc.getSasaran');
    Route::get('/desc/getProgram/{master_id}', [DescController::class, 'getProgram'])->name('api_v0_desc.getProgram');
    Route::get('/desc/getKegiatan/{master_id}', [DescController::class, 'getKegiatan'])->name('api_v0_desc.getKegiatan');
    Route::get('/desc/getSubkegiatan/{master_id}', [DescController::class, 'getSubkegiatan'])->name('api_v0_desc.getSubkegiatan');
    Route::get('/desc/detailcode/{master_id}', [DescController::class, 'detailcode'])->name('api_v0_desc.detailcode');
    Route::get('/desc/detail/{master_id}', [DescController::class, 'detail'])->name('api_v0_desc.detail');
    // Update description and indicator
    Route::get('/get/description/{master_id}', [DescController::class, 'getdescription'])->name('api_v0_desc.getdescription');
    Route::post('/set/description', [DescController::class, 'setdesctiption'])->name('api_v0_desc.setdesctiption');
    Route::get('/get/indikator/{master_ik}', [DescController::class, 'getindikator'])->name('api_v0_desc.getindikator');
    Route::post('/set/indikator', [DescController::class, 'setindikator'])->name('api_v0_desc.setindikator');
    Route::get('/view/{master_ik}', [DescController::class, 'getallindikator'])->name('api_v0_desc.getallindikator');
});
