var Cms = {
	/* Main Vars */
	URL: URL.site,

	request: {
		/* Request Vars */
		_cache: false,
		_ready: true,

		/* Request Public Functions */
		block: function(){
			Cms.request._ready = false;
		},
		unblock: function(){
			Cms.request._ready = true;
		},
		check: function(){
			return Cms.request._ready;
		},
		get: function(url,method,vars,retorno){
			if(typeof(url) == 'string'){
				var options = new Object();
				options.url = Cms.URL + url;
				if(typeof(method) == 'string'){ options.type = method.toUpperCase(); }
				if(typeof(vars) == 'object'){ options.data = vars; }
				if(typeof(retorno) == 'string'){ options.dataType = retorno.toUpperCase(); }

				options.statusCode = {
					404: function(){ console.log('Erro 404: URL "' + url + '" n\u00e3o foi encontrada!'); },
					500: function(){ console.log('Erro 500: URL "' + url + '" retornou um erro do servidor!'); }
				};

				if(typeof(Cms.request._cache) == 'object'){
					Cms.request._cache.abort();
				}

				Cms.request._cache = $.ajax(options);
				
				return Cms.request._cache;

			} else { return false; }
		}
	},
	forms: {
		/* Request Public Functions */
		block: function(texto){
			window.onbeforeunload = function(){
				if(typeof(texto) == 'string'){
					return texto;
				} else {
					return "Alguns dados não foram salvos, se continuar você pode perde-los!";
				}
			}
		},
		unblock: function(){
			window.onbeforeunload = function(){};
		}
	}
}

var Celulose = {

	footerObject: null,

	init: function(){
		$('header nav li[rel=submenu]').hover(function(){
			$(this).addClass('hover');
			$(this).find('ul').css('display','block');
		},function(){
			$(this).removeClass('hover');
			$(this).find('ul').css('display','none');
		});

		/*
		Celulose.footerObject = $('footer');
		
		setTimeout(function(){
			Celulose.footer();
		},100);

		$(window).resize(function(){
			Celulose.footer();
		});
		*/
	},

	footer: function(){
		if($(window).height() >= $(document).height()){
			Celulose.footerObject.css({
				position: 'absolute'
			})
		} else {
			Celulose.footerObject.removeAttr('style');
		}
	},

	noticias: {

		sidebar: null,
		varNext: null,
		varPrev: null,
		total: 0,
		current: 0,

		init: function(){
			Celulose.noticias.sidebar = $('.sidebar');
			Celulose.noticias.varNext = $('.sidebar .next');
			Celulose.noticias.varPrev = $('.sidebar .prev');
			Celulose.noticias.total = Celulose.noticias.sidebar.data('total');
		},
		next: function(){
			if((Celulose.noticias.current + 5) <= Celulose.noticias.total){

				if(Celulose.noticias.current == 0){
					Celulose.noticias.varPrev.removeClass('hide');
				}

				if((Celulose.noticias.current + 10) >= Celulose.noticias.total){
					Celulose.noticias.varNext.addClass('hide');
				}

				Celulose.noticias.current += 5;

				Celulose.noticias._get(Celulose.noticias.current);

			} return false;
		},
		prev: function(){
			if((Celulose.noticias.current - 5) >= 0){

				if((Celulose.noticias.current + 5) <= Celulose.noticias.total){
					Celulose.noticias.varNext.removeClass('hide');
				}

				if((Celulose.noticias.current - 5) <= 0){
					Celulose.noticias.varPrev.addClass('hide');
				}

				Celulose.noticias.current -= 5;

				Celulose.noticias._get(Celulose.noticias.current);
				
			} return false;
		},
		_get: function(pages){

			if(Cms.request.check()){

				Cms.request.block();

				var data = {},
					url = 'noticias/getNoticias/' + pages;

				Cms.request.get(url,'GET',data,'JSON').done(function(response){

					var ul = $('ul',Celulose.noticias.sidebar).stop(true,true),
						li = [];

					ul.fadeOut(300,function(){
						$.each(response.data, function(key, json){
							
							li.push('<li>' +
										'<div class="data">' + json.data + '</div>' +
										'<div class="titulo">' + json.titulo + '</div>' +
										'<a class="link" href="' + json.link + '">' + Lang.read + '</a>' +
									'</li>');

						});
						ul.html(li.join('')).fadeIn(300);
						Cms.request.unblock()
					});


				});
			} return false;
		}
	},
	box: {
		open: function(ob){
			
			$("#box").html('');

			var ob = $(ob);
			var url = ob.attr('href');

			var youtube = Celulose.apis.youtube(url);
			var vimeo = Celulose.apis.vimeo(url);

			if(youtube){
				url = youtube;
			} else {
				if(vimeo){
					url = vimeo;
				}
			}
			if(url){
				$("#box").fadeIn(300,function(){
					$("#box").html(
						'<a class="close" href="javascript:void(0);" onclick="Celulose.box.close();">' + Lang.close + '</a>' +
						'<iframe src="'+url+'" width="720" height="405" frameborder="0" allowfullscreen="true"></iframe>'
					);
				});
			} else {
				console.log("erro: " + url);
			}
		},
		close: function(){
			$("#box").fadeOut(400,function(){
				$("#box").html('');
			});
		}
	},
	apis: {
		youtube: function(url){
			var video_id = url.split('v=');
			if(video_id.length == 2){
				var ampersandPosition = video_id[1].indexOf('&');
				if(ampersandPosition != -1) {
					video_id = video_id[1].substring(0, ampersandPosition);
				}
				return 'https://www.youtube.com/embed/' + video_id + '?rel=0&vq=hd720&modestbranding=1&theme=light';
			} else {
				return false;
			}
		},
		vimeo: function(url){
			var regExp = /http:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;
			var match = url.match(regExp);
			if (match){
				return 'http://player.vimeo.com/video/' + match[2] + '?title=0&byline=0&portrait=0&color=006F53';
			} else {
				return false;
			}
		}
	},

	newsletter: {
		submit: function(){
			var data = {nome: $('.newsletter .nome').val(),email: $('.newsletter .email').val(),lang: Lang.type};

			$('.newsletter .msg').text(Lang.aguarde);
			
			if(Cms.request.check()){
				Cms.request.block();

				Cms.request.get('home/registerNewsleter','POST',data,'JSON').done(function(response){
					if(response.code == 200){
						$('.newsletter input[rel=nome]').val('');
						$('.newsletter input[rel=email]').val('');
						$('.newsletter .msg').text(response.msg);
					} else {
						$('.newsletter .msg').text(response.msg);
					}
					Cms.request.unblock();
				});
			} return false;
		}
	},

	closeBox: function(){
		$("#box-form").fadeOut(500);
	}
}

$(window).scroll(function() {

  if ($("header").offset().top > 0) {
 
    $('#bg').css("opacity","1");
    $('header nav li a ').addClass("act");
    $('.logo').css('background-image',' url(assets/img/logo-sm-color.png)');
    
  }else{

     $('#bg').css("opacity","0");
     $('header nav li a ').removeClass("act");
     $('.logo').css('background-image','url(assets/img/logo-sm.png)');

  }
});