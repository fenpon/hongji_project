

function vimeo_board(j,idd,uid_this,ti)
{var st = "";

	st = "<a href='../detail/?uid="+uid_this+"&type=2'><div id='img_tag'><img src='"+j.thumbnail_large+"' class='board_class_"+j.uid+"' style='width:100%;'></div><div id='title_tag'><span class='font' id='font_this'>"+ti+"</span></div></a>";
	$(idd).empty();
	$(idd).append(st);
}
function vimeo_ajax(ur,idd,uid_this,ti)
{
	
	var ajaxUrl = 'http://vimeo.com/api/v2/video/'+ur+'.json'; 
	$.ajax({ 
		url: ajaxUrl, 
		dataType: "jsonp",
		 jsonp: "callback",
		 success: function(data) {
		 	vimeo_board(data[0],idd,uid_this,ti);
		 },
		 error:function(jqXHR, textStatus, errorThrown){  
	           console.log(textStatus, errorThrown);  
	           console.log("fail");
	          
	        }  
	}) 

}
function make_video(json_data,idd)
{

	//$("#main_board").empty();
	var link = json_data.link2;
	var uid_o = json_data.uid;
	var parcer = link.replace("https://vimeo.com/","");//youtube https://img.youtube.com/vi/id/0.jpg
		//vimeo https://i.vimeocdn.com/video/id_600x340.jpg
		vimeo_ajax(parcer,idd,uid_o,json_data.title);
}
function make_first_tag(num)
		{var nu = num *6;
			$("#td_tag_1").append('<div id="design_0" class="de_'+nu+'"></div><div id="design_1" class="de_'+(nu+1)+'"></div>');
			$("#td_tag_2").append('<div id="design_2" class="de_'+(nu+2)+'"></div><div id="design_3" class="de_'+(nu+3)+'"></div>');
			$("#td_tag_3").append('<div id="design_4" class="de_'+(nu+4)+'"></div><div id="design_5" class="de_'+(nu+5)+'"></div>');
		}
function make_board(json,p)
{
	var cout = 0;

	//$("#main_board").empty();
	make_first_tag(p);
	var lim = json.length;
	var nonnn = p *  6;
	for(var i =0; i < lim; i++)
	{var id_set =".de_"+(nonnn+i)+"";
	//$(id_set).empty();
		if(json[i].type != 2)
		{
			str = "<a href='../detail/?uid="+json[i].uid+"&type="+json[i].type+"'><div id='img_tag'><img src='./"+json[i].link0+"'  class='board_class_"+json[i].uid+"' style='width:100%;'></div><div id='title_tag'><span class='font' id='font_this'>"+json[i].title+"</span></div></a>";
			$(id_set).empty();
			$(id_set).append(str);
		}
		else
		{//video
			  make_video(json[i],id_set);
		}
	}
	

}


