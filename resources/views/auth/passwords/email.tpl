{extends file="assets/index.tpl"}

{block name="content"}
    <div class="">
        <div class="">
            <div class="">
                <div class="">
                    <div class="">Reset Password</div>
                    <div class="">
                        {if (session('status'))}
                            <div class="">
                                {session('status')}
                            </div>
                        {/if}

                        <form class="" role="form" method="POST" action="{url('/password/email')}">
                            {csrf_field()}

                            <div class="{if $errors->has('email')} has-error{else}{/if}">
                                <label class="">E-Mail Address</label>

                                <div class="">
                                    <input class="" type="email" name="email" value="{old('email')}">

                                    {if $errors->has('email')}
                                    <span class="">
                                        <strong>{$errors->first('email')}</strong>
                                    </span>
                                    {/if}
                                </div>
                            </div>

                            <div class="">
                                <div class="">
                                    <button class="" type="submit">
                                        Send Password Reset Link
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{/block}
