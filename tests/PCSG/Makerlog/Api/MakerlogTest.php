<?php

namespace Tests\PCSG\Makerlog\Api;

use PCSG\Makerlog\Makerlog;
use PHPUnit\Framework\TestCase;

/**
 * Notifications Tests
 */
class MakerlogTest extends TestCase
{
    public function testGetOptions()
    {
        $this->assertIsArray(
            \MakerLogTest::getMakerlog()->getOptions()
        );
    }

    public function testGetOption()
    {
        $this->assertIsString(
            \MakerLogTest::getMakerlog()->getOption('client_id')
        );
    }

    public function testGetRequestApiPoint()
    {
        $Default = \MakerLogTest::getMakerlog();

        $Makerlog = new Makerlog([
            'client_id'     => $Default->getOption('client_id'),
            'client_secret' => $Default->getOption('client_secret'),
            'access_token'  => $Default->getOption('access_token'),
            'api_endpoint'  => 'https://api.getmakerlog.com'
        ]);

        $DeHenne = $Makerlog->getUsers()->getByUsername('dehenne');

        $this->assertIsString($DeHenne->username);
    }
}