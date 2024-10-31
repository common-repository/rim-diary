<div class="wrap">
	<div id="icon-themes" class="icon32"></div>

	<div id="rim-diary-admin">
		<h1>The Rim Diary</h1>

		<div class="winnings">
		<?php foreach( $winnings as $tag => $count ) : ?>
			<span class="statistic"><?php printf( '%dx %s', $count, $prizes[ $tag ] ) ?></span>
		<?php endforeach ?>
		</div>

		<h2><?php _e( 'Roll Up The Rim', 'rim-diary' ) ?>...</h2>
		<form method="post">
			<?php foreach( RimDiary::getPrizes() as $tag => $prize ) : ?>
				<div class="prize">
					<img class="prize-image" src="<?php echo plugins_url() . "/rim-diary/resources/images/prize-{$tag}.png" ?>"/>
					<button class="button button-primary" type="submit" name="rim-rolled" value="<?php echo $tag ?>"><?php echo $prize ?></button>
				</div>
			<?php endforeach ?>
			<p><button class="button button-secondary delete" type="submit" name="rim-rolled" value="<?php echo 'reset-rims' ?>"><?php _e( 'Reset Rims', 'rim-diary' ) ?></button></p>
			<?php wp_nonce_field( 'log-rim-diary', 'log-rim-diary-nonce' ) ?>
		</form>

		<p class="disclaimer">
		<?php _e( 'The Rim Diary does not own the rights to any of the trademarks and imagery, nor is it affiliated in any way with Tim Hortons or Roll Up The Rim competition. The Rim Diary is strictly for fun and pleasure and will neither dispense nor claim prizes. You still need to purchase competition cups from and claim winnings through Tim Hortons.', 'rim-diary' ) ?>
		</p>
	</div>
</div>
