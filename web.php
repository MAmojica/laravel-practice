<?php

use Illuminate\Support\Facades\Route;

/* =========================== DASHBOARD =========================== */
use App\Http\Livewire\Dashboard;
/* =========================== MY ACCOUNT =========================== */
use App\Http\Livewire\MyAccount\MyAccount;
use App\Http\Livewire\MyAccount\MyAccountUpdate;

/* =========================== COMPANY AUDIT TRAIL SECTION =========================== */

use App\Http\Livewire\CompanyAuditTrail\CompanyAuditTrailIndex;

/* =========================== VENDOR CUSTOMER TYPE SECTION =========================== */
use App\Http\Livewire\VendorsCustomers\VendorsCustomersIndex;
use App\Http\Livewire\VendorsCustomers\VendorsCustomersCreate;
use App\Http\Livewire\VendorsCustomers\VendorsCustomersShow;
use App\Http\Livewire\VendorsCustomers\VendorsCustomersUpdate;

/* =========================== VENDOR CUSTOMER TYPE SECTION =========================== */
use App\Http\Livewire\NewModule\NewModuleIndex;
use App\Http\Livewire\NewModule\NewModuleCreate;
use App\Http\Livewire\NewModule\NewModuleShow;
use App\Http\Livewire\NewModule\NewModuleUpdate;


/* =========================== AUDIT TRAIL SECTION =========================== */
// use App\Http\Livewire\Others\AuditTrail\AuditTrailIndex;

use App\Http\Livewire\Sidenavigation\Sidenavigation;

/*============================ SUPER ADMIN DASHBOARD SECTION =========================== */

use App\Http\Livewire\SuperAdminDashboard;

use App\Http\Livewire\SuperAdmin\CustomerManagement\CustomerManagementIndex;
use App\Http\Livewire\SuperAdmin\CustomerManagement\CustomerManagementAdd;
use App\Http\Livewire\SuperAdmin\CustomerManagement\CustomerManagementShow;
use App\Http\Livewire\SuperAdmin\CustomerManagement\CustomerManagementUpdate;

/*============================ SUPER ADMIN AUDIT TRAIL SECTION =========================== */

use App\Http\Livewire\SuperAdmin\AuditTrail\AuditTrailIndex;

/*============================ SUPER ADMIN VERSIONS SECTION =========================== */

use App\Http\Livewire\SuperAdmin\Versions\VersionsIndex;
use App\Http\Livewire\SuperAdmin\Versions\VersionsAdd;
use App\Http\Livewire\SuperAdmin\Versions\VersionsShow;
use App\Http\Livewire\SuperAdmin\Versions\VersionsUpdate;
use App\Http\Livewire\VersionFooter;

/*============================ SUPER ADMIN STATUSES SECTION =========================== */

use App\Http\Livewire\SuperAdmin\Statuses\StatusesIndex;

/*============================ SUPER ADMIN LEVELS SECTION =========================== */

use App\Http\Livewire\SuperAdmin\Levels\LevelsIndex;


/*============================ SUPER ADMIN DASHBOARD SECTION =========================== */
use App\Http\Livewire\Subscription\SubscriptionPage;
use App\Http\Livewire\Subscription\SubscriptionPayment;

use App\Http\Livewire\SuperAdmin\Subscription\AdminSubscriptionIndex;
use App\Http\Livewire\SuperAdmin\Subscription\AdminSubscriptionAdd;
use App\Http\Livewire\SuperAdmin\Subscription\AdminSubscriptionShow;
use App\Http\Livewire\SuperAdmin\Subscription\AdminSubscriptionUpdate;

use App\Http\Livewire\SignUp\SignUpIndex;
use App\Http\Livewire\SignUp\SignUpFbIndex;
use App\Http\Livewire\SignUp\SignUpEmailIndex;
use App\Http\Livewire\SignUp\CreateAccountIndex;
use App\Http\Livewire\Unauthorized;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\SignUp;

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
    return redirect('/login');
});

Route::get('/unauthorized',Unauthorized::class)->middleware((['auth']))->name('unauthorized');

Route::get('/superadmin', function () {
    return redirect('/superadmin');
});

Route::get('/app/subscription-page',SubscriptionPage::class)->name('subscription.page');
Route::get('/app/subscription-payment/{sub_id}',SubscriptionPayment::class)->name('subscription.payment');

