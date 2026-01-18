<?php

// You can keep this in your filters.php file;

use Illuminate\Support\Facades\Route;

app()->bind('current_user', function () {
    return auth()->user();
});

//app()->bind('current_user_account', function () {

//    $user = \App\User::where('username', auth()->user()->username)->first();

//    return $user;

//});


app()->bind('admin', function () {
    return \App\User::where('username', 'root')->first();
});

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
    // sleep(100000);
    return view('index');
})->name('homepage');

Route::get('/clear-cache', function () {
    // sleep(100000);
    Artisan::call('key:generate');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return "Cache is cleared";
});


Route::get('/maintain/down', function () {
    Artisan::call('down');
    return "Down";
});
Route::get('/maintain/up', function () {
    return Artisan::call('up');
});


//
//Route::get('/index', function () {
//    return view('index');
//});

Route::get('/about', 'WebController@about')->name('about');
Route::get('/testimonies', 'WebController@testimonies')->name('testimonies');
Route::get('/contact', 'WebController@contact')->name('contact');
Route::get('/careers', 'WebController@careers')->name('careers');
Route::get('/compensation', 'WebController@compensation')->name('compensation');
Route::get('/gallery', 'GalleryController@index')->name('gallery');
Route::get('/gallery/create', 'GalleryController@create')->name('upload_gallery');
Route::get('/events/when-leaders-gather-business-meeting', 'EventController@event_wlg')->name('event_wlg');
Route::post('/event/attend', 'EventController@save_attendant')->name('save_attendant');
Route::get('/contact', 'WebController@contact')->name('contact');
Route::post('/contact', 'MessageController@contact_us')->name('contact_us');
Route::get('/events', 'WebController@events')->name('events');
Route::get('/buypin', 'WebController@buypin')->name('buypin');
Route::get('/pay', 'WebController@pay')->name('pay');
Route::get('new-investment/pay', 'WebController@pay_new_investment')->name('pay_new_investment');
Route::get('/buy-pin', 'WebController@buypin')->name('buypin');
Route::get('/donate', 'WebController@donate')->name('donate');
Route::get('/foundation', 'WebController@foundation')->name('foundation');
Route::get('/downlines', 'HomeController@getDownlines')->name('getDownlines');
Route::get('/register/{username}', 'RegistrationController@register_with_referal')->name('register_with_referal');
Route::get('/#register', 'RegistrationController@home_register')->name('home_register');
Route::get('/learn', 'WebController@learn')->name('learn');
Route::get('/sell', 'WebController@sell')->name('sell');
Route::get('/adverts', 'WebController@adverts')->name('adverts');
Route::get('/jobs', 'WebController@jobs')->name('jobs');
Route::get('/subscribe-data', 'WebController@subscribe_data')->name('subscribe_data');
Route::get('/buy-airtime', 'SubscriptionController@airtime_top_up')->name('buy_airtime');
Route::get('crop', 'CropImageController@index');
Route::get('ng/stockists', [\App\Http\Controllers\StockistController::class, 'all_stockists'])->name('stockists');
Route::get('ng/stockists/store/{store}', [\App\Http\Controllers\StockistController::class, 'stockist_shop'])->name('stockist_shop');
Route::get('/videos', 'WebController@get_videos')->name('get_videos');

//Route::post('crop', ['as'=>'croppie.upload-image','uses'=>'CropImageController@uploadCropImage']);

//Route::post('/feedback', 'WebController@post_feedback')->name('post_feedback');

//Route::post('/register', 'Auth\RegisterController@register')->name('save_register');

//TEST ROUTES
Route::get('/test_extra_ref/{username}', 'TestController@test_extra_ref')->name('test_extra_ref');
Route::get('/test_feeder_matrix/{username}', 'TestController@test_feeder_matrix')->name('test_feeder_matrix');
Route::get('/test_stage_matrix/{username}', 'TestController@test_stage_matrix')->name('test_stage_matrix');
Route::get('/get_downlines/{username}', 'TestController@get_downlines')->name('get_downlines');
Route::get('/get_downlines_count/{username}', 'TestController@get_downlines_count')->name('get_downlines_count');
Route::get('/notify/{username}', 'TestController@test_notification')->name('test_notification');
//Route::get('/get_left_pvs/{user}', 'TestController@get_pvs')->name('get_pvs');
Route::get('update_pvs', 'TestController@update_pvs')->name('update_pvs');
Route::get('matching-bonus', 'BonusController@get_matching_bonus')->name('get_matching_bonus');
Route::get('member_reset_cash', 'TestController@member_reset_cash')->name('reset_cash');
Route::get('deduct_from_wallet', 'TestController@deduct_from_wallet')->name('deduct_from_wallet');


