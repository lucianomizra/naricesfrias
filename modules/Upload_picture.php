<?php  
class Upload_picture {  
     
   var $image;  
   var $type;  
   var $width;  
   var $height;  

   public function process ( $folder, $params, $namepost = 'file' ) {

      if ( $this->isset_pictures() ) {

         $align = (isset($params['align'])) ? $params['align'] : 'center';
         $quality = (isset($params['quality'])) ? $params['quality'] : 100;
         $width = (isset($params['width'])) ? $params['width'] : false;
         $height = (isset($params['height'])) ? $params['height'] : false;
         $name = (isset($params['name'])) ? $params['name'] : random_id();
      
         $day         = date('d');
         $month         = date('m');
         $ds          = DIRECTORY_SEPARATOR;
         $saveFolder = $ds.$month.'-'.$day.$ds.$folder.$ds;
         $realFolder = UPLOADSPATH.$saveFolder;

         if (!file_exists( $realFolder )) {
             mkdir($realFolder, 0755, true);
         }

         $result_array = getimagesize($_FILES[$namepost]['tmp_name']); 
         
         if ($result_array !== false) { 
            $mime_type = $result_array['mime']; 
            switch($mime_type) { 
               case "image/jpeg": 
                  $ext = '.jpg';
                  break; 
               case "image/gif": 
                  $ext = '.gif';
                  break; 
               case "image/png":
                  $ext = '.png';
                  break; 
            };
         } else { 
            return false;
         };
         
         $thumbnail=$name.$ext;

         $source=$_FILES[$namepost]['tmp_name'];

         $name=$realFolder.$thumbnail;
         
         $this->loadImage($source);

         if($width && $height) $this->crop($width, $height,$align); 

         if ( $this->save($name, $quality) ) {
            return $saveFolder.$thumbnail;
         } else {
            return false;
         }

      } else return false;

   }

   public function isset_pictures() {
      return ( !empty($_FILES) && isset($_FILES['file']) && $_FILES['file']['name'] );
   }
   

   //---Método de leer la imagen  
   public function loadImage($name) {  
        
      //---Tomar las dimensiones de la imagen  
      $info = getimagesize($name);  
        
      $this->width = $info[0];  
      $this->height = $info[1];  
      $this->type = $info[2];     
        
      //---Dependiendo del tipo de imagen crear una nueva imagen  
      switch($this->type){          
         case IMAGETYPE_JPEG:  
            $this->image = imagecreatefromjpeg($name);  
         break;          
         case IMAGETYPE_GIF:  
            $this->image = imagecreatefromgif($name);  
         break;          
         case IMAGETYPE_PNG:  
            $this->image = imagecreatefrompng($name);  
         break;          
      }       
   }  
     
   //---Método de guardar la imagen  
   public function save($name, $quality = 100) {  
        
      //---Guardar la imagen en el tipo de archivo correcto  
      switch($this->type){          
         case IMAGETYPE_JPEG:  
            $imgSaved = imagejpeg($this->image, $name, $quality);  
         break;          
         case IMAGETYPE_GIF:  
            $imgSaved = imagegif($this->image, $name);  
         break;          
         case IMAGETYPE_PNG:  
            $pngquality = floor(($quality - 10) / 10);  
            $imgSaved = imagepng($this->image, $name, $pngquality);  
         break;          
      } 
     imagedestroy($this->image);
	 
	 return $imgSaved;
   }  
     
   //---Método de mostrar la imagen sin salvarla  
   public function show() {  
        
      //---Mostrar la imagen dependiendo del tipo de archivo  
      switch($this->type){          
         case IMAGETYPE_JPEG:  
            imagejpeg($this->image);  
         break;          
         case IMAGETYPE_GIF:  
            imagegif($this->image);  
         break;          
         case IMAGETYPE_PNG:  
            imagepng($this->image);  
         break; 
      } 
     imagedestroy($this->image); 
   }  
     
   //---Método de redimensionar la imagen sin deformarla  
   public function resize($value, $prop){  
        
      //---Determinar la propiedad a redimensionar y la propiedad opuesta  
      $prop_value = ($prop == 'width') ? $this->width : $this->height;  
      $prop_versus = ($prop == 'width') ? $this->height : $this->width;  
        
      //---Determinar el valor opuesto a la propiedad a redimensionar  
      $pcent = $value / $prop_value;        
      $value_versus = $prop_versus * $pcent;  
        
      //---Crear la imagen dependiendo de la propiedad a variar  
      $image = ($prop == 'width') ? imagecreatetruecolor($value, $value_versus) : imagecreatetruecolor($value_versus, $value);  
        
      //---Hacer una copia de la imagen dependiendo de la propiedad a variar  
      switch($prop){  
           
         case 'width':  
            imagecopyresampled($image, $this->image, 0, 0, 0, 0, $value, $value_versus, $this->width, $this->height);  
         break;  
           
         case 'height':  
            imagecopyresampled($image, $this->image, 0, 0, 0, 0, $value_versus, $value, $this->width, $this->height);  
         break;  
           
      }  
        
      //---Actualizar la imagen y sus dimensiones  
     // $info = getimagesize($name);  
        
      $this->width = imagesx($image);  
      $this->height = imagesy($image);  
      $this->image = $image;  
        
   }     
     
   //---Método de extraer una sección de la imagen sin deformarla  
   public function crop($cwidth, $cheight, $pos = 'center') {  
        
      //---Hallar los valores a redimensionar 
      $new_w = $cwidth; 
      $new_h = ($cwidth / $this->width) * $this->height; 
       
      //---Si la altura es menor recalcular por la altura 
      if($new_h < $cheight){ 
          
         $new_h = $cheight; 
         $new_w = ($cheight / $this->height) * $this->width; 
       
      } 
       
      $this->resize($new_w, 'width'); 
        
      //---Crear la imagen tomando la porción del centro de la imagen redimensionada con las dimensiones deseadas  
      $image = imagecreatetruecolor($cwidth, $cheight);  
        
      switch($pos){  
           
         case 'center':  
            imagecopyresampled($image, $this->image, 0, 0, abs(($this->width - $cwidth) / 2), abs(($this->height - $cheight) / 2), $cwidth, $cheight, $cwidth, $cheight);  
         break;  
           
         case 'left':  
            imagecopyresampled($image, $this->image, 0, 0, 0, abs(($this->height - $cheight) / 2), $cwidth, $cheight, $cwidth, $cheight);  
         break;  
           
         case 'right':  
            imagecopyresampled($image, $this->image, 0, 0, $this->width - $cwidth, abs(($this->height - $cheight) / 2), $cwidth, $cheight, $cwidth, $cheight);  
         break;  
           
         case 'top':  
            imagecopyresampled($image, $this->image, 0, 0, abs(($this->width - $cwidth) / 2), 0, $cwidth, $cheight, $cwidth, $cheight);  
         break;  
           
         case 'bottom':  
            imagecopyresampled($image, $this->image, 0, 0, abs(($this->width - $cwidth) / 2), $this->height - $cheight, $cwidth, $cheight, $cwidth, $cheight);  
         break;  
        
      }  
        
      $this->image = $image;  
   }  
     
}  
?>