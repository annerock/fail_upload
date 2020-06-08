<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Einkaufshelfer</title>

    </head>
    <body>
        <h1>Hello World!</h1>

        <ul>
            @foreach ($shoppinglists as $list)
                <li>Liste Nr: {{$list->id}}</li>
            @endforeach
        </ul>
    </body>
</html>
