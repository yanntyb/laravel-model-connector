<?php

namespace Yanntyb\LaravelModelConnector\Trait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Gate;
use Yanntyb\LaravelModelConnector\Connector\Model\Connector;


class HasConnectorConstrain extends Model
{

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
