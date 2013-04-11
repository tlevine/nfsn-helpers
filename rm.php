<?php
// Delete everything in a directory
$DIR = 'tmp/templates_c';

function deleteDirectory($dir) { 
  if (!file_exists($dir)) return true; 
  if (!is_dir($dir) || is_link($dir)) return unlink($dir); 
  foreach (scandir($dir) as $item) { 
    if ($item == '.' || $item == '..') continue; 
    if (!deleteDirectory($dir . "/" . $item)) { 
      chmod($dir . "/" . $item, 0777); 
      if (!deleteDirectory($dir . "/" . $item)) return false; 
    }; 
  } 
  return rmdir($dir);
} 

if ($handle = opendir($DIR)) {
  while (false !== ($entry = readdir($handle))) {
    if ($entry == '.' || $entry == '..') { continue; }
    $e = $DIR . '/' . $entry;
    if (deleteDirectory($e)) {echo "$e";}
  }
  closedir($handle);
}
?>
