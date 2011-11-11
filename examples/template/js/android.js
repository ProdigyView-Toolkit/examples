var url_list=[];

if (window.innerWidth && window.innerWidth <= 480) { 
    $(document).ready(function(){ 
        $('#header ul').addClass('hide'); 
        $('#header').append('<div class="leftButton" onclick="toggleMenu()">Menu</div>'); 
    });
    function toggleMenu() { 
        $('#header ul').toggleClass('hide'); 
        $('#header .leftButton').toggleClass('pressed'); 
    }
}

$(document).ready(function(){ 
    loadPage();
});

function loadPage(url) {
	$('body').append('<div id="progress">Loading...</div>');
	scrollTo(0,0);

	if (url == undefined) {
		url='subpages/page1.html';
	} 
	
   $('#container').load(url , hijackLinks);
   var title = $('h2').html() || 'Hello!';
   url_list.unshift({'url':basename(url), 'title':title});
}


       
function hijackLinks() {
    $('#container a').click(function(e){
        e.preventDefault();
        loadPage(e.target.href);
    });
    $('#progress').remove();
    
    if (url_list.length > 1) {
		$('#header').append('<div class="leftButton">'+url_list[0].title+'</div>');
		$('#header .leftButton').click(function(){
			var thisPage = url_list.shift();
	    	var previousPage = url_list.shift();
	    	loadPage('subpages/'+previousPage.url);
		});
	}
}

function basename(path) {
    return path.replace(/\\/g,'/').replace( /.*\//, '' );
}
