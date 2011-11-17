<?php
//Add a filter to modify oupt of a content parameter
//based on content type
pv_addContentFilter('hello-word-content', 'content_title', 'function', 'callHelloFitler');

function callHelloWorldFilter($content_title){

		return 'Article Title: '.$content_title;
	
}//end callHelloWorld

function function_foo(){
	?>
    <h1>Hi!</h1>
    <p>I am function foo and I can be called anywhere as log as the plug-in is installed and active. Above me is function 'callHelloWorldFitler'. He is a cool function because he is used to modify content from the CMS from outside the function that generated the call to the CMS. Below me is the function 'callHelloWordHook' which is called whenever execution hits a hook and a plugin is associated with the hoo. Have fun learning about us and using us!
    <?php
}//end funciton _foo


function callHelloWorldHook($params){
	print_r($params);	
}

?>