<?php

namespace HendrikErz\DashboardWidgets\ReportWidgets;

use Backend\Classes\ReportWidgetBase;
use Exception;
use Cms\Models\MaintenanceSetting;

class Maintenance extends ReportWidgetBase
{
    public function render()
    {
        try {
            $this->loadData();
        }
        catch (Exception $ex) {
            $this->vars['error'] = $ex->getMessage();
        }

        return $this->makePartial('widget');
    }

    public function defineProperties()
    {
        return [
            'title' => [
                'title'             => 'backend::lang.dashboard.widget_title_label',
                'default'           => 'hendrikerz.dashboardwidgets::lang.widgets.maintenance.title',
                'type'              => 'string',
                'validationPattern' => '^.+$',
                'validationMessage' => 'backend::lang.dashboard.widget_title_error',
            ]
        ];
    }

    public function onToggleMaintenanceMode()
    {
      MaintenanceSetting::set('is_enabled', !MaintenanceSetting::get('is_enabled'));

      $this->loadData();

      return [
          'partial' => $this->makePartial('widget')
      ];
    }

    protected function loadData()
    {
      $this->vars['maintenance_on'] = MaintenanceSetting::get('is_enabled');
      $this->vars['cms_page'] = MaintenanceSetting::get('cms_page');
    }
}
