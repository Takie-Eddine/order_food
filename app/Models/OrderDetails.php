<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;


    protected $guarded = [];



    public function scopeFilter(Builder $builder , $filters){

        $builder->when($filters['date_started'] ?? false,function ($builder,$value){
            $builder->whereDate('order_details.created_at','>=', $value);
        });
        $builder->when($filters['date_endded'] ?? false,function ($builder,$value){
            $builder->whereDate('order_details.created_at','<=', $value);
        });
    }


}
