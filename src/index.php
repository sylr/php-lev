<?php

$start = microtime(true);

if (isset($_GET['php'])) {
   phpinfo();
   exit(0);
}

header("Content-Type: text/plain");

$array = array();
$count = isset($_GET['count']) ? $_GET['count'] : 500;
$max   = isset($_GET['max']) ? $_GET['max'] : 22;

for ($i = 0; $i < $count; $i++) {
   $array[] = md5($i.rand());
}

$count = count($array);
$tests = 0;

for ($i = 0; $i < $count - 1; $i++) {
   for ($j = $i + 1; $j < $count; $j++) {
      $lev = levenshtein($array[$i], $array[$j]);

      if ($lev < $max) {
        echo "${array[$i]} to ${array[$j]} is $lev\n";
      }

      $tests++;
   }
}

$end = microtime(true);

echo "\n";
echo "Tests: ".sprintf("%12s\n", (string) $tests);
echo "Time: ".sprintf("%13ss\n\n", (string) round($end - $start, 4));

?>
