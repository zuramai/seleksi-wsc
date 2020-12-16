<?php

namespace WorldSkills\Trade17\Tests\Feature;

use WorldSkills\Trade17\Tests\Helper\WriteTest;

class B3LogoutTest extends WriteTest
{
    /**
     * Test if logout is possible after a successful login
     */
    public function testB3bLogout()
    {
        // login the user and get the token
        $token = $this->getLoginToken();

        // logout the user
        $res = $this->http->post('/api/v1/logout?token='.$token);
        $this->assertStatusCode(200, $res);
        $this->assertResponse([
            'message' => 'Logout success',
        ], $res);
    }

    /**
     * Test logout with an invalid token
     */
    public function testB3bInvalidToken()
    {
        $res = $this->http->post('/api/v1/logout?token=iaminvalid');
        $this->assertStatusCode(401, $res);
        $this->assertResponse([
            'message' => 'Invalid token',
        ], $res);
    }

    /**
     * Test logout when a user is already logged out
     */
    public function testB3bAlreadyLoggedOut()
    {
        // login the user and get the token
        $token = $this->getLoginToken();

        // logout the user
        $resFirst = $this->http->post('/api/v1/logout?token='.$token);
        $this->assertStatusCode(200, $resFirst);
        $this->assertResponse([
            'message' => 'Logout success',
        ], $resFirst);

        // logout the user again
        $resSecond = $this->http->post('/api/v1/logout?token='.$token);
        $this->assertStatusCode(401, $resSecond);
        $this->assertResponse([
            'message' => 'Invalid token',
        ], $resSecond);
    }
}
