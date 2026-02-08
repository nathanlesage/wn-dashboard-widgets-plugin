<?php

namespace HendrikErz\DashboardWidgets;

use Backend\Models\UserRole;
use System\Classes\PluginBase;

/**
 * DashboardWidgets Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'hendrikerz.dashboardwidgets::lang.plugin.name',
            'description' => 'hendrikerz.dashboardwidgets::lang.plugin.description',
            'author' => 'Hendrik Erz',
            'icon' => 'gauge-high',
            'homepage' => 'https://www.hendrik-erz.de/',
        ];
    }

    public function registerReportWidgets()
    {
        return [
            'HendrikErz\DashboardWidgets\ReportWidgets\Cache' => [
                'label' => 'hendrikerz.dashboardwidgets::lang.widgets.cache.title',
                'context' => 'dashboard',
                'permissions' => [
                    'hendrikerz.dashboardwidgets.view'
                ]
            ],
            'HendrikErz\DashboardWidgets\ReportWidgets\Maintenance' => [
                'label' => 'hendrikerz.dashboardwidgets::lang.widgets.maintenance.title',
                'context' => 'dashboard',
                'permissions' => [
                    'hendrikerz.dashboardwidgets.view'
                ]
            ],
            'HendrikErz\DashboardWidgets\ReportWidgets\Time' => [
                'label' => 'hendrikerz.dashboardwidgets::lang.widgets.time.title',
                'context' => 'dashboard',
                'permissions' => [
                    'hendrikerz.dashboardwidgets.view'
                ]
            ],
        ];
    }

    /**
     * Registers any backend permissions used by this plugin.
     */
    public function registerPermissions(): array
    {
        return [
            'hendrikerz.dashboardwidgets.view' => [
                'tab' => 'hendrikerz.dashboardwidgets::lang.plugin.name',
                'label' => 'hendrikerz.dashboardwidgets::lang.permissions.view',
                'roles' => [UserRole::CODE_DEVELOPER, UserRole::CODE_PUBLISHER],
            ],
        ];
    }
}
