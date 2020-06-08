<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//use Illuminate\Routing\Route;
use App\Item;
use App\Shoppinglist;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {

    $lists = DB::table('shoppinglists')->get();
    return view('lists.index', compact('lists'));

});

Route::get('/lists', function () {

    $lists = DB::table('shoppinglists')->get();

    $lists = Shoppinglist::all();

    return view('lists.index', compact('lists'));

});

Route::get('/{id}', function ($id) {

    $list = DB::table('shoppinglists')->find($id);
    //dd($list);
    return view('lists.show', compact('list'));

});
