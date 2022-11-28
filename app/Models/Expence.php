<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expence extends Model
{
    use HasFactory;


    protected $guarded = [];


    public function scopeFilter(Builder $builder , $filters){

        $builder->when($filters['date_started'] ?? false,function ($builder,$value){
            $builder->whereDate('expences.created_at','>=', $value);
        });
        $builder->when($filters['date_endded'] ?? false,function ($builder,$value){
            $builder->whereDate('expences.created_at','<=', $value);
        });
    }





}
