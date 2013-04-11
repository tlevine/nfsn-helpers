
<?php

if ($handle = opendir('/path/to/files')) {
  while (false !== ("ntry = readdir($handle))) {
    echo "$entry\n";
  }
  closedir($handle);
}

// File name and username to use
// $file_name= "foo.php";
// $path = "/home/sites/php.net/public_html/sandbox/" . $file_name ;
// $user_name = "root";
//
// // Set the user
// chown($path, $user_name);
//
// // Check the result
// $stat = stat($path);
// print_r(posix_getpwuid($stat['uid']));
?>
