<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Webaccess</title>

    </head>
    <body>
        <div>
			<ul>
				<li><a href="{{ route('users') }}">Show Users</a></li>
				<li><a href="{{ route('aliases') }}">Show Aliases</a></li>
				<li><a href="{{ route('logout') }}">Logout</a></li>
			</ul>
        </div>
        <div>
			@yield('content')
        </div>
    </body>
</html>

