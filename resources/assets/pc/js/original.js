
var app = require('../js/app.js');

$(function(){

	resize_frame();

	$(window).resize(function() {
		resize_frame();
	});

	function resize_frame()
	{
		var item_width = $('iframe').outerWidth();
		var item_height = item_width * 0.75;
		$('iframe').height(item_height);
	}
})