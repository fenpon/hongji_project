/*user.js*/
$(document).ready(
	function()
	{
		$("#it_user_ui").hide();
	}
);

$("#menu_clk_0").click(
	function()
	{
		$("#it_user_ui").show();
		$("#menu_clk_0").hide();
	}
);
$("#menu_clk_1").click
(
		function()
		{
			modi = false;
					go_stack =[{}];
					$("#confirm").hide();
					$("#cancel").hide();
					$("#tag_title").attr('data-click-state', 0);
					$("#content_tag").attr('data-click-state', 0);
					$("#img_link0").attr('data-click-state', 0);
					$("#img_link1").attr('data-click-state', 0);
					$("#img_link2").attr('data-click-state', 0);
					$("#img_link3").attr('data-click-state', 0);
					$("#img_link4").attr('data-click-state', 0);
					$("#img_link5").attr('data-click-state', 0);
					$("#img_link6").attr('data-click-state', 0);	
					$("#img_link7").attr('data-click-state', 0);
					$("#img_link8").attr('data-click-state', 0);
					$("#img_link9").attr('data-click-state', 0);
					$("#fixed_tag").empty();
					$("#fixed_tag").hide();
					if(type_t == 2)
					{
						$("#video_chaner").css("height",0);
						
						$("#video_chaner").empty();
					}
					$("#modify").show();
			$("#it_user_ui").hide();
			$("#menu_clk_0").show();
		}
);
$("#view_top").click(
	function()
	{
		$(window).scrollTop(0);
	}
);
