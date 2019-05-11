<div class="pcc-link-preview">
	<a href="<?php echo $atts['url']; ?>">
		<div>
			<span class="link">🔗 <?php echo $atts['url']; ?></span>
			<div class="title"><?php echo $atts['title']; ?></div>
			<?php if (!empty($atts['image'])): ?>
				<img src="<?php echo $atts['image']; ?>" onerror="this.parentNode.removeChild(this)">
			<?php endif; ?>
			<p><?php echo $content ?></p>
		</div>
	</a>
</div>
