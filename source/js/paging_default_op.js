/*paging_default_op.js
여기는 로드, 리로드, 페이징관련 버튼을 눌렀을때 페이지를 알아내는 스크립트이다
*/
		var now_page = 0;
		var now_type = null;
		var save_ins = -1;
		var key = false;
		function now_paging()
		{
			
			var	address = $(location).attr("href");//address
				
				var page_data = [];
			
			page_data = address.split('#');
				 now_type= page_data[1];
				 
				 if(now_type == undefined | null)
				 {//최초방문시 work홈으로보냄
				 	now_type = "work"
				 	
				 }
							console.log( now_type+" "+now_page);
				
				$("event_tag").trigger('list_evt',[ now_type , now_page ] );//보드만드는이벤트
		}
		function scroll_set()
		{
			if(key != true)
			{key = true;
				var hash_ty ="";
				/*hongjihyun.com에서 홈작동안됨 홈누르고는 작동됨
				hongjihyun.com/#home#0은됨
				*/
										
				 									var	hash_data = $(location).attr("hash");
																var spt_a = new Array();
																spt_a = location.hash.split("#");
																if(spt_a[1] == null|undefined)
																{
																	hash_ty = "home";
																	
																}
																else
																{hash_ty = spt_a[1];}
																
				 					console.log(hash_ty);	
						
														
					
					$.ajax({      
			        type:"POST",  
			        url:"../list_ajax/count.php",      
			     	dataType:"text",
			       
			        data:{type: hash_ty}, 
			  		
					success: function(data) {
								key = false;
					    	counting = parseInt(data);
					    	console.log("now_page:"+ now_page+"count:"+counting);
									    	if(counting >  now_page)
									    	{
									    		console.log("ss");
												var scroll_hei = $("#main_this").height() -500;
												var user_hei = $(window).scrollTop()+574;
												console.log("hei:"+scroll_hei+"user:"+user_hei);
												if(user_hei >= scroll_hei)
												{
													
														now_page = now_page + 1;
																var counting;
																
																	if(hash_ty!= "con")
																	{
																		
																		var	hash_data = $(location).attr("hash");
																		var spt = new Array();
																		spt = location.hash.split("#");
																		
																		console.log("scroll");
																		
																		 now_paging();
																	}
																
																
												}
											}
								
							
					    },  
			        
				        error:function(jqXHR, textStatus, errorThrown){  
				           console.log(textStatus, errorThrown);  
				        }  
			    	});
			}
			
		}
		$(window).scroll(function(event)
		{
			scroll_set();		
		});
		$(window).ready(//window reload,onload
				function()
				{//페이지가 리로드,로드시
					console.log("ready");
					now_paging();
					
				}
			);
		
		window.onhashchange = function(){
			var	hash_data = $(location).attr("hash");
			var spt = new Array();
			spt = location.hash.split("#");
		
			if(old_json.ty != null)
				{
					if(spt[1] != old_json.ty)
					{now_page = 0;
						$("#td_tag_1").empty();
						$("#td_tag_2").empty();
						$("#td_tag_3").empty();
						
					}
				}
			
			console.log("hash");
			 now_paging();
			};
		
	
			
		
