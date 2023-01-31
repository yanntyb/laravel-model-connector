<?php

namespace Yanntyb\ModelConnector\Observers;

use Illuminate\Database\Eloquent\Model;
use Yanntyb\ModelConnector\ModelConnector;

class ModelObserver
{
   public function retrieved(Model $model)
   {
       if(!isset())
       $connectorAuthorized = $model->connectors?->filter(fn(ModelConnector $connector) => !$connector->canBeAccessed());
       if($model->need_connector && $connectorAuthorized->count()) {
           abort(403);
       }
   }

}
