<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredEscortsController;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LocationsController;
use App\Http\Controllers\Admin\SuggestedLocationsController;

use App\Http\Controllers\Admin\User\AdminController;
use App\Http\Controllers\Admin\User\MemberController;
use App\Http\Controllers\Admin\User\GirlsController;

use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\AddonController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\ReviewsController;

use App\Http\Controllers\AdultController;
use App\Http\Controllers\ComingSoonController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EscortController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\IdeaBoxController;
use App\Http\Controllers\UserPreferencesController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BlogController;

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


Route::get('/confirm-age', [AdultController::class, 'getForm'])->name('confirm.age');
Route::post('/confirm-age', [AdultController::class, 'postForm']);

Route::group(['middleware' => ['adult']], function () {
	Route::get('lang/{locale}', [HomeController::class, 'setLang'])->name('lang');

	Route::get('/coming-soon', [ComingSoonController::class, 'getForm'])->name('coming.soon');
	Route::post('/coming-soon/register', [MailController::class, 'registerForm'])->name('coming.soon.register.form');
	Route::post('/coming-soon/contact', [MailController::class, 'contactForm'])->name('coming.soon.contact.form');

	Route::get('/', [HomeController::class, 'getHomeView'])->name('home');
	Route::get('/home/ajax-find-your-girls', [HomeController::class, 'ajaxFindYourGirls'])->name('home.ajax.find.your.girls');

	Route::post('/autocomplete/search-girls', [HomeController::class, 'searchGirls'])->name('autocomplete.searchgirls');

	Route::get('/ajax-category-filter', [CategoryController::class, 'ajaxFilter'])->name('ajax.category.filter');
	Route::get('/contact-us', [PageController::class, 'getContactUs'])->name('contact.us');
	Route::post('/contact-us', [MailController::class, 'postContactUs']);

	Route::get('/idea-box', [IdeaBoxController::class, 'show'])->name('idea.box');
	Route::post('/idea-box', [MailController::class, 'ideaBox']);

	Route::get('/discover', [PageController::class, 'getDiscover'])->name('discover');
});


Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('api/get-city-list', [APIController::class, 'getCityList'])->name('get.city.list');
Route::post('api/update-location', [LocationController::class, 'postLocation'])->name('update.location');
Route::post('api/location-suggestion', [LocationController::class, 'postLocationSuggestion'])->name('location.suggestion');
Route::post('api/add-user-location', [LocationController::class, 'postAddUserLocation'])->name('add.location');

Route::get('api/events', [EventController::class, 'getEvents'])->name('getevents');

Route::post('api/likes', [APIController::class, 'postLike'])->name('like');

Route::post('api/add-review', [EscortController::class, 'addReview'])->name('add.review');
Route::post('api/delete-review', [EscortController::class, 'deleteReview'])->name('delete.review');
Route::post('api/add-reply', [EscortController::class, 'addReply'])->name('add.reply');

Route::post('api/delete-media', [EscortController::class, 'deleteMedia'])->name('delete.media');
Route::post('api/set-profile-photo', [EscortController::class, 'setProfilePhoto'])->name('set.profile.photo');

Route::post('api/boost-my-addons', [EscortController::class, 'boostMyAddons'])->name('boost.my.addons');
Route::post('api/update-my-addon-status', [EscortController::class, 'updateMyAddonStatus'])->name('update.my.addon.status');

Route::post('api/duo-with', [EscortController::class, 'updateDuoWith'])->name('update.duo.with');

Route::post('api/refer-a-friend/email', [MailController::class, 'referFriendEmail'])->name('refer.a.friend.email');
Route::post('api/refer-a-friend/sms', [APIController::class, 'referFriendSMS'])->name('refer.a.friend.sms');

Route::post('api/active-saved-search', [UserPreferencesController::class, 'activeSavedSearch']);
Route::get('api/get-saved-search', [UserPreferencesController::class, 'getSavedSearch']);

Route::post('api/real-girlfriend-experience', [LocationController::class, 'realGirlFriendExperienceSwitch'])->name('real.girlfriend.experience');

Route::post('api/add/experiences', [LocationController::class, 'addExperience'])->name('escorts.add.experiences');
Route::get('api/get-favourites-places', [LocationController::class, 'getFavouritePlaces'])->name('get.favourite.places');
Route::get('api/get-girls-in-my-location', [LocationController::class, 'getRealGirlFriendExperienceInCustomerLocation'])->name('get.girls.in.my.locations');

