<?php

#########################################################
#                     RandoMage                         #
#########################################################
#                                                       #
#                                                       #
# This script was created by:                           #
#                                                       #
# PHPSelect Web Development Division.                   #
# http://www.phpselect.com/                             #
#                                                       #
# This script and all included modules, lists or        #
# images, documentation are copyright 2002              #
# PHPSelect (http://www.phpselect.com/) unless          #
# otherwise stated in the script.                       #
#                                                       #
# Purchasers are granted rights to use this script      #
# on any site they own. There is no individual site     #
# license needed per site.                              #
#                                                       #
# Any copying, distribution, modification with          #
# intent to distribute as new code will result          #
# in immediate loss of your rights to use this          #
# program as well as possible legal action.             #
#                                                       #
# This and many other fine scripts are available at     #
# the above website or by emailing the authors at       #
# admin@phpselect.com or info@phpselect.com             #
#                                                       #
#########################################################
#randomage.php                                          #
#                                                       #
#RandoMage is a random image generator. It supports 4   #
#graphics types, .bmp, .png, .gif, and .jpg. It finds a # 
#random image from your images directory and then       #
#displays the picture. All automatically!               #
#########################################################

#Set the following configuration variable

#$imagedir is the directory that holds your images.
#Be SURE to include the trailing slash in the name.
$imagedir = "images/";

#########################################################
#Editing below is not required.                         #
#########################################################

$images = array();

#Locate and all of the existing images
$directory = opendir($imagedir);
while($filename = readdir($directory)){
  if(strlen($filename) > 2){ #ignore . and ..
    $localext = substr($filename, -3);
    if(!((strcasecmp($localext, "gif") == 0) || (strcasecmp($localext, "jpg") == 0) || (strcasecmp($localext, "bmp") == 0) || (strcasecmp($localext, "png") == 0)))
      continue;
    array_push($images, $filename);
  }
}

#choose a random image from the array
srand((double)microtime() * 1000000); 
$selection = $images[rand(0, sizeof($images)-1)];

#display the imaeg
echo "<img src=\"$imagedir$selection \" alt=\"$selection  (" . filesize("$imagedir/$selection") . " bytes)\">";

?>