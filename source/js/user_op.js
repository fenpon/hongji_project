var modi = false;
var go_stack; 
go_stack = [{}];
function compare(a, b) {
  if (a.num < b.num) {//a< b
    return -1;
  }
  if (a.num > b.num) {
    return 1;
  }
  // a must be equal to b
  return 0;
}
function fixed_cancel_clk()
		{
				
					modi = false;
					go_stack =[{}];
					$("#confirm").hide();
					$("#cancel").hide();
					$("#tag_title").attr('data-click-state', 0);
					$("#content_tag").attr('data-click-state', 0);
					$(".img_link0").attr('data-click-state', 0);
					$(".img_link1").attr('data-click-state', 0);
					$(".img_link2").attr('data-click-state', 0);
					$(".img_link3").attr('data-click-state', 0);
					$(".img_link4").attr('data-click-state', 0);
					$(".img_link5").attr('data-click-state', 0);
					$(".img_link6").attr('data-click-state', 0);	
					$(".img_link7").attr('data-click-state', 0);
					$(".img_link8").attr('data-click-state', 0);
					$(".img_link9").attr('data-click-state', 0);
					$("#fixed_tag").empty();
					$("#fixed_tag").hide();
					if(type_t == 2)
					{
						$("#video_chaner").css("height",0);
						
						$("#video_chaner").empty();
					}
					$("#modify").show();
				
		}
