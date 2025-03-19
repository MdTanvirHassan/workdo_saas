<?php

namespace Workdo\Audit\Listeners;
use App\Events\SuperAdminSettingMenuEvent;

class SuperAdminSettingMenuListener
{
    /**
     * Handle the event.
     */
    public function handle(SuperAdminSettingMenuEvent $event): void
    {
        $module = 'Audit';
        $menu = $event->menu;
        $menu->add([
            'title' => __('Audit'),
            'name' => 'audit',
            'order' => 1030,
            'ignore_if' => [],
            'depend_on' => [],
            'route' => '',
            'navigation' => 'audit-sidenav',
            'module' => $module,
            'permission' => 'audit manage'
        ]);
    }
}
