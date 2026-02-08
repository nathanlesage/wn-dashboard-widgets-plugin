# Winter Dashboard Widgets Plugin

> A comprehensive plugin to provide a basic set of widgets for the Winter CMS
> admin dashboard.

This plugin provides a set of widgets that you can view on your Winter CMS admin
dashboard. Once this plugin is installed, you can add and configure its widgets
on your dashboard like any other widget.

## Widgets

Currently, the following widgets are contained:

* **Cache**: This widget displays common cache sizes and allows you to clear the
  cache comfortably from the dashboard without the need to SSH into your server.
* **Maintenance**: This widget allows you to control the maintenance mode
  directly from your dashboard. It displays the current status of this setting
  (like the "Theme" widget does) and offers a button to toggle the mode on or
  off.
* **Time**: This widget shows you both your server time and your local browser
  time. It also displays an info string indicating whether your server is behind
  you, ahead of you, or if you are both in the same timezone.

## Setup

To install this plugin into your Winter CMS page, install it via Composer:

```bash
composer require wn-dashboard-widgets-plugin
```

## Configuration

This plugin only provides dashboard widgets. To add one of the provided widgets,
activate it by going to your Dashboard, click "Add Widget" and select the widget
from the list.

This plugin defines a permission that you can use to prevent certain users from
viewing and interacting with these widgets.

## Contributing

This plugin is a personal project because I needed a few widgets. Specifically,
I always found the Cache widget from the old "Backend Plus" plugin (from the
October CMS days) handy, but that plugin hasn't been updated in years, and I
need something reliable.

However, I have little time to spend ongoing time adding new widgets. So
instead, if you need a widget, please implement it and open a PR. The easiest
way to add a widget is to simply copy an existing one.

> **Tip**: The authoritative documentation for creating "report widgets" can be found
> [in the Winter CMS documentation](https://wintercms.com/docs/v1.2/docs/backend/widgets#report-widgets).

Broadly speaking, here's what you need to do:

1. Define a new widget controller (e.g., `Cache.php`) in the `reportwidgets`
   folder.
2. Create an accompanying widget partial called `_widget.php` in the `partials`
   folder.
3. Register the widget in the `Plugin.php`
4. Configure it according to what you wish to display/enable admins to do.

To add localization strings, add a new key in the `widgets` section of the
English `lang.php` file, analogous to the other widgets. If you add additional
languages, all the better. Do not keep verbatim English text in the widgets.

If you want to add additional CSS or JavaScript, please see the existing widgets
for how to do that.

## License

Copyright &copy; 2026 Hendrik Erz. This plugin is licensed via AGPL 3.0. For
more information, please see the [LICENSE file](./LICENSE).
