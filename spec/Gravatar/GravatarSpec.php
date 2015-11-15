<?php

namespace spec\Gravatar;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Gravatar\UserGravatarInterface;

class GravatarSpec extends ObjectBehavior
{

    private $baseExpectedUrl = 'http://www.gravatar.com/avatar/2e0d2ef0e7ce0720f2b0b95f20211d66';

    function let(UserGravatarInterface $user)
    {
        $user->getEmailAdres()->willReturn('dionbosschieter@gmail.com');
        $this->beConstructedWith($user);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gravatar\Gravatar');
    }

    function it_should_return_an_avatar_url()
    {
        $this->getAvatarUrl()->shouldReturn($this->baseExpectedUrl . '?s=80');
    }

    function it_should_allow_a_custom_size()
    {
        $this->setSize(150);

        $this->getAvatarUrl()->shouldReturn($this->baseExpectedUrl . '?s=150');
    }

    function it_should_allow_a_custom_placeholder()
    {
        $this->setPlaceholderUrl('http://google.nl/a.jpg');

        $this->getAvatarUrl()->shouldReturn($this->baseExpectedUrl . '?s=80&d=http%3A%2F%2Fgoogle.nl%2Fa.jpg');
    }

    function it_should_allow_a_custom_size_and_a_custom_placeholder()
    {
        $this->setPlaceholderUrl('http://google.nl/a.jpg');
        $this->setSize(150);

        $this->getAvatarUrl()->shouldReturn($this->baseExpectedUrl . '?s=150&d=http%3A%2F%2Fgoogle.nl%2Fa.jpg');
    }

    function it_should_allow_a_extra_size_parameter()
    {
        $this->getAvatarUrlOfSize(40)->shouldReturn($this->baseExpectedUrl . '?s=40');
    }
}
