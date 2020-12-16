<?php

namespace WorldSkills\Trade17\Tests\Feature;

use WorldSkills\Trade17\Tests\Helper\WriteTest;
use WorldSkills\Trade17\Tests\Helper\Config;

class B3LoginTest extends WriteTest
{
    /**
     * Test login with correct credentials
     */
    public function testB3aCorrectLogin()
    {
        // test attendee 1
        $resAttendee1 = $this->http->post('/api/v1/login', [
            'json' => [
                'lastname' => 'Yakovich',
                'registration_code' => '35DGZX',
            ],
        ]);

        $this->assertStatusCode(200, $resAttendee1);
        $this->assertResponse([
            'firstname' => 'Horacio',
            'lastname' => 'Yakovich',
            'username' => 'attendee1',
            'email' => 'hyakovich0@va.gov',
            'token' => Config::$LOGIN_TOKEN['attendee1'],
        ], $resAttendee1);

        // test attendee 2
        $resAttendee2 = $this->http->post('/api/v1/login', [
            'json' => [
                'lastname' => 'Darthe',
                'registration_code' => 'UP243M',
            ],
        ]);

        $this->assertStatusCode(200, $resAttendee2);
        $this->assertResponse([
            'firstname' => 'Nanon',
            'lastname' => 'Darthe',
            'username' => 'attendee2',
            'email' => 'ndarthe1@list-manage.com',
            'token' => Config::$LOGIN_TOKEN['attendee2'],
        ], $resAttendee2);
    }

    /**
     * Test if login is possible for both users if they have the same lastname
     */
    public function testB3aSameLastname()
    {
        // test first attendee with lastname Penton
        $resAttendee1 = $this->http->post('/api/v1/login', [
            'json' => [
                'lastname' => 'Penton',
                'registration_code' => '9CY9AR',
            ],
        ]);

        $this->assertStatusCode(200, $resAttendee1);
        $this->assertResponse([
            'firstname' => 'Cal',
            'lastname' => 'Penton',
            'username' => 'cpenton6',
            'email' => 'cpenton6@weibo.com',
            'token' => 'a110f35ba8fd08e07de8b275cf186b4f',
        ], $resAttendee1);

        // test second attendee with lastname Penton
        $resAttendee2 = $this->http->post('/api/v1/login', [
            'json' => [
                'lastname' => 'Penton',
                'registration_code' => '7BDK38',
            ],
        ]);

        $this->assertStatusCode(200, $resAttendee2);
        $this->assertResponse([
            'firstname' => 'Corbet',
            'lastname' => 'Penton',
            'username' => 'cleamon7',
            'email' => 'cleamon7@pen.io',
            'token' => '6844cd4abd0e90e287b5f138d02eda67',
        ], $resAttendee2);
    }

    /**
     * Test if login is possible for both users if they have the same registration code
     */
    public function testB3aSameRegistrationCode()
    {
        // test first attendee with registration code 36PQWG
        $resAttendee1 = $this->http->post('/api/v1/login', [
            'json' => [
                'lastname' => 'Arnson',
                'registration_code' => '36PQWG',
            ],
        ]);

        $this->assertStatusCode(200, $resAttendee1);
        $this->assertResponse([
            'firstname' => 'Averil',
            'lastname' => 'Arnson',
            'username' => 'aarnsona',
            'email' => 'aarnsona@princeton.edu',
            'token' => '08ec7801fb781afadd1a9fcccd6d1769',
        ], $resAttendee1);

        // test second attendee with registration code 36PQWG
        $resAttendee2 = $this->http->post('/api/v1/login', [
            'json' => [
                'lastname' => 'Dunk',
                'registration_code' => '36PQWG',
            ],
        ]);

        $this->assertStatusCode(200, $resAttendee2);
        $this->assertResponse([
            'firstname' => 'Albertina',
            'lastname' => 'Dunk',
            'username' => 'adunkb',
            'email' => 'adunkb@ifeng.com',
            'token' => 'a39f449906c73a0f218501d91c3c9ee7',
        ], $resAttendee2);
    }

    /**
     * Test login with a valid registration code but invalid lastname
     */
    public function testB3aInvalidLastname()
    {
        $res = $this->http->post('/api/v1/login', [
            'json' => [
                'lastname' => 'Yakovichwrong',
                'registration_code' => '35DGZX',
            ],
        ]);

        $this->assertStatusCode(401, $res);
        $this->assertResponse([
            'message' => 'Invalid login',
        ], $res);
    }

    /**
     * Test login with a valid lastname but invalid registration code
     */
    public function testB3aInvalidRegistrationCode()
    {
        $res = $this->http->post('/api/v1/login', [
            'json' => [
                'lastname' => 'Yakovich',
                'registration_code' => 'AAAAAA',
            ],
        ]);

        $this->assertStatusCode(401, $res);
        $this->assertResponse([
            'message' => 'Invalid login',
        ], $res);
    }

    /**
     * Test submitting invalid request parameters
     */
    public function testB3aInvalidRequest()
    {
        $res = $this->http->post('/api/v1/login', [
            'json' => [
                'foo' => 'bar',
            ],
        ]);

        $this->assertStatusCode(401, $res);
        $this->assertResponse([
            'message' => 'Invalid login',
        ], $res);
    }
}
