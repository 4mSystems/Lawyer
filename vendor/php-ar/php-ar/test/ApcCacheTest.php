<?php
include 'helpers/config.php';
include_once 'MemcacheCacheTest.php';

use ActiveRecord\Cache;

class ApcCacheTest extends MemcacheCacheTest
{
	public function set_up()
	{
		if (!extension_loaded('apc'))
		{
			$this->markTestSkipped('The apc extension is not available');
			return;
		}

		Cache::initialize('apc://localhost');
	}

	public function test_cache_expire()
	{
		// http://pecl.php.net/bugs/bug.php?id=13331
	}

	public function test_gh147_initialize_with_array()
	{
		Cache::initialize(array(
			'adapter' => 'apc',
		));
		$this->assert_not_null(Cache::$adapter);
		$this->assert_equals('ActiveRecord\\Apc', get_class(Cache::$adapter));
	}

	public function test_gh147_initialize_with_array_many_servers()
	{
		// not options neither many servers here
	}
}
?>