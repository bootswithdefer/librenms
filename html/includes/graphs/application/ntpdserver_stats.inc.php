<?php

include("includes/graphs/common.inc.php");

$colours      = "mixed";
$nototal      = (($width<224) ? 1 : 0);
$unit_text    = "Milliseconds";
$rrd_filename = $config['rrd_dir'] . "/" . $device['hostname'] . "/app-ntpdserver-".$app['app_id'].".rrd";
$array        = array(
                      'offset' => array('descr' => 'Offset'),
                      'jitter' => array('descr' => 'Jitter'),
                      'noise' => array('descr' => 'Noise'),
                      'stability' => array('descr' => 'Stability')
                     );

$i             = 0;

if (is_file($rrd_filename))
{
  foreach ($array as $ds => $vars)
  {
    $rrd_list[$i]['filename']        = $rrd_filename;
    $rrd_list[$i]['descr']        = $vars['descr'];
    $rrd_list[$i]['ds']                = $ds;
    $rrd_list[$i]['colour']        = $config['graph_colours'][$colours][$i];
    $i++;
  }
} else {
  echo("file missing: $file");
}

include("includes/graphs/generic_multi_line.inc.php");

?>
