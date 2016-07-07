
$(function primary() {
    // load the header
    $(".header").load( "header.html");
	
	// default behaviour: load homepage
	$(".page").load( "home.html", function() {
		
		// after loading the page we should load the page manager for links (header + main div, footer doesn't contain links)
		$.getScript('script/pageManager.js', function() {
			// load dynamic links (index.html)
			clickPageLinks();
		});
	});	
		
	
	// load footer
	$(".footer").load("footer.html"); 


             
});


