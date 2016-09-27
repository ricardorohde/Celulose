var Cms = {
	/* Main Vars */
	URL: URL.site + '/',

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