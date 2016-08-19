<?php

namespace App\Shell;

use Cake\Console\ConsoleOptionParser;
use Cake\Console\Shell;
use Cake\Log\Log;
use Psy\Shell as PsyShell;
use Cake\ORM\TableRegistry;
use Cake\Database\Type;

/**
 * Simple console wrapper around Psy\Shell.
 */
class TestShell extends Shell{

	public function main(){
	
		$t = TableRegistry::get('Posts');
		$e = $t->newEntity();
		$e->id = 10;
		$e->title = 'test';
		$e->image = 'test';
		$e->timestamp = 12341234;
				
		$t->save($e);
		
		$newTag = TableRegistry::get('Tags')->newEntity();
		$newTag->name = 'test';
		
		//$newTag = TableRegistry::get('Tags')->save($newTag);
		
	}

}

?>