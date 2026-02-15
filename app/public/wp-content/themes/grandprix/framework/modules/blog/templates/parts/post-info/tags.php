<?php
$tags = get_the_tags();
$separator = '<span class="eltdf-tag-separator"></span>';
?>
<?php if($tags) { ?>
<div class="mkdf-tags-holder">
    <div class="mkdf-tags">
        <?php the_tags('', $separator, ''); ?>
    </div>
</div>
<?php } ?>