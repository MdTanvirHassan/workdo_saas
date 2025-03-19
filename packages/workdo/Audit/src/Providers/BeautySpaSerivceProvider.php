<?php

namespace Workdo\Audit\Providers;

use App\Models\WorkSpace;
use Illuminate\Support\ServiceProvider;

class BeautySpaSerivceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */

    public function boot(){

        view()->composer(['beauty-spa-management::frontend.append'], function ($view)

        {
                $slug = \Request::segment(2);
                $workspace = WorkSpace::where('id',$slug)->first();
                $company_settings = getCompanyAllSetting($workspace->created_by,$workspace->id);
                if((isset($company_settings['audit_is_on']) ? $company_settings['audit_is_on'] : 'off') == 'on' && !empty($company_settings['audit_key']) && !empty($company_settings['audit_secret']))
                {
                    $view->getFactory()->startPush('beauty_payment', view('audit::payment.beauty_payment',compact('slug')));
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