Route::group(['middleware' => ['adult']], function () {

	Route::get('/girls-access', [RegisteredEscortsController::class, 'getGirlsAccess'])
		->name('girls.access');

	Route::get('/escorts/register/information', [RegisteredEscortsController::class, 'getInformation'])
		->name('escorts.register.information');

	Route::post('/escorts/register/information', [RegisteredEscortsController::class, 'postInformation']);

	Route::get('/girls', [CategoryController::class, 'getGirls'])->name('girls');
	Route::get('/trans', [CategoryController::class, 'getTrans'])->name('trans');
	Route::get('/real-girlfriend', [CategoryController::class, 'getRealGirlfriend'])->name('real.girlfriend');

	Route::get('/escort/{username}', [EscortController::class, 'viewProfile'])->name('view.escort.profile');

	Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
	Route::get('blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');
});

Route::group(['middleware' => ['adult', 'auth', 'verified']], function () {

	Route::get('/escorts/register/advertising', [RegisteredEscortsController::class, 'getAdvertising'])
		->name('escorts.register.advertising');

	Route::post('/escorts/register/advertising', [RegisteredEscortsController::class, 'postAdvertising']);

	Route::get('/escorts/register/pictures', [RegisteredEscortsController::class, 'getPictures'])
		->name('escorts.register.pictures');

	Route::post('/escorts/register/pictures', [RegisteredEscortsController::class, 'postPictures']);

	Route::get('/escorts/register/subscription', [RegisteredEscortsController::class, 'getSubscription'])
		->name('escorts.register.subscription');

	Route::post('/escorts/register/subscription', [RegisteredEscortsController::class, 'postSubscription']);

	Route::get('/escorts/register/subscription/addons', [RegisteredEscortsController::class, 'getSubscriptionAddons'])
		->name('escorts.register.subscription.addons');

	Route::post('/escorts/register/subscription/addons', [RegisteredEscortsController::class, 'postSubscriptionAddons']);

	Route::get('/escorts/register/subscription/reviews', [RegisteredEscortsController::class, 'getSubscriptionReviews'])->name('escorts.register.subscription.reviews');

	Route::get('/escorts/register/subscription/pay/{type}', [RegisteredEscortsController::class, 'payment'])->name('escorts.register.subscription.pay');

	Route::get('/escorts/register/subscription/pay/cash/success', [RegisteredEscortsController::class, 'paymentCashSuccess'])->name('escorts.register.subscription.pay.cash.success');

	Route::get('/escorts/register/subscription/pay/post/success', [RegisteredEscortsController::class, 'paymentPostSuccess'])->name('escorts.register.subscription.pay.post.success');

	Route::get('/escorts/register/subscription/complete', [RegisteredEscortsController::class, 'getSubscriptionComplete'])->name('escorts.register.subscription.complete');

	Route::group(['middleware' => ['escort']], function () {

		Route::get('/escorts/profile', [EscortController::class, 'getProfile'])->name('escorts.profile');
		Route::post('/escorts/profile', [EscortController::class, 'updateProfile']);

		Route::get('/escorts/profile/locations', [LocationController::class, 'getLocations'])->name('escorts.profile.locations');
		Route::get('/escorts/profile/ajaxlocations', [LocationController::class, 'getLocationsAjaxCall'])->name('escorts.profile.ajax.locations');
		Route::post('/escorts/profile/locations', [LocationController::class, 'deleteUserLocation']);


		Route::get('/escorts/profile/activity', [EscortController::class, 'getActivity'])->name('escorts.profile.activity');

		Route::get('/escorts/profile/account-details', [EscortController::class, 'getAccountDetails'])->name('escorts.profile.account.details');
		Route::post('/escorts/profile/account-details', [EscortController::class, 'UpdateAccountDetails']);

		Route::get('/escorts/profile/boost-my-ad', [EscortController::class, 'getBoostMyAd'])->name('escorts.profile.boost.my.ad');
		Route::post('/escorts/profile/valid-boost', [EscortController::class, 'validBoost'])->name('escorts.valid.boost');
		Route::post('/escorts/profile/payment/{type}', [EscortController::class, 'initPayment'])->name('escorts.payment');

		Route::get('/escorts/profile/refer-a-friend', [EscortController::class, 'getReferAFriend'])->name('escorts.profile.refer.a.friend');

		Route::get('/escorts/profile/real-girlfriend-experience', [LocationController::class, 'getRealGirlFriendExperienceForEscort'])->name('escorts.profile.real.girlfriend.experience');
	});

	Route::group(['middleware' => ['customer']], function () {

		Route::get('/customers/profile', [CustomerController::class, 'getProfile'])->name('customers.profile');
		Route::post('/customers/profile', [CustomerController::class, 'updateProfile']);

		Route::get('/customers/profile/locations', [LocationController::class, 'getLocations'])->name('customers.profile.locations');
		Route::get('/customers/profile/ajaxlocations', [LocationController::class, 'getLocationsAjaxCall'])->name('customers.profile.ajax.locations');

		Route::post('/customers/profile/locations', [LocationController::class, 'deleteUserLocation']);

		Route::resource('/customers/profile/my-preferences', UserPreferencesController::class)->name('index', 'customers.profile.my.preferences');

		Route::get('/customers/profile/account-details', [CustomerController::class, 'getAccountDetails'])->name('customers.profile.account.details');
		Route::post('/customers/profile/account-details', [CustomerController::class, 'UpdateAccountDetails']);

		Route::get('/customers/profile/real-girlfriend-experience', [LocationController::class, 'getRealGirlFriendExperienceForCustomer'])->name('customers.profile.real.girlfriend.experience');
	});
});

