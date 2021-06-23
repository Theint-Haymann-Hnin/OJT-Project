<?php

namespace App\Imports;
use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransactionsImport implements ToModel ,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
            'title'     => $row['title'],
            'description'    => $row['description'],
            'created_user_id'  =>$row['created_user_id'],
        ]);
    }
}
