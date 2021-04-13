$(document).ready(function(){
	
	$('ul.rtabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.rtabs li').removeClass('selected');
		$('div.panel-container div.tab-content').removeClass('selected');

		$(this).addClass('selected');
		$("#"+tab_id).addClass('selected');
		// alert(tab_id);
	});

	$('ul.rtabs2 li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.rtabs2 li').removeClass('selected');
		$('div.panel-container2 div.tab-content2').removeClass('selected');

		$(this).addClass('selected');
		$("#"+tab_id).addClass('selected');
		// alert(tab_id);
	});

});