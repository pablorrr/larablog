<div>
    <h1>hey</h1>
    <h3>hey 2 {{$name}} </h3><!-- czytanie zmiennej neame zawartej w welcome.blade linia 437-->
    <h3> Fruits aare: </h3>

    <ul>
        @foreach($fruits as $fruit)
            <li> {{$fruit}} </li>
        @endforeach
    </ul>
</div>
