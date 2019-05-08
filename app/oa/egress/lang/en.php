<?php
global $app;
$app->loadLang('trip', 'oa');
$menu = isset($lang->egress->menu) ? $lang->egress->menu : '';
$lang->egress = clone $lang->trip;
$lang->egress->menu = $menu;

$lang->egress->create   = 'Create';
$lang->egress->common   = 'Egress';
$lang->egress->browse   = 'Browse';
$lang->egress->personal = 'My Egress';
$lang->egress->view     = 'Details';

$lang->egress->from = 'Departure';
$lang->egress->to   = 'Destination';

$lang->egress->unique    = 'There was an Egress in %s.';
$lang->egress->sameMonth = 'Egresses must be in the same month.';
