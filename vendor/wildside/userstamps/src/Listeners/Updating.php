<?php

namespace Wildside\Userstamps\Listeners;

class Updating
{
    /**
     * When the model is being updated.
     *
     * @param Illuminate\Database\Eloquent $model
     * @return void
     */
    public function handle($model)
    {
        if (! $model->isUserstamping() || is_null(auth()->id())) {
            return;
        }

        $model->{$model->getUpdatedByColumn()} = auth()->id();
    }
}
