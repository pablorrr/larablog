<h1> User Login</h1>
<!-- only for  sessions testing purposes-->
<form action="user" method="post">
    @csrf
    <input type="text" name="user" placeholder="enter user name"> <br>
    <input type="text" name="password" placeholder="enter the password"> <br>
    <button type="submit">Login</button>
</form>

