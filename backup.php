<?php 

/*
CONFIG DB
*/
define('HOST','localhost');
define('DB','database');
define('USER','userdb');
define('PASS','passworddb');

/*
CONFIG path
*/
set_time_limit(0);

$nfile = 20; //Número total de backups que queremos tener
$ruta = "/tuhome/Dropbox/db/"; //ruta del backup
$dbfile = "db_" . date("Y-m-d_H-i-s") . ".sql"; //nombre archivo
$fullpath = $ruta . $dbfile . ".gz";


$util = new util();

$time_start = microtime(true);


passthru("/usr/bin/mysqldump --opt --host=" . HOST . " --user=" . USER . " --password=" . PASS . " " . DB . " > $ruta$dbfile && gzip $ruta$dbfile");
passthru("rm -f $(ls -1t $ruta*.sql.gz | tail -n +$nfile)"); //conservamos los últimos nfile archivos

$time_end = microtime(true);

//dividing with 60 will give the execution time in minutes other wise seconds
$execution_time = ($time_end - $time_start) / 60;


$existe = file_exists($fullpath) ? "SÍ" : "NO";

$mensaje.= 'Tiempo total de ejecucion:' . $execution_time . PHP_EOL;
$mensaje.='¿Existe el backup?: ' . $existe . PHP_EOL;
if($existe!="NO"){
    $mensaje.='Nombre: ' . $dbfile.".gz" . PHP_EOL;
    $mensaje.='Tamaño: ' . formatSizeUnits(filesize($fullpath)) . PHP_EOL;
}

//https://stackoverflow.com/questions/5501427/php-filesize-mb-kb-conversion
function formatSizeUnits($bytes) {
   if ($bytes >= 1073741824) {
       $bytes = number_format($bytes / 1073741824, 2) . ' GB';
   } elseif ($bytes >= 1048576) {
       $bytes = number_format($bytes / 1048576, 2) . ' MB';
   } elseif ($bytes >= 1024) {
       $bytes = number_format($bytes / 1024, 2) . ' KB';
   } elseif ($bytes > 1) {
       $bytes = $bytes . ' bytes';
   } elseif ($bytes == 1) {
       $bytes = $bytes . ' byte';
   } else {
       $bytes = '0 bytes';
   }
   return $bytes;
}


