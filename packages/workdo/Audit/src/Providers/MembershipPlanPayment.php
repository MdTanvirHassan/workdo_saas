<?php

namespace Workdo\Audit\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Workdo\GymManagement\Entities\AssignMembershipPlan;

class MembershipPlanPayment extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot(){

        view()->composer(['gym-management::member.memberplanpay'], function ($view)
        {
            $route = \Request::route()->getName();
            if($route == "pay.membership.plan")
            {
                try {
                    $ids = \Request::segment(3);
                    if(!empty($ids))
                    {
                        try {
                            $id = \Illuminate\Support\Facades\Crypt::decrypt($ids);
                            $user = User::where('id',$id)->first();
                            $company_settings = getCompanyAllSetting( $user->created_by,$user->workspace);
                            $assignmembershipplan = AssignMembershipPlan::where('user_id',$user->id)->first();
                            if(module_is_active('Audit', $user->created_by) && ((isset($company_settings['audit_is_on'])? $company_settings['audit_is_on'] : 'off')  == 'on') && (isset($company_settings['audit_key'])) && (isset($company_settings['audit_secret'])))
                            {
                                $view->getFactory()->startPush('memberplan_payment_tab', view('audit::payment.sidebar'));
                                $view->getFactory()->startPush('memberplan_payment_div', view('audit::payment.member_plan_payment',compact('user','company_settings','assignmembershipplan')));
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
