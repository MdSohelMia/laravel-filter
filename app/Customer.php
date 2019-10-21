<?php

namespace App;



use App\Support\DataViewer;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use DataViewer;

    protected $allowedFilters=[

        'id',
        'name',
        'email',
        'company',
        'group',
        'total_revenue',
        'created_at',
        //nested
        'invoice.count',
        'invoice.id',
        'invoice.issue_date',
        'invoice.due_date',
        'invoice.created_at'

    ];

    protected $orderAble=[
        'id',
        'name',
        'email',
        'company',
        'group',
        'total_revenue',
        'created_at',
    ];

    public function invoice()
    {
          return $this->hasMany(Customer::class);
    }


}
