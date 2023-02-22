<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
// use Request;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PropertyExport implements FromCollection, WithHeadings
{
    

        protected $data;
        /**
    
         * Write code on Method
    
         *
    
         * @return response()
    
         */
    
        public function __construct($data)
    
        {
    
            $this->data = $data;
        }
    
        /**
    
         * Write code on Method
    
         *
    
         * @return response()
    
         */
    
        public function collection()
    
        {
    
            return collect($this->data);
        }
    
        /**
    
         * Write code on Method
    
         *
    
         * @return response()
    
         */
    
        public function headings(): array
    
        {
    
            return [
                'ID' ,
                'Property' ,
                'Item Status' ,
                'Area' ,
                'Phase' ,
                'Street Number',
                'House Number' ,
                'Plot Number',
                'Sector' ,
                'Size',
                'Size Unit' ,
                'Price' ,
                'Orientation',
                'Category' ,
                'Extra Land',
                'Item Condition' ,
                'Agency Name' ,
                'Reference Name' ,
                'Reference Mobile' ,
                'Plot Type' ,
                'Purchase Status' ,
            ];
        }

    }

