<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('layout'))
{
  function layout( $url = '' )
  {
    $CI =& get_instance();
    return $CI->config->item('base_sys').'app/layout/' . trim($url,'/');
  }
}

if ( ! function_exists('tview'))
{
  function tview( $file, $html = false )
  {
    $CI =& get_instance();
    $CI->load->view( $file, $html );
  }
}

if ( ! function_exists('href'))
{
  function href( $a )
  {
    $CI =& get_instance();
    return isset($CI->routes[$a]) && ($CI->routes[$a]['pager']) ? base_url($CI->routes[$a]['pager']) : $a;
  }
}


if ( ! function_exists('thumb'))
{
  function thumb( $file = '', $w = 0, $h = 0, $crop = true, $global = false)
  {
    $CI =& get_instance();
    $version = $CI->config->item('upload-version', 'app');
    $static = $CI->config->item('static', 'app');
    $base_url = $CI->config->item('base_sys');
    $name = explode('/',$file);
    $type = $crop ? "crop" : "thumb";
    $global = $global ? "1" : "0";
    $encrypt = $CI->encryption->encode("{$file}||{$w}||{$h}||{$type}||{$global}");

    // if(ENVIRONMENT == 'development')
    //   return $static . 'f/' . $encrypt . '/' . $name[count($name)-1]. $version;
    return $base_url . 'f/' . $encrypt . '/' . $name[count($name)-1]. $version;
  }
}


if ( ! function_exists('user_thumb'))
{
  function user_thumb( $file = '', $w = 0, $h = 0, $crop = true)
  {
    return $file ? thumb( $file, $w, $h, $crop ) : layout('img/user_default.png');
  }
}


if ( ! function_exists('upload'))
{
  function upload( $file = '', $global = false )
  {
    $CI =& get_instance();
    $version = $CI->config->item('upload-version', 'app');
    $folder = $CI->config->item('uploads-global', 'app');
    if(!$global || !$folder)
      $folder = $CI->config->item('uploads', 'app');
    $base_url = $CI->config->item('base_sys');
    return $base_url . $folder . $file . ($file ? $version : '');
  }
}

if ( ! function_exists('base64url_encode'))
{
  function base64url_encode($data = '')
  {
    return rtrim(strtr($data, '+/', '-_'), '=');
  }
}

if ( ! function_exists('base64url_decode'))
{
  function base64url_decode($data = '')
  {
    return str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT);
  }
}

if ( ! function_exists('prep_word_url'))
{
  function prep_word_url( $string, $spacer = "-" )
  {
    $string = rtrim(trim($string));
    // $string = character_limiter($string,40,'');
    $string = mb_strtolower($string, 'UTF-8');
    $string = preg_replace("/[ÁáÄäÂâ]/iu","a",$string);
    $string = preg_replace("/[ÉéËëÊê]/iu","e",$string);
    $string = preg_replace("/[ÍíÏïÎî]/iu","i",$string);
    $string = preg_replace("/[ÓóÖöÔô]/iu","o",$string);
    $string = preg_replace("/[ÚúÜüÛû]/iu","u",$string);
    $string = preg_replace("/[Ññ]/iu","n",$string);
    $string = trim(preg_replace("/[^ A-Za-z0-9_]/", " ", $string));
    $string = preg_replace("/[ \t\n\r]+/", $spacer, $string);
    $string = str_replace(" ", $spacer, $string);
    $string = preg_replace("/[ -]+/", $spacer, $string);
    return $string;
  }
}

if ( ! function_exists('mb_ucfirst'))
{
  function mb_ucfirst($string = '', $e = 'utf-8', $lower = true)
  {
    if (function_exists('mb_strtoupper') && function_exists('mb_substr') && !empty($string))
    {
      if( $lower )
        $string = mb_strtolower($string, $e);
      $upper = mb_strtoupper($string, $e);
      preg_match('#(.)#us', $upper, $matches);
      $string = $matches[1] . mb_substr($string, 1, mb_strlen($string, $e), $e);
    }
    else
    {
      if( $lower )
        $string = strtolower($string);
      $string = ucfirst($string);
    }
    return $string;
  }
}

if ( ! function_exists('get_mime'))
{
  function get_mime( $filename = '' )
  {
    if(!file_exists($filename) || !filesize($filename)) return false;
    $image_info = getimagesize($filename);
    if(!isset($image_info["mime"])) return false;
    return $image_info["mime"];
  }
}
if ( ! function_exists('prep_cost'))
{
  function prep_cost( $cost = 0, $currency = true, $ivi = false )
  {
    return number_format(round($cost, 2), 2, '.', '')  .  ($currency ? " €" : "") . ($ivi ? " i.v.i." : "");
  }
}

if ( ! function_exists('prep_costF'))
{
  function prep_costF( $cost = 0, $currency = true, $ivi = true )
  {
    return number_format(round($cost, 2), 2, '\'', '') .  ($currency ? " €" : "") . ($ivi ? " i.v.i." : "");
  }
}


if ( ! function_exists('create_select_options'))
{
  function create_select_options( $query = false, $label = '' )
  {
    $data = array();
    if($label) $data[''] = $label;
    if($query)
    {
      foreach ($query->result_array() as $row)
      {
        $data[$row['id']] = $row['el'];
      }
    }
    return $data;
  }
}

