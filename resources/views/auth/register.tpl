{extends file="assets/index.tpl"}

{block name="content"}
    <!-- resources/views/auth/register.blade.php -->
    <form method="POST" action="/acadevel/public/auth/register">
        {*{!! csrf_field() !!}*}

        <div>
            <label>
                Name
                <input type="text" name="name">
            </label>
        </div>

        <div>
            <label>
                Email
                <input type="email" name="email">
            </label>
        </div>

        <div>
            <label>
                Password
                <input type="password" name="password">
            </label>
        </div>

        <div>
            <label>
                Confirm Password
                <input type="password" name="password_confirmation">
            </label>
        </div>

        <div>
            <button type="submit">Register</button>
        </div>
    </form>
{/block}