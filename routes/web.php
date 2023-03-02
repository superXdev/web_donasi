<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
	DashboardController, 
	UserController, 
	RoleController,
	PostController,
	CampaignController,
	DonationController,
	ContactController
};

Route::view('/', 'index')->name('index');

Route::group([
	'middleware' => 'auth',
	'prefix' => 'admin',
	'as' => 'admin.'
], function(){
	// api
	Route::post('/category/store', [PostController::class, 'category_save'])->name('category.store');

	// menu Blog
	Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');

	// menu artikel berita
	Route::group([ 'prefix' => 'article', 'as' => 'article.' ], function() {
		Route::view('/new', 'admin.posts.create')->name('create');
		Route::post('/store', [PostController::class, 'store'])->name('store');
		Route::get('/{post}/edit', [PostController::class, 'edit'])->name('edit');
		Route::post('/{post}/update', [PostController::class, 'update'])->name('update');
		Route::post('/{post}/destroy', [PostController::class, 'destroy'])->name('destroy');
	});
	

	// menu Galang donasi
	Route::group([ 'prefix' => 'campaign', 'as' => 'campaign.' ], function() {
		Route::get('/', [CampaignController::class, 'index'])->name('index');
		Route::view('/new', 'admin.campaign.create')->name('create');
		Route::post('/store', [CampaignController::class, 'store'])->name('store');
		Route::get('/{campaign}/edit', [CampaignController::class, 'edit'])->name('edit');
		Route::post('/{campaign}/update', [CampaignController::class, 'update'])->name('update');
		Route::post('/{campaign}/destroy', [CampaignController::class, 'destroy'])->name('destroy');
	});

	// menu daftar donasi dibuat
	Route::get('/donation', [DonationController::class, 'index'])->name('donation');

	// menu kontak masuk
	Route::group([ 'prefix' => 'contact', 'as' => 'contact.' ], function() {
		Route::get('/', [ContactController::class, 'index'])->name('index');
		Route::get('/read/{contact}', [ContactController::class, 'show'])->name('show');
		Route::post('/reply/{contact}', [ContactController::class, 'reply'])->name('reply');
		Route::post('/destroy/{contact}', [ContactController::class, 'destroy'])->name('destroy');
		Route::post('/bulk_delete', [ContactController::class, 'bulkDelete'])->name('bulk_delete');
	});
	
	
	// Profile menu
	Route::view('/profile', 'admin.profile')->name('profile');
	Route::post('/profile', [DashboardController::class, 'profile_update'])->name('profile');
	Route::post('/profile/upload', [DashboardController::class, 'upload_avatar'])
		->name('profile.upload');

});

// api
Route::get('/api/donatur', [CampaignController::class, 'donatur'])->name('api.donatur');

// artikel
Route::get('/artikel/{post:slug}', [PostController::class, 'show'])->name('blog.show');
Route::get('/search', [PostController::class, 'search'])->name('blog.search');
Route::get('/penulis/{author}', [PostController::class, 'author'])->name('blog.author');
Route::get('/kategori/{category:slug}', [PostController::class, 'category'])->name('blog.category');

// campaign
Route::get('/campaign/{campaign:slug}', [CampaignController::class, 'show'])->name('campaign.show');
Route::post('/donation/{campaign}', [DonationController::class, 'store'])->name('donation.store');
Route::get('/success/{donation}', [DonationController::class, 'success'])->name('donation.success');
// Contact
Route::view('/contact', 'contact')->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Route::get('tes', [ContactController::class, 'test']);

require __DIR__.'/auth.php';
