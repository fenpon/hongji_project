
$(window).scroll(function(event)
{
	var top_this = $(window).scrollTop();
	if(top_this >= 250)
	{
		$("#text_this").css("top",0);
	}
	else
	{
		$("#text_this").css("top",290);
	}
});