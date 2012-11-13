<?php

// kill the connection with the camera, allowing gphoto2 to take over
function killPTPCamera() {
    // make connection with camera
    exec("killall PTPCamera");
    // this seems not to be working...
    // // make sure killall works ass _www user...
}

/**
 * Get some images
 */
function getImages() {
  /**
   * Save de afbeeldingen in mappen met het uur.
   * Op die manier kan ik afbeeldingen tonen van het laatste uur.
   * De zelfde sfeer op de foto's als op het feest dus
   * Andere mappen moeten ook getoond worden, met bv de making of
   * 20 foto's als preview, en daarnaa weer 20 nieuwe foto's
   * om de 20 foto's dus 20 random nieuwe uit een random map
   */
}
