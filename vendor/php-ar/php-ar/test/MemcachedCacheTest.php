<?php
include 'helpers/config.php';
include_once 'MemcacheCacheTest.php';

use ActiveRecord\Cache;

class MemcachedCacheTest extends MemcacheCacheTest
{
	public function set_up()
	{
		if (!extension_loaded('memcached'))
		{
			$this->markTestSkipped('The memcached extension is not available');
			return;
		}

		$m = new \Memcached();
		$m->addServer('localhost', 11211);
		if (!$m->getVersion()) {
			$this->markTestSkipped('The memcache server is not running');
		}

		Cache::initialize('memcached://localhost');
	}

	public function test_gh147_initialize_with_array()
	{
		Cache::initialize(array(
			'adapter' => 'memcached',
		));
		$this->assert_not_null(Cache::$adapter);
	}

	public function test_gh147_initialize_with_array_many_servers()
	{
		Cache::initialize(array(
			'adapter' => 'memcached',
			'servers' => array(
				array('localhost:11211'),
				array('localhost:11211', 'weight' => 2)
			),
			'options' => array(
				Memcached::OPT_LIBKETAMA_COMPATIBLE => true,
			),
		));
		$this->assert_not_null(Cache::$adapter);
	}
}
?>
