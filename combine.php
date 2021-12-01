<?php
chdir('/home/scott/graphics_project/out');
exec('ffmpeg -r 10 -i img_%04d.png -vcodec libx264 -crf 10  -pix_fmt yuv420p ../TailorNet_web/render.mp4 -y');

$name = '../TailorNet_web/render.mp4';
header("Content-Type: video/mp4");
header("Content-Length: " . filesize($name));
$fp = fopen($name, 'rb');

fpassthru($fp);
exit;