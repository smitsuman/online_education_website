$(document).ready(function(){
	
	/* Service hovers */
	$("#social ul li").hover(
		function() {
			$("#social").addClass($(this).data("network")).addClass("active");
			//$("#social p").html($(this).data("text"));
		},
		function() {
			$("#social").removeClass();
			//$("#social p").html("Find me on the web");
		}
	);

	$(".dropdown").hover(              
            function() {
                $('.dropdown-menu', this).fadeIn("fast");
                $(this).toggleClass('open');
                $('span', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).fadeOut("fast");
                $(this).toggleClass('open');
                $('span', this).toggleClass("caret caret-up");                
            });
	
});