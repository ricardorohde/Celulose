var Login = {
	/* vars */
	varResponse: null,
	varLogin: null,
	varForm: null,
	varEmail: null,
	varSenha: null,

	/* Functions */
	tryAuth: function(retorno){
		if(Cms.request.check()){
			Cms.request.block();
			Cms.forms.block('Autentica\u00e7\u00e3o em progresso, tem certeza que quer sair?');
			Login.varResponse.fadeOut(300);
			Login.varLogin.stop().fadeOut(400,function(){
				var data = {paramOne: Base64.encode(Login.varEmail.val().toLowerCase()),paramTwo: Base64.encode(Sha1.hash(Login.varSenha.val()))}
				Cms.request.get('auth/parse','POST',data,'JSON').success(function(json){
					Cms.forms.unblock();
					if(json.code == 200){
						Login.varResponse.removeClass('alert-danger').addClass('alert-success').text("Sucesso. Redirecionando...").stop().fadeIn(300,function(){
							setTimeout(function(){
								window.location.href = retorno;
							},500);
						});
					} else {
						Login.varResponse.removeClass('alert-success').addClass('alert-danger').text(json.erro).stop().fadeIn(300);
						Login.varLogin.stop().fadeIn(300);
						Cms.request.unblock();
					}
				});
			});
		} else { return false; }
	}
}
$(function(){
	Login.varResponse = $('.response .alert');
	Login.varLogin = $('.login');
	Login.varForm = $('form',Login.varLogin);
	Login.varEmail = $('input[rel=email]',Login.varForm);
	Login.varSenha = $('input[rel=senha]',Login.varForm);
});