Route::get('/sign-up/{username}/{firstname}/{lastname}/{email}/{google_id}',SignUpIndex::class)->name('sign-up.index');
Route::get('/sign-up/email',SignUpEmailIndex::class)->name('sign-up-email.index');
Route::get('/sign-up/create-account',CreateAccountIndex::class)->name('create-account.index');
Route::get('/sign-up/store','App\Http\Controllers\SignUp@store')->name('sign-up.store');
Route::get('/dashboard',Dashboard::class)->middleware((['auth']))->name('dashboard');
Route::get('auth/facebook', 'App\Http\Controllers\Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'App\Http\Controllers\Auth\FacebookController@handleFacebookCallback');
Route::get('/sign-up-fb/{username}/{email}/{facebook_id}',SignUpFbIndex::class)->name('sign-up-fb.index');
Route::get('auth/google', 'App\Http\Controllers\Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'App\Http\Controllers\Auth\GoogleController@handleGoogleCallback');

Route::post('/globals/checkUserNameIsValid','App\Http\Controllers\Globals\VerifyIfValueExistsController@checkUserNameIsValid');

Route::post('/users/checkUsername', 'App\Http\Controllers\Auth\RegisteredUserController@checkUsername');

/* =========================== MY ACCOUNT =========================== */
Route::get('/app/my-account',MyAccount::class)->middleware((['auth']))->name('my-account');
Route::get('/app/my-account/update/{employee_id}',MyAccountUpdate::class)->middleware((['auth']))->name('my-account.update');

/* =========================== Company PROFILE SECTION =========================== */
Route::middleware(['auth','subscription','accessrolemiddleware:901'])->group(function ($accesskey) {
});

Route::middleware(['auth','subscription','accessrolemiddleware:905'])->group(function ($accesskey) {
	Route::get('/app/company-settings/audit-trail/index',CompanyAuditTrailIndex::class)->name('company-audit-trail.index');
});

Route::post('/app/paginted-notes/fetch',[VersionFooter::class,'fetchData'])->name('paginated.notes');

/* =========================== VENDOR CUSTOMER TYPE SECTION =========================== */
Route::middleware(['auth','subscription','accessrolemiddleware:710'])->group(function ($accesskey) {
Route::get('/app/configurations/vendor-customer/index',VendorsCustomersIndex::class)->middleware((['auth']))->name('vendor-customer-type.index');
Route::get('/app/configurations/vendor-customer/add',VendorsCustomersCreate::class)->middleware((['auth']))->name('vendor-customer-type.create');
Route::get('/app/configurations/vendor-customer/{vendor_customer_id}',VendorsCustomersShow::class)->middleware((['auth']))->name('vendor-customer-type.read');
Route::get('/app/configurations/vendor-customer/{vendor_customer_id}/update',VendorsCustomersUpdate::class)->middleware((['auth']))->name('vendor-customer-type.update');
});

/* =========================== NEW MODULE SECTION =========================== */

Route::get('/app/configurations/new-module/index',NewModuleIndex::class)->middleware(['auth'])->name('new-module.index');
Route::get('/app/configurations/new-module/add',NewModuleCreate::class)->middleware(['auth'])->name('new-module.create');
Route::get('/app/configurations/new-module/{new_module_id}',NewModuleShow::class)->middleware(['auth'])->name('new-module.read');
Route::get('/app/configurations/new-module/{new_module_id}/update',NewModuleUpdate::class)->middleware(['auth'])->name('new-module.update');




/* =========================== SUPER ADMIN =========================== */

Route::get('/app/super-admin-dashboard',SuperAdminDashboard::class)->middleware((['auth']))->name('super-admin-dashboard');

Route::get('/app/super-admin/customer-management/profile/index',CustomerManagementIndex::class)->name('customer-management.index');
Route::get('/app/super-admin/customer-management/profile/add',CustomerManagementAdd::class)->name('customer-management.add');
Route::get('/app/super-admin/customer-management/profile/{company_id}',CustomerManagementShow::class)->name('customer-management.show');
Route::get('/app/super-admin/customer-management/profile/{company_id}/update',CustomerManagementUpdate::class)->name('customer-management.update');

Route::get('/app/super-admin/audit-trail/index',AuditTrailIndex::class)->name('audit-trail.index');

Route::get('/app/super-admin/versions/index',VersionsIndex::class)->name('versions.index');
Route::get('/app/super-admin/versions/add',VersionsAdd::class)->name('versions.add');
Route::get('/app/super-admin/versions/{version_id}',VersionsShow::class)->name('versions.show');
Route::get('/app/super-admin/versions/{version_id}/update',VersionsUpdate::class)->name('versions.update');

Route::get('/app/super-admin/statuses/index',StatusesIndex::class)->name('statuses.index');
Route::get('/app/super-admin/levels/index',LevelsIndex::class)->name('levels.index');

Route::get('/app/super-admin/subscription/index',AdminSubscriptionIndex::class)->name('subscription.index');
Route::get('/app/super-admin/subscription/add',AdminSubscriptionAdd::class)->name('subscription.add');
Route::get('/app/super-admin/subscription/{subscription_id}',AdminSubscriptionShow::class)->name('subscription.show');
Route::get('/app/super-admin/subscription/{subscription_id}/update',AdminSubscriptionUpdate::class)->name('subscription.update');

require __DIR__.'/auth.php';
