<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
   
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'HTML',
            'description'=>'HTML stands for Hyper Text Markup Language.
            HTML is the standard markup language for Web pages.
            HTML elements are the building blocks of HTML pages.
            HTML elements are represented by <> tags',
            'status'=>'0',
            'created_user_id'=>'1',
            'created_at'=>'2021-06-16 04:27:49'
        ]);
        DB::table('posts')->insert([
            'title' => 'CSS',
            'description'=>'Cascading Style Sheets is a style sheet language used for describing the presentation of a document written in a markup language such as HTML. CSS is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript',
            'status'=>'0',
            'created_user_id'=>'1',
            'created_at'=>'2021-06-16 04:27:49'
        ]);
        DB::table('posts')->insert([
            'title' => 'JS',
            'description'=>'avaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm',
            'status'=>'0',
            'created_user_id'=>'1',
            'created_at'=>'2021-06-16 04:27:49'
        ]);
        DB::table('posts')->insert([
            'title' => 'Bootstrap',
            'description'=>'Bootstrap is a free and open-source CSS framework directed at responsive, mobile-first front-end web development. It contains CSS- and JavaScript-based design templates for typography, forms, buttons, navigation, and other interface components',
            'status'=>'0',
            'created_user_id'=>'1',
            'created_at'=>'2021-06-16 04:27:49'
        ]);
    }
}




