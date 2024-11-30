<?php

date_default_timezone_set('America/Sao_Paulo');

	//Formata a data do mysql para o formato brasileiro, se a variavel $tipo for 1, � mostrada a data e hora completa
	function formatadata($data, $tipo=1 ){
		if($data<>'0000-00-00'){
			if($tipo=='1'){
				if(strlen($data)>10){
					return date('d/m/Y H:i', strtotime($data));
				} else {
					return date('d/m/Y', strtotime($data));
				}
			} else {
				return date('d/m/Y', strtotime($data));
			}
		} else {
			return '-';
		}
	}
	
	//Formata a data do boleto formato DDMMYYYY
	function formatadataboleto($data){
		return date('dmY', strtotime($data));
	}
  
  //24/02/23
  function formatadatamysql($data){
    $d = substr($data,0,2);
    $m = substr($data,3,2);
    $Y = substr($data,6,2);
    return '20'.$Y."-".$m."-".$d;
  }
  
  //24/02/23
  function formatadatamysql2($data){
    $d = substr($data,0,2);
    $m = substr($data,3,2);
    $Y = substr($data,6,4);
    return $Y."-".$m."-".$d;
  }

  function formatahoramysql($hora){
    $hora = $hora . ":00";
    return $hora; 
  }

  //moeda
  function formatamoeda($valor){
    return "R$" . number_format($valor,2,",",".");
  }

  //moeda
  function diadasemana($dia){
    switch ($dia) {
      case 1:
        return 'Segunda-Feira';
        break;
      case 2:
        return 'Terça-Feira';
        break;
      case 3:
        return 'Quarta-Feira';
        break;
      case 4:
        return 'Quinta-Feira';
        break;
      case 5:
        return 'Sexta-Feira';
        break;
      case 6:
        return 'Sábado';
        break;
      case 7:
        return 'Domingo';
        break;
    }
  }

    //moeda
    function nomedomes($mes){
      switch ($mes) {
        case 1:
          return 'Janeiro';
          break;
        case 2:
          return 'Fevereiro';
          break;
        case 3:
          return 'Março';
          break;
        case 4:
          return 'Abril';
          break;
        case 5:
          return 'Maio';
          break;
        case 6:
          return 'Junho';
          break;
        case 7:
          return 'Julho';
          break;
        case 8:
          return 'Agosto';
          break;
        case 9:
          return 'Setembro';
          break;
        case 10:
          return 'Outubro';
          break;
        case 11:
          return 'Novembro';
          break;
        case 12:
          return 'Dezembro';
          break;
      }
    }

function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

function header_status($statusCode) {
    static $status_codes = null;

    if ($status_codes === null) {
        $status_codes = array (
            100 => 'Continue',
            101 => 'Switching Protocols',
            102 => 'Processing',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            207 => 'Multi-Status',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            422 => 'Unprocessable Entity',
            423 => 'Locked',
            424 => 'Failed Dependency',
            426 => 'Upgrade Required',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported',
            506 => 'Variant Also Negotiates',
            507 => 'Insufficient Storage',
            509 => 'Bandwidth Limit Exceeded',
            510 => 'Not Extended'
        );
    }

    if ($status_codes[$statusCode] !== null) {
        $status_string = $statusCode . ' ' . $status_codes[$statusCode];
        header($_SERVER['SERVER_PROTOCOL'] . ' ' . $status_string, true, $statusCode);
    }
}