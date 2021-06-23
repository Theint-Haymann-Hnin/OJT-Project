<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransactionsExport implements FromCollection,ShouldAutoSize , WithHeadings, WithMapping
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

