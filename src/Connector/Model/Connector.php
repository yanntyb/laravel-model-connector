<?php

namespace Yanntyb\ModelConnector\Connector\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Yanntyb\ModelConnector\Connector\AbstractModelConnector;
use Yanntyb\ModelConnector\Connector\ModelConnectorInterface;

/**
 * @property string $model
 * @property int $model_id
 */
class Connector extends Model implements ModelConnectorInterface
{

    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        $this->table = config('model-connector.table');
        parent::__construct($attributes);
    }

    /**
     * @return ?Collection<AbstractModelConnector>
     */
    public function getConnectorsAttribute(): ?Collection
    {
        if(!$this->connected_with?->count()) return null;
        return $this->connected_with->map(fn(string $class) => new $class($this));
    }

    /**
     * @return Attribute
     */
    public function connectedWith(): Attribute
    {
        return Attribute::make(
            set: fn(string|array|null $classes) =>  Collection::wrap($classes),
        );
    }

    /**
     * @return Attribute
     */
    public function connectedData(): Attribute
    {
        return Attribute::make(
            set: fn(array|null $datas) => collect($datas)->mapWithKeys(fn($data) => $data),
        );
    }

    public function canBeAccessed(): bool
    {
        // TODO: Implement canBeAccessed() method.
    }
}
