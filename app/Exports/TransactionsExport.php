<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionsExport implements FromCollection ,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Post::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'Title',
            'Description',
            'Created User',
        ];
    }

    public function map($post): array
    {
        return [
            $post->title,
            $post->description,
            $post->user->name ,
        ];
    }
}

