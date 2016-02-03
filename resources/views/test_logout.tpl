{extends file="assets/index.tpl"}
{*todo: delete after logout is working*}
{block name="content"}
    <h1>here starts the test</h1>
    {if Auth::check()}
        <form class="" role="form" method="GET" action="{url('/logout')}">
            {csrf_field()}

            <button type="submit" class="">
                Logout
            </button>
        </form>
    {/if}
{/block}
