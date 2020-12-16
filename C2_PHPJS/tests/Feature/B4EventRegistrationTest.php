<?php

namespace WorldSkills\Trade17\Tests\Feature;

use WorldSkills\Trade17\Tests\Helper\WriteTest;

class B4EventRegistrationTest extends WriteTest
{
    /**
     * Test a correct event registration
     */
    public function testB4aCorrectRegistration()
    {
        // test registering for two sessions
        $resTwoSessions = $this->http->post('/api/v1/organizers/demo1/events/wsc-2019/registration?token='.$this->getLoginToken(), [
            'json' => [
                'ticket_id' => 1,
                'session_ids' => [9, 11],
            ],
        ]);

        $this->assertStatusCode(200, $resTwoSessions);
        $this->assertResponse([
            'message' => 'Registration successful',
        ], $resTwoSessions);

        // test registering only for event, no sessions
        $resNoSessions = $this->http->post('/api/v1/organizers/demo1/events/react-conf-2018/registration?token='.$this->getLoginToken(), [
            'json' => [
                'ticket_id' => 4,
            ],
        ]);

        $this->assertStatusCode(200, $resNoSessions);
        $this->assertResponse([
            'message' => 'Registration successful',
        ], $resNoSessions);
    }

    /**
     * Test registration if a user is not logged in
     */
    public function testB4aLoggedOut()
    {
        // test with invalid token
        $res = $this->http->post('/api/v1/organizers/demo1/events/wsc-2019/registration?token=iaminvalid', [
            'json' => [
                'ticket_id' => 1,
                'session_ids' => [9, 11],
            ],
        ]);

        $this->assertStatusCode(401, $res);
        $this->assertResponse([
            'message' => 'User not logged in',
        ], $res);
    }

    /**
     * Test registration for a user who is already registered for the same event
     */
    public function testB4aAlreadyRegistered()
    {
        // first register
        $resFirst = $this->http->post('/api/v1/organizers/demo1/events/wsc-2019/registration?token='.$this->getLoginToken(), [
            'json' => [
                'ticket_id' => 1,
                'session_ids' => [9, 11],
            ],
        ]);

        $this->assertStatusCode(200, $resFirst);
        $this->assertResponse([
            'message' => 'Registration successful',
        ], $resFirst);

        // second register for the same event
        $resSecond = $this->http->post('/api/v1/organizers/demo1/events/wsc-2019/registration?token='.$this->getLoginToken(), [
            'json' => [
                'ticket_id' => 1,
                'session_ids' => [9, 11],
            ],
        ]);

        $this->assertStatusCode(401, $resSecond);
        $this->assertResponse([
            'message' => 'User already registered',
        ], $resSecond);

        // register with a different ticket for the same event
        $resDifferentTicket = $this->http->post('/api/v1/organizers/demo1/events/wsc-2019/registration?token='.$this->getLoginToken(), [
            'json' => [
                'ticket_id' => 3,
                'session_ids' => [9, 11],
            ],
        ]);

        $this->assertStatusCode(401, $resDifferentTicket);
        $this->assertResponse([
            'message' => 'User already registered',
        ], $resDifferentTicket);
    }

    /**
     * Test registration with a ticket which is no longer available.
     * All different special validity rules get tested.
     */
    public function testB4aInvalidTicket()
    {
        // test with a date in the past
        $resDateExpired = $this->http->post('/api/v1/organizers/demo1/events/wsc-2019/registration?token='.$this->getLoginToken(), [
            'json' => [
                'ticket_id' => 2,
                'session_ids' => [9, 11],
            ],
        ]);

        $this->assertStatusCode(401, $resDateExpired);
        $this->assertResponse([
            'message' => 'Ticket is no longer available',
        ], $resDateExpired);

        // do registration for last available tickets (ticket id 7 already has 34 of 35)
        $resLastAvailable = $this->http->post('/api/v1/organizers/demo1/events/react-conf-2019/registration?token='.$this->getLoginToken(), [
            'json' => [
                'ticket_id' => 7,
                'session_ids' => [24],
            ],
        ]);

        $this->assertStatusCode(200, $resLastAvailable);
        $this->assertResponse([
            'message' => 'Registration successful',
        ], $resLastAvailable);

        // register for the same event again, should now longer be possible
        $resMaxAmountReached = $this->http->post('/api/v1/organizers/demo1/events/react-conf-2019/registration?token='.$this->getLoginToken('attendee2'), [
            'json' => [
                'ticket_id' => 7,
                'session_ids' => [24],
            ],
        ]);

        $this->assertStatusCode(401, $resMaxAmountReached);
        $this->assertResponse([
            'message' => 'Ticket is no longer available',
        ], $resMaxAmountReached);
    }
}
