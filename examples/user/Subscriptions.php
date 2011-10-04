<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Subscription Example</title>
	</head>
	<body>
		<?php
		//Create a subscription that relates to a user and content
		$args=array(
			'subscription_type'=>'exploding_dog_food',
			'subscription_approved'=>1,
			'subscription_active'=>1,
			'user_id'=>3,
			'content_id'=>200,
			'subscription_start_date'=>date("Y-m-d", mktime(0, 0, 0, date("m", time()), date("d", time())+5, date("Y", time()) )),
			'subscription_end_date'=>date("Y-m-d", mktime(0, 0, 0, date("m", time())+1, date("d", time()), date("Y", time()) ))
		);
		
		$subscription_id_1=PVSubscriptions::addSubscription($args);
		?>
		
		<p>Created a subscription with the following parameters:<pre><?php print_r($args); ?></pre></p>
		<p>ID of subscription:<?php echo $subscription_id_1; ?></p>
		
		<?php
		//Create a subscription that relates to a comment and an app
		$args=array(
			'subscription_type'=>'imploding_cat_food',
			'subscription_approved'=>1,
			'subscription_active'=>0,
			'comment_id'=>14,
			'app_id'=>309,
			'subscription_start_date'=>date("Y-m-d", mktime(0, 0, 0, date("m", time())+2, date("d", time()), date("Y", time()) )),
			'subscription_end_date'=>date("Y-m-d", mktime(0, 0, 0, date("m", time())+5, date("d", time()), date("Y", time()) ))
		);
		$subscription_id_2=PVSubscriptions::addSubscription($args);
		?>
		
		<p>Created a subscription with the following parameters:<pre><?php print_r($args); ?></pre></p>
		<p>ID of subscription:<?php echo $subscription_id_2; ?></p>
		
		<?php $subscription_info=PVSubscriptions::getSubscription($subscription_id_1);?>
		<p>Subscription info retrieved by ID: <pre><?php print_r($subscription_info); ?></pre</p>
		
		<?php $subscription_info=PVSubscriptions::getSubscription($subscription_id_2); ?>
		<p>Subscription info retrieved by ID: <pre><?php print_r($subscription_info); ?></pre></p>
		<?php
		
		$subscription_list=PVSubscriptions::getSubscriptionList(array());
		
		foreach($subscription_list as $subscription){
			?>
			<p>Deleting subscription <?php echo $subscription['subscription_type']; ?></p>
			<?php
			PVSubscriptions::deleteSubscription($subscription['subscription_id']);
		}//end for
		?>
		
		<p>End subscription demonstration</p>
	</body>
</html> 