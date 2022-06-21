<?php

namespace App\Repository;

class CustomerRepository
{
    /**
     * @param $data
     * @param null $filters
     * @return array
     */
    public static function filter($data, $filters = null): array
    {
        $filtered = $data;
        
        foreach($filters as $key => $filter)
        {
            if (count($filter) > 0) {
                $filtered = array_filter($filtered, function($v, $k) use ($key, $filter) {
                    return $v[$key] == $filter;
                }, ARRAY_FILTER_USE_BOTH);
            }
        }

        return $filtered;
    }
}
