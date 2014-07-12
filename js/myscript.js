$(document).ready(function() {
   $("#mailing_list").click(function() {
        $("#mail_display").toggle();
   });
   $('input[name="search"]').focus();
});

function gopiSearch() {
	if(window.event.keyCode==32) {
		//alert('hi');
		$.ajax({
			type: "POST",
			url: window.location.origin+"/student_search_server/search/ajaxSearch",
			data: { 'search': $('input[name="search"]').val() },
			success: function(result) {
				$(".wrapper > table").remove();
				var resultHtml='<table border="1" cellpadding="10" cellspacing="5"><tbody>';
				resultHtml+=result;
				resultHtml+='</tbody></table>';
				$("#main-input").after(resultHtml);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				var resultHtml='Hey, Not my fault! Stop abusing me.<br><br>Its due to Internal Server Error<br><br>Check back soon';
				$("#main-input").after(resultHtml);
			}
		});
	}
}