<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <title>Document</title>
    </head>
    <body>
        <h1 class="">
            Hello world!
            <form method="post">
                @csrf
                <input type="email" name="email1" id="email" /><button
                    type="submit"
                >
                    submit
                </button>
            </form>

            @isset($email)
            {{ $email }}
            @endisset
        </h1>
    </body>
</html>
