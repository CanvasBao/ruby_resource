<?php

namespace App\Traits;

use Illuminate\Support\Facades\Schema;

trait ControllerTraits
{
    /**
     * get list within params
     *
     * @param $query
     * @param $input
     * @return
     */
    protected function getListWithParams($query, $input)
    {
        if (!empty($input['limit'])) {
            $query = $query->limit($input['limit']);
        }

        if (!empty($input['sort'])) {
            $sort = explode(":", $input['sort']);
            $direction = (isset($sort[1]) && $sort[1] == 'desc') ? 'desc' : 'asc';
            if (Schema::hasColumn($query->getModel()->getTable(), $sort[0])) {
                $query->orderBy($sort[0], $direction);
            }
        }

        if (!empty($input['paginate'])) {
            return $query->paginate($input['paginate']);
        } else {
            return $query->get();
        }
    }
}
