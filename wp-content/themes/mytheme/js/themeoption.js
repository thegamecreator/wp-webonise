(function($){
	wp.customize("big_title_field", function(value) {
		value.bind(function(newval) {
			$("#big_title_field").html(newval);
		} );
	});
	wp.customize("big_title_desp", function(value) {
		value.bind(function(newval) {
			$("#big_title_desp").html(newval);
		} );
	});
	wp.customize("big_title_but_label", function(value) {
		value.bind(function(newval) {
			$("#big_title_but_label").html(newval);
		} );
	});
	wp.customize("big_title_but_link", function(value) {
		value.bind(function(newval) {
			$("#big_title_but_link").link(newval);
		} );
	});
	wp.customize("big_title_bg", function(value) {
		value.bind(function(newval) {
			$("#big_title_but_link").attr('href',newval);
		} );
	});
	wp.customize("promise1_label", function(value) {
		value.bind(function(newval) {
			$("#promise1_label").html(newval);
		} );
	});
	wp.customize("promise2_label", function(value) {
		value.bind(function(newval) {
			$("#promise2_label").html(newval);
		} );
	});
	wp.customize("promise3_label", function(value) {
		value.bind(function(newval) {
			$("#promise3_label").html(newval);
		} );
	});
	wp.customize("promise1_img", function(value) {
		value.bind(function(newval) {
			console.log(newval);
			$("#promise1_img").attr('src',newval);
		} );
	});
	wp.customize("promise2_img", function(value) {
		value.bind(function(newval) {
			console.log(newval);
			$("#promise2_img").attr('src',newval);
		} );
	});
	wp.customize("promise3_img", function(value) {
		value.bind(function(newval) {
			console.log(newval);
			$("#promise3_img").attr('src',newval);
		} );
	});
	
})(jQuery);