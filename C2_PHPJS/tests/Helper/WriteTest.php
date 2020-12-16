<?php

namespace WorldSkills\Trade17\Tests\Helper;

abstract class WriteTest extends BaseTest
{
    /**
     * For write tests, reset the database before every test
     */
    public function setUp(): void
    {
        $this->resetDb();
    }
}
