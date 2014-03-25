<?
/*
Upload dirs(folders) list
- - - - - - - - - - - - - - - - - -
  "images" => array(
      "dir"     =>"employees/images",
      "password"=>"images",
  ),
- - - - - - - - - - - - - - - - - -
"images" - just section name (any name you like), it is a key
"name" - the dir(folder) name in select box
"dir" - path to uploaded files
"password" - "dir" password
*/
$upload_dirs = array(
  "images" => array(
      "dir"     =>"employees/images/",
      "name"    =>"Images folder",
      "password"=>"images",
  ),
);

$max_file_size = 500000*1024; //max file upload size (bytes)
?>