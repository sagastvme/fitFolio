
    <nav>
        <ul>
@foreach($routes as  $route)
            <a href="{{route($route)}}">{{ ucfirst($route)}}</a>
@endforeach
        </ul>
    </nav>
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->

