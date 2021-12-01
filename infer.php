<?php
// Horribly insecure, but whatever
set_time_limit(-1);
chdir('/home/scott/graphics_project/TailorNet');
exec('rm -rf ../out/*');
foreach ($_GET as $key => $val) {
    $_GET[$key] = strtolower($val);
}
$cmd = '/usr/bin/python3.8 run_tailornet.py inference ' . $_GET['gender'] . ' ' . $_GET['garment'] . ' ' . $_GET['style'] . ' ' . $_GET['shape'] . ' ' . $_GET['pose'];
exec($cmd);