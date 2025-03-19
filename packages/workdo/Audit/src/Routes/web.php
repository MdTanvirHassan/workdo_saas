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

use Illuminate\Support\Facades\Route;
use Workdo\Audit\Http\Controllers\AuditController;

Route::group(['middleware' => ['web', 'auth', 'verified','PlanModuleCheck:Audit']], function () {
    Route::prefix('audit')->group(function() {
        Route::post('/setting/store', [AuditController::class,'setting'])->name('audit.setting.store');
    });
});
Route::middleware(['web'])->group(function ()
{
    Route::prefix('audit')->group(function() {
        Route::post('/plan/company/payment', [AuditController::class,'planPayWithAudit'])->name('plan.pay.with.audit')->middleware(['auth']);
        Route::get('/plan/company/status', [AuditController::class,'planGetAuditStatus'])->name('plan.get.payment.status')->middleware(['auth']);
    });
    Route::post('/invoice-pay-with-audit', [AuditController::class, 'invoicePayWithAudit'])->name('invoice.pay.with.audit');
    Route::get('/audit/invoice/{invoice_id}/{type}', [AuditController::class, 'getInvoicePaymentStatus'])->name('invoice.audit');

    Route::post('course/audit/{slug?}', [AuditController::class,'coursePayWithAudit'])->name('course.pay.with.audit');
    Route::get('course/audit/{slug?}', [AuditController::class, 'getCoursePaymentStatus'])->name('course.audit');

    Route::post('/audit/{slug?}', [AuditController::class,'contentPayWithAudit'])->name('content.pay.with.audit');
    Route::get('content/audit/{slug?}', [AuditController::class, 'getContentPaymentStatus'])->name('content.audit');

    Route::prefix('hotel/{slug}')->group(function() {
        Route::post('customer/audit', [AuditController::class,'BookinginvoicePayWithAudit'])->name('booking.audit.post');
    });
    Route::get('/invoice/audit/{invoice_id}/{type}', [AuditController::class, 'getBookingInvoicePaymentStatus'])->name('booking.audit');

    Route::prefix('audit')->group(function() {
        Route::post('/property/tenant/payment', [AuditController::class,'propertyPayWithAudit'])->name('property.pay.with.audit')->middleware(['auth']);
        Route::get('/property/tenant/status', [AuditController::class,'propertyGetAuditStatus'])->name('property.get.payment.status.audit')->middleware(['auth']);
    });

    Route::any('vehicle-booking/audit/{slug}/{lang?}', [AuditController::class, 'vehicleBookingWithAudit'])->name('vehicle.booking.with.audit');
    Route::get('vehicle-booking/audit/status/{slug}/{lang?}', [AuditController::class, 'vehicleBookingStatus'])->name('vehicle.booking.status.audit');

    Route::post('/memberplan-pay-with-audit', [AuditController::class, 'memberplanPayWithAudit'])->name('memberplan.pay.with.audit');
    Route::get('/audit/invoice/{membershipplan_id}', [AuditController::class, 'getMemberPlanPaymentStatus'])->name('memberplan.audit');

    Route::post('/beauty-spa-pay-with-audit/{slug?}', [AuditController::class,'BeautySpaPayWithAudit'])->name('beauty.spa.pay.with.audit');
    Route::get('/beauty-spa/audit/{slug?}', [AuditController::class, 'getBeautySpaPaymentStatus'])->name('beauty.spa.audit');

    Route::post('/bookings-pay-with-audit/{slug?}', [AuditController::class,'BookingsPayWithAudit'])->name('bookings.pay.with.audit');
    Route::get('/bookings/audit/{slug?}', [AuditController::class, 'getBookingsPaymentStatus'])->name('bookings.audit');
    Route::post('/movie-show-booking-pay-with-audit/{slug?}', [AuditController::class,'MovieShowBookingPayWithAudit'])->name('movie.show.booking.pay.with.audit');
    Route::get('/movie-show-booking-system/audit/{slug?}', [AuditController::class, 'getMovieShowBookingPaymentStatus'])->name('movie.show.booking.audit');

    Route::post('{slug}/parking-pay-with-audit/{lang?}', [AuditController::class,'parkingPayWithAudit'])->name('parking.pay.with.audit');
    Route::get('{slug}/parking/audit/{id}/{amount}/{lang?}', [AuditController::class, 'getParkingPaymentStatus'])->name('parking.audit');


    Route::post('/event-show-booking-pay-with-audit/{slug?}', [AuditController::class,'EventShowBookingPayWithAudit'])->name('event.show.booking.pay.with.audit');
    Route::get('/event-show-booking-system/audit/{slug?}', [AuditController::class, 'getEventShowBookingPaymentStatus'])->name('event.show.booking.audit');

    Route::post('/facilities-pay-with-audit/{slug?}', [AuditController::class,'FacilitiesPayWithAudit'])->name('facilities.pay.with.audit');
    Route::get('/facilities/audit/{slug?}', [AuditController::class, 'getFacilitiesPaymentStatus'])->name('facilities.audit');


    Route::post('/property-booking-pay-with-audit/{slug?}', [AuditController::class, 'PropertyBookingPayWithAudit'])->name('property.booking.pay.with.audit');
    Route::get('/property-booking/audit/{slug?}', [AuditController::class,'GetPropertyBookingPaymentStatus'])->name('property.booking.audit');

});
