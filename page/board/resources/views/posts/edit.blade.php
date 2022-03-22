<html>
<head>
    <title>edit</title>
</head>
<body>
    <h1>modify</h1>
    <form method="post" action="/posts/{{$post->id}}">
        @csrf
        @method('PATCH')
        <div>
            <input type="text" name="title" value="{{$post->title}}">
        </div>
        <div>
            <input type="text" name="description" value="{{$post->description}}">
        </div>
        <div>
            <button type="submit">write</button>
        </div>
    </form>
</body>
</html>
