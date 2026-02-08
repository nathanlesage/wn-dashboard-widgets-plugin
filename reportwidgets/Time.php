<?php

namespace HendrikErz\DashboardWidgets\ReportWidgets;

use Backend\Classes\ReportWidgetBase;
use Exception;

class Time extends ReportWidgetBase
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

    protected function loadAssets()
    {
        // $this->addCss('css/time.css');
        $this->addJs('js/time.js');
        $this->addJs('js/luxon.min.js');
    }

    public function defineProperties()
    {
        return [
            'title' => [
                'title'             => 'backend::lang.dashboard.widget_title_label',
                'default'           => 'hendrikerz.dashboardwidgets::lang.widgets.time.title',
                'type'              => 'string',
                'validationPattern' => '^.+$',
                'validationMessage' => 'backend::lang.dashboard.widget_title_error',
            ]
        ];
    }

    protected function loadData()
    {
        $this->vars['php_timezone'] = date_default_timezone_get();
    }
}
