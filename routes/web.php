<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\SummerController;
use App\Http\Controllers\WinterController;
use App\Http\Controllers\UserContactController;
use App\Http\Controllers\AdmincontactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ChefContactController;
use App\Http\Controllers\MyChefController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\SubscribeContactController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DiscountCodeController;
use App\Http\Controllers\CouponapplyController;
use App\Http\Controllers\SpecialContactController;
use App\Http\Controllers\DealController;







/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/home2', [FrontendController::class, 'home2'])->name('home2');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/featured', [FrontendController::class, 'featured'])->name('featured');
Route::get('/chef', [FrontendController::class, 'chef'])->name('chef');
Route::get('/subscription', [FrontendController::class, 'subscription'])->name('subscription');
Route::get('/booking', [FrontendController::class, 'booking'])->name('booking');
Route::get('/special', [FrontendController::class, 'special'])->name('special');
Route::get('/deal', [FrontendController::class, 'deal'])->name('deal');
// Route::resource('usercontact', UserContactController::class);
Route::post('usercontact', [UserContactController::class, 'store']);
Route::post('chefcontact', [ChefContactController::class, 'store']);
Route::post('subscribecontact', [SubscribeContactController::class, 'store']);
Route::post('specialcontacts', [SpecialContactController::class, 'store']);
Route::put('specialcontacts/{specialcontact}', [SpecialContactController::class, 'update']);
Route::post('/specialcontacts/{specialcontact}/update-status', [SpecialContactController::class, 'updateStatus'])->name('specialcontacts.updateStatus');



Route::post('/cart/apply-coupon', [CouponController::class, 'applyCoupon'])->name('cart.applyCoupon');
// Route::post('/cart/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');

// Route::post('/cart/apply-coupon', [DiscountCodeController::class, 'applyCoupon'])->name('cart.applyCoupon');

// Route::post('/apply-discount', [CheckoutController::class, 'applyDiscount'])->name('front.applyDiscount');

Route::post('/cart/apply-cashback', [CartController::class, 'applyCashback'])->name('cart.applyCashback');





Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/subcategories', [FrontendController::class, 'subcategory'])->name('subcategory');
Route::get('/product', [FrontendController::class, 'product'])->name('product');


Route::get('/categories/{category}/subcategories', [FrontendController::class, 'showSubcategories'])->name('categories.subcategories');
// Add this route for showing products by category
Route::get('/categories/{category}/products', [FrontendController::class, 'showProductsByCategory'])->name('categories.products');
Route::get('/subcategories/{subcategory}/products', [FrontendController::class, 'showProducts'])->name('subcategories.products');
Route::get('/product_details/{id}', [FrontendController::class, 'product_details'])->name('product_details');



Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout');
Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('/review', [FrontendController::class, 'review'])->name('review');
Route::get('/offer', [FrontendController::class, 'offer'])->name('offer');
Route::get('/cart', [HeaderController::class, 'index'])->name('cart.show');

// Cart Routes with Middleware
Route::group(['middleware' => ['auth.check']], function() {
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart/deal', [CartController::class, 'showDealCart'])->name('cart.deal'); // Route for deal page cart

});


// Checkout and Order Routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/order/confirmation/{id}', [OrderController::class, 'confirmation'])->name('order.confirmation');
Route::get('/order/{orderId}/invoice', [OrderController::class, 'downloadInvoice'])->name('order.invoice');
Route::get('user/{userId}/orders', [OrderController::class, 'userOrders'])->name('user.orders');

Route::get('/user/{userId}/gift-status', [OrderController::class, 'showGiftStatus'])->name('user.gift.status');



// Payment Gateway Routes
Route::controller(CheckoutController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});




Route::post('/checkout/create-intent', [CheckoutController::class, 'createPaymentIntent'])->name('checkout.createIntent');
Route::get('/checkout/success', [CheckoutController::class, 'paymentSuccess'])->name('checkout.success');


