<?php

namespace Workdo\Audit\Listeners;

use App\Events\CompanySettingMenuEvent;

class CompanySettingMenuListener
{
    /**
     * Handle the event.
     */
    public function handle(CompanySettingMenuEvent $event): void
    {
        $module = 'Audit';
        $menu = $event->menu;
        $menu->add([
            'title' =>  __('Audit'),
            'name' => 'audit',
            'order' => 1010,
            'ignore_if' => [],
            'depend_on' => [],
            'route' => '',
            'navigation' => 'audit-sidenav',
            'module' => $module,
            'permission' => 'audit manage'
        ]);
    }
}
