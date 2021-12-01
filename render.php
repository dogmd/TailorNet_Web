<?php
// Horribly insecure, but whatever
set_time_limit(-1);
foreach ($_GET as $key => $val) {
    $_GET[$key] = strtolower($val);
}

chdir('/home/scott/graphics_project/TailorNet');
exec('/usr/bin/python3.8 run_tailornet.py render');