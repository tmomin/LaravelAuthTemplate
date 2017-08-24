<form action="/logout" method="post">
    {{ csrf_field() }}

    <button class="btn btn-outline-light text-uppercase" type="submit">Logout</button>
</form>