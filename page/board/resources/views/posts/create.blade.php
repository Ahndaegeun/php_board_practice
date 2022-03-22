<html>
<head>
    <title>create</title>
</head>
<body>
    <h1>Write</h1>
    <form action="/posts" method="post">
        @csrf
        <div>
            <input type="text" name="title" placeholder="제목">
        </div>
        <div>
            <input type="text" name="description" placeholder="content">
        </div>
        <div>
            <button type="submit">write</button>
        </div>
    </form>
</body>
</html>
