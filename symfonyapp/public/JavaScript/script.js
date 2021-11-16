
(function($) {
  "use strict"; 
// Animation des labels du 7ème formulaire 
	$(function() {
	        $("body").on("input propertychange", ".form-block", function(e) {
	            $(this).toggleClass("form-block-value", !!$(e.target).val());
	        }).on("focus", ".form-block", function() {
	            $(this).addClass("form-block-focus");
	        }).on("blur", ".form-block", function() {
	            $(this).removeClass("form-block-focus");
	        });
	});

// Animation des labels du 8ème formulaire 
	$(function() {
	        $("body").on("input propertychange", ".form-block_1", function(e) {
	            $(this).toggleClass("form-block-value_1", !!$(e.target).val());
	        }).on("focus", ".form-block_1", function() {
	            $(this).addClass("form-block-focus_1");
	        }).on("blur", ".form-block_1", function() {
	            $(this).removeClass("form-block-focus_1");
	        });
	});

// Animation des labels du 9ème formulaire 
	$(function() {
	        $("body").on("input propertychange", ".form-block_2", function(e) {
	            $(this).toggleClass("form-block-value_2", !!$(e.target).val());
	        }).on("focus", ".form-block_2", function() {
	            $(this).addClass("form-block-focus_2");
	        }).on("blur", ".form-block_2", function() {
	            $(this).removeClass("form-block-focus_2");
	        });
	});
})(jQuery); 