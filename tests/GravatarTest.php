<?php

use Gravatar\UserGravatarInterface;
use Gravatar\Gravatar;
use Mockery\Mock;

class GravatarTest extends PHPUnit_Framework_TestCase
{

    private function getGravatarInstance()
    {
        $user = Mockery::mock('Gravatar\UserGravatarInterface');
        $user->shouldReceive('getEmailAdres')->once()->andReturn('bob@example.com');

        return new Gravatar($user);
    }

    public function testThatGravatarUrlIsValid()
    {
        $avatar = $this->getGravatarInstance();
        $avatar->setSize(120);

        $this->assertEquals('http://www.gravatar.com/avatar/4b9bb80620f03eb3719e0a061c14283d?s=120', $avatar->getAvatarUrl());
    }

    public function testThatPlaceholderIsAvailable()
    {
        $avatar = $this->getGravatarInstance();
        $placeholder = 'http://example.org/bla.jpg';
        $avatar->setPlaceholderUrl('http://example.org/bla.jpg');

        $this->assertEquals('http://www.gravatar.com/avatar/4b9bb80620f03eb3719e0a061c14283d?s=80&d=' . urlencode($placeholder), $avatar->getAvatarUrl());
    }

}