<?php


namespace App\Support;


use Illuminate\Support\Str;

class CustomeQueryBuilder
{
    public $query;

    public function __construct($query = null)
    {
        $this->query = $query;
    }

    public function apply($query, $data)
    {


        if (isset($data['f'])) {

            foreach ($data['f'] as $filter) {

                $filter['match'] = isset($data['filter_match']) ? $$data['filter_match'] : 'and';

                $this->makeFilter($query, $filter);
            }
        }
        return $query;

    }

    protected function makeFilter($query, $filter)
    {
        $function = Str::camel($filter['operator']);

        $this->$function($filter, $query);
    }

    public function equalTo($filter, $query)
    {
        return $query->where($filter['column'], '=', $filter['query_1'], $filter['match']);
    }

    public function notEqualTo($filter, $query)
    {
        return $query->where($filter['column'], '<>', $filter['query_1'], $filter['match']);
    }
    public function lessThan($filter, $query)
    {
        return $query->where($filter['column'], '<', $filter['query_1'], $filter['match']);
    }

    public function greaterThan($filter, $query)
    {
        return $query->where($filter['column'], '>', $filter['query_1'], $filter['match']);
    }


    public function between($filter, $query)
    {
        return $query->whereBetween($filter['column'], [
            $filter['query_2'],
            $filter['query_2']
        ], $filter['match']);
    }
    public function notBetween($filter, $query)
    {
        return $query->whereNotBetween($filter['column'], [
            $filter['query_2'],
            $filter['query_2']
        ], $filter['match']);
    }
    public function contains($filter,$query)
    {
        return $query->where($filter['column'], 'like', '%'.$filter['query_1'].'%', $filter['match']);
    }

}
