<?php

namespace Gravatar;

class Gravatar implements AvatarInterface
{

    /**
     * User model
     *
     * @var User
     */
    private $user;

    /**
     * Size of thumbnail
     *
     * @var int
     */
    private $size = 80;

    /**
     * Default thumbnail
     * @var string
     */
    private $placeholder;

    public function __construct(UserGravatarInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Set the default avater if avatar was not found
     *
     * @param  string $url
     * @return void
     */
    public function setPlacholder($url)
    {
        $this->placeholder = $url;
    }

    /**
     * Set the size in px
     *
     * @param  int $sizeInPx
     * @return void
     */
    public function setSize($sizeInPx)
    {
        $this->size = $sizeInPx;
    }

    /**
     * Image path of avatar
     * @return string
     */
    public function getAvatarUrl()
    {
        return $this->getGravatarUrl($this->user->getEmailAdres());
    }

    /**
     * Get the full gravatar Url with query strings attached
     *
     * @param  string $email
     * @return string
     */
    private function getGravatarUrl($email)
    {
        $baseUrl = "http://www.gravatar.com/avatar/";
        $queryString = "s={$this->size}&d={$this->placeholder}";

        return "$baseUrl?$queryString";
    }

}