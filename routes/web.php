<?php

use App\Http\Controllers\AddDesainController;
use App\Http\Controllers\AllDesainController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ConfirmPaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DesainController;
use App\Http\Controllers\Desainer\DesainController as DesainerDesainController;
use App\Http\Controllers\DesainerController;
use App\Http\Controllers\FinalDesainController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\KonsumenOrderController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PesananMasukController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PrintPDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgresController;
use App\Http\Controllers\ProgresDesainController;
use App\Http\Controllers\ProsesController;
use App\Http\Controllers\RiwayatPesananController;
use App\Http\Controllers\UbahPasswordController;
use App\Http\Middleware\Desainer;


Route::view('/contact', 'frontend.v_contact');

Route::get('/', function () {
    return view('frontend.v_beranda');
});

Route::get('/pemesanan', [PemesananController::class, 'pemesanan']);
Route::get('/pemesanan/info/{id}', [PemesananController::class, 'infoDesainer'])->name('info.desainer');
Route::resource('/checkout', CheckoutController::class);
Route::prefix('pemesanan')->group(function () {
    Route::get('kategori/{id}', [KategoriController::class, 'index']);
    Route::get('desain/{id}', [PemesananController::class, 'detailDesain']);
    // add to cart
    Route::post('add-cart/', [CartController::class, 'add'])->name('tumbas');
    //update to cart
    Route::post('update-cart/{id}', [CartController::class, 'update'])->name('pemesanan.update');
    // detail cart
    Route::get('detail-cart', [CartController::class, 'detail'])->name('detailCart');
    // delete cart
    Route::get('delete-cart/{id}', [CartController::class, 'destroy']);
});

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ganti password
Route::get('/ubah-password', [App\Http\Controllers\UbahPasswordController::class, 'index'])->name('ubahpassword');
Route::post('/ubah-password', [App\Http\Controllers\UbahPasswordController::class, 'ubahpass'])->name('password.ganti');

Route::get('/edit-profil', [App\Http\Controllers\UserController::class, 'editprofil'])->name('profil.edit');
Route::post('/edit-profil', [App\Http\Controllers\UserController::class, 'ubahprofil'])->name('profil.update');


// hak akses admin
Route::group(['middleware' => 'admin'], function () {
    Route::get('/user', [UserController::class, 'user']);
    Route::get('/desainer', [DesainerController::class, 'desainer'])->name('desainer');
    Route::get('/desainer/detail/{id}', [DesainerController::class, 'detail']);
    Route::post('/desainer/delete/{id}', [DesainerController::class, 'delete'])->name('admin.desainer.delete');
    // Route::get('/desainer/add', [DesainerController::class, 'add']);
    // Route::post('/desainer/insert', [DesainerController::class, 'insert']);
    Route::get('/konsumen', [KonsumenController::class, 'konsumen']);
    Route::get('/konsumen/detail/{id}', [KonsumenController::class, 'detail']);
    Route::get('/desain', [DesainController::class, 'desain'])->name('desain');
    Route::get('/testimoni', [TestimoniController::class, 'testimoni']);
    Route::get('/histori', [HistoriController::class, 'histori']);
    Route::get('histori/detail/{id}', [HistoriController::class, 'detail'])->name('detail.histori');
    Route::get('/validasi-pembayaran', [ConfirmPaymentController::class, 'index']);
    Route::get('/validasi-pembayaran/acc/{id}', [ConfirmPaymentController::class, 'accpayment'])->name('payment.acc');
    Route::get('/validasi-pembayaran/decline/{id}', [ConfirmPaymentController::class, 'declinepayment'])->name('payment.decline');
    Route::get('/monitoring', [MonitoringController::class, 'index'])->name('monitor');
});

// hak akses desainer
Route::group(['middleware' => 'desainer'], function () {
    Route::get('/order', [OrderController::class, 'order'])->name('order');
    Route::get('/desains', [AllDesainController::class, 'desains'])->name('desains');
    Route::get('/desains/add', [AllDesainController::class, 'add']);
    Route::get('/desains/edit/{id}', [AllDesainController::class, 'edit'])->name('desain.edit');
    Route::post('/desains/edit/{id}', [AllDesainController::class, 'update'])->name('desain.update');
    Route::post('/desains/insert', [AllDesainController::class, 'insert']);
    Route::delete('/desains/delete/{id}', [AllDesainController::class, 'delete']);
    Route::get('/validasi-desainer/{id}', [PesananMasukController::class, 'index'])->name('validasi.desainer');
    Route::get('/validasi-desainer/acc/{id}', [PesananMasukController::class, 'accdesain'])->name('desainer.acc');
    Route::get('/validasi-desainer/decline/{id}', [PesananMasukController::class, 'declinedesain'])->name('desainer.decline');
    Route::get('/riwayat-desainer', [RiwayatPesananController::class, 'index'])->name('desainer.riwayat');
    Route::get('/dashboard-desainer', function () {
        return view('backend.desainer.v_dashdesainer');
    });
    Route::get('/upload-desain', [ProgresController::class, 'index'])->name('progres.index');
    Route::get('/upload-desain/progres/{id}', [ProgresController::class, 'upload'])->name('progres.upload');
    Route::post('/upload-desain/progres1/{id}', [ProgresController::class, 'progres1'])->name('progres1.update');
    Route::post('/upload-desain/progres2/{id}', [ProgresController::class, 'progres2'])->name('progres2.update');
    Route::post('/upload-desain/progres3/{id}', [ProgresController::class, 'progres3'])->name('progres3.update');
    Route::post('/upload-desain/final-desain/{id}', [ProgresController::class, 'final'])->name('final.desain');
    Route::get('/desainer/portfolio', [PortfolioController::class, 'index'])->name('desainer.portfolio');
    Route::get('/portfolio/add', [PortfolioController::class, 'add'])->name('port.add');
    Route::post('portfolio/add', [PortfolioController::class, 'insert'])->name('port.insert');
});

// hak akses konsumen
Route::group(['middleware' => 'konsumen'], function () {
    Route::get('/desain-proses', [KonsumenOrderController::class, 'proses']);
    Route::get('/desain-selesai', [KonsumenOrderController::class, 'selesai']);
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.get');
    Route::post('/profile', [ProfileController::class, 'postProfile'])->name('profile.post');
    Route::get('/proses-desain', [ProgresDesainController::class, 'index']);
    Route::get('/proses-desain/revisi/{id}', [ProgresDesainController::class, 'revisi'])->name('revisi.edit');
    Route::post('/proses-desain/revisi1/{id}', [ProgresDesainController::class, 'komentar1'])->name('revisi.post1');
    Route::post('/proses-desain/revisi2/{id}', [ProgresDesainController::class, 'komentar2'])->name('revisi.post2');
    Route::post('/proses-desain/revisi3/{id}', [ProgresDesainController::class, 'komentar3'])->name('revisi.post3');
    Route::get('/desain-selesai', [FinalDesainController::class, 'index']);
    Route::get('/cetak-pdf/{id}', [PrintPDFController::class, 'print'])->name('cetak.pdf');
});
