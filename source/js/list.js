/*list.js*/
var open_key = false;
function ajax_list(ty,p)
{
	if(old_json.ty == null )
	{console.log("first");
		open_key = true;
	}
	else
	{
		if(old_json.ty == ty && old_json.p == p)
		{console.log("same");
			open_key = false;
		}
		else{console.log("dif");
			open_key = true;
		}
	}
	var url_en = "./list_ajax/"+ty+"_ajax.php";

	if(open_key == true)//같은 페이지 같은 타입일때 재로드 막는 기능
	{
		$.ajax({      
	        type:"POST",  
	        url:url_en,      
	     	dataType:"text",
	       
	        data:{page: p,type: ty}, 
	  		
			success: function(data) {
						
						json = eval( '(' + data + ')' );
						old_json = new Object();
						old_json.ty = ty;
						old_json.p = p;
			        console.log('ajax success');
			        open_key = false;
			      	console.log(data);
			        	make_board(json,p);
			    	
			    	
			    	
			    	
			    },  
	        
	        error:function(jqXHR, textStatus, errorThrown){  
	           console.log(textStatus, errorThrown);  
	        }  
	    });
	}
}

function contact_make(ty,p)
{
	if(old_json.ty == null )
	{console.log("first");
		open_key = true;
	}
	else
	{
		if(old_json.ty == ty && old_json.p == p)
		{console.log("same");
			open_key = false;
		}
		else{console.log("dif");
			open_key = true;
		}
	}
	var ur = "./list_ajax/contact.php";
	var json_con ="";
	if(open_key == true)//같은 페이지 같은 타입일때 재로드 막는 기능
	{
		$.ajax({      
		        type:"POST",  
		        url:ur,      
		     	dataType:"text",	
				success: function(data) {
							
							json_con  = eval( '(' + data + ')' );
							old_json = new Object();
							old_json.ty = ty;
							old_json.p = p;
				        console.log('ajax_con success');

				        	var  arr_json = json_con[0];
				        	open_key = false;
				        $("#contact").append("<div>"+arr_json.profil1+"</div>");	
				        $("#contact").append("<div>"+arr_json.profil2+"</div>");	 
				        $("#contact").append("<div>"+arr_json.profil3+"</div>");	 
				        $("#contact").append("<div>"+arr_json.profil4+"</div>");	     		    	
				    },  
		        
		        error:function(jqXHR, textStatus, errorThrown){  
		           console.log(textStatus, errorThrown);  
		        }  
		    });
	}
	
}
function list_fuc(type,page)
{
	switch(type)
	{
		case 'home':
			$("#contact").empty();
			
			$("#work_menu").css("border-bottom", "black solid 0px");
			$("#ill_menu").css("border-bottom", "black solid 0px");
			$("#con_menu").css("border-bottom", "black solid 0px");
			ajax_list(type,page);

			break;
		case 'work'://1
			$("#contact").empty();
			$("#work_menu").css("border-bottom", "black solid 1px");
			$("#ill_menu").css("border-bottom", "black solid 0px");
			$("#con_menu").css("border-bottom", "black solid 0px");
			ajax_list(type,page);
			break;
		case 'ill'://3
			$("#contact").empty();
			$("#work_menu").css("border-bottom", "black solid 0px");
			$("#ill_menu").css("border-bottom", "black solid 1px");
			$("#con_menu").css("border-bottom", "black solid 0px");
			ajax_list(type,page);
			break;
		case 'con'://2
			$("#work_menu").css("border-bottom", "black solid 0px");
			$("#ill_menu").css("border-bottom", "black solid 0px");
			$("#con_menu").css("border-bottom", "black solid 1px");
			contact_make(type,page);
			break;
		default:
				console.log("none type");
			break;
	}
	  
}
$( "event_tag" ).on( "list_evt", function( event, ty, p ) {
  list_fuc(ty,p);
});