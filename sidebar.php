<?php
/* Template Name: Sidebar */

$sel_involved_box = array(4);
switch ($_SERVER['REQUEST_URI']) {
    case "/ar/pray/":
    case "/pray/":
        $sel_involved_box[0] = 'class="selected"';
        break;
    case "/ar/volunteer/":
    case "/volunteer/":
        $sel_involved_box[1] = 'class="selected"';
        break;
    case "/ar/donate/":
    case "/donate/":
        $sel_involved_box[2] = 'class="selected"';
        break;
    case "/ar/connect/":
    case "connect/":
        $sel_involved_box[3] = 'class="selected"';
        break;
    default:
        break;
}

?>
<div id="right-col" class="">
    <div id="involved-box">
        <h2><?= __('Get Involved!', 'col-wp'); ?></h2>
        <ul>
            <li><a href="<?= home_url('/'); ?>pray/"      <?= $sel_involved_box[0]; ?>><?= __('pray', 'col-wp'); ?></a></li>
            <li><a href="<?= home_url('/'); ?>volunteer/" <?= $sel_involved_box[1]; ?>><?= __('volunteer', 'col-wp'); ?></a></li>
            <li><a href="<?= home_url('/'); ?>donate/"    <?= $sel_involved_box[2]; ?>><?= __('donate', 'col-wp'); ?></a></li>
            <li><a href="<?= home_url('/'); ?>connect/"   <?= $sel_involved_box[3]; ?>><?= __('connect', 'col-wp'); ?></a></li>
        </ul>
    </div>
    <?php include 'fb-like-box.php'; ?>
</div>