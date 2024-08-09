<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DeliverController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FeedbackController;

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
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/terms', function () {
    return view('terms');
});

Route::get('/getmeals', function () {
    return view('getmeals');
})->name('getmeals');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

// General unauthorized route
Route::get('/unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');

// Partner unauthorized route
Route::get('/unauthorized/partner', function () {
    return view('unauthorized_partner');
})->name('unauthorized.partner');

// Volunteer unauthorized route
Route::get('/unauthorized/volunteer', function () {
    return view('unauthorized_volunteer');
})->name('unauthorized.volunteer');

// Member unauthorized route
Route::get('/unauthorized/member', function () {
    return view('unauthorized_member');
})->name('unauthorized.member');

Route::get('/registration', function () {
    return view('registration');
})->name('registration');

// donation can be done without registration
Route::get('/donationFee', [DonationController::class, 'index']);

Route::post('/saveDonationFee', [DonationController::class, 'saveDonationFee'])->name('saveDonationFee');

Route::get('/donor', [DonationController::class, 'donor']);

Route::post('/saveBilling', [DonationController::class, 'saveBilling'])->name('saveBilling');

Route::get('/stripe', [DonationController::class, 'stripe']);

Route::post('/stripe', [DonationController::class, 'stripePost'])->name('stripe.post');

