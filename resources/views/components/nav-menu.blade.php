<div>
@auth()
    {{$test}}
    @endauth
    @guest()
@foreach($routes as $key => $route)
            <a href="{{route($key)}}">{{$route}}</a>
@endforeach
    @endguest
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
</div>
