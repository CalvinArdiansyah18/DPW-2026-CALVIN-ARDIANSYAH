<?php

echo "<pre>";
echo "PDO Drivers:\n";
print_r(PDO::getAvailableDrivers());

echo "\n\nLoaded Extensions:\n";
print_r(get_loaded_extensions());
echo "</pre>";