<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoppinglistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $list = new \App\Shoppinglist;

        $list->until = new DateTime("2020-05-01");
        $list->cost = 35.0;

        $creator = App\User::all()->first();
        $list->user_creator()->associate($creator);

        $helper = App\User::all()->find(2);
        $list->user_helper()->associate($helper);

        $list->done = true;

        $list->save();

        $item1 = new \App\Item;
        $item1->description = 'Äpfel';
        $item1->amount = '1 kg';
        $item1->maxPrice = 2.50;

        $item2 = new \App\Item;
        $item2->description = 'Strudelteig';
        $item2->amount = '1 Stück';
        $item2->maxPrice = 1.50;

        $list->items()->saveMany([
            $item1, $item2
        ]);

        $list->save();

        $comment1 = new \App\Comment;
        $comment1->text = 'Danke im Voraus für die Hilfe!';
        $comment1->written_by()->associate($helper);

        $list->comments()->saveMany([
            $comment1
        ]);

        $list->save();


    }
}
