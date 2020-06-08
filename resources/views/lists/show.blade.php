<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Einkaufshelfer</title>

    </head>
    <body>

    <h1>Liste Nr. {{$list->id}}</h1>
    <p>Bis: {{$list->until}}</p>

    <p>Tatsächliche Kosten: {{$list->cost}}</p>




    </body>
</html>
