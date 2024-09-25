<?php

use App\Livewire\SuperAdmin\Pages\Profile as SuperAdminPagesProfile;
use App\Livewire\SuperAdmin\Pages\Dashboard as SuperAdminPagesDashboard;
use App\Livewire\SuperAdmin\Evaluation\RatingIndicator as SuperAdminEvaluationRatingIndicator;
use App\Livewire\SuperAdmin\Evaluation\Index as SuperAdminEvaluationIndex;
use App\Livewire\SuperAdmin\Evaluation\UserEvaluation as SuperAdminEvaluationUserEvaluation;
use App\Livewire\SuperAdmin\Pages\PrintDetails as SuperAdminPagesPrintDetails;
use App\Livewire\SuperAdmin\Users\Index as SuperAdminUsersIndex;
use App\Livewire\Admin\Pages\Index as AdminPagesIndex;
use App\Livewire\User\Pages\Index as UserPagesIndex;
use App\Livewire\User\Pages\IndividualScorecard as UserPagesIndividualScorecard;
use App\Livewire\User\Pages\ScorecardHistory as UserPagesScorecardHistory;
use App\Livewire\User\Pages\AccountManagement as UserPagesAccountManagement;
use App\Livewire\Global\Pages\Landing;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;

Route::get('/', Landing::class);
Route::get('/sign-up', Register::class);
Route::get('/login', Login::class)->name('login');
Route::fallback(Login::class);

Route::group(['middleware' => ['auth', 'verified', 'role:super_admin']], function () {
    Route::get('/super-admin/dashboard', SuperAdminPagesDashboard::class);
    Route::get('/super-admin/account-management', SuperAdminPagesProfile::class);
    Route::get('/super-admin/user-account-management', SuperAdminUsersIndex::class);
    Route::get('/super-admin/evaluation/rating-indicator', SuperAdminEvaluationRatingIndicator::class);
    Route::get('/super-admin/evaluation/user-evaluation', SuperAdminEvaluationIndex::class);
    Route::get('/super-admin/evaluation/user-evaluation/{userId}/{policeId}', SuperAdminEvaluationUserEvaluation::class);
    Route::get('/super-admin/print/printing-details/preview/{userId}/{policeId}/info', SuperAdminPagesPrintDetails::class);
});

Route::group(['middleware' => ['auth', 'verified', 'role:admin|super_admin']], function () {
    Route::get('/admin/dashboard', AdminPagesIndex::class);
});


Route::group(['middleware' => ['auth', 'verified', 'role:user|admin|super_admin']], function () {
    Route::get('/users/home', UserPagesIndex::class);
});

Route::group(['middleware' => ['auth', 'verified', 'role:user|admin|super_admin']], function () {
    Route::get('/users/individual-scorecard', UserPagesIndividualScorecard::class);
});

Route::group(['middleware' => ['auth', 'verified', 'role:user|admin|super_admin']], function () {
    Route::get('/users/scorecard-history', UserPagesScorecardHistory::class);
});

Route::group(['middleware' => ['auth', 'verified', 'role:user|admin|super_admin']], function () {
    Route::get('/users/account-management', UserPagesAccountManagement::class);
});
