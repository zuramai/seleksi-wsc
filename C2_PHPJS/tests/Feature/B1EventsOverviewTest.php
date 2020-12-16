<?php

namespace WorldSkills\Trade17\Tests\Feature;

use WorldSkills\Trade17\Tests\Helper\ReadTest;

class B1EventsOverviewTest extends ReadTest
{
    /**
     * Test if all upcoming events get returned correctly
     */
    public function testB1aGetEvents()
    {
        $res = $this->http->get('/api/v1/events');

        $this->assertStatusCode(200, $res);
        $this->assertHeadersContains(['content-type' => 'application/json'], $res);
        $this->assertResponse([
            'events' => [
                [
                    'id' => 1,
                    'name' => 'WorldSkills Conference 2019',
                    'slug' => 'wsc-2019',
                    'date' => '2019-09-23',
                    'organizer' => ['id' => 1, 'name' => 'Organizerdemo1', 'slug' => 'demo1'],
                ],
                [
                    'id' => 5,
                    'name' => 'ng conf',
                    'slug' => 'ng-2019',
                    'date' => '2019-09-30',
                    'organizer' => ['id' => 2, 'name' => 'Organizerdemo2', 'slug' => 'demo2'],
                ],
                [
                    'id' => 3,
                    'name' => 'React Conf 2019',
                    'slug' => 'react-conf-2019',
                    'date' => '2019-10-24',
                    'organizer' => ['id' => 1, 'name' => 'Organizerdemo1', 'slug' => 'demo1'],
                ],
                [
                    'id' => 4,
                    'name' => 'Vuejs Amsterdam',
                    'slug' => 'vuejs-2019',
                    'date' => '2020-02-14',
                    'organizer' => ['id' => 2, 'name' => 'Organizerdemo2', 'slug' => 'demo2'],
                ],
            ],
        ], $res);
    }
}
