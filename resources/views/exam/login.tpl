{extends file="../assets/index_attendee.tpl"}

{block name="content"}
    <div class="login">

        {if !empty($errors) && $errors->any()}
            <div class="alert alert-danger">
                {foreach $errors->all() as $error}
                    <div class="alert alert-danger">{$error}</div>
                {/foreach}
            </div>
        {/if}

        <form action="{Route('examLoginCheck')}" method="post" class="login-form">

            <div class="login-input">
                <label>Benutzer ID</label>
                <input type="text" name="login" placeholder="Benutzer ID" class="form-control">
            </div>
            <div class="login-submit">
                {csrf_field()}
                <button type="submit" value="test" class="btn btn-info btn-full">Anmelden</button>
            </div>

        </form>
    </div>
{/block}