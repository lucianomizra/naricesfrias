<?php

function view($view,$params=null) {

	if(is_array($params)) {
		foreach ($params as $key => $value) {
			$$key = $value;
		}
	}

	include VWSPATH.$view.'.php';

}

function redirect($url, $permanent = false)
{

    header('Location: '. BASEURL.$url, true, $permanent ? 301 : 302);

    exit();
}

function file_exists_2($filePath)
{
    return ($ch = curl_init($filePath)) ? @curl_close($ch) || true : false;
}

function load ($objeto,$parametros = null) {
    $objeto=ucwords($objeto); 
    require_once(MODULESPATH.$objeto.'.php');
    $$objeto = new $objeto($parametros);

    return $$objeto;
}

function get_date() {
	return date('Y-m-d H:i:s');
}
    
function random_code() {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $c = substr( str_shuffle( $chars ), 0, 10 );
    return $c;
}   
function random_id() {
    return substr(md5(uniqid(rand())),0,8);
}	
function print_mail($str) {
	return str_replace('@', '<i class="arroba"></i>', $str);
}

// public function create_flash($type , $message, $extra = array() ){
// 	$_SESSION['univ_flash'] = array(
// 		'type'=>$type,
// 		'message'=>$message,
// 		'extra'=>$extra
// 	);
// }

// public function delete_flash(){
// 	$_SESSION['univ_flash'] = null;
// }

function sanear_string($string)
{

    $string = trim($string);

    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );

    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );

    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );

    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );

    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );

    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );

    //Esta parte se encarga de eliminar cualquier caracter extraño
    $string = str_replace(
        array("\\", "¨", "º", "-", "~",
             "#", "@", "|", "!", "\"",
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "`", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ",", ":",
             ".", " "),
        '-',
        $string
    );


    return $string;
}

function html_print ($str) {

    $str = htmlentities($str, ENT_QUOTES, "UTF-8");

    return $str; 

}
function html_save ($str) {

	$str = html_entity_decode($str, ENT_COMPAT, "ISO-8859-1");

    $arrMojis = explode("%u",$str); 
    for ($i = 1;$i < count($arrMojis);$i++){ 
	        $c = substr($arrMojis[$i],0,4); 
	        $cc = mb_convert_encoding(pack('H*',$c),$outCharCode,'ISO-8859-1'); 
	        $arrMojis[$i] = substr_replace($arrMojis[$i],$cc,0,4); 
	    } 
    return implode('',$arrMojis); 

}


function get($num) {
    $index = $num + 2;
 
    if( isset( $_GET['r'] ) ) {
        $params = explode('/', $_GET['r']);
    }

    return isset($params[$index]) ? $params[$index] : null;
}

function post( $name ) {
    return isset($_POST[$name]) ? $_POST[$name] : NULL;
}
