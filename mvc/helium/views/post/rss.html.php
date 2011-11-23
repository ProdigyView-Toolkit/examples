<?php foreach($posts as $post) : ?>
	<item>
		<title><?php echo $post -> title; ?></title>
		<description><?php echo $post -> content; ?></description>
		<link><?php echo PVTools::getCurrentBaseUrl().'/post/view/'.$post -> post_id; ?></link>
	</item>
<?php endforeach; ?>
