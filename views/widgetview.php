<?php echo $before_widget ?>

<?php if( ! empty( $widget_title ) ) echo "{$before_title}{$widget_title}{$after_title}" ?>

<div class="rim-container">

	<a class="call-to-action" target="_blank" title="<?php _e( 'Roll Up The Rim To Win', 'rim-diary' ) ?>" href="http://www.rolluptherimtowin.com"><img class="tim-hortons-cup" src="<?php echo plugins_url() . '/rim-diary/resources/images/roll-up-the-rim-cup.png' ?>" alt=""/></a>

	<div>
	<?php foreach( $winnings as $tag => $count ) : ?>
		<span class="statistic"><?php printf( '%dx %s', $count, $prizes[ $tag ] ) ?></span>
	<?php endforeach ?>
	</div>

</div>


<?php echo $after_widget ?>
