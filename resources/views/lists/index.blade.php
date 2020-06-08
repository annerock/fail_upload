<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Einkaufshelfer</title>

    </head>
    <body>

    @foreach ($lists as $list)
        <li>Liste Nr: {{$list->id}}</li>
    @endforeach

    </body>
</html>