Route::get('/getCompletion', [DonationController::class, 'getCompletion'])->name('getCompletion');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    if (Auth::check()) {

        if (Auth::user()->role == 'member') {
            return redirect()->route('member#index');
        } else if (Auth::user()->role == 'partner') {
            return redirect()->route('partner#index');
        } else if (Auth::user()->role == 'volunteer') {
            return redirect()->route('volunteer#index');
        } else if (Auth::user()->role == 'admin') {
            return redirect()->route('admin#index');
        }
    }
})->name('welcome');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'check.session'])->group(function () {
    //Member
    Route::group(['prefix' => 'member', 'middleware' => ['auth', 'check.role:member']], function () {
        Route::get('/', function () {
            return app()->make(MemberController::class)->index();
        })->name('member#index');

        Route::get('/member/{id}', function ($id) {
            return app()->make(MemberController::class)->saveMemberMealPlan($id);
        })->name('member#saveMemberMealPlan');

        Route::get('/viewAllMenu', function () {
            return app()->make(MemberController::class)->viewAllMenu();
        })->name('member#viewAllMenu');

        Route::get('/viewMenu/{id}', function ($id) {
            return app()->make(MemberController::class)->viewMenu($id);
        })->name('member#viewMenu');

        Route::get('/foodSafety', function () {
            return app()->make(MemberController::class)->foodSafety();
        })->name('member#foodSafety');

        Route::get('/orderConfirmation/{partner_id}/{menu_id}/{user_id}', function ($partner_id, $menu_id, $user_id) {
            return app()->make(MemberController::class)->orderConfirmation($partner_id, $menu_id, $user_id);
        })->name('member#orderConfirmation');

        Route::patch('/member/cancel-order/{id}', [MemberController::class, 'cancelOrder'])->name('member.cancelOrder');

        Route::get('/deliveryHistory', function () {
            return app()->make(MemberController::class)->deliveryHistory();
        })->name('member#deliveryHistory');

        Route::get('/member/feedback/{orderId}', function ($orderId) {
            return app()->make(OrderController::class)->showFeedbackForm($orderId);
        })->name('member#feedback');

        Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback#store');

        Route::post('/saveOrder', [OrderController::class, 'saveOrder'])->name('order#saveOrder');

        Route::get('/showOrderDelivery/{id}', function ($id) {
            return app()->make(OrderController::class)->showOrderDelivery($id);
        })->name('order#showOrderDelivery');

        Route::get('/updateMemberOrder/{id}', function ($id) {
            return app()->make(MemberController::class)->updateMemberOrder($id);
        })->name('member#updateMemberOrder');

        Route::get('/updateProfile/{id}', function ($id) {
            return app()->make(MemberController::class)->updateProfile($id);
        })->name('member#updateProfile');

        Route::post('/updateUserProfile/{id}', function (Request $request, $id) {
            return app()->make(MemberController::class)->updateUserProfile($request, $id);
        })->name('member#updateUserProfile');
        
        Route::post('/updateCaregiverProfile/{id}', function (Request $request, $id) {
            return app()->make(MemberController::class)->updateCaregiverProfile($request, $id);
        })->name('member#updateCaregiverProfile');

        Route::get('/reassesment/{id}', function ($id) {
            return app()->make(MemberController::class)->reassesment($id);
        })->name('member#reassesment');

        Route::post('/newReassesment//{id}', function ($id) {
            return app()->make(MemberController::class)->newReassesment($id);
        })->name('member#newReassesment');
    });

    //Partner
    Route::group(['prefix' => 'partner', 'middleware' => ['auth', 'check.role:partner']], function () {
        Route::get('/', function () {
            return app()->make(PartnerController::class)->index();
        })->name('partner#index');

        Route::get('/createMenu', function () {
            return app()->make(PartnerController::class)->createMenu();
        })->name('partner#createMenu');

        Route::post('/saveMenu', [PartnerController::class, 'saveMenu'])->name('partner#saveMenu');

        Route::get('/viewMenu/{id}', [PartnerController::class, 'viewMenu'])->name('partner#viewMenu');

        Route::get('/foodSafety', function () {
            return app()->make(PartnerController::class)->foodSafety();
        })->name('partner#foodSafety');

        Route::get('/deleteMenu/{id}', [PartnerController::class, 'deleteMenu'])->name('partner#deleteMenu');

        Route::get('/updateMenu/{id}', [PartnerController::class, 'updateMenu'])->name('partner#updateMenu');

        Route::post('/saveUpdate{id}', function ($id) {
            return app()->make(PartnerController::class)->saveUpdate($id);
        })->name('partner#saveUpdate');

        Route::get('/AllOrderForPartner/{id}', function ($id) {
            return app()->make(OrderController::class)->AllOrderForPartner($id);
        })->name('order#AllOrderForPartner');

        Route::get('/updateOrder/{id}', [OrderController::class, 'updateOrder'])->name('order#updateOrder');

        Route::get('/updateProfile/{id}', function ($id) {
            return app()->make(PartnerController::class)->updateProfile($id);
        })->name('partner#updateProfile');

        Route::post('/partner/updateUserProfile/{id}', function (Request $request, $id) {
            return app()->make(PartnerController::class)->updateUserProfile($request, $id);
        })->name('partner#updateUserProfile');
        
        Route::post('/partner/updatePartnerProfile/{id}', function (Request $request, $id) {
            return app()->make(PartnerController::class)->updatePartnerProfile($request, $id);
        })->name('partner#updatePartnerProfile');
    });

    Route::group(['prefix' => 'volunteer', 'middleware' => ['auth', 'check.role:volunteer']], function () {
        Route::get('/', function () {
            return app()->make(VolunteerController::class)->index();
        })->name('volunteer#index');

        Route::get('/viewAllMenu', function () {
            return app()->make(VolunteerController::class)->viewAllMenu();
        })->name('volunteer#viewAllMenu');

        Route::get('/updateDelivery/{id}', function ($id) {
            return app()->make(DeliverController::class)->updateDelivery($id);
        })->name('delivery#updateDelivery');

        Route::get('/AllDeliveryForVolunteer', function () {
            return app()->make(DeliverController::class)->AllDeliveryForVolunteer();
        })->name('deliver#AllDeliveryForVolunteer');

        Route::get('/updateDelivery/{id}', [DeliverController::class, 'updateDelivery'])->name('deliver#updateDelivery');

        Route::get('/updateProfile/{id}', function ($id) {
            return app()->make(VolunteerController::class)->updateProfile($id);
        })->name('volunteer#updateProfile');

        Route::post('/volunteer/updateUserProfile/{id}', function (Request $request, $id) {
            return app()->make(VolunteerController::class)->updateUserProfile($request, $id);
        })->name('volunteer#updateUserProfile');
        
        Route::post('/volunteer/updateVolunteerProfile/{id}', function (Request $request, $id) {
            return app()->make(VolunteerController::class)->updateVolunteerProfile($request, $id);
        })->name('volunteer#updateVolunteerProfile');
    });

    //Administrator
    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'check.role:admin']], function () {
        Route::get('/', function () {
            return app()->make(AdminController::class)->index();
        })->name('admin#index');

        Route::get('/allMembers', function () {
            return app()->make(AdminController::class)->allMembers();
        })->name('admin#allMembers');

        Route::get('/allPartner', function () {
            return app()->make(AdminController::class)->allPartners();
        })->name('admin#allPartners');

        Route::get('/allVolunteers', function () {
            return app()->make(AdminController::class)->allVolunteers();
        })->name('admin#allVolunteers');

        Route::get('/allDonors', function () {
            return app()->make(AdminController::class)->allDonors();
        })->name('admin#allDonors');

        Route::get('/allFeedbacks', function () {
            return app()->make(AdminController::class)->allFeedbacks();
        })->name('admin#allFeedbacks');

        Route::get('/allMenus', function () {
            return app()->make(AdminController::class)->allMenus();
        })->name('admin#allMenus');

        Route::get('/allDeliveries', function () {
            return app()->make(AdminController::class)->allDeliveries();
        })->name('admin#allDeliveries');

        Route::get('/deleteMenu/{id}', function ($id) {
            return app()->make(AdminController::class)->deleteMenu($id);
        })->name('admin#deleteMenu');

        Route::get('/updateMenu/{id}', function ($id) {
            return app()->make(AdminController::class)->updateMenu($id);
        })->name('admin#updateMenu');

        Route::post('/saveUpdateMenu/{id}', [AdminController::class, 'saveUpdateMenu'])->name('admin#saveUpdateMenu');

        Route::get('/deleteMember/{id}', [AdminController::class, 'deleteMember'])->name('admin#deleteMember');

        Route::get('/deletePartner/{id}', [AdminController::class, 'deletePartner'])->name('admin#deletePartner');

        Route::get('/deleteVolunteer/{id}', [AdminController::class, 'deleteVolunteer'])->name('admin#deleteVolunteer');

        Route::get('/updateAdmin/{id}', [AdminController::class, 'updateAdmin'])->name('admin#updateAdmin');

        Route::get('/updateMembers/{id}', [AdminController::class, 'updateMembers'])->name('admin#updateMembers');

        Route::get('/updatePartner/{id}', [AdminController::class, 'updatePartner'])->name('admin#updatePartner');

        Route::get('/updateVolunteer/{id}', [AdminController::class, 'updateVolunteer'])->name('admin#updateVolunteer');

        Route::post('/userUpdated/{id}', [AdminController::class, 'saveUpdateUser'])->name('admin#userUpdated');

        Route::post('/memberUpdated/{id}', [AdminController::class, 'saveUpdateM'])->name('admin#memberUpdated');

        Route::post('/partnerUpdated/{id}', [AdminController::class, 'saveUpdateP'])->name('admin#partnerUpdated');

        Route::post('/volunteerUpdated/{id}', [AdminController::class, 'saveUpdateV'])->name('admin#volunteerUpdated');
    });
});
