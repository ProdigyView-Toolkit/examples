<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Product Content Example</title>
	</head>
	<body>
		<?php
		//Set Content Variables
		$args=array(
			'content_type'=>'example_content_product',  
			'content_title'=>'Over priced shoes', 
			'content_description'=>'Buy these over priced pair of shoes that only cost 5 cents to make',
			'product_color'=>'Blue & White',
			'product_price'=>'109.99',
		);
		?>
		
		<p>Content fields that are going to be created:<pre><?php print_r($args); ?></pre></p>
		
		<?php
		//Create a Unique Alias
		$content_alias=PVContent::createUniqueContentAlias('sample_alias');
		//Add Alias to To Arguements
		$args['content_alias']=$content_alias;
		//Create Content and Retrieve ID
		$content_id=PVContent::createProductContent($args);
		?>
		
		<p>Recently created content ID: <?php echo $content_id; ?></p>
		
		<?php
		//Search for content based on content_type
		$search_args=array('content_type'=>'example_content_product', 'product_price' => '109.99', 'limit' => 5);
		//Get the Content List
		$content_list=PVContent::getProductContentList($search_args);
		?>
		<hr />
		<p>Search arguments for content:<pre><?php print_r($search_args);?></pre></p>
		<p>Array of data retrieved from database based on search arguments:<pre><?php print_r($content_list);?></pre> </p>
		<hr />
		<p>Iteratre through contentlist</p>
		
		<?php
		foreach($content_list as $key=>$value){
			echo '<strong>Content ID:</strong> '.$value['content_id'].'<br />';
			echo '<strong>Product Name:</strong> '.$value['content_title'].'<br />';
			echo '<strong>Product Description:</strong> '.$value['content_description'].'<br />';
			echo '<strong>Product Color:</strong> '.$value['product_color'].'<br />';
			echo '<strong>Product Price:</strong> $'.$value['product_price'].'<br />';
		}//end foreach
		
		//Retrive the Content based upon the ID
		$content=PVContent::getProductContent($content_id);
		//Other way for Getting the Content
		$content=PVContent::getProductContent(PVContent::getContentIDByContentAlias($content_alias));
		//Get the Content Value
		$content_title=$content['content_title'];
		
		//Update the Content with the same values but only changing owner id
		$content['product_color'] = 'Green';
		PVContent::updateProductContent($content);
		
		//Delete Content
		PVContent::deleteContent($content_id);
		
		echo '<p>Content Example Finsihed</p>';
		?>
	</body>
</html> 