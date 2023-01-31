<?php

namespace Yanntyb\ModelConnector\Connector;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Yanntyb\ModelConnector\Connector\Access\AccessFromInterface;

abstract class AbstractModelConnector implements AccessFromInterface
{
    private Model $model;


    public function __construct(Model $model)
    {
        $this->setModelInstance($model);
    }

    public function setModelInstance(Model $model): static
    {
        $this->model = $model;
        return $this;
    }

    public function getModelInstance(): Model
    {
        return $this->model;
    }

    public function canAccess(): bool
    {
        return Gate::allows('access-file',$this->getModelInstance());
    }

    abstract public function fromPostData(): bool;

    public function getRequestValue(mixed $key,bool $post = null): mixed
    {
        if(!is_null($post)){
            $methode = $post ? 'post': 'get';
        }
        else{
            $methode = $this->fromPostData() ? 'post' : 'get';
        }
        return request()->{$methode}($key);
    }

}
