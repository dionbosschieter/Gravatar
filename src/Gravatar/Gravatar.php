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
    public function setPlaceholderUrl($url)
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
        $baseUrl = 'http://www.gravatar.com/avatar/' . md5($email);

        $queryData = ['s' => $this->size, 'd' => $this->placeholder];
        $queryData = array_filter($queryData);
        $queryString = http_build_query($queryData);

        return "$baseUrl?$queryString";
    }

}