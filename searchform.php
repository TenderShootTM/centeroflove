<?php
/*
 * Search Box
 */
?>
<li id="search-box">
<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
        <input type="text" value="" name="s" id="search-input" />
        <input type="submit" id="searchsubmit" value="<?= __('Search', 'col-wp'); ?>" />
</form>
</li>