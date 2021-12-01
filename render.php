<?php
// Horribly insecure, but whatever
set_time_limit(-1);
foreach ($_GET as $key => $val) {
    $_GET[$key] = strtolower($val);
}

chdir('/home/scott/graphics_project/TailorNet');
exec('/usr/bin/python3.8 run_tailornet.py render');
chdir('../out');
exec('ffmpeg -r 10 -i img_%04d.png -vcodec libx264 -crf 10  -pix_fmt yuv420p render.mp4');

$name = './render.mp4';
$fp = fopen($name, 'rb');

header("Content-Type: video/mp4");
header("Content-Length: " . filesize($name));

fpassthru($fp);
exit;