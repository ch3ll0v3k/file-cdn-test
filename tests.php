<?php

ini_set( 'display_errors', 1 );
error_reporting(E_ALL);

include_once('collector.php');
$Collector = new Collector();

// name === file
// https://cdnjs.cloudflare.com/ajax/libs/bottleneck/2.12.2/bottleneck.min.js

// name !== file
// https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/cerulean/bootstrap.min.css

$Libs = (object)[
	(object)[ 'type'=>'js','name'=>'jquery', 'version'=>'3.3.1', 'min'=>true ],
	(object)[ 'type'=>'js','name'=>'popper', 'version'=>'1.14.7', 'min'=>true ],
	(object)[ 'type'=>'js','name'=>'less', 'version'=>'2.7.2', 'min'=>true ],
	(object)[ 'type'=>'js','name'=>'bootstrap', 'version'=>'4.3.1', 'min'=>true ],
	(object)[ 'type'=>'css','name'=>'bootstrap', 'version'=>'4.3.1', 'min'=>true ],

	// (object)[ 'type'=>'js','name'=>'vue-chartjs', 'version'=>'3.4.2', 'min'=>true ],
	// (object)[ 'type'=>'js','name'=>'ckan', 'version'=>'0.2.3', 'min'=>true ],

];

foreach ($Libs as $Lib) {

	foreach ([true, false] as $min) {
		$res = $Collector->{ $Lib->type }( $Lib->name, $Lib->version, $min /* $Lib->min */ );
		$Collector->console( $res );
	}

}
