{extends file="assets/index.tpl"}

{block name="content"}
    <!-- resources/views/auth/login.blade.php -->

    <form method="POST" action="/acadevel/public/auth/login">
        {*{!! csrf_field() !!}*}

        <div>
            <label>
                Email
                <input type="email" name="email">
            </label>
        </div>

        <div>
            <label for="password">Password</label><input type="password" name="password" id="password">
        </div>

        <div>
            <label>
                <input type="checkbox" name="remember">
                Remember Me
            </label>
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>

{/block}