//Blog routes
Route::get('/blog', 'WebController@blog')->name('blog');
Route::get('/test', 'WebController@test')->name('test');
Route::get('/test-lock', 'WebController@test_lock')->name('test_lock');

Route::get('/checkSponsorship', 'MembersController@checkSponsorship')->name('checkSponsorship');
Route::get('/check-parent', 'MembersController@check_parent')->name('check_parent');
Route::get('/checkUsernameAvailability', 'MembersController@checkUsernameAvailability')->name('checkUsernameAvailability');
Route::get('/checkSerial', [\App\Http\Controllers\PinController::class, 'check_serial'])->name('check_serial');
Route::get('/checkCode', [\App\Http\Controllers\PinController::class, 'check_code'])->name('check_code');

//SHOP ROUTES
Route::post('shop/cart', 'ShoppingController@addToCart')->name('addToCart');
Route::get('/shop', 'ShoppingController@shop')->name('guestshop');

//categories
Route::get('shop/categories', 'CategoryController@shop_categories')->name('shop_categories');

//Route::get('shop/cart', 'ShopController@getCart')->name('getCart');

Route::get('shop/cart/all', 'ShoppingController@cartDetails')->name('cart_details');
Route::post('/shop/checkout/remove', 'ShoppingController@cart_remove_item')->name('cart_remove_item');
Route::get('shop/checkout', 'ShoppingController@checkout')->name('checkout');
Route::get('shop/cart/clear', [App\Http\Controllers\ShoppingController::class, 'clearCart'])->name('clearCart');
Route::post('shop/cart/clear', 'ShoppingController@clear_basket')->name('clear_basket');
Route::post('shop/cart/update', 'ShoppingController@cartUpdate')->name('cartUpdate');
Route::post('/states', 'ShoppingController@getStates')->name('checkoutStates');
Route::post('shop/cart/order', 'ShoppingController@saveOrder')->name('submitOrder');
Route::get('shop/category/{category}', 'ShoppingController@category_products')->name('category_products');

//

//SUBSCRIPTION
Route::post('adverts/subscribe', 'AdvertController@subscribe_ads')->name('subscribe_ads');
//Route::get('/members/profile', [\App\Http\Controllers\MembersController::class, 'index'])->name('member_ptofile_;l
//AUTH ROUTES
//Route::get('sign-in', 'WebController@signin')->name('signin');

Auth::routes();

Route::get('/home', 'HomeController@dashboard')->name('home');
Route::get('/check-matrix/{username}', 'MatrixController@check_stage_matrix')->name('check_stage_matrix');//testing matrix

