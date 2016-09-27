var tabAtual = 1
mudarTab = function(numeroTab) {
	$("#tab-content-"+tabAtual).toggle()
	$("#tab-content-"+numeroTab).toggle()
	$("#aba-"+numeroTab).removeClass('deactive').addClass('active');
	$("#aba-"+tabAtual).removeClass('active').addClass('deactive');
	tabAtual = numeroTab
}
$(document).ready(function(){
	$.localScroll();
});

$(function(){
	$("#menu li.menu").hover(function(){
		$(this).find("a").addClass("hover");
		$(this).find("ul").stop(true,true).fadeIn(200);
		
	},function(){
		$(this).find("a").removeClass("hover");
		$(this).find("ul").stop(true,true).fadeOut(200);
	});
});
$(function(){
	$("#news-click").click(function(){
		if($("#news-box").css("top")=="-102px"){
		$('.news-title').css("top","-5px");
			$('#news-box').stop(true,true).animate({top: '3px'},400);
			$('#news-lo').stop(true,true).fadeOut(200).animate({height: '0px'},400);
		} else {
			$('.news-title').css("top","0px");
			$('#news-box').stop(true,true).animate({top: '-102px'},400);
			$('#news-lo').stop(true,true).animate({height: '84px'},400).fadeIn(200);
		}
	});
});
function submiter(id){
	$(id).submit();
}
function newsCadastro(){
	var nome = $("#news_nome").val();
	var email = $("#news_email").val();
	$("#erro-txt").text("");
	if(nome=='Nome'){
		$("#erro-txt").text("Por favor digite seus dados.");
		return false;
	} else {
		if(email=='E-mail'){
			$("#erro-txt").text("Por favor digite seus dados.");	
			return false;
		} else {
			$("#erro-txt").text("");
			$.ajax({
				url: "/sys/mails/register/",
				type: "POST",
   				data: 'form_nome='+nome+'&form_email='+email,
				success: function(texto){
					if(texto=='true'){
						$("#news_email").val("");
						$("#news_nome").val("");
						$("#news_submit").remove();
						$("#erro-txt").text('Seu e-mail foi cadastrado com sucesso');
					} else {
						$("#erro-txt").text(texto);	
					}
				}
			});
		}
	}
}


function HeaderBanners(folder,num){
	var elem = ".header-bgs";
	var intn = 2;
	var time = 1;

	$(elem).attr('style','background-image:url(/img/banners/'+folder+'/bg-body-1.jpg); display: block;');
	

	/*
	setInterval(function(){
		$(elem).attr('style','background-image:url(/img/banners/'+folder+'/bg-body-'+intn+'.jpg);');
		intn++;
		if(intn == num+1){
			intn = 1;
		}
	},2500);
	/*/
	setInterval(function(){
		$(elem).fadeOut(time,function(){
			$(elem).attr('style','background-image:url(/img/banners/'+folder+'/bg-body-'+intn+'.jpg); display: block;').hide();
			$(elem).fadeIn(time,function(){
				intn++;
				if(intn == num+1){
					intn = 1;
				}
			});
		});
	},5000);
}

/*
function HeaderBanners(){
	var int = 1;
	var elem = ".header-bgs";
	var folder = "historia-da-fabrica";
	var time = 450;
	var totaltime = 5000;
	setInterval(function(){
		$(elem).fadeOut(time,function(){
			$(this).attr('style','background-image:url(/img/banners/'+folder+'/bg-body-'+int+'.jpg);').hide();
			$(this).fadeIn(time,function(){
				int++;
				if(int == 4+1){
					int = 1;
				}
			});
		});
	},totaltime); 
}
*/