$(document).ready(
	function()
	{
		$("#confirm").hide();
		$("#cancel").hide();
		$("#fixed_tag").hide();
		$("#modify").click(
			function()
			{
				modi = true;
				$("#modify").hide();
				$("#confirm").show();
				$("#cancel").show();
				if(type_t == 2)
				{ 
					$("#video_chaner").css("width","100%");
					$("#video_chaner").css("height",50);
					
					$("#video_chaner").append("<center style='background-color:rgba(0,0,0,0.5);'><span style='color:white; font-size:16px;'  class='font'>Video Change</span></center>");
				}
			}
		);

		$("#cancel").click(
			function()
			{
				modi = false;
				go_stack =[{}];
				$("#confirm").hide();
				$("#cancel").hide();
				$("#tag_title").attr('data-click-state', 0);
				$("#content_tag").attr('data-click-state', 0);
				$(".img_link0").attr('data-click-state', 0);
				$(".img_link1").attr('data-click-state', 0);
				$(".img_link2").attr('data-click-state', 0);
				$(".img_link3").attr('data-click-state', 0);
				$(".img_link4").attr('data-click-state', 0);
				$(".img_link5").attr('data-click-state', 0);
				$(".img_link6").attr('data-click-state', 0);	
				$(".img_link7").attr('data-click-state', 0);
				$(".img_link8").attr('data-click-state', 0);
				$(".img_link9").attr('data-click-state', 0);
				if(type_t == 2)
				{
					$("#video_chaner").css("height",0);
					
					$("#video_chaner").empty();
				}
				$("#modify").show();
			}
		);
		$("#confirm").click(
			function()
			{
				modi = false;
				$("#confirm").hide();
				$("#cancel").hide();
				$("#tag_title").attr('data-click-state', 0);
				$("#content_tag").attr('data-click-state', 0);
				$("#video_chaner").attr('data-click-state', 0);	
				$(".img_link0").attr('data-click-state', 0);
				$(".img_link1").attr('data-click-state', 0);
				$(".img_link2").attr('data-click-state', 0);
				$(".img_link3").attr('data-click-state', 0);
				$(".img_link4").attr('data-click-state', 0);
				$(".img_link5").attr('data-click-state', 0);
				$(".img_link6").attr('data-click-state', 0);	
				$(".img_link7").attr('data-click-state', 0);
				$(".img_link8").attr('data-click-state', 0);
				$(".img_link9").attr('data-click-state', 0);
				if(type_t == 2)
				{
					$("#video_chaner").css("height",0);
					
					$("#video_chaner").empty();
				}
				$("#modify").show();
				$("#it_user_ui").hide();
				$("#menu_clk_0").show();
				$("#fixed_tag").show();
				go_stack.sort(compare);
				var str = "";
				str += "<input type='hidden' name='type' value="+type_t+">";
				str += "<input type='hidden' name='uid' value="+uid_this+">"
				for(var i=1; i<go_stack.length; i++)
				{var val_this = go_stack[i].data;
					switch(val_this){
						case "title":
							str += "<tr><td>title : </td><td><input type='text' name='title' value='"+list.title+"' style='width:300px; background-color:white;  border: #000000 1px solid;'></tD></tr>";
							break;
						case "content":
							str += '<tr><td>content : </tD><td><textarea name="content" style="width:300px; height:50px; background-color:white;  border: #000000 1px solid;">'+list.content+'</textarea></td></tr>';
							break;
						case "video":
							str += "<tr><tD>video_link : </tD><tD><input type='text' name='video' value='"+list.link1+"' style='width:300px; background-color:white;  border: #000000 1px solid;'></tD></tr>";
							break;
						default:
							var tag_name = val_this;
							val_this = val_this.replace("img","link");
							str += "<tr><td>"+tag_name+" : </tD><tD><input type='file' name='"+val_this+"'  style='width:300px; background-color:white;  border: #000000 1px solid;'><input type='hidden' name='"+val_this+"_old'' value="+list[''+val_this+'']+"></tD></tr>";
							break;
					}
					
				}
				str += '<tr><td><input type="submit" value="Submit" style="background-color:white;  border: #000000 1px solid;"></tD></tR>';
				$("#fixed_tag").append("<div id='fixed'  align='left'><div  ><span class='font' id='fixed_cancel' onclick='fixed_cancel_clk()'>x</span></div><div style='margin-left:10px;'><form action='../sys/fix.php' method='post' enctype='multipart/form-data'><table>"+str+"</table></form></div></div>");
				
				console.log(go_stack);
			}
		);
		
		$("#video_chaner").on('click',
			function()
			{var o = {};
				if(modi == true)
				{
					if($(this).attr('data-click-state') == 1) { //second
						$(this).attr('data-click-state', 0);
						o.data = "video";
						o.num = 4;
						var ind = go_stack.indexOf(o);
						go_stack.splice(ind, 1);
					}
					else
					{//first
						$(this).attr('data-click-state', 1);
						o.data = "video";
						o.num = 4;
						go_stack.push(o);	
					}
				}
			}
		);
		$("#tag_title").on('click',
			function()
			{var o = {};
				if(modi == true)
				{
					if($(this).attr('data-click-state') == 1) { //second
						$(this).attr('data-click-state', 0);
						o.data = "title";
						o.num = 1;
						var ind = go_stack.indexOf(o);
						go_stack.splice(ind, 1);
					}
					else
					{//first
						$(this).attr('data-click-state', 1);
						o.data = "title";
						o.num = 1;
						go_stack.push(o);	
					}
				}
			}
		);
		$("#content_tag").on('click',
			function()
			{var o= {};
				if(modi == true)
				{
						if($(this).attr('data-click-state') == 1) { //second
						$(this).attr('data-click-state', 0);
						o.data = "content";
						o.num = 2;
						var ind = go_stack.indexOf(o);
						go_stack.splice(ind, 1);
					}
					else
					{//first
						$(this).attr('data-click-state', 1);
						o.data = "content";
						o.num = 2;
						go_stack.push(o);	
					}
				}
			}
		);
		$(".img_link0").on('click',
			function(){
				var o = {};
				if(modi == true)
				{
					if($(this).attr('data-click-state') == 1) { //second
						$(this).attr('data-click-state', 0);
						o.data = "img0";
						o.num = 3;
						var ind = go_stack.indexOf(o);
						go_stack.splice(ind, 1);
					}
					else
					{//first
						$(this).attr('data-click-state', 1);
						o.data = "img0";
						o.num = 3;
						go_stack.push(o);	
					}
				}
			}
		);
		$(".img_link1").on('click',
			function(){
				var o = {};
				if(modi == true)
				{
					if($(this).attr('data-click-state') == 1) { //second
						$(this).attr('data-click-state', 0);
						o.data = "img1";
						o.num = 4;
						var ind = go_stack.indexOf(o);
						go_stack.splice(ind, 1);
					}
					else
					{//first
						$(this).attr('data-click-state', 1);
						o.data = "img1";
						o.num = 4;
						go_stack.push(o);	
					}
				}
			}
		);
		$(".img_link2").on('click',
			function(){
				var o = {};
				if(modi == true)
				{
					if($(this).attr('data-click-state') == 1) { //second
						$(this).attr('data-click-state', 0);
						o.data = "img2";
						o.num = 5;
						var ind = go_stack.indexOf(o);
						go_stack.splice(ind, 1);
					}
					else
					{//first
						$(this).attr('data-click-state', 1);
						o.data = "img2";
						o.num = 5;
						go_stack.push(o);	
					}
				}
			}
		);
		$(".img_link3").on('click',
			function(){
				var o = {};
				if(modi == true)
				{
					if($(this).attr('data-click-state') == 1) { //second
						$(this).attr('data-click-state', 0);
						o.data = "img3";
						o.num = 6;
						var ind = go_stack.indexOf(o);
						go_stack.splice(ind, 1);
					}
					else
					{//first
						$(this).attr('data-click-state', 1);
						o.data = "img3";
						o.num = 6;
						go_stack.push(o);	
					}
				}
			}
		);
		$(".img_link4").on('click',
			function(){
				var o = {};
				if(modi == true)
				{
					if($(this).attr('data-click-state') == 1) { //second
						$(this).attr('data-click-state', 0);
						o.data = "img4";
						o.num = 7;
						var ind = go_stack.indexOf(o);
						go_stack.splice(ind, 1);
					}
					else
					{//first
						$(this).attr('data-click-state', 1);
						o.data = "img4";
						o.num = 7;
						go_stack.push(o);	
					}
				}
			}
		);
		$(".img_link5").on('click',
			function(){
				var o = {};
				if(modi == true)
				{
					if($(this).attr('data-click-state') == 1) { //second
						$(this).attr('data-click-state', 0);
						o.data = "img5";
						o.num = 8;
						var ind = go_stack.indexOf(o);
						go_stack.splice(ind, 1);
					}
					else
					{//first
						$(this).attr('data-click-state', 1);
						o.data = "img5";
						o.num = 8;
						go_stack.push(o);	
					}
				}
			}
		);
		$(".img_link6").on('click',
			function(){
				var o = {};
				if(modi == true)
				{
					if($(this).attr('data-click-state') == 1) { //second
						$(this).attr('data-click-state', 0);
						o.data = "img6";
						o.num = 9;
						var ind = go_stack.indexOf(o);
						go_stack.splice(ind, 1);
					}
					else
					{//first
						$(this).attr('data-click-state', 1);
						o.data = "img6";
						o.num = 9;
						go_stack.push(o);	
					}
				}
			}
		);
		$(".img_link7").on('click',
			function(){
				var o = {};
				if(modi == true)
				{
					if($(this).attr('data-click-state') == 1) { //second
						$(this).attr('data-click-state', 0);
						o.data = "img7";
						o.num = 10;
						var ind = go_stack.indexOf(o);
						go_stack.splice(ind, 1);
					}
					else
					{//first
						$(this).attr('data-click-state', 1);
						o.data = "img7";
						o.num = 10;
						go_stack.push(o);	
					}
				}
			}
		);
		$(".img_link8").on('click',
			function(){
				var o = {};
				if(modi == true)
				{
					if($(this).attr('data-click-state') == 1) { //second
						$(this).attr('data-click-state', 0);
						o.data = "img8";
						o.num = 11;
						var ind = go_stack.indexOf(o);
						go_stack.splice(ind, 1);
					}
					else
					{//first
						$(this).attr('data-click-state', 1);
						o.data = "img8";
						o.num = 11;
						go_stack.push(o);	
					}
				}
			}
		);
		$(".img_link9").on('click',
			function(){
				var o = {};
				if(modi == true)
				{
					if($(this).attr('data-click-state') == 1) { //second
						$(this).attr('data-click-state', 0);
						o.data = "img9";
						o.num = 12;
						var ind = go_stack.indexOf(o);
						go_stack.splice(ind, 1);
					}
					else
					{//first
						$(this).attr('data-click-state', 1);
						o.data = "img9";
						o.num = 12;
						go_stack.push(o);	
					}
				}
			}
		);
		$( "#title_tag" ).hover(
		  function() {
		  	if(modi == true)
			{
		    	$( this ).css("cursor","pointer");
			}
		  }, function() {
		  	if(modi == true)
			{
		   		$( this ).css("cursor","Default");
			}
		  }
		);
		$( "#content_tag" ).hover(
		  function() {
		  	if(modi == true)
			{
		    	$( this ).css("cursor","pointer");
			}
		  }, function() {
		  	if(modi == true)
			{
		   		$( this ).css("cursor","Default");
			}
		  }
		);
		$( ".img_link0" ).hover(
		   function() {
		  	if(modi == true)
			{
		    	$( this ).css("cursor","pointer");
			}
		  }, function() {
		  	if(modi == true)
			{
		   		$( this ).css("cursor","Default");
			}
		  }
		);
		$( ".img_link1" ).hover(
		   function() {
		  	if(modi == true)
			{
		    	$( this ).css("cursor","pointer");
			}
		  }, function() {
		  	if(modi == true)
			{
		   		$( this ).css("cursor","Default");
			}
		  }
		);
		$( ".img_link2" ).hover(
		  function() {
		  	if(modi == true)
			{
		    	$( this ).css("cursor","pointer");
			}
		  }, function() {
		  	if(modi == true)
			{
		   		$( this ).css("cursor","Default");
			}
		  }
		);
		$( ".img_link3" ).hover(
		  function() {
		  	if(modi == true)
			{
		    	$( this ).css("cursor","pointer");
			}
		  }, function() {
		  	if(modi == true)
			{
		   		$( this ).css("cursor","Default");
			}
		  }
		);
		$( ".img_link4" ).hover(
		   function() {
		  	if(modi == true)
			{
		    	$( this ).css("cursor","pointer");
			}
		  }, function() {
		  	if(modi == true)
			{
		   		$( this ).css("cursor","Default");
			}
		  }
		);
		$( ".img_link5" ).hover(
		   function() {
		  	if(modi == true)
			{
		    	$( this ).css("cursor","pointer");
			}
		  }, function() {
		  	if(modi == true)
			{
		   		$( this ).css("cursor","Default");
			}
		  }
		);
		$( ".img_link6" ).hover(
		   function() {
		  	if(modi == true)
			{
		    	$( this ).css("cursor","pointer");
			}
		  }, function() {
		  	if(modi == true)
			{
		   		$( this ).css("cursor","Default");
			}
		  }
		);
		$( ".img_link7" ).hover(
		  function() {
		  	if(modi == true)
			{
		    	$( this ).css("cursor","pointer");
			}
		  }, function() {
		  	if(modi == true)
			{
		   		$( this ).css("cursor","Default");
			}
		  }
		);
		$( ".img_link8" ).hover(
		   function() {
		  	if(modi == true)
			{
		    	$( this ).css("cursor","pointer");
			}
		  }, function() {
		  	if(modi == true)
			{
		   		$( this ).css("cursor","Default");
			}
		  }
		);
		$("#video_chaner").hover(
		   function() {
		  	if(modi == true)
			{
		    	$( this ).css("cursor","pointer");
			}
		  }, function() {
		  	if(modi == true)
			{
		   		$( this ).css("cursor","Default");
			}
		  }
		);
		$( ".img_link9" ).hover(
		   function() {
		  	if(modi == true)
			{
		    	$( this ).css("cursor","pointer");
			}
		  }, function() {
		  	if(modi == true)
			{
		   		$( this ).css("cursor","Default");
			}
		  }
		);
		
	}
);


