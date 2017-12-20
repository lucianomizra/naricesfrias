<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Files extends CI_Controller
{

  public function file( $str = '' )
  {
    $this->load->library('EncryptionX', null, 'encryption');
    $this->encryption->key($this->config->item('encryption_key'));
    $expiryDate = date( 'D, d M Y H:i:s e', time() + ( 3600 * 24 * 30 ) );
    header('Cache-Control: max-age=86400');
    header('Expires: ' . $expiryDate );
    $nstr = explode('||',$this->encryption->decode(base64url_decode($str)));

    if(count($nstr) != 5) return show_404();

    $size = $nstr[1] . 'x' . $nstr[2];
    $type = $nstr[3];
    $global = round($nstr[4]);
    $arrf = explode('/',$nstr[0]);
    if(count($arrf) != 3) return show_404();
    $year = $arrf[0];
    $month = $arrf[1];
    $file = $arrf[2];

    $this->load->config('app', TRUE);
    $folder = $this->config->item('uploads-global', 'app');
    if(!$global || !$folder)
      $folder = $this->config->item('uploads', 'app');

    $date = date('Y/m/d');
    $filef = "{$folder}thumbs/{$date}/{$size}-{$file}";
    $version = $this->config->item('upload-version', 'app') . '.' . date('H');
    $mime = get_mime($filef);
    if($mime)
    {
      header("Content-Type: {$mime}");
      readfile($filef);
      exit;
    }

    $date = date('Y/m/d', strtotime("-1 day"));
    $filef = "{$folder}thumbs/{$date}/{$size}-{$file}";
    $mime = get_mime($filef);
    if($mime)
    {
      header("Content-Type: {$mime}");
      readfile($filef);
      exit;
    }

    $thumbFolder = "{$folder}thumbs/{$date}/";
    if(!is_dir($thumbFolder))
      mkdir($thumbFolder, 0777, true);

    $this->load->library('image');
    $fileb = "{$folder}{$year}/{$month}/{$file}";

    if(!file_exists($fileb)) return show_404();
    @unlink("{$folder}thumbs/{$date}/{$size}-{$file}");
    $function = ($type == 'thumb') ? 'resize' : 'resize_crop';
    $this
      ->image
      ->load($fileb)
      ->set_jpeg_quality(100)
      ->$function($nstr[1], $nstr[2])
      ->save("{$folder}thumbs/{$date}/{$size}-{$file}")
      ->clear();

    $mime = get_mime($filef);
    header("Content-Type: {$mime}");
    readfile($filef);
    exit;
  }

}
