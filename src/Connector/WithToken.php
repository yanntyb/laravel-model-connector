<?php

namespace Yanntyb\ModelConnector\Connector;

use Illuminate\Support\Facades\App;
use JetBrains\PhpStorm\ArrayShape;

class WithToken extends AbstractModelConnector
{

    /**
     * @param string|null $url
     * @return array
     */
    #[ArrayShape(['token' => "string"])]
    public static function getConnectedData(string $url = null): array
    {
        App::make(WithToken::class)->getClientUrl();
        return [
            'token' => $url ?: App::make(WithToken::class)->getTokenFromRequest(),
        ];
    }

    /**
     * @return bool
     */
    public function canBeAccessed(): bool
    {
        return $this->getModelInstance()->connector->connected_data['token'] === $this->getTokenFromRequest();
    }

    /**
     * Url set is incoming request client url
     * @return string|null
     */
    public function getTokenFromRequest(): ?string
    {
        return $this->getRequestValue('token');
    }

    public function fromPostData(): bool
    {
        return false;
    }
}
