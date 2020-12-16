<?php

namespace WorldSkills\Trade17\Tests\Helper;

use \PDO;
use PHPUnit\Framework\TestCase;
use WorldSkills\Trade17\Tests\Helper\Assert\AssertResponse;
use WorldSkills\Trade17\Tests\Helper\Http\Client;

abstract class BaseTest extends TestCase
{
    use AssertResponse;

    public $db;
    public $http;

    /**
     * Initialize database connection and setup http client
     */
    public function __construct(...$args)
    {
        parent::__construct(...$args);
        $config = Config::get();

        $dsn = 'mysql:host='.$config['db_host'].';dbname='.$config['db_name'];

        try {
            $this->db = new PDO($dsn, $config['db_user'], $config['db_pw'], [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo 'Unable to connect to the database! '.$e->getMessage()."\n";
            echo 'DSN: '.$dsn . ', User: '.$config['db_user'].', Password: '.($config['db_pw'] ? 'yes' : 'no')."\n";
            exit(1);
        }

        $this->http = new Client([
            'base_url' => $config['url'],
            'headers' => ['Accept' => 'application/json'],
            'basic_auth_user' => $config['basic_auth_user'],
            'basic_auth_pw' => $config['basic_auth_pw'],
        ]);
    }

    /**
     * Reset the database with the dump located in data/db-dump.sql
     */
    protected function resetDb()
    {
        $dumpFile = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'db-dump.sql';
        $lines = file($dumpFile);
        $statement = '';

        // parse the dump because PDO can only execute one statement at a time
        foreach ($lines as $line) {
            $trimmedLine = trim($line);
            if ($trimmedLine === '' || substr($trimmedLine, 0, 2) === '--') {
                continue;
            }

            $statement .= $trimmedLine;
            if (substr($trimmedLine, -1) === ';') {
                try {
                    $this->db->exec($statement);
                } catch (\PDOException $e) {
                    echo 'Error during DB reset: '.$e->getMessage()."\n";
                    echo 'Statement: '.$statement."\n";
                    exit(1);
                }
                $statement = '';
            }
        }
    }

    /**
     * Perform a login request
     */
    protected function login($username = 'attendee1')
    {
        return $this->http->post('/api/v1/login', [
            'json' => Config::$USERS[$username],
        ]);
    }

    /**
     * Get the login token.
     * If the login api should not work or is not implemented yet, the default token gets returned.
     */
    protected function getLoginToken($user = 'attendee1')
    {
        $res = $this->login($user);

        if ($res->getStatusCode() === 200 && isset($res->getJson()['token'])) {
            return $res->getJson()['token'];
        }

        return Config::$LOGIN_TOKEN[$user];
    }
}
