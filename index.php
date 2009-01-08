<?php

require 'includes/main.inc.php';

$path = array_values(array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))));
array_shift($path);

if (empty($path))
  $path[] = 'index';

print_r($path);
  
$file = sprintf('path/%s.php', preg_replace('[^a-z]', '', $path[0]));
if (file_exists($file))
  require $file;
else
  require 'path/index.php';

require 'includes/output.inc.php'; 
