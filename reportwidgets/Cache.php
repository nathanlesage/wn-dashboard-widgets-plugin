<?php

// Adapted from `oc-backend-plus` by gergo85, licensed via MIT.
namespace HendrikErz\DashboardWidgets\ReportWidgets;

use Backend\Classes\ReportWidgetBase;
use Exception;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Artisan;
use Backend\Facades\BackendAuth;
use Illuminate\Support\Facades\Log;

class Cache extends ReportWidgetBase
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
        $this->addCss('css/cache.css');
    }

    public function defineProperties()
    {
        return [
            'title' => [
                'title'             => 'backend::lang.dashboard.widget_title_label',
                'default'           => 'hendrikerz.dashboardwidgets::lang.widgets.cache.title',
                'type'              => 'string',
                'validationPattern' => '^.+$',
                'validationMessage' => 'backend::lang.dashboard.widget_title_error',
            ]
        ];
    }

    public function onClearCache()
    {
        Artisan::call('cache:clear');
        try {
            Artisan::call('view:clear');
        }
        catch (Exception $ex) {
            Log::error('Could not clear the view-cache via Artisan: ' . $ex->getMessage());
        }

        $user = BackendAuth::getUser();
        Log::info('Cache cleared from Dashboard Widget.', [ 'user' => $user->first_name ]);

        return [
            'partial' => $this->makePartial('widget', ['size' => $this->loadData()])
        ];
    }

    protected function loadData()
    {
        $cache = $this->folderSize(storage_path().'/cms/cache');
        $combiner = $this->folderSize(storage_path().'/cms/combiner');
        $twig = $this->folderSize(storage_path().'/cms/twig');
        $framework = $this->folderSize(storage_path().'/framework/cache');

        $this->vars['cache_raw']     = $cache;
        $this->vars['combiner_raw']  = $combiner;
        $this->vars['twig_raw']      = $twig;
        $this->vars['framework_raw'] = $framework;

        $this->vars['cache_formatted']     = $this->formatSize($cache);
        $this->vars['combiner_formatted']  = $this->formatSize($combiner);
        $this->vars['twig_formatted']      = $this->formatSize($twig);
        $this->vars['framework_formatted'] = $this->formatSize($framework);
        $this->vars['all_formatted']       = $this->formatSize($cache + $combiner + $twig + $framework);
    }

    protected function formatSize($size)
    {
        $base = 1024;

        if ($size < $base ** 1) {
            return $size . ' B';
        } else if ($size < $base ** 2) {
            return round($size / $base ** 1, 0) . ' KB';
        } else if ($size < $base ** 3) {
            return round($size / $base ** 2, 0) . ' MB';
        } else if ($size < $base ** 4) {
            return round($size / $base ** 3, 0) . ' GB';
        } else if ($size < $base ** 5) {
            return round($size / $base ** 4, 0) . ' TB';
        } else {
            return '> 1 TB';
        }
    }

    protected function folderSize($directory)
    {
        if (count(scandir($directory)) == 2) {
            return 0;
        }

        $size = 0;

        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory)) as $file) {
            $size += $file->getSize();
        }

        return $size;
    }
}
