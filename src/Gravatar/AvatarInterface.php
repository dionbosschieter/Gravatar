<?php

namespace Gravatar;

interface AvatarInterface
{

    /**
     * Set the default avater if avatar was not found
     *
     * @param  string $url
     * @return void
     */
    public function setPlaceholderUrl($url);

    /**
     * Set the size in px
     *
     * @param  int $sizeInPx
     * @return void
     */
    public function setSize($sizeInPx);

    /**
     * Image path of avatar
     * @return string
     */
    public function getAvatarUrl();

}