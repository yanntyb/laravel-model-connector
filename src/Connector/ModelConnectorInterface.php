<?php

namespace Yanntyb\ModelConnector\Connector;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Collection;

interface ModelConnectorInterface
{

    public function canBeAccessed(): bool;

    /**
     * @return ?Collection<AbstractModelConnector>
     */
    public function getConnectorsAttribute(): ?Collection;

    /**
     * @return Attribute
     */
    public function connectedWith(): Attribute;

    /**
     * @return Attribute
     */
    public function connectedData(): Attribute;

}
