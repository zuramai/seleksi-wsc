<?php

namespace WorldSkills\Trade17\Tests\Helper;

abstract class ReadTest extends BaseTest
{
    protected static $dbReset = [];

    /**
     * For read tests, only reset the database once before the testsuite runs
     */
    public function setUp(): void
    {
        if (!isset(self::$dbReset[get_class($this)])) {
            $this->resetDb();

            self::$dbReset[get_class($this)] = true;
        }
    }
}
