<?php
// Delete everything in a directory
$DIR = 'tmp';

function deleteDirectoryContents($dir) { 
  if (!file_exists($dir)) return true; 
  if (!is_dir($dir) || is_link($dir)) return unlink($dir); 
  foreach (scandir($dir) as $item) { 
    if ($item == '.' || $item == '..') continue; 
    if (!deleteDirectoryContents($dir . "/" . $item)) { 
      chmod($dir . "/" . $item, 0777); 
      if (!deleteDirectoryContents($dir . "/" . $item)) return false; 
    }; 
  } 
} 


if ($handle = opendir($DIR)) {
  while (false !== ($entry = readdir($handle))) {
    if ($entry == '.' || $entry == '..') { continue; }
    deleteDirectoryContents($DIR . '/' . $entry);
  }
  closedir($handle);
}
?>
