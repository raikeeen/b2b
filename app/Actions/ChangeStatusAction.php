<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class ChangeStatusAction extends AbstractAction
{
    public function getTitle()
    {
        return __('Change Status');
    }

    public function getIcon()
    {
        return 'voyager-double-down';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-warning pull-right',
        ];
    }
    public function massAction($ids, $comingFrom)
    {

    }

    public function getDefaultRoute()
    {
        return route('voyager.'.$this->dataType->slug.'.show', $this->data->{$this->data->getKeyName()});
    }
}
