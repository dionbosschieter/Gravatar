<?php

use Gravatar\UserGravatarInterface;
use Gravatar\Gravatar;
use Mockery\Mock;

class GravatarTest extends PHPUnit_Framework_TestCase
{


    public function testTrue()
    {
        $user = Mockery::mock('Gravatar\UserGravatarInterface');
        $user->shouldReceive('getEmailAdres')->once()->andReturn('bob@example.com');

        $avatar = new Gravatar($user);
        $placeholder = 'http://example.org/bla.jpg';
        $avatar->setPlacholder('http://example.org/bla.jpg');
        $avatar->setSize(120);

        $this->assertEquals('http://www.gravatar.com/avatar/?s=120&d=' . $placeholder, $avatar->getAvatarUrl());
    }

}