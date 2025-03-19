<?php

namespace Workdo\Audit\Providers;

use Illuminate\Support\ServiceProvider;

class RetainerPayment extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */

    public function boot(){

        view()->composer(['retainer::retainer.retainerpay'], function ($view)
        {
            $route = \Request::route()->getName();
            if($route == "pay.retainer")
            {
                try {
                    $ids = \Request::segment(3);
                    if(!empty($ids))
                    {
                        try {
                            $id = \Illuminate\Support\Facades\Crypt::decrypt($ids);
                            $invoice = \Workdo\Retainer\Entities\Retainer::where('id',$id)->first();
                            $company_settings = getCompanyAllSetting( $invoice->created_by,$invoice->workspace);
                            $type = 'retainer';
                            if(module_is_active('Audit', $invoice->created_by) && ((isset($company_settings['audit_is_on'])? $company_settings['audit_is_on'] : 'off')  == 'on') && (isset($company_settings['audit_key'])) && (isset($company_settings['audit_secret'])))
                            {
                                $view->getFactory()->startPush('retainer_payment_tab', view('audit::payment.sidebar'));
                                $view->getFactory()->startPush('retainer_payment_div', view('audit::payment.nav_containt_div',compact('type','invoice','company_settings')));
                            }
                        } catch (\Throwable $th)
                        {

                        }
                    }
                } catch (\Throwable $th) {

                }
            }
        });
    }
    public function register()
    {
        //
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
