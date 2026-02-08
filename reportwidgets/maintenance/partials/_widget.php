<div class="report-widget" id="maintenance-mode">
  <h3><?= e(trans($this->property('title'))) ?></h3>

  <?php if (!isset($error)): ?>
    <?php if ($maintenance_on): ?>
      <p class="text-warning">
        <i class="icon-exclamation-triangle text-warning"></i>
        <?= e(trans('hendrikerz.dashboardwidgets::lang.widgets.maintenance.message_enabled')) ?>
        <strong><?= $cms_page ?></strong>
      </p>
    <?php else: ?>
      <p class="text-success">
        <i class="icon-check text-success"></i>
        <?= e(trans('hendrikerz.dashboardwidgets::lang.widgets.maintenance.message_disabled')) ?>
      </p>
    <?php endif ?>
    <button
      type="submit"
      data-request="<?= $this->getEventHandler('onToggleMaintenanceMode') ?>"
      data-request-success="$('#maintenance-mode').replaceWith(data.partial)"
      class="btn <?= $maintenance_on ? 'btn-success' : 'btn-danger' ?>">
      <i class="icon-wrench"></i> &nbsp; <?= e(trans('hendrikerz.dashboardwidgets::lang.widgets.maintenance.' . ($maintenance_on ? 'disable' : 'enable'))) ?>
    </button>

  <?php else: ?>
    <p class="flash-message static warning"><?= e($error) ?></p>
  <?php endif ?>
</div>
