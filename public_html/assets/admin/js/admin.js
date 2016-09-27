var Forms = {
	checked: function(o){
		var o = $(o + ':checked').map(function(i,n) {
			return $(n).val();
		}).get();
		if(o.length == 0) { o = ''; }
		return o;
	},
	get: function(o){
		var o = $(o).val();
		if(o == 'undefined'){
			return '';
		} else {
			return o;
		}
	},
	radio: function(o){
		var o = $(o + ':checked').map(function(i,n) {
			return $(n).val();
		}).get();
		if(o.length == 0) { o = ''; } else { o = o[0]; }
		return o;
	}
}

var Admin = {
	/* Default Controller */
	sistema: {
		menu: null,
		bindMenu: function(){
			$('a.first',Admin.sistema.menu).hover(function(){
				$('ul',this).show();
			}, function(){
				$('ul',this).hide();
			});
		},
		verifyEmail: function(objeto){
			var objeto = $(objeto);
			var data = {paramOne: Base64.encode(objeto.val())};

			Cms.request.get('sistema/verifyEmail','POST',data,'JSON').success(function(json){
				Cms.forms.unblock();
				if(json.code == 200){
					objeto.parent().find('.add-on').html('<i class="icon-ok"></i>');
				} else {
					objeto.parent().find('.add-on').html('<i class="icon-ban-circle"></i>');
				}
			});
		},
		verifySenha: function(objeto){
			var objeto = $(objeto),
				pw = objeto.val();
			if(pw.match(/^([a-zA-Z0-9*#!@]{6,16})$/)){
				
				objeto.parent().find('.add-on').html('<i class="icon-ok"></i>');
			} else {
				objeto.parent().find('.add-on').html('<i class="icon-ban-circle"></i>');
			}
		}
	},

	/* Custom Controller */

	comunicacao: {
		trabalheBuscar: function(){
			
			var data = {
				celulose_nome: Forms.get('#form_nome'),
				celulose_email: Forms.get('#email'),
				celulose_telefone: Forms.get('#form_telefone'),
				celulose_cidade: Forms.get('#form_cidade'),
				celulose_formacao: Forms.get('#form_formacao'),
				celulose_formacao_outro: Forms.get('#form_formacao_outro'),
				celulose_curso: Forms.get('#form_curso'),
				celulose_curso_outro: Forms.get('#form_curso_outro'),
				celulose_salario: Forms.get('#form_salario'),
				celulose_pretencao: Forms.get('#form_pretencao'),
				celulose_area: Forms.get('#form_area'),
				celulose_area_tempo: Forms.get('#form_area_tempo'),
				celulose_estagio: Forms.radio('.form_estagio'),
				celulose_fisica: Forms.radio('.form_fisica')
			};

			Cms.request.get('actions/comunicacaoTrabalheBusca','POST',data,'JSON').success(function(json){
					
				if(json.code == 200){
					$('#searchResult').html(json.data.join(''));
				} else {
					alert("Erro ao processar a pesquisa");
				}

			});
		}
	},

	/* Custom Controller */

	conteudos: {
		converteUrl: function(rel){
			var data = {title: $(rel).val() }
			Cms.request.get('actions/convertTitleToUrl','POST',data,'JSON').success(function(json){;
				if(json.code == 200){
					$("#url").val(json.data);
				}
			});
		},
		getVideoInfos: function(rel){
			var button = $(this).button('loading'),
				data = {url: $("#vurl").val()};

			Cms.request.get('actions/getVideoInfos','POST',data,'JSON').success(function(json){
				if(json.code == 200){
					$("#api").val(json.data.api);
					$("#img").val(json.data.img);
					$("#vid").val(json.data.vid);
					$("#api").val(json.data.api);
					$("#thumb").attr('src',json.data.img);
				}
			});
		},
		uploadPhoto: function(key){
			var data = {'key':key}
			//Cms.forms.block('Upload em progresso!');
			var check = function(){
				Cms.request.get('actions/getUploadProgress','GET',data,'JSON').success(function(json){
					console.log(json);
					$('#progress_bar').width(json.data.progress + "%");
					//$('#progress_completed').html(parseInt(json.data.progress) + "%");
					if(json.data.progress == '100'){
						clearInterval(check);
						//Cms.forms.unblock();
					}
				});
			}

			$('#progress_container').fadeIn(100);
			setInterval(check,1000);
		}
	}



}
$(function(){
	Admin.sistema.menu = $('.header-menu');
	Admin.sistema.bindMenu();
});