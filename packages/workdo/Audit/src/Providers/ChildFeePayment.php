<?php

namespace Workdo\Audit\Providers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\ServiceProvider;
use Workdo\ChildcareManagement\Entities\ChildFee;

class ChildFeePayment extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot(){
        view()->composer(['childcaremanagement::childfee.show'], function ($view)
        {
            try {
                $ids = \Request::segment(3);
                if(!empty($ids))
                {
                    try {
                        $childFeesId = Crypt::decrypt($ids);
                        $invoice = ChildFee::find($childFeesId);
                        $company_settings = getCompanyAllSetting($invoice->created_by,$invoice->workspace);
                        $type = 'childfeepayment';
                        if(module_is_active('Audit', $invoice->created_by) && ((isset($company_settings['audit_is_on']) ? $company_settings['audit_is_on']:'off') == 'on') && (isset($company_settings['audit_key'])) && (isset($company_settings['audit_secret'])))
                        {
                            $view->getFactory()->startPush('invoice_payment_tab', view('audit::payment.sidebar'));
                            $view->getFactory()->startPush('invoice_payment_div', view('audit::payment.nav_containt_div',compact('company_settings','invoice','type')));
                        }
                    } catch (\Throwable $th)
                    {

                    }
                }
            } catch (\Throwable $th) {

            }
        });
    }
    public function register()
    {

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
