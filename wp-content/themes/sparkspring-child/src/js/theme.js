(function($){

	var docReady = function(){
		console.log( 'Doc ready!' );
	};

	$(document).ready(function(){
		//docReady();
		$('body').on('contextmenu', 'img', function(e){ return false; });
	});

})(jQuery);