//MEMBERS ROUTES GROUP
Route::group(['prefix' => 'member', 'middleware' => 'members'], function () {
    //sleep(100);

    Route::get('/api-test', 'SubscriptionController@api_test')->name('api_test');


    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/learn', 'HomeController@member_learn')->name('member_learn');//    FINANCE

    Route::get('/shoppingBonus', 'UserRewardController@shoppingBonus')->name('shoppingBonus');
    Route::get('/myCashBalance', 'UserRewardController@myCashBalance')->name('myCashBalance');
    Route::get('/myTransfers', 'TransactionController@myTransfers')->name('myTransfers');
    Route::get('/transactionHistory', 'TransactionController@transactionHistory')->name('transactionHistory');
    Route::get('/myInvestment', 'InvestmentController@myInvestment')->name('myInvestment');
    Route::get('/deposit', 'AccountController@member_deposit')->name('member_deposit');

//    SAVINGS
    Route::get('/savings', 'SavingsController@index')->name('member_savings');
    Route::get('/savings/new', 'SavingsController@new_savings_account')->name('new_savings_account');
    Route::post('/savings/new', 'SavingsController@store_savings_account')->name('store_savings_account');
    //    notifications

    Route::get('/user-notifications', 'NotificationsController@get_user_notifications')->name('get_user_notifications');
    Route::get('/unread-notifications', 'NotificationsController@get_unread_notifications')->name('get_unread_notifications');
    Route::post('/mark-notifications-read/{user}', 'NotificationsController@mark_notifications_read')->name('mark_notifications_read');


//    profile
    Route::get('/my_profile', [\App\Http\Controllers\MembersController::class, 'my_profile'])->name('my_profile');
    Route::post('/my_profile/update/profile_pix', [\App\Http\Controllers\MembersController::class, 'update_profile_pix'])->name('update_profile_pix');
    Route::post('/update/profile', 'MembersController@update_profile')->name('update_profile');
    Route::post('/{username}/update/password', 'MembersController@member_update_password')->name('member_update_password');
    Route::post('/update_bank', [\App\Http\Controllers\MembersController::class, 'member_update_bank'])->name('member_update_bank');
    Route::get('/change_password', 'MembersController@member_change_password')->name('member_change_password');
    Route::post('update_password', 'MembersController@update_member_password')->name('update_member_password');
    Route::post('/update-profile-pix', 'CropImageController@uploadCropImage');
    Route::post('/profile/create', [\App\Http\Controllers\ProfileController::class, 'update_profile_others'])->name('update_profile_others');

//    TREE and MATRIX
//    ajax check stage matrix   cjs.blade-includes
    Route::get('/check_feeder_matrix', 'MatrixController@check_feeder_matrix')->name('check_feeder_matrix');
    Route::get('/check_stage_matrix', 'StageMatrixController@check_stage_matrix')->name('check_stage_matrix');
    Route::get('/get_downline_count', 'DownlineController@get_downline_count')->name('get_downline_count');
    Route::get('/referrals', [\App\Http\Controllers\MembersController::class, 'member_referrals'])->name('member_referrals');

//    CHECK PVS AND POINTS
    Route::get('/get_pvs/{user}', [\App\Http\Controllers\PVController::class, 'member_get_pvs'])->name('member_get_pvs');
    //2 Route::get('/pvs', [\App\Http\Controllers\PVDetailsController::class, 'member_get_pvs'])->name('get_pvs');


//    user check stage matrix
    Route::get('/my_downline_tree/{username}', 'MatrixController@user_downline_tree')->name('user_downline_tree');
    Route::get('/stage_matrix', 'MatrixController@get_stage_matrix')->name('get_stage_matrix');
    Route::get('/update_user_matrix/{username}', 'MatrixController@update_stage_matrix')->name('update_stage_matrix');

    Route::get('/creatematrix/{username}', 'MatrixController@create_matrix')->name('create_matrix');
    Route::get('/updatematrix', 'MatrixController@update_matrix')->name('update_matrix');

//    Route::get('/check-matrix/{username}', 'MatrixController@check_stage_matrix')->name('check_stage_matrix');//testing matrix
    Route::get('/check-stage', 'MatrixController@check_if_stage_complete')->name('check_if_stage_complete');


//    Member transactions
    Route::get('/transactions', 'TransactionController@member_transactions')->name('my_transactions');
    Route::post('/transactions/transfer/shop', 'TransactionController@from_cash_to_shop')->name('from_cash_to_shop');
    Route::post('/transactions/transfer/cash', 'TransactionController@investment_to_cash')->name('investment_to_cash');
    Route::post('/transactions/transfer/other', [\App\Http\Controllers\TransactionController::class, 'cash_to_another_account'])->name('cash_to_another_account');
    Route::post('/transactions/transfer/investment', 'TransactionController@cash_to_investment')->name('cash_to_investment');
    Route::post('/transactions/withdraw', [\App\Http\Controllers\TransactionController::class, 'member_withdraw'])->name('member_withdraw');
    Route::post('/transactions/withdraw/matching', 'TransactionController@member_withdraw_matching')->name('member_withdraw_matching');

//    Investments

    Route::get(
        '/finance/investments', 'InvestmentController@my_investments')->name('my_investments');
    Route::post('/finance/investments', 'InvestmentController@store_new_investment')->name('store_new_investment');

//    withdrawals
    Route::get('/withdrawals', 'WithdrawalController@member_withdrawals')->name('member_withdrawals');
    Route::get('/deposits', 'TransactionController@member_deposits')->name('member_deposits');

//    shop
    Route::get('/shop', 'ShoppingController@members_shop')->name('shop');
    Route::get('/shop/check_balance', 'ShoppingController@check_balance')->name('check_balance');
    Route::post('/shop/checkout/remove', 'ShoppingController@member_remove_item')->name('member_remove_item');

//    orders
    Route::get('/orders', 'OrderController@member_orders')->name('member_orders');
    Route::post('/shop/checkout/order', 'ShoppingController@place_collection_order')->name('place_collection_order');
    Route::post('/shop/checkout/place_order', 'ShoppingController@place_delivery_order')->name('place_delivery_order');
    // Route::get('/shop/checkout', 'ShoppingController@member_checkout')->name('member_checkout');
//    SUBSCRIPTIONS
    Route::get('get-auth-token', 'SubscriptionController@get_token')->name('get_token');
    Route::get('re-auth-token', 'SubscriptionController@reauth_token')->name('reauth_token');
    Route::get('/subscriptions', 'SubscriptionController@member_subscriptions')->name('member_subscriptions');

    Route::get('/top-up/airtime', 'SubscriptionController@airtime_top_up')->name('airtime_top_up');
    Route::post('/top-up/airtime/info', 'SubscriptionController@airtime_top_up_info')->name('airtime_top_up_info');
    Route::post('/top-up/airtime', 'SubscriptionController@send_airtime')->name('send_airtime_top_up');

    Route::get('/top-up/data', 'SubscriptionController@data_top_up')->name('data_top_up');
    Route::post('/top-up/data/info', 'SubscriptionController@data_top_up_info')->name('data_\2top_up_info');
    Route::post('/top-up/data', 'SubscriptionController@send_data')->name('send_data_top_up');

//    BILLS PAY
    Route::get('subscription/bills', 'SubscriptionController@bills_pay')->name('bills_pay');
    Route::get('subscription/bills/services/{iso}', 'SubscriptionController@bills_services')->name('bills_services');
    Route::get('subscription/bills/services/{iso}/{service_id}', 'SubscriptionController@bills_services_products')->name('bills_services_products');
    Route::get('subscription/bills/services/{iso}/{service_id}/{product_id}', 'SubscriptionController@bills_services_products_items')->name('bills_services_products_items');
    Route::post('subscription/bills/services/smartcard/validate', 'SubscriptionController@validate_smartcard')->name('validate_smartcard');
    Route::post('subscription/bills/services/{iso}/{service_id}/{product_id}', 'SubscriptionController@top_up_bills')->name('top_up_bills');

    Route::get('/subscriptions/tv', 'SubscriptionController@subscribe_tv')->name('subscribe_tv');
    Route::post('/subscriptions/tv', 'SubscriptionController@save_subscribe_tv')->name('save_subscribe_tv');

//   electricity
    Route::get('/bills/electricity', 'SubscriptionController@bills_pay')->name('pay_light_bill');
    Route::get('/bills/electricity', 'SubscriptionController@bills_pay')->name('pay_light_bill');
    Route::post('/bills/light', 'SubscriptionController@save_light_bill')->name('save_light_bill');


//    AGENT
    Route::get('/office', 'AgentController@index')->name('my_office');

    Route::get('/office/pins', 'AgentController@my_pins')->name('my_pins');
    Route::get('/office/new', 'AgentController@new_pin')->name('new_pin');
    Route::post('/office/pins', 'AgentController@postGeneratePin')->name('save_my_pins');
    Route::post('/office/pins/print', 'AgentController@my_print')->name('my_print');

//    Route::get('/pins', 'Admin\PinController@index')->name('pinManagement');
//    Route::get('/pins/print', 'Admin\PinController@print_pin')->name('print_pin');
//    Route::get('/generate', 'Admin\PinController@generatepin')->name('generatepin');
//    Route::post('/generate', 'Admin\PinController@postGeneratePin')->name('postGeneratePin');

//    WALLETS
    Route::get('/fund/wallet', 'AccountController@member_fund_wallet')->name('member_fund_wallet');
    Route::post('/fund/wallet/verify', 'AccountController@member_verify_transaction')->name('member_verify_transaction');


//    MATCHING BONUS

    Route::post('/bonus/matching', [\App\Http\Controllers\BonusController::class, 'get_matching_bonus'])->name('member_matching_bonus');

//    Route::get('/matching/all', [\App\Http\Controllers\MatchingController::class, 'all_matchings'])->name('all_matchings');
//    Route::get('/matching/in', [\App\Http\Controllers\MatchingController::class, 'member_matchings_within'])->name('member_matchings_within');
//    Route::get('/matching/out', [\App\Http\Controllers\MatchingController::class, 'member_matchings_outside'])->name('member_matchings_outside');
//
//    Route::get('/matchings/pin', [\App\Http\Controllers\MatchingController::class, 'previous_matchings_within'])->name('previous_matchings_within');
//    Route::get('/matchings/pout', [\App\Http\Controllers\MatchingController::class, 'previous_matchings_outside'])->name('previous_matchings_outside');


//    RANK UPDATE
    Route::post('/rank/update', [\App\Http\Controllers\BonusController::class, 'get_member_rank'])->name('get_member_rank');

//REQUESTS
    Route::get('/request', [\App\Http\Controllers\RequisitionController::class, 'member_request'])->name('member_request');
    Route::post('/request/post', [\App\Http\Controllers\RequisitionController::class, 'save_member_request'])->name('save_member_request');

});

