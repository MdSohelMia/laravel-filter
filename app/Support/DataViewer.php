<?php

namespace App\Support;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

trait DataViewer
{
    public function scopeAdvanceFilter($query)

    {
        return $this->process($query, request()->all())
            ->orderBy(
                request('order_column', 'created_at'),
                request('order_direction', 'desc')
            )->paginate(request('limit', '10'));
    }

    protected function process($query, $data)
    {

//        dd($this->whiteListColumn());
        $validator = Validator::make($data, [
            'order_column' => 'sometimes|required|in:' . $this->oderAbleColumn(),
            'order_direction' => 'sometimes|required|in:asc,desc',

            'limit'  => 'sometimes|required|integer|min:1',
            //advance filter


            'filter_match' => 'sometimes|required|in:and,or',
            'f' => 'sometimes|required|array',
            'f.*.column' => 'required|in:'.$this->whiteListColumn(),
            'f.*.operator' => 'required_with:f.*.column|in:'.$this->allowedOperator(),
            'f.*.query_1' => 'required',
            'f.*.query_2' => 'required-if:f.*.operator,between,no_between',

        ]);

        if($validator->fails())
        {
            return dd($validator->messages()->all());
           // throw  new ValidationException($validator);
        }
        return (new CustomeQueryBuilder)->apply($query,$data);
    }

    protected function whiteListColumn()
    {

        return implode(',', $this->allowedFilters);
    }

    protected function oderAbleColumn()
    {

        return implode(',', $this->orderAble);
    }

    protected function allowedOperator()
    {
        return implode(',', [
            'equal_to',
            'not_equal_to',
            'less_than',
            'greater_than',
            'between',
            'not_between',
            'contains',
            'starts_with',
            'ends_with',
            'in_the_past',
            'in_the_nex',
            'in_the_period',
            'less_than_count',
            'greater_than_count',
            'equal_than_count',
            'not_equal_than_count'
        ]);
    }

}
