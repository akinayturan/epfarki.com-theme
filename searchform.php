<div class="aras">
    <form method="get" id="searchform" action="<?php bloginfo ('home'); ?>">
        <input style="width:175px;" type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" /><input type="submit" id="searchsubmit" value="Ara" />
    </form>
</div>