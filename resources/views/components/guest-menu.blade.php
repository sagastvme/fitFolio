<div>
    <nav class="crumbs">
        <ul>
            @foreach($routes as $key => $value)
                <li><a href="{{ route($key) }}">{{ $value }}</a></li>
            @endforeach
        </ul>

    </nav>
</div>
