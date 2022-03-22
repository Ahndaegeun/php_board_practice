<html>
<head>
    <title>detail</title>
</head>
<body>
    <h1>detail</h1>
    <h2>{{$post->title}}</h2>
    <p>{{$post->description}}</p>

    <form action="/posts/{{$post->id}}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit">del</button>
    </form>
</body>
</html>
