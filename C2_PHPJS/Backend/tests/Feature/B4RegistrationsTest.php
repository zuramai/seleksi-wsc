<?php

namespace WorldSkills\Trade17\Tests\Feature;

use WorldSkills\Trade17\Tests\Helper\ReadTest;

class B4RegistrationsTest extends ReadTest
{
    /**
     * Test getting registrations of a loggedin user
     */
    public function testB4bGetRegistrations()
    {
        // login and try again, should be accessible now
        $res = $this->http->get('/api/v1/registrations?token='.$this->getLoginToken('attendee2'));

        $this->assertStatusCode(200, $res);
        $this->assertHeadersContains(['content-type' => 'application/json'], $res);
        $this->assertResponse([
            'registrations' => [
                [
                    'event' => [
                        'id' => 1,
                        'name' => 'WorldSkills Conference 2019',
                        'slug' => 'wsc-2019',
                        'date' => '2019-09-23',
                        'organizer' => [
                            'id' => 1,
                            'name' => 'Organizerdemo1',
                            'slug' => 'demo1',
                        ],
                    ],
                    'session_ids' => [6, 11],
                ],
                [
                    'event' => [
                        'id' => 5,
                        'name' => 'ng conf',
                        'slug' => 'ng-2019',
                        'date' => '2019-09-30',
                        'organizer' => [
                            'id' => 2,
                            'name' => 'Organizerdemo2',
                            'slug' => 'demo2',
                        ],
                    ],
                    'session_ids' => [42],
                ],
            ],
        ], $res);
    }

    /**
     * Test if a new registration gets returned too
     */
    public function testB4bNewRegistration()
    {
        // test count before registration
        $resBefore = $this->http->get('/api/v1/registrations?token='.$this->getLoginToken('attendee2'));
        $this->assertResponseItemCount(2, $resBefore, 'registrations');

        // register
        $resRegister = $this->http->post('/api/v1/organizers/demo1/events/react-conf-2019/registration?token='.$this->getLoginToken('attendee2'), [
            'json' => [
                'ticket_id' => 6,
                'session_ids' => [24],
            ],
        ]);
        $this->assertStatusCode(200, $resRegister);

        // test count after registration
        $resAfter = $this->http->get('/api/v1/registrations?token='.$this->getLoginToken('attendee2'));
        $this->assertResponseItemCount(3, $resAfter, 'registrations');
        $this->assertResponse([
            'registrations' => [
                [
                    'event' => [
                        'id' => 1,
                        'name' => 'WorldSkills Conference 2019',
                        'slug' => 'wsc-2019',
                        'date' => '2019-09-23',
                        'organizer' => [
                            'id' => 1,
                            'name' => 'Organizerdemo1',
                            'slug' => 'demo1',
                        ],
                    ],
                    'session_ids' => [6, 11],
                ],
                [
                    'event' => [
                        'id' => 5,
                        'name' => 'ng conf',
                        'slug' => 'ng-2019',
                        'date' => '2019-09-30',
                        'organizer' => [
                            'id' => 2,
                            'name' => 'Organizerdemo2',
                            'slug' => 'demo2',
                        ],
                    ],
                    'session_ids' => [42],
                ],
                [
                    'event' => [
                        'id' => 3,
                        'name' => 'React Conf 2019',
                        'slug' => 'react-conf-2019',
                        'date' => '2019-10-24',
                        'organizer' => [
                            'id' => 1,
                            'name' => 'Organizerdemo1',
                            'slug' => 'demo1',
                        ],
                    ],
                    'session_ids' => [24],
                ],
            ],
        ], $resAfter);
    }

    /**
     * Test registrations with a loggedout user
     */
    public function testB4bLoggedOut()
    {
        // test with invalid token
        $resInvalid = $this->http->get('/api/v1/registrations?token=iaminvalid');
        $this->assertStatusCode(401, $resInvalid);
        $this->assertResponse([
            'message' => 'User not logged in',
        ], $resInvalid);

        // test without any token
        $resMissing = $this->http->get('/api/v1/registrations');
        $this->assertStatusCode(401, $resMissing);
        $this->assertResponse([
            'message' => 'User not logged in',
        ], $resMissing);
    }
}
