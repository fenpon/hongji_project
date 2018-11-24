var now_page =0;
var key = false;
var tablet = false;
function vimeo_board(j,uid_this,idd)
{var st = "";

	st = "<a href='./detail/?uid="+uid_this+"&type=2'><img src='"+j.thumbnail_large+"' class='img_board' style='width:100%;'><div id='title_tag' style='width:100%;'><span class='font' id='font_this'>"+j.title+"</span></div></a>";
	$(idd).append(st);
}
function vimeo_ajax(ur,uid_this,idd)
{
	
	var ajaxUrl = 'http://vimeo.com/api/v2/video/'+ur+'.json'; 
	$.ajax({ 
		url: ajaxUrl, 
		dataType: "jsonp",
		 jsonp: "callback",
		 success: function(data) {
		 	console.log("video ajax succ");
		 	vimeo_board(data[0],uid_this,idd);
		 },
		 error:function(jqXHR, textStatus, errorThrown){  
	           console.log(textStatus, errorThrown);  
	           console.log("fail");
	          
	        }  
	}) 

}
function make_video(j,idd)
{
	var link = j.link2;
	var uid_o = j.uid;
	var parcer = link.replace("https://vimeo.com/","");//youtube https://img.youtube.com/vi/id/0.jpg
		//vimeo https://i.vimeocdn.com/video/id_600x340.jpg
		vimeo_ajax(parcer,uid_o,idd);
}
var cout = 0;
function make_list(j)
{console.log("leng:"+j.length);
	$("#img_plus").append("<table>")
	for(var i =0; i < j.length; i++)
	{
		if(j[i].type != 2)
		{
			
			$("#img_plus").append("<tr><tD><div class='col-xs-0  col-sm-2 col-md-0'></div><div id='img_pos_"+(i*cout)+"' class='col-xs-12  col-sm-8 col-md-12' ><a href='./detail/?uid="+j[i].uid+"&type="+j[i].type+"'><img src='../"+j[i].link0+"' class='img_board' style='width:100%;'><div id='title_tag' style='width:100%;'><span class='font' id='font_this'>"+j[i].title+"</span></div></a></div><div class='col-xs-0  col-sm-2 col-md-0'></div></tD></tr>");

		}
		else
		{
			cout++;
			var t = i*cout;
			$("#img_plus").append("<tr><td><div class='col-xs-0  col-sm-2 col-md-0'></div><div id='img_pos_"+t+"' class='col-xs-12  col-sm-8 col-md-12'></div><div class='col-xs-0  col-sm-2 col-md-0'></div></td></tr>");
			make_video(j[i],"#img_pos_"+t+"");
		}
	}
	$("#img_plus").append("</table>")
}
function make_board(ty,p)
{
	var url_en = "";
	switch(ty)
	{
		case 0://home
			url_en =  "../list_ajax/home_ajax.php";
			break;
		case 1://work
			url_en =  "../list_ajax/work_ajax.php";
			break;
		case 3://ill
			url_en =  "../list_ajax/ill_ajax.php";
			break;
		default://con
			url_en =  "../list_ajax/contact.php";
			break;
	}
	console.log(p);
	$.ajax({      
	        type:"POST",  
	        url:url_en,      
	     	dataType:"text",
	       
	        data:{page: p,type: ty}, 
	  		
			success: function(data) {		
				if(ty!= 2)
				{		cout++;
							var json = eval( '(' + data + ')' );
				      
				      $("#contact").empty();
				      make_list(json);
				 }
				 else{
				 	var json = eval( '(' + data + ')' );
				 	console.log(json[0]);
				 	$("#img_tag").empty();
				 	$("#contact").append("<div>"+json[0].profil1+"</div><div>"+json[0].profil2+"</div><div>"+json[0].profil3+"</div><div>"+json[0].profil4+"</div>");
				 }
			},
	        error:function(jqXHR, textStatus, errorThrown){  
	           console.log(textStatus, errorThrown);  
	        }  
	    });
}

function scroll_set(ty)
		{
			if(key != true)
			{key = true;
							var t_ty = "";
							switch(ty)
							{
								case 0://home
									t_ty = "home";
									break;
								case 1://work
									t_ty = "work";
									break;
								case 3://ill
									t_ty = "ill";
									break;
								case 2://con
									t_ty = "con"
									break;
							}
						$.ajax({      
							        type:"POST",  
							        url:"../list_ajax/count.php",      
							     	dataType:"text",
							       
							        data:{type: t_ty}, 
							  		
									success: function(data) {
												key = false;
									    	counting = parseInt(data);
									    	console.log("now_page:"+ now_page+"count:"+counting);
													    	if(counting >  now_page)
													    	{
													    		console.log("ss");
																var scroll_hei = $("#img_tag").height();
																var user_hei = $("body").scrollTop() + 800;
																
																if(user_hei >=scroll_hei )
																{
																	now_page++;
																	$("event_tag").trigger('list_evt',[ ty , now_page ] );//보드만드는이벤트
																	

																}
															}
												
											
									    },  
							        
								        error:function(jqXHR, textStatus, errorThrown){  
								           console.log(textStatus, errorThrown);  
								        }  
							    	});
		}
}
function first_visit_page(ty)
{
	make_board(ty,now_page);
}
$( "event_tag" ).on( "list_evt", function( event, ty, p ) {console.log("hi");
  make_board(ty,p);
});
$(window).scroll(function(event)
		{
			if(type != 2)
			{
				scroll_set(type);		
			}
			
		});
$(document).ready(
	function()
	{
		first_visit_page(type);
	}
);