if ( ! function_exists('prep_word_url'))
{
  function prep_word_url( $string, $spacer = "-" )
  {
    $string = rtrim(trim($string));
    $string = substr($string,0, 100);
    $string = mb_strtolower($string, 'UTF-8');
    $string = preg_replace("/[ÁáÄäÂâ]/iu","a",$string);
    $string = preg_replace("/[ÉéËëÊê]/iu","e",$string);
    $string = preg_replace("/[ÍíÏïÎî]/iu","i",$string);
    $string = preg_replace("/[ÓóÖöÔô]/iu","o",$string);
    $string = preg_replace("/[ÚúÜüÛû]/iu","u",$string);
    $string = preg_replace("/[Ññ]/iu","n",$string);
    $string = trim(preg_replace("/[^ A-Za-z0-9_]/", " ", $string));
    $string = preg_replace("/[ \t\n\r]+/", $spacer, $string);
    $string = str_replace(" ", $spacer, $string);
    $string = preg_replace("/[ -]+/", $spacer, $string);
    return $string;
  }
}

if ( ! function_exists('is_date'))
{
  function is_date( $str ) {
    $stamp = strtotime( $str );

    if (!is_numeric($stamp)) {
        return FALSE;
    }
    $month = date( 'm', $stamp );
    $day   = date( 'd', $stamp );
    $year  = date( 'Y', $stamp );

    if (checkdate($month, $day, $year)) {
        return TRUE;
    }
    return FALSE;
  }
}


if ( ! function_exists('human_date'))
{
  function human_date( $str = '' )
  {
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $str);
    if(!$date) return false;

    // $days = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
    // $months = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");

    $days = array("Dom","Lun","Mar","Mié","Jue","Vie","Sáb");
    $months = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    $month = $months[$date->format('n')-1];
    $day = $days[$date->format('w')];

    $text = $day;
    $text .= ' ';
    $text .= $date->format('d');
    $text .= ' de ' .$month;
    // $text .= ' de ';
    // $text .= $date->format('Y');
    return $text;
  }
}


if ( ! function_exists('human_date2'))
{
  function human_date2( $str = '' )
  {
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $str);
    if(!$date) return false;

    // $days = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
    // $months = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");

    $days = array("Dom","Lun","Mar","Mié","Jue","Vie","Sáb");
    $months = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    $month = $months[$date->format('n')-1];
    $day = $days[$date->format('w')];

    $text = $day;
    $text .= ' ';
    $text .= $date->format('d');
    $text .= ' de ' .$month;
    $text .= ' a las ';
    $text .= $date->format('H:i:s');
    return $text;
  }
}

if ( ! function_exists('birthday'))
{
  function birthday( $str = '' )
  {
    $date = DateTime::createFromFormat('Y-m-d', $str);
    if(!$date) return false;

    $months = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    $month = $months[$date->format('n')-1];

    $now = DateTime::createFromFormat('Y-m-d H:i:s', now())->getTimestamp();
    $diff_years = floor( ($now - $date->getTimestamp()) / (365*60*60*24) );

    $text = $date->format('d');
    $text .= ' de ' .$month;
    $text .= ' del ';
    $text .= $date->format('Y');

    return $text;
  }
}
if ( ! function_exists('age'))
{
  function age( $str = '' )
  {
    $date = DateTime::createFromFormat('Y-m-d', $str);
    if(!$date) return false;

    $now = DateTime::createFromFormat('Y-m-d H:i:s', now())->getTimestamp();
    $diff_years = floor( ($now - $date->getTimestamp()) / (365*60*60*24) );

    $text = $diff_years;
    $text .= ' años';

    return $text;
  }
}


if ( ! function_exists('change_format'))
{
  function change_format( $str = '', $format = 'Y-m-d H:i:s', $newFormat = 'd-m-Y H:i:s' )
  {
    $date = DateTime::createFromFormat($format, $str);
    if(!$date) return false;
    return $date->format($newFormat);
  }
}

if ( ! function_exists('validate_age'))
{
  function validate_age($date, $age = 18)
  {
    $date = DateTime::createFromFormat('Y-m-d', $date);
    if(!$date) return false;

    $birthday = $date->getTimestamp();
    if(is_string($birthday)) {
        $birthday = strtotime($birthday);
    }

    if(time() - $birthday < $age * 31536000)  {
        return false;
    }

    return true;
  }
}

if ( ! function_exists('valid_date'))
{
  function valid_date($date,  $format = 'Y-m-d H:i:s')
  {
    if(!$date) return 0;
    $date = DateTime::createFromFormat($format, $date);

    return (bool)($date->getTimestamp() > 0);
  }
}

if ( ! function_exists('now'))
{
  function now()
  {
    // return '2018-05-01 13:00:00';
    return date('Y-m-d H:i:s');
  }
}

if ( ! function_exists('pagination_query'))
{
  function pagination_query($tempdb = false, $params = [])
  {
    if (!$tempdb) return false;

    $page = isset($params['page']) ? $params['page'] : 1;
    $limit = isset($params['limit']) ? $params['limit'] : 100;
    $start = ($page - 1) * $limit;

    $r = array();
    $countdb = clone $tempdb;
    $count = $countdb->get()->num_rows();
    $more = $count - $start - $limit;

    $tempdb->limit($limit,$start);
    $r['more'] = $more;
    $r['count'] = $count;
    $r['page'] = $page;
    $r['limit'] = $limit;
    $r['results'] = $tempdb->get()->result();

    return $r;
  }
}
