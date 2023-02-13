<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KematianController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PerpindahanController;
use App\Http\Controllers\IuranBulananController;
use App\Http\Controllers\IuranKematianController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SuratPengantarController;
use App\Http\Controllers\IuranBulananFilterController;
use App\Http\Controllers\PengeluaranBulananController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| contains the "web" middleware group. Now create something great!
| routes are loaded by the RouteServiceProvider within a group which
|
*/

// Route::get('/ketuart', function () {
// return view('dashboardketuart');
// }); 

// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/login', [LoginController::class, 'authenticate']);

//Route Login/




Route::group(['middleware' => 'prevent'],function(){
    
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login-user', [LoginController::class, 'authenticate']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/resetpassword', [ResetPasswordController::class, 'index'])->name('resetpassword');
    Route::post('/resetpassword', [ResetPasswordController::class, 'authenticate']);

    Route::group(['middleware' => 'auth'],function(){
        // Route::get('/', function () {
        //     return view('dashboard');
        //     });

        Route::get('/', [PendudukController::class, 'index']);
    
    // Route::group(['middleware' => 'prevent-back-history'],function(){
    //             Auth::routes();
    //             Route::get('/home', 'HomeController@index');
    //         });
    

    
    Route::get('/',[PendudukController::class, 'indexDashboard']);
    Route::get('/penduduk',[PendudukController::class, 'index'])->name('penduduk.penduduk');
    Route::get('/tambahpenduduk',[PendudukController::class, 'tambahpenduduk'])->name('penduduk.tambahpenduduk');
    Route::post('/insertpenduduk',[PendudukController::class, 'insertdata'])->name('penduduk.insertdata');
    Route::get('/tampilkanpenduduk/{id}',[PendudukController::class, 'tampilkandata'])->name('tampilkanpenduduk');
    Route::post('/updatependuduk/{id}',[PendudukController::class, 'updatedata'])->name('penduduk.updatedata');
    Route::get('/penduduk/delete/{id}',[PendudukController::class, 'delete'])->name('penduduk.delete');
    Route::get('/penduduk/show/{id}',[PendudukController::class, 'show'])->name('penduduk.show');
    Route::post('/penduduk/import_excel', [PendudukController::class, 'import_excel']);

    Route::get('/kelahiran',[KelahiranController::class, 'index'])->name('kelahiran.kelahiran');
    Route::get('/tambahkelahiran',[KelahiranController::class, 'tambahkelahiran'])->name('kelahiran.tambahkelahiran');
    Route::post('/insertdatakelahiran',[KelahiranController::class, 'insertdata'])->name('kelahiran.insertdata');
    Route::get('/tampilkelahiran/{nik}',[KelahiranController::class, 'tampilkandata'])->name('kelahiran.tampilkandata');
    Route::post('/updatekelahiran/{nik}',[KelahiranController::class, 'updatedata'])->name('kelahiran.updatedata');
    Route::get('/deletekelahiran/{nik}',[KelahiranController::class, 'delete'])->name('kelahiran.delete');
    Route::get('/kelahiran/show/{nik}', [KelahiranController::class, 'show'])->name('kelahiran.show');
    Route::get('/tambahdaftar/{nik}', [KelahiranController::class, 'daftar']);
    
    Route::get('/kematian',[KematianController::class, 'index'])->name('kematian.kematian');
    Route::get('/tambahkematian/{id}',[KematianController::class, 'tambahkematian'])->name('kematian.tambahkematian');
    Route::post('/insertkematian',[KematianController::class, 'insertdata'])->name('kematian.insertdata');
    Route::get('/tampilkematian/{nik}',[KematianController::class, 'tampilkandata'])->name('kematian.tampilkandata');
    Route::post('/updatekematian/{nik}',[KematianController::class, 'updatedata'])->name('kematian.updatedata');
    Route::get('/delete/{nik}',[KematianController::class, 'delete'])->name('kematian.delete');
    Route::get('/kematian/show/{nik}', [KematianController::class, 'show'])->name('kematian.show');
    
    Route::get('/perpindahan', [PerpindahanController::class, 'index'])->name('perpindahan.perpindahan');
    Route::get('/tambahperpindahan/{id}', [PerpindahanController::class, 'tambahperpindahan'])->name('perpindahan.tambahperpindahan');
    Route::post('/insertperpindahan', [PerpindahanController::class, 'insertdata'])->name('perpindahan.insertdata');
    Route::post('/updateperpindahan/{nik}', [PerpindahanController::class, 'updatedata'])->name('perpindahan.updatedata');
    Route::get('/tampilkanperpindahan/{nik}', [PerpindahanController::class, 'tampilkandata'])->name('perpindahan.tampilkandata');
    Route::post('/perpindahan/delete/{nik}', [PerpindahanController::class, 'delete'])->name('perpindahan.delete');
    Route::get('/perpindahan/show/{nik}', [PerpindahanController::class, 'show'])->name('perpindahan.show');
    Route::get('/tambahpindah/{nik}', [PerpindahanController::class, 'pindah']);
    
    Route::get('/iuranbulanan', [IuranBulananController::class, 'index'])->name('iuranbulanan.iuranbulanan')->middleware('auth') ;
    Route::get('/tambahiuranbulanan', [IuranBulananController::class, 'tambahiuranbulanan'])->name('iuranbulanan.tambahiuranbulanan');
    Route::get('/insertiuranbulanan', [IuranBulananController::class, 'insertdata'])->name('iuranbulanan.insertdata');
    Route::post('/updateiuranbulanan/{id}', [IuranBulananController::class, 'updatedata'])->name('iuranbulanan.updatedata');
    Route::get('/tampilkaniuranbulanan/{id}', [IuranBulananController::class, 'tampilkandata'])->name('iuranbulanan.tampilkandata');
    Route::post('/iuranbulanan/delete/{id}', [IuranBulananController::class, 'delete'])->name('iuranbulanan.delete');
    Route::get('/iuranbulanan/show/{id}', [IuranBulananController::class, 'show'])->name('iuranbulanan.show');

    Route::get('/transaksi', [TransaksiController::class, 'index']);

    Route::get('/pengeluaranbulanan', [PengeluaranBulananController::class, 'index'])->name('pengeluaranbulanan.pengeluaran');
    Route::get('/tambahpengeluaranbulanan', [PengeluaranBulananController::class, 'tambahpengeluaranbulanan'])->name('pengeluaranbulanan.tambahpengeluaranbulanan');
    Route::get('/insertpengeluaranbulanan', [PengeluaranBulananController::class, 'insertdata'])->name('pengeluaranbulanan.insertdata');
    Route::get('/filterpengeluaran', [PengeluaranBulananController::class, 'filterdata']);
    
    Route::get('/iurankematian', [IuranKematianController::class, 'iurankematian'])->name('iurankematian.iurankematian');
    Route::get('/tambahiurankematian', [IuranKematianController::class, 'tambahiurankematian'])->name('iurankematian.tambahiurankematian');
    Route::get('/insertdata', [IuranKematianController::class, 'insertdata'])->name('iurankematian.insertdata');
    Route::post('/updateiurankematian/{nik}', [IuranKematianController::class, 'updatedata'])->name('iurankematian.updatedata');
    Route::get('/tampiliurankematian/{nik}', [IuranKematianController::class, 'tampilkandata'])->name('iurankematian.tampilkandata');
    Route::get('/delete/{nik}', [IuranKematianController::class, 'delete'])->name('iurankematian.delete');
    Route::get('/iurankematian/show/{nik}', [IuranKematianController::class, 'show'])->name('iurankematian.show');
    
    
    
    Route::get('/suratpengantar',[SuratPengantarController::class, 'index'])->name('suratpengantar.datasuratpengantar');
    Route::get('/tambahsuratpengantar',[SuratPengantarController::class, 'tambahsuratpengantar'])->name('suratpengantar.tambahsuratpengantar');
    Route::post('/insertsuratpengantar',[SuratPengantarController::class, 'insertsuratpengantar'])->name('suratpengantar.insertsuratpengantar');
    
    Route::get('/historysuratpengantar',[SuratPengantarController::class, 'historisuratpengantar'])->name('suratpengantar.historisuratpengantar');
    Route::get('/cetak_surat',[SuratPengantarController::class, 'cetak_surat'])->name('suratpengantar.cetak_surat');
    Route::get('/cetak_pdf',[SuratPengantarController::class, 'cetak_pdf'])->name('suratpengantar.cetak_pdf');
    
    
    Route::get('/cetakiuranbulanan/{id}',[IuranBulananController::class, 'cetakiuranbulanan'])->name('iuranbulanan.cetakiuranbulanan');
    Route::get('/cetakiuranbulanan', [IuranBulananController::class, 'filterTanggal'])->name('iuranbulanan.filterTanggal');
    
    Route::get('/cetaklaporan',[IuranBulananController::class, 'cetaklaporan'])->name('iuranbulanan.cetaklaporan');
    Route::get('/cetaklaporan_pdf',[IuranBulananController::class, 'cetaklaporan_pdf'])->name('iuranbulanan.cetaklaporan_pdf');
    
    Route::get('/cetakiurankematian', [IuranKematianController::class, 'filterTanggal'])->name('iurankematian.filterTanggal');
    Route::get('/cetakiurankematian/{id}',[IuranKematianController::class, 'cetakiurankematian'])->name('iurankematian.cetakiurankematian');
    Route::get('/cetaklaporan',[IuranKematianController::class, 'cetaklaporan'])->name('iurankematian.cetaklaporan');
    Route::get('/cetaklaporanpdf',[IuranKematianController::class, 'cetaklaporanpdf'])->name('iurankematian.cetaklaporanpdf');
    
    // Route::get('/disetujuisuratpengantar',[SuratPengantarController::class, 'disetujui'])->name('suratpengantar.disetujui');
    Route::get('/disetujui/{id}',[SuratPengantarController::class, 'disetujui']);
    Route::get('/ditolak/{id}',[SuratPengantarController::class, 'ditolak']);
    Route::post('/insertdisetujui',[SuratPengantarController::class, 'insertdisetujui'])->name('suratpengantar.insertdisetujui');
    Route::post('/insertdisetujui',[SuratPengantarController::class, 'insertdisetujui'])->name('suratpengantar.insertdisetujui');
    
    // Route::get('/tampilsuratpengantar',[SuratPengantarController::class, 'tampilkandata'])->name('suratpengantar.tampilkandata');
    // Route::post('/updatesuratpengantar/{id}',[SuratPengantarController::class, 'updatedata'])->name('suratpengantar.updatedata');
    
    
    });
}); //End

