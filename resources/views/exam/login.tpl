<form action="{Route('examLoginCheck')}" method="post">
    {csrf_field()}
    <input type="text" name="login" />
    <input type="submit" />

</form>
