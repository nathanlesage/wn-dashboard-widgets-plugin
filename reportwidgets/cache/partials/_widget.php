<div class="report-widget" id="cache-sizes">
    <h3><?= e(trans($this->property('title'))) ?></h3>

<?php if (!isset($error)): ?>
    <div class="control-chart" data-control="chart-pie" data-size="200" data-center-text="<?= $all_formatted ?>">
        <ul>
            <li data-color="#7e709a" data-value="<?= $cache_raw ?>">cms/cache<span><?= $cache_formatted ?></span></li>
            <li data-color="#903030" data-value="<?= $combiner_raw ?>">cms/combiner<span><?= $combiner_formatted ?></span></li>
            <li data-color="#c4b004" data-value="<?= $twig_raw ?>">cms/twig<span><?= $twig_formatted ?></span></li>
            <li data-color="#408080" data-value="<?= $framework_raw ?>">framework/cache<span><?= $framework_formatted ?></span></li>
        </ul>
    </div>
    <button
        type="submit"
        data-request="<?= $this->getEventHandler('onClearCache') ?>"
        data-request-success="$('#cache-sizes').replaceWith(data.partial)"
        class="btn btn-default">
        <i class="icon-trash"></i> &nbsp; <?= e(trans('hendrikerz.dashboardwidgets::lang.widgets.cache.clear')) ?>
    </button>

<?php else: ?>
    <p class="flash-message static warning"><?= e($error) ?></p>
<?php endif ?>
</div>
