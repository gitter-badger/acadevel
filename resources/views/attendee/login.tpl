{extends file="../assets/index_attendee.tpl"}

{block name="content"}
    <div class="login">

        {if !empty($errors) && $errors->any()}
            <div class="alert alert-danger"  style="padding: 20px 0">
                {foreach $errors->all() as $error}
                    <div class="alert alert-danger">{$error}</div>
                {/foreach}
            </div>
        {/if}

        <form action="{Route('examLoginCheck')}" method="post">

            <div class="login-input">
                <label>Benutzer ID</label>
                <input type="text" name="login" placeholder="Benutzer ID" class="form-control">
            </div>
            <div class="login-submit">
                <button type="submit" class="btn btn-info btn-full">Anmelden</button>
            </div>

        </form>
    </div>
{/block}