// app.js

(function () {
   'use strict';

	$(document).foundation();

	window.Trunck = {

		init: function () {
			this.toggleOffCanvas();
			this.formatPagination();
		},
		toggleOffCanvas: function () {

			// Listen for screen size changes and hide off canvas menu accordingly
			$(window).on('changed.zf.mediaquery', function(event, newSize, oldSize) {
				
				if (newSize == "medium")
				{
					$('#offCanvas').foundation('close');
				}
			});
		},
		formatPagination: function () {
			// Update default WordPress pagination to match Foundation markup 
			$("ul.page-numbers").each(function (i, el) {
				var $ul = $(this);
				$ul.attr("class", "text-center pagination").attr("role", "navigation");
			});
		}
	};

	$(function () {
		Trunck.init();
	});
   
}());
