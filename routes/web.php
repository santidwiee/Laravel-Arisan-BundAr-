<?php

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
    return view('dashboard');
})->name('home');

//Middleware Auth
Route::group(['middleware' => ['auth']], function(){

    /**
    * list arisan
    */
    Route::group(['prefix' => 'arisan'], function(){
        Route::post('/detail/tglmulai/{id}', 'ArisanController@setTglMulai')->name('setTglMulai');//set tgl mulai arisan
        Route::post('/detail/tglakhir/{id}', 'ArisanController@setTglAkhir')->name('setTglAkhir');//set tgl akhir arisan
        
        Route::post('/detail/tambah-anggota', 'ArisanController@addAnggota')->name('addAnggota');//tambah anggota ke groupArisan
        Route::get('/detail/hapusanggota', 'ArisanController@removeAnggota')->name('removeAnggota');//mengeluarkan anggota dari groupArisan
        
        Route::post('/detail/setperiode', 'ArisanController@periode')->name('setperiode');//set tanggal periode
        Route::get('/detail/{id}/transaksi', 'ArisanController@detailTransaksi')->name('detail.transaksi');//lihat detail transaksi
    
        Route::get('/transaksi/status', 'ArisanController@statusAnggota')->name('periode.status.anggota');//mengubah status anggota
        Route::get('/transaksi/kocok/{id}', 'ArisanController@kocokPemenang')->name('arisan.kocok');//random anggota

        Route::post('hapusArisan', 'ArisanController@hapusSemua')->name('hapus.paket');//hapus seleksi list arisan
        Route::get('/hapusArisan/{id}', 'ArisanController@destroy')->name('hapusArisan');//hapus list arisan
        Route::get('/detail/{id}', 'ArisanController@detail')->name('detail');//detail arisan
    });
    Route::resource('arisan', 'ArisanController');//CRUD Arisan
    

    /**
     * anggota
     */
    Route::group(['prefix' => 'anggota'], function(){
        Route::post('/hapusAnggota', 'AnggotaController@hapusGroup')->name('hapus.group');//hapus seleksi list Anggota
        Route::get('/hapusAnggota/{id}', 'AnggotaController@destroy')->name('hapus');//hapus list Anggota
    });
    Route::resource('anggota', 'AnggotaController');//CRUD Anggota

});
Auth::routes();