Route::group(['prefix' => 'admin'], function () {

	Route::get('/login', [LoginController::class, 'create'])
		->name('admin.login');

	Route::group(['middleware' => ['administrator', 'auth']], function () {
		Route::get('/', [DashboardController::class, 'show'])
			->name('admin.dashboard');

		Route::resource('locations', LocationsController::class);
		Route::post('/locations/bulkdelete', [LocationsController::class, 'bulkDestroy']);

		Route::resource('suggested-locations', SuggestedLocationsController::class);
		Route::post('/suggested-locations/bulkdelete', [SuggestedLocationsController::class, 'bulkDestroy']);

		Route::delete('user/girls/{id}/media', [GirlsController::class, 'deleteMedia']);
		Route::resource('user/girls', GirlsController::class);
		Route::post('/user/girls/bulkdelete', [GirlsController::class, 'bulkDestroy']);
		Route::post('/user/girls/mediacertified', [GirlsController::class, 'mediaCertified'])->name('media.certified');

		Route::post('user/girls/{id}/reset-plan/', [GirlsController::class, 'resetPlan'])->name('admin.girls.reset-plan');
		Route::post('user/girls/{id}/reset-addon/{addon_id}', [GirlsController::class, 'resetAddon'])->name('admin.girls.reset-addon');

		Route::resource('user/members', MemberController::class);
		Route::post('/user/members/bulkdelete', [MemberController::class, 'bulkDestroy']);

		Route::resource('user/administrator', AdminController::class);
		Route::post('/user/administrator/bulkdelete', [AdminController::class, 'bulkDestroy']);

		Route::resource('plans', PlanController::class);
		Route::resource('addons', AddonController::class);

		Route::resource('reviews', ReviewsController::class);
		Route::post('/reviews/bulkdelete', [ReviewsController::class, 'bulkDestroy']);

		Route::name('admin.')->group(function () {
			Route::get('purchases/pending', [PurchaseController::class, 'pending'])->name('purchases.pending');
			Route::get('purchases/approved', [PurchaseController::class, 'approved'])->name('purchases.approved');

			Route::resource('purchases', PurchaseController::class);
			Route::resource('pages', App\Http\Controllers\Admin\PageController::class);
			Route::resource('settings', App\Http\Controllers\Admin\SettingsController::class);

			Route::resource('blogs', App\Http\Controllers\Admin\BlogController::class);
			Route::post('/blogs/bulkdelete', [App\Http\Controllers\Admin\BlogController::class, 'bulkDestroy'])->name('blogs.bulk-delete');

			Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
			Route::post('/categories/bulkdelete', [App\Http\Controllers\Admin\CategoryController::class, 'bulkDestroy']);
		});
	});
});

require __DIR__ . '/auth.php';

Route::get('/{slug}', [PageController::class, 'index']);

Route::fallback(function () {
	return 'Hm, why did you land here somehow?';
});
