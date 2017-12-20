<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
// if ( ! function_exists('icon'))
// {
//   function icon( $icon, $theme = false )
//   { 
//     $CI =& get_instance();
//     $theme = $theme ? $theme : $CI->data['icon_theme'];
//     $html =  '<i class="icon icon-default icon-' . $theme .'-'. $icon;
//     $html .= '"></i>';
//     return $html;
//   }
// }

/**
 * Image
 *
 * Generates an <img /> element
 *
 */
if ( ! function_exists('img'))
{
  function img( $file, $alt = false, $class = false )
  { 
    // $CI =& get_instance();
    $src = layout( 'img/'.$file );

    $html = '<img src="';
    $html .= $src;
    $html .= '"';
    if($alt) $html .= ' alt="'. $alt .'"';
    if($class) $html .= ' class="'. $class .'"';
    $html .= '>';
    return $html;
  }
}

if ( ! function_exists('img_cover'))
{
  function img_cover( $file, $w = 1000, $h = 1000 )
  { 

    $html = '<span class="img-cover div-responsive" data-original-size="';
    $html .= $w.','.$h;
    $html .= '" style="background-image:url(\'';
    $html .= $file;
    $html .= '\');max-height:'.$h.'px;"></span>';

    return $html; 
  }
}

if ( ! function_exists('a'))
{
  function a( $text, $a, $class = false )
  { 
    $href = href($a); 

    $html = '<a href="';
    $html .= $href;
    $html .= '"';
    if($class) $html .= ' class="'. $class .'"';
    $html .= '>';
    $html .= $text;
    $html .= '</a>';
    echo $html;
  }
}

// ------------------------------------------------------------------------

/**
 * Generates non-breaking space entities based on number supplied
 *
 * @access  public
 * @param integer
 * @return  string
 */
if ( ! function_exists('nbs'))
{
  function nbs($num = 1)
  {
    return str_repeat("&nbsp;", $num);
  }
}

