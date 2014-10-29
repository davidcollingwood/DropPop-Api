<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DropPop Api</title>
    
    {{ HTML::style('assets/vendor.min.css') }}
    {{ HTML::style('assets/app.min.css') }}
</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ URL::route('articles.all') }}">
                        <i class="glyphicon glyphicon-file"></i> Articles
                    </a></li>
                    <li><a href="{{ URL::route('users.all') }}">
                        <i class="glyphicon glyphicon-user"></i> Users
                    </a></li>
                    <li><a href="{{ URL::route('locations.all') }}">
                        <i class="glyphicon glyphicon-map-marker"></i> Locations
                    </a></li>
                    <li><a href="{{ URL::route('bubbles.all') }}">
                        <i class="glyphicon glyphicon-adjust"></i> Bubbles
                    </a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
        @yield('content')
    </div>
    
    {{ HTML::script('assets/vendor.min.js') }}
    {{ HTML::script('assets/app.min.js') }}
    
    @yield('script')
</body>
</html>