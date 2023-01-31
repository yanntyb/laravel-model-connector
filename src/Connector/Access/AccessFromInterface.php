<?php

namespace Yanntyb\ModelConnector\Connector\Access;

interface AccessFromInterface
{
    public function canBeAccessed(): bool;

    public function fromPostData(): bool;

    /**
     * @param mixed $key
     * @param bool $post
     * @return mixed $values
     */
    public function getRequestValue(mixed $key, bool $post): mixed;
}
