<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "sistema/home";
$route['404_override'] = 'sistema/notfound';

/* Sistema */
$route['auth/parse'] = "sistema/authParse";
$route['auth/unset'] = "sistema/authUnset";
$route['auth'] = "sistema/auth";

$route['sistema/usuarios/cadastrar'] = "sistema/usuarioscadastrar";
$route['sistema/usuarios/editar/(:num)'] = "sistema/usuarioseditar/$1";
$route['sistema/usuarios/editar/self'] = "sistema/usuarioseditar/self";
$route['sistema/usuarios/search'] = "sistema/search";
$route['sistema/usuarios/search/(:any)'] = "sistema/search/$1";
$route['sistema/usuarios/search/(:any)/(:num)'] = "sistema/search/$1/$2";
$route['sistema/usuarios/remover/(:num)'] = "sistema/usuariosremover/$1";
$route['sistema/usuarios/trocar-senha/(:num)'] = "sistema/changePassword/$1";
$route['sistema/usuarios/trocar-senha/self'] = "sistema/changePassword/self";

/* Comunicação */
$route['comunicacao/contato/search'] = "comunicacao/contatoSearch";
$route['comunicacao/contato/search/(:any)'] = "comunicacao/contatoSearch/$1";
$route['comunicacao/contato/search/(:any)/(:num)'] = "comunicacao/contatoSearch/$1/$2";
$route['comunicacao/contato/visualizar/(:any)'] = "comunicacao/contatoVisualizar/$1";

$route['comunicacao/trabalhe/search'] = "comunicacao/trabalheSearch";
$route['comunicacao/trabalhe/search/(:any)'] = "comunicacao/trabalheSearch/$1";
$route['comunicacao/trabalhe/search/(:any)/(:num)'] = "comunicacao/trabalheSearch/$1/$2";
$route['comunicacao/trabalhe/visualizar/(:any)'] = "comunicacao/trabalheVisualizar/$1";
$route['comunicacao/trabalhe/remover/(:any)'] = "comunicacao/trabalheRemover/$1";
$route['comunicacao/trabalhe/download/(:any)'] = "comunicacao/trabalheDownload/$1";
$route['comunicacao/trabalhe/buscar'] = "comunicacao/buscar";


/* Conteúdos */

$route['conteudos/noticias/search'] = "conteudos/noticiasSearch";
$route['conteudos/noticias/search/(:any)'] = "conteudos/noticiasSearch/$1";
$route['conteudos/noticias/search/(:any)/(:num)'] = "conteudos/noticiasSearch/$1/$2";
$route['conteudos/noticias/editar/(:num)'] = "conteudos/noticiasEditar/$1";
$route['conteudos/noticias/remover/(:num)'] = "conteudos/noticiasRemover/$1";

$route['conteudos/textos/search'] = "conteudos/textosSearch";
$route['conteudos/textos/search/(:any)'] = "conteudos/textosSearch/$1";
$route['conteudos/textos/search/(:any)/(:num)'] = "conteudos/textosSearch/$1/$2";
$route['conteudos/textos/editar/(:num)'] = "conteudos/textosEditar/$1";
$route['conteudos/textos/remover/(:num)'] = "conteudos/textosRemover/$1";


$route['conteudos/videos/search'] = "conteudos/videosSearch";
$route['conteudos/videos/search/(:any)'] = "conteudos/videosSearch/$1";
$route['conteudos/videos/search/(:any)/(:num)'] = "conteudos/videosSearch/$1/$2";
$route['conteudos/videos/editar/(:num)'] = "conteudos/videosEditar/$1";
$route['conteudos/videos/remover/(:num)'] = "conteudos/videosRemover/$1";