Route::post('stripe/webhook', [CheckoutController::class, 'handleStripeWebhook']);











Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Admin Routes with Middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        // Profile Routes
        Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::post('profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
        Route::post('change-password', [AdminController::class, 'changePassword'])->name('admin.change-password');

        // Dashboard Route
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Auth Route
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');

        // Resource Routes
        Route::resource("/hero", HeroController::class);
        Route::resource('/client', ClientController::class);
        Route::resource('/summer', SummerController::class);
        Route::resource('winter', WinterController::class);
        Route::resource('usercontact', UserContactController::class);
        Route::resource('admincontact', AdmincontactController::class);
        Route::resource('about', AboutController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('subcategories', SubcategoryController::class);
        // Route::post('/subcategories/{subcategory}/status', [SubcategoryController::class, 'updateStatus'])->name('subcategories.updateStatus');
        Route::resource('products', ProductController::class);
        Route::post('/products/{product}/status', [ProductController::class, 'updateStatus'])->name('products.updateStatus');
        Route::post('/products/{product}/status_1', [ProductController::class, 'updateStatus_1'])->name('products.updateStatus_1');

        Route::resource('chefcontact', ChefContactController::class);
        Route::resource('mychef', MyChefController::class);
        Route::resource('subscribecontact', SubscribeContactController::class);
        Route::resource('coupons', CouponController::class);
        Route::resource('specialcontacts', SpecialContactController::class);
        Route::resource('deals', DealController::class);



        // Route::get('discountcoupons',[DiscountCodeController::class,'index'])->name('discountcoupons.index');
        // Route::get('discountcoupons/create',[DiscountCodeController::class,'create'])->name('discountcoupons.create');
        // Route::post('discountcoupons',[DiscountCodeController::class,'store'])->name('discountcoupons.store');
        // Route::get('discountcoupons/{id}/edit',[DiscountCodeController::class,'edit'])->name('discountcoupons.edit');
        // Route::put('discountcoupons/{id}',[DiscountCodeController::class,'update'])->name('discountcoupons.update');
        // Route::delete('discountcoupons/{id}',[DiscountCodeController::class,'destroy'])->name('discountcoupons.destroy');
        // Route::get('discountcoupons/{id}/view',[DiscountCodeController::class,'view'])->name('discountcoupons.view');

        // Route::get('discountcoupons', [DiscountCodeController::class, 'index'])->name('discountcoupons.index');
        // Route::get('discountcoupons/create', [DiscountCodeController::class, 'create'])->name('discountcoupons.create');
        // Route::post('discountcoupons', [DiscountCodeController::class, 'store'])->name('discountcoupons.store');
        // Route::get('discountcoupons/{id}/edit', [DiscountCodeController::class, 'edit'])->name('discountcoupons.edit');
        // Route::put('discountcoupons/{id}', [DiscountCodeController::class, 'update'])->name('discountcoupons.update');
        // Route::delete('discountcoupons/{id}', [DiscountCodeController::class, 'destroy'])->name('discountcoupons.destroy');
        // Route::get('discountcoupons/{id}/view', [DiscountCodeController::class, 'view'])->name('discountcoupons.view');






        // Order Management Routes
        Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
        Route::get('/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
        Route::patch('/admin/orders/{id}/update', [OrderController::class, 'update'])->name('admin.orders.update');
        Route::delete('/admin/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
    });
});

Route::get('/admin/consecutive-orders', [OrderController::class, 'consecutiveOrders'])->name('admin.consecutive_orders.index');
Route::get('/admin/consecutive-orders/view/{id}', [OrderController::class, 'viewConsecutiveOrder'])->name('admin.consecutive_orders.view');
Route::delete('/admin/consecutive-orders/{id}', [OrderController::class, 'deleteConsecutiveOrder'])->name('admin.consecutive_orders.delete');
Route::post('/admin/consecutive_orders/sendMail/{id}', [OrderController::class, 'sendMail'])->name('admin.consecutive_orders.sendMail');
Route::get('/admin/consecutive-orders/awarded', [OrderController::class, 'giftAwardedOrders'])->name('admin.consecutive_orders.awarded');
Route::delete('/admin/consecutive-orders/delete-from-awarded/{id}', [OrderController::class, 'deleteFromAwarded'])
    ->name('admin.consecutive_orders.deleteFromAwarded');









// Vendor Routes with Middleware
Route::middleware(['auth', 'role:vendor'])->group(function () {
    Route::prefix('vendor')->group(function() {
        // Profile Routes
        Route::get('profile', [VendorController::class, 'profile'])->name('vendor.profile');
        Route::post('profile', [VendorController::class, 'updateProfile'])->name('vendor.profile.update');
        Route::post('change-password', [VendorController::class, 'changePassword'])->name('vendor.change-password');

        // Dashboard and Auth Routes
        Route::get('dashboard', [VendorController::class, 'dashboard'])->name('vendor.dashboard');
        Route::get('logout', [VendorController::class, 'logout'])->name('vendor.logout');
    });
});

require __DIR__.'/auth.php';
