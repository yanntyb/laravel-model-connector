<?php

namespace Yanntyb\ModelConnector\Trait;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Gate;
use Yanntyb\ModelConnector\Connector\Model\Connector;

trait HasConnectorConstrain
{

    /**
     * Mean to be used in Model classes
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function canBeAccessed(): bool
    {
        return Gate::allows('access-model-connector',$this);
    }


    /**
     * @return HasMany
     */
    public function connector(): HasMany
    {
        return $this->hasMany(Connector::class,'model_id',$this->primaryKey);
    }
}
