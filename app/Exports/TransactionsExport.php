<?php

namespace App\Exports;

use App\Post;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransactionsExport implements FromCollection
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
            'Title',
            'Description',
        ];
    }

    public function map($post): array
    {
        return [
            $post->title,
            $post->description,
        ];
    }
}