//ADMIN ROUTES GROUP
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    //sleep(100000);
    Route::get('/dashboard', 'Admin\HomeController@adminDashboard')->name('adminDashboard');
    Route::get('/general/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'general_settings'])->name('general_settings');
    Route::get('/system/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'system_settings'])->name('system_settings');

    Route::post('/general/settings/withdrawal/open/{setting}', [\App\Http\Controllers\Admin\SettingsController::class, 'open_withdrawals'])->name('admin_open_withdrawals');
    Route::post('/general/settings/withdrawal/close/{setting}', [\App\Http\Controllers\Admin\SettingsController::class, 'close_withdrawals'])->name('admin_close_withdrawals');
//    PINS
    Route::get('/pins', 'Admin\PinController@index')->name('pinManagement');
    Route::get('/pins/used', 'Admin\PinController@used_pins')->name('used_pins');
    Route::get('/pins/print', 'Admin\PinController@print_pin')->name('print_pin');
    Route::get('/generate', 'Admin\PinController@generatepin')->name('generatepin');
    Route::post('/generate', 'Admin\PinController@postGeneratePin')->name('postGeneratePin');

    Route::post('/pins/sell', 'Admin\PinController@sell_pin')->name('sell_pin');
    Route::post('/pins', 'Admin\PinController@search_pin')->name('search_pins');

//    PROFILE
    Route::get('/members', 'Admin\MembersController@allMembers')->name('allMembers');
    Route::get('/members/{username}/details', 'Admin\MembersController@member_details')->name('member_details');
    Route::get('/profile', 'Admin\MembersController@profile')->name('member_profile');
    Route::post('/{username}/update_profile', 'Admin\MembersController@update_user_profile')->name('update_user_profile');
    Route::get('/{username}/change_password', 'Admin\MembersController@change_password')->name('change_password');
    Route::post('/{username}/update_password', 'MembersController@update_user_password')->name('update_user_password');
    Route::get('/members/search-range', [\App\Http\Controllers\Admin\MembersController::class, 'get_members_by_date_range'])->name('get_members_by_date_range');


    Route::get('/all-transactions', 'Admin\TransactionController@index')->name('all_transactions');

//    WITHDRAWALS
    Route::get('/all-withdrawals', 'Admin\WithdrawalController@index')->name('all_withdrawals');
    Route::get('/withdrawals/unpaid', 'Admin\WithdrawalController@paid_withdrawals')->name('admin_paid_withdrawals');

    Route::get('/all-withdrawals/approve/{id}', 'Admin\WithdrawalController@approve_withdrawal')->name('approve_withdrawal');

    Route::post('/withdrawals', [\App\Http\Controllers\Admin\WithdrawalController::class, 'search_withdrawals'])->name('search_withdrawals');

//    MESSAGES
    Route::get('/messages', 'Admin\MessageController@admin_messages')->name('admin_messages');


//    products

    Route::get('/products', 'Admin\ProductController@index')->name('products');
    Route::get('/products/create', 'Admin\ProductController@create')->name('create_product');
    Route::post('/products/create', 'Admin\ProductController@save_product')->name('save_product');
    Route::get('/products/{product}/edit', 'Admin\ProductController@edit')->name('edit_product');
    Route::post('/products/{product}/update', 'Admin\ProductController@update')->name('update_product');
    Route::get('/products/{product}/delete', 'Admin\ProductController@destroy')->name('delete_product');


//    categories

    Route::get('/categories', 'Admin\CategoryController@index')->name('categories');
    Route::get('/categories/create', 'Admin\CategoryController@create')->name('create_category');
    Route::post('/categories/create', 'Admin\CategoryController@save_category')->name('save_category');
    Route::get('shop/category', 'Admin\CategoryController@ajax_get_categories')->name('get_categories');

//    events

    Route::get('/events', 'Admin\EventController@index')->name('admin_events');

    Route::get('/events/{event}/edit', 'Admin\EventController@edit')->name('edit_event');

    Route::get('/events/{event}/delete', 'Admin\EventController@destroy')->name('delete_event');

    Route::get('/events/attendants', 'Admin\EventController@attendance')->name('event_attendance');

    Route::get('/events/create', 'Admin\EventController@create')->name('create_event');

    Route::get('/events/gallery', 'Admin\GalleryController@index')->name('admin_gallery');

    Route::get('/gallery/create', 'Admin\GalleryController@create')->name('create_gallery');

    Route::post('/gallery/create', 'Admin\GalleryController@store')->name('save_gallery_upload');

//    orders

    Route::get('/orders', 'Admin\OrderController@all_orders')->name('all_orders');

    Route::get('/orders/{order}/edit', 'Admin\OrderController@edit')->name('edit_order');

    Route::get('/orders/{order}/delete', 'Admin\OrderController@destroy')->name('delete_order');

//  MATRIX
//
//    Route::get('/get_downline_count', 'DownlineController@get_downline_count')->name('admin_get_downline_count');
//    Route::get('/user_downline_tree/{username}', 'MatrixController@user_downline_tree')->name('admin_user_downline_tree');
    Route::get('/stage_matrix/{username}', 'Admin\MatrixController@check_member_matrix')->name('admin_check_member_matrix');
//    Route::get('/update_user_matrix/{username}', 'MatrixController@update_stage_matrix')->name('uadmin_pdate_stage_matrix');
//    Route::get('/creatematrix/{username}', 'MatrixController@create_matrix')->name('admin_create_matrix');
//    Route::get('/updatematrix', 'MatrixController@update_matrix')->name('admin_update_matrix');

//    Route::get('/check-matrix/{username}', 'MatrixController@check_stage_matrix')->name('check_stage_matrix');//testing matrix
    Route::get('/check-stage', 'Admin\MatrixController@check_if_stage_complete')->name('admin_check_if_stage_complete');
    Route::get('/update_all_feeders', 'Admin\MatrixController@update_all_feeders')->name('update_all_feeders');
    Route::get('/update_all_stages', 'Admin\StageMatrixController@update_all_stages')->name('update_all_stages');
    Route::get('/stage-matrix/reset/all', 'Admin\StageMatrixController@reset_stage_matrices')->name('reset_stage_matrices');
    Route::get('/stage-matrix/reset/{username}', 'Admin\StageMatrixController@reset_stage_matrix')->name('reset_stage_matrix');

//    packages
    Route::get('/packages', [\App\Http\Controllers\Admin\PackageController::class, 'index'])->name('all_packages');
    Route::get('/packages/create', [\App\Http\Controllers\Admin\PackageController::class, 'create'])->name('create_package');
    Route::get('/member/{user}/package/change', [\App\Http\Controllers\Admin\PackageController::class, 'change_package'])->name('change_package');
    Route::post('/member/{user}/package/upgrade', [\App\Http\Controllers\Admin\PackageController::class, 'upgrade_package'])->name('upgrade_package');


    Route::get('/upgrades', [\App\Http\Controllers\Admin\UpgradeController::class, 'all_upgrades'])->name('all_upgrades');

//    ADMIN SALES
    Route::get('/sales', [\App\Http\Controllers\Admin\SellerController::class, 'index'])->name('admin_sales');
    Route::get('/sell', [\App\Http\Controllers\Admin\SellerController::class, 'sell'])->name('admin_sell');
    Route::post('/sell/', [\App\Http\Controllers\Admin\SellerController::class, 'save_sale'])->name('save_sale');
    Route::get('/sell/{sale}/deliver', [\App\Http\Controllers\Admin\SellerController::class, 'deliver_sale'])->name('deliver_sale');

//    ACCOUNTS & TRANSACTIONS

    Route::get('/wallet/fund', [\App\Http\Controllers\Admin\WalletController::class, 'admin_fund_wallet'])->name('admin_fund_wallet');
    Route::post('/wallet/fund', [\App\Http\Controllers\Admin\WalletController::class, 'admin_load_stockist'])->name('admin_load_wallet');
    Route::get('/wallet/summary', [\App\Http\Controllers\Admin\TransactionController::class, 'transaction_summary'])->name('transaction_summary');

//   RANK
    Route::get('/rank/all', [\App\Http\Controllers\Admin\RankController::class, 'members_rank'])->name('members_rank');
});

