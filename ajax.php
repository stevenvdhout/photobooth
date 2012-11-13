<?php
require_once('photobooth.inc.php');
require_once('SimpleImage.class.php');

switch ($_POST['action']) {
  default:
  case 'take-picture':
    $time = time();
    $filename = "images/trouw-hedel-steven-$time-%n.jpg";
    //if(exec("gphoto2 -v --capture-image-and-download --filename $filename")) {
    if(exec("gphoto2 --capture-image-and-download -F 3 -I 3 --filename $filename")) {

      // create a smaller version of the image
      // for performance
      for ($i= 1; $i<=3; $i++) {
        $small = "images-small/trouw-hedel-steven-$time-$i.jpg";
        $filename = "images/trouw-hedel-steven-$time-$i.jpg";
        $img = new SimpleImage();
        $img->load($filename);
        $img->resizeToWidth(1280);
        $img->save($small);
      }
      // Use php to create an awesome image...

      // add it to the json return
      $output = array(
        "printPopup" => $small,
      );

    }
    else $output = FALSE;
    break;
}
print json_encode($output);