//sekretaris
Route::middleware(['auth', 'level:sekretaris'])->group(function () {
    route::get('/sekretaris', [PendudukController::class, 'index']);

// Route::get('/sekretaris/penduduk',[PendudukController::class, 'penduduk'])->name('.penduduk');
// Route::get('/sekretaris/tambahpenduduk',[PendudukController::class, 'tambahpenduduk'])->name('penduduk.tambahpenduduk');
// Route::post('/sekretaris/insertpenduduk',[PendudukController::class, 'insertdata'])->name('penduduk.insertdata');
// Route::get('/sekretaris/tampilkanpenduduk/{id}',[PendudukController::class, 'tampilkandata'])->name('tampilkandata');
// Route::post('/sekretaris/updatependuduk/{id}',[PendudukController::class, 'updatedata'])->name('penduduk.updatedata');
// Route::get('/sekretaris/penduduk/delete/{id}',[PendudukController::class, 'delete'])->name('penduduk.delete');
// Route::get('/sekretaris/penduduk/show/{id}',[PendudukController::class, 'show'])->name('penduduk.show');

// Route::get('/sekretaris/kematian',[KematianController::class, 'index'])->name('kematian.kematian');
// Route::get('/sekretaris/tambahkematian',[KematianController::class, 'tambahkematian'])->name('kematian.tambahkematian');
// Route::post('/sekretaris/insertdata',[KematianController::class, 'insertdata'])->name('kematian.insertdata');
// Route::get('/sekretaris/tampilkematian/{nik}',[KematianController::class, 'tampilkandata'])->name('kematian.tampilkandata');
// Route::post('/sekretaris/updatekematian/{nik}',[KematianController::class, 'updatedata'])->name('kematian.updatedata');
// Route::get('/sekretaris/delete/{nik}',[KematianController::class, 'delete'])->name('kematian.delete');
// Route::get('/sekretaris/kematian/show/{id}', [KematianController::class, 'show'])->name('kematian.show');

// Route::get('/sekretaris/perpindahan', [PerpindahanController::class, 'index'])->name('perpindahan.perpindahan');
// Route::get('/sekretaris/tambahperpindahan', [PerpindahanController::class, 'tambahperpindahan'])->name('perpindahan.tambahperpindahan');
// Route::post('/sekretaris/insertperpindahan', [PerpindahanController::class, 'insertdata'])->name('perpindahan.insertdata');
// Route::post('/sekretaris/updateperpindahan/{id}', [PerpindahanController::class, 'updatedata'])->name('perpindahan.updatedata');
// Route::get('/sekretaris/tampilkanperpindahan/{id}', [PerpindahanController::class, 'tampilkandata'])->name('perpindahan.tampilkandata');
// Route::post('/sekretaris/perpindahan/delete/{id}', [PerpindahanController::class, 'delete'])->name('perpindahan.delete');
// Route::get('/sekretaris/perpindahan/show/{id}', [PerpindahanController::class, 'show'])->name('perpindahan.show');

// Route::get('/sekretaris/kelahiran',[KelahiranController::class, 'index'])->name('kelahiran.kelahiran');
// Route::get('/sekretaris/tambahkelahiran',[KelahiranController::class, 'tambahkelahiran'])->name('kelahiran.tambahkelahiran');
// Route::post('/sekretaris/insertdatakelahiran',[KelahiranController::class, 'insertdata'])->name('kelahiran.insertdata');
// Route::get('/sekretaris/tampilkelahiran/{id}',[KelahiranController::class, 'tampilkandata'])->name('kelahiran.tampilkandata');
// Route::post('/sekretaris/updatekelahiran/{id}',[KelahiranController::class, 'updatedata'])->name('kelahiran.updatedata');
// Route::get('/sekretaris/deletekelahiran/{id}',[KelahiranController::class, 'delete'])->name('kelahiran.delete');
// Route::get('/sekretaris/kelahiran/show/{id}', [KelahiranController::class, 'show'])->name('kelahiran.show');

// // Route::get('/sekretaris/suratpengantar',[SuratPengantarController::class, 'index'])->name('suratpengantar.suratpengantar');
});

//bendahara
// Route::middleware(['auth', 'ceklevel:bendahara'])->group(function () {
//     route::get('/bendahara', [PendudukController::class, 'dashboard']);

// Route::get('/bendahara/IuranKematian', [IuranBulananController::class, 'dashboard'])->name('iuranbulanan-bendahara.ben-iuranbulanan');
// Route::get('/bendahara/tambahiuranbulanan', [IuranBulananController::class, 'tambahiuranbulanan'])->name('iuranbulanan-bendahara.ben-tambahiuranbulanan');
// Route::get('/bendahara/insertiuranbulanan', [IuranBulananController::class, 'insertdata'])->name('iuranbulanan-bendahara.ben-insertdata');
// Route::post('/bendahara/updateiuranbulanan/{id}', [IuranBulananController::class, 'updatedata'])->name('iuranbulanan-bendahara.ben-updatedata');
// Route::get('/bendahara/tampilkaniuranbulanan/{id}', [IuranBulananController::class, 'tampilkandata'])->name('iuranbulanan-bendahara.ben-tampilkandata');

// });