//SUPPORT SECTION
Route::group(['prefix' => 'support', 'middleware' => 'support'], function () {
//    products
    Route::get('/products', 'ProductController@index')->name('support_products');
    Route::get('/products/create', 'ProductController@create')->name('support_create_product');
    Route::post('/products/create', 'ProductController@save_product')->name('support_save_product');
});

Route::group(['prefix' => 'stockist', 'middleware' => 'stockist'], function () {
    //sleep(10000);
//    SELLER
    Route::get('/home', [\App\Http\Controllers\StockistController::class, 'stockist_dashboard'])->name('stockist_dashboard');

    //    ORDERS
    Route::get('/orders', [\App\Http\Controllers\StockistController::class, 'stockist_orders'])->name('stockist_orders');

//    SALES
    Route::get('/sales', [\App\Http\Controllers\StockistController::class, 'stockist_sales'])->name('stockist_sales');
    Route::post('/sales/{date}/', [\App\Http\Controllers\StockistController::class, 'stockist_day_sales'])->name('stockist_day_sales');
    Route::post('/sales', [\App\Http\Controllers\StockistController::class, 'stockist_store_sales'])->name('stockist_store_sales');

    Route::get('/store', [\App\Http\Controllers\StoreController::class, 'stockist_store'])->name('stockist_store');
    Route::get('/shop/{username}', [\App\Http\Controllers\SellerController::class, 'stockist_shop_view'])->name('stockist_shop_view');
    Route::get('/products', 'ProductController@my_Products')->name('my_Products');
    Route::get('/products/new', 'ProductController@new_product')->name('new_product');  //    products

//    STORE
    Route::get('/store/create', [\App\Http\Controllers\StoreController::class, 'create_store'])->name('create_store');
    Route::post('/store/create', [\App\Http\Controllers\StoreController::class, 'save_store'])->name('save_store');
    Route::get('/store/{store}/edit', [\App\Http\Controllers\StoreController::class, 'stockist_edit_store'])->name('stockist_edit_store');
    Route::post('/store/{store}/update', [\App\Http\Controllers\StoreController::class, 'stockist_update_store'])->name('stockist_update_store');

    Route::post('/products/create', 'ProductController@save_product')->name('seller_save_product');

    Route::get('/products/{product}/edit', 'ProductController@edit')->name('seller_edit_product');

    Route::post('/products/{product}/update', 'ProductController@update')->name('update_product');

    Route::get('/products/{product}/delete', 'ProductController@destroy')->name('delete_product');

    Route::get('pins', 'AgentController@my_pins')->name('my_pins');
    Route::get('pins/used', 'AgentController@my_used_pins')->name('my_used_pins');
    Route::get('new', [\App\Http\Controllers\AgentController::class, 'new_pin'])->name('new_pin');
    Route::post('pins', [\App\Http\Controllers\AgentController::class, 'postGeneratePin'])->name('save_my_pins');
    Route::post('pins/print', 'AgentController@my_print')->name('my_print');

//    STOCK ROUTES
    Route::get('store/stock/add', [\App\Http\Controllers\StockController::class, 'stockist_add_stock'])->name('stockist_add_stock');

    Route::get('member/upgrade', [\App\Http\Controllers\PackageController::class, 'stockist_member_upgrade'])->name('stockist_member_upgrade');
    Route::post('member/upgrade', [\App\Http\Controllers\PackageController::class, 'save_member_upgrade'])->name('save_member_upgrade');
    
});
    