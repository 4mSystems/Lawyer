<?php
include 'helpers/config.php';

class MockLogger
{
    public $logs = array();

    public function log($message)
    {
        $this->logs[] = $message;
    }

    public function clear()
    {
        $this->logs = array();
    }
}

class LoggingTest extends SnakeCase_PHPUnit_Framework_TestCase
{
    public $config;
    public $old_logger;
    public $logger;
    public $connection;

    public function set_up()
    {
        $this->config = ActiveRecord\Config::instance();
        $this->old_logger = $this->config->get_logger();
        $this->logger = new MockLogger();
        $this->config->set_logging(true);
        $this->config->set_logger($this->logger);

        $default = $this->config->get_default_connection();
        ActiveRecord\ConnectionManager::drop_connection($default);
        $this->connection = ActiveRecord\ConnectionManager::get_connection($default);
    }

    public function tear_down()
    {
        $this->config->set_logger($this->old_logger);

        $default = $this->config->get_default_connection();
        ActiveRecord\ConnectionManager::drop_connection($default);
        $this->config->get_default_connection();
    }

    public function get_last_log()
    {
        $this->assert_true(count($this->logger->logs) > 0);
        return $this->logger->logs[count($this->logger->logs) - 1];
    }

    public function assert_log_has_sql($sql)
    {
        $log = $this->get_last_log();
        $query = $log['query'];
        return $this->assert_equals($sql, $query);
    }

    public function assert_log_has_values()
    {
        $log = $this->get_last_log();
        $this->assert_true( FALSE !== preg_match('/\((.*)\)/', $log['data'], $matches));
        return $matches[1];
    }

    public function assert_log_has_time()
    {
        $log = $this->get_last_log();
        $this->assert_true(!empty( $log['time']) AND is_float($log['time']) );
        return $log['time'];
    }

    public function test_query()
    {
        $sql = 'SELECT * FROM authors LIMIT 1;';
        $this->connection->query($sql);
        $this->assert_log_has_sql($sql);
        $this->assert_log_has_time();
    }

    public function test_query_with_data()
    {
        $sql = 'SELECT * FROM authors WHERE author_id IN (?,?,?) LIMIT 1;';
        $values = array(1, 2, 3);
        $this->connection->query($sql, $values);

        $this->assert_log_has_sql($sql);

        $values = $this->assert_log_has_values();
        $this->assert_equals('1,2,3', $values);

        $this->assert_log_has_time();
    }

    public function test_query_long_query()
    {
        $sql = 'SELECT SLEEP(?);';
        $values = array(1); // not that long
        $this->connection->query($sql, $values);

        $this->assert_log_has_sql($sql);

        $values = $this->assert_log_has_values();
        $this->assert_equals('1', $values);

        $time = $this->assert_log_has_time();
        $this->assert_equals(1, intval(round($time)));
    }

    public function test_query_with_null()
    {
        $sql = 'SELECT * FROM authors WHERE author_id IS ?;';
        $values = array(null);
        $this->connection->query($sql, $values);

        $this->assert_log_has_sql($sql);

        $values = $this->assert_log_has_values();
        $this->assert_equals('NULL', $values);

        $this->assert_log_has_time();
    }

    public function test_query_with_string()
    {
        $sql = 'SELECT UPPER(?);';
        $values = array("It's about time (bro)!");
        $this->connection->query($sql, $values);

        $this->assert_log_has_sql($sql);

        $values = $this->assert_log_has_values();
        $this->assert_equals("'It\\'s about time (bro)!'", $values);

        $this->assert_log_has_time();
    }
}
?>