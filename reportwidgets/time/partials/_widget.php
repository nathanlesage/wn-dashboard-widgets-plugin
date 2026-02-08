<div class="report-widget" id="time-widget" data-php-time="<?= $php_timezone ?>">
  <h3><?= e(trans($this->property('title'))) ?></h3>

  <div class="control-status-list">
    <ul>
      <li>
        <span class="status-icon info"><i class="icon-info"></i></span>
        <span class="status-text info"><?= e(trans('hendrikerz.dashboardwidgets::lang.widgets.time.server_time')) ?></span>
        <span class="status-label link" id="server-time"></span>
      </li>

      <li>
        <span class="status-icon info"><i class="icon-info"></i></span>
        <span class="status-text info"><?= e(trans('hendrikerz.dashboardwidgets::lang.widgets.time.client_time')) ?></span>
        <span class="status-label link" id="local-time"></span>
      </li>

      <li id="server-is-ahead-message" style="display: none;">
        <span class="status-icon primary"><i class="icon-clock"></i></span>
        <span class="status-text primary"><?= e(trans('hendrikerz.dashboardwidgets::lang.widgets.time.server_ahead')) ?></span>
        <span class="status-label primary">±0</span>
      </li>
      <li id="server-is-behind-message" style="display: none;">
        <span class="status-icon primary"><i class="icon-clock"></i></span>
        <span class="status-text primary"><?= e(trans('hendrikerz.dashboardwidgets::lang.widgets.time.server_behind')) ?></span>
        <span class="status-label primary">±0</span>
      </li>
      <li id="server-is-same-message" style="display: none;">
        <span class="status-icon primary"><i class="icon-clock"></i></span>
        <span class="status-text primary"><?= e(trans('hendrikerz.dashboardwidgets::lang.widgets.time.server_equal')) ?></span>
        <span class="status-label primary">±0</span>
      </li>
    </ul>
  </div>
</div>
