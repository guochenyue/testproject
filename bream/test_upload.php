<?php

require ("connect.php");
require ("upload_img.php");
$real_img=$uploadfile;
$small_img=$uploadfile_resize;
$insert_sql = "insert into img (real_img,small_img) values (?,?)";
$result = $sqlconn->prepare($insert_sql);
$result->bind_param("ss", $real_img,$small_img);
$result->execute();