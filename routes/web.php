<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RenstraController;
use App\Http\Controllers\RencaksiController;
use App\Http\Controllers\Api\V0\DescController;
use App\Http\Controllers\Api\V0\RensiController;
use App\Http\Controllers\Api\V0\IndicatorsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\WalidataController;
use App\Http\Controllers\CcdBudgetController;
use App\Http\Controllers\CcdDescController;

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('dashboard');
});


Route::get('/idgenerator', function () {
    return view('generator_id');
});

Route::middleware(['auth'])->group(function () {

    Route::group(['prefix' => 'renstra'], function () {
        Route::get('/', [RenstraController::class, 'index'])->name('renstra.index');
        Route::get('/jelajah', [RenstraController::class, 'jelajah'])->name('renstra.jelajah');
        Route::get('/detail/{master_id}', [RenstraController::class, 'detail'])->name('renstra.detail');
        Route::get('/view/{master_ik}', [RenstraController::class, 'indi_view'])->name('renstra.view');
        Route::get('/print/{master_ik}', [RenstraController::class, 'indi_print'])->name('renstra.print');
        Route::get('/all-sk/{tahun}',[RenstraController::class,'all_sk'])->name('renstra.allsk');
        Route::get('/all-kg/{tahun}',[RenstraController::class,'all_kg'])->name('renstra.allkg');
        Route::get('/all-pg/{tahun}',[RenstraController::class,'all_pg'])->name('renstra.allpg');
        Route::get('/all-ss/{tahun}',[RenstraController::class,'all_ss'])->name('renstra.allss');
    });
    

    Route::group(['prefix'=>'edit'], function(){
        Route::get('/deskripsi/{master_id}', [RenstraController::class, 'desc_edit'])->name('edit.deskripsi');
        Route::get('/indikator/{master_id}', [RenstraController::class, 'indi_edit'])->name('edit.indikator');
        Route::get('/analisa/{master_ik}',[RenstraController::class, 'anal_edit'])->name('edit.analisa');
    });

    Route::group(['prefix'=>'rensi'], function(){
        Route::get('/',[RencaksiController::class, 'index'])->name('rensi.index');
        // Route::get('/ukur-kinerja/{master_ik}',function($master_ik){
        //     echo $master_ik;
        // });
        Route::get('/ukur-kinerja/{master_ik}',[RencaksiController::class, 'ukin'])->name('rensi.ukin');
        Route::get('/iku/{master_ik}',[RencaksiController::class, 'iku'])->name('rensi.iku');
    });

    // Administrator / Wali data area
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        // Route admin di sini
        // Route::get('/', function () {
        //     return view('walidata.dashboard');
        // });
        Route::get('/', [WalidataController::class, 'index'])->name('walidata.index');
        Route::get('/tgkinerja', [WalidataController::class, 'tarkin'])->name('walidata.tarkin');
        Route::get('/tganggaran', [WalidataController::class, 'tarang'])->name('walidata.tarang');
        Route::get('/desc/form-sk',[WalidataController::class, 'skbaru'])->name('walidata.form-sk');
    });

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

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
    Route::get('/get/indikaget/{master_ika}',[DescController::class, 'getIndikatorDanBudget'])->name('api_v0_desc.getindikaget');
    Route::post('/set/indikator', [DescController::class, 'setindikator'])->name('api_v0_desc.setindikator');
    Route::get('/view/{master_ik}', [DescController::class, 'getallindikator'])->name('api_v0_desc.getallindikator');
    Route::get('/budget/{master_ik}', [DescController::class, 'getbudget'])->name('api_v0_desc.getbudget');

    // Uji Konfirmasi
    Route::get('/all-sk/{tahun}',[DescController::class, 'allSK'])->name('api_v0_desc.allsk');
    Route::get('/all-kg/{tahun}',[DescController::class, 'allKG'])->name('api_v0_desc.allkg');
    Route::get('/all-pg/{tahun}',[DescController::class, 'allPG'])->name('api_v0_desc.allpg');
    Route::get('/all-ss/{tahun}',[DescController::class, 'allSS'])->name('api_v0_desc.allss');
    // Masalah, Solusi, Analisa
    Route::get('/getanalisa/{master_ik}',[DescController::class, 'getAnalisa'])->name('api_v0_indi.getanalisa');
    Route::patch('/setanalisa/{master_ik}',[DescController::class, 'setAnalisa'])->name('api_v0_indi.setanalisa');
    
    // Rencana Aksi (rensi)
    Route::get('/rensi',[RensiController::class, 'rensi'])->name('api_v0_rensi.hierarchy');

    // Ukur Kinerja
    Route::post('/ukin/get-indi',[IndicatorsController::class, 'getIndi'])->name('api_v0.ukin.getindi');
    Route::get('/ukin/indidata/{master_ik}',[IndicatorsController::class, 'getindiData'])->name('api_v0.ukin.data');
    Route::PATCH('/admin/set-indikator',[IndicatorsController::class,'indi_update'])->name('walidata.indi_update');

    // SK Baru
    Route::get('/desc/list-kegiatan',[DescController::class, 'lstsk'])->name('api_v0.desc.list_sk');
    Route::get('/desc/skmax/{master_id}',[DescController::class, 'skmax'])->name('api_v0_desc.skmax');
    Route::post('/desc/skbaru',[DescController::class,'skbaru'])->name('api_v0_desc.skbaru');
});


Route::group(['prefix'=>'rahasia'],function(){
    Route::get('/setbudget',[CcdBudgetController::class,'fillbuddget']);
});