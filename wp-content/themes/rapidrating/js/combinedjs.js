//to-top JS
jQuery(document).ready(function(a){var b=300,c=1200,d=700,e=a(".to-top");a(window).scroll(function(){a(this).scrollTop()>b?e.addClass("top-is-visible"):e.removeClass("top-is-visible top-fade-out"),a(this).scrollTop()>c&&e.addClass("top-fade-out")}),e.on("click",function(b){b.preventDefault(),a("body,html").animate({scrollTop:0},d)})});

jQuery('.mobile-toggle').click(function(){
	jQuery('.widget-area.header-widget-area').slideToggle();
});