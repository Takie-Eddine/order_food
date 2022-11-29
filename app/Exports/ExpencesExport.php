<?php

namespace App\Exports;

use App\Models\Expence_details;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExpencesExport implements FromCollection, WithHeadings , WithMapping
{

    public $started;
    public $endded;

    public function __construct( $started , $endded )
    {
        $this->started = $started;
        $this->endded = $endded;
    }

    public function headings(): array
    {
        return [
            '#',
            'type',
            'price',
            'description',
            'old',
            'total',
            'date',

        ];
    }

    public function map($expense):array{
        return[

            $expense->id,
            $expense->type,
            $expense->price,
            $expense->description,
            $expense->old,
            $expense->total,
            $expense->created_at,
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if ($this->started === $this->endded) {
            return Expence_details::select('id','type','price','description','old','total','created_at')->whereDate('created_at', '=' , $this->started)->get();
        }

        if ($this->started && !$this->endded) {
                return Expence_details::select('id','type','price','description','old','total','created_at')->whereDate('created_at', '>=' , $this->started)->get();
        }

        if (!$this->started && $this->endded) {
            return Expence_details::select('id','type','price','description','old','total','created_at')->whereDate('created_at', '<=' , $this->endded)->get();
        }

        if ($this->started && $this->endded) {
            return Expence_details::select('id','type','price','description','old','total','created_at')->whereDate('created_at', '>=' , $this->started)->whereDate('created_at', '<=' , $this->endded)->get();
        }
        return Expence_details::select('id','type','price','description','old','total','created_at')->get();

    }
}
