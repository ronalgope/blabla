<?php

use Cake\Core\Configure;
use Cake\Database\Type;
use Cake\Log\Log;

$className = Configure::read('Log.defaultClassName') ?: 'Cake\Log\Engine\FileLog';
if (!Log::config('geo')) {
	Log::config('geo', [
		'className' => $className,
		'path' => LOGS,
		'levels' => ['debug'],
		'scopes' => ['geocode'],
		'file' => 'geocode',
	]);
}

Type::map('object', 'Geo\Database\Type\ObjectType');
