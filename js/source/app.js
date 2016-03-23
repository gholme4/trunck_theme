// app.js

(function () {
   'use strict';

	$(document).foundation();

	window.Trunck = {

		init: function () {
			this.toggleOffCanvas();
		},
		toggleOffCanvas: function () {

			// Listen for screen size changes and hide off canvas menu accordingly
			$(window).on('changed.zf.mediaquery', function(event, newSize, oldSize) {
				
				if (newSize == "medium")
				{
					$('#offCanvas').foundation('close');
				}
			});
		}
	};

	$(function () {
		Trunck.init();
	});
   
}());
