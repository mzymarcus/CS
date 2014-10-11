<?php foreach($menu as $link_text=>$link_url):?>
 <a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a> <?php echo $separator; ?>
<?php endforeach; ?>