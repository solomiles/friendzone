(function($) {
	'use strict';

$("#home a:contains('Home')").parent().addClass('active');

$(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip(); 
    });
    })(jQuery);