<form action="/posts" method="post">
    {{ csrf_field() }}
    <input type="text" name="title">
    <button class="btn btn-outline-light text-uppercase" type="submit">Create Post</button>
</form>

<form action="/logout" method="post">
    {{ csrf_field() }}

    <button class="btn btn-outline-light text-uppercase" type="submit">Logout</button>
</form>