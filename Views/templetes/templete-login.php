<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        @@ css @@
        <style>
            div#corpo {
                width: 270px;
                font-size: 13pt;
            }
            table td {
                padding: 6px;
            }
        </style>
        <title>@@ titulo @@</title>
        @@ use Lib\Http\CreateRoute as Route; @@
    </head>
    <body>
        <div id="corpo">
            @@ view @@
        </div>
        @@ rodape @@
    </body>
</html>