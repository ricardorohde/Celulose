<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "home";
$route['404_override'] = 'home/notfound';

$route['lang'] = "home/lang";

$route['noticias/getNoticias/(:num)'] = "noticias/getNoticias/$1";
$route['noticias/(:any)'] = "noticias/index";

$route['trabalhe-conosco'] = "contato/trabalhe";
$route['responsabilidade/folha-riograndense'] = "responsabilidade/folha";
$route['responsabilidade/folha-riograndense/(campanha|centro|metropolitana)'] = "responsabilidade/folhaLista/$1";
$route['responsabilidade/folha-riograndense/(campanha|centro|metropolitana)/(:any)'] = "responsabilidade/folhaLista/$1/$2";
$route['responsabilidade/meio-ambiente-florestal'] = "responsabilidade/florestal";
$route['responsabilidade/meio-ambiente-industrial'] = "responsabilidade/industrial";
$route['responsabilidade/projetos-sociais'] = "responsabilidade/sociais";
$route['responsabilidade/geracao-de-empregos'] = "responsabilidade/empregos";
$route['responsabilidade/contribuicao-fiscal'] = "responsabilidade/fiscal";
$route['responsabilidade/reserva-barba-negra'] = "responsabilidade/barbaNegra";

$route['guaiba-2'] = "expansao/index";
$route['guaiba-2/(:any)'] = "expansao/$1";

$route['feirao'] = "custom";
$route['megafeirao'] = "custom";