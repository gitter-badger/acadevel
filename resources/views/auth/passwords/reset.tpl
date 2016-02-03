{extends file="assets/index.tpl"}

{block name="content"}
    <div class="">
        <div class="">
            <div class="">
                <div class="">
                    <div class="">Reset Password</div>

                    <div class="">
                        <form class="" role="form" method="POST" action="{url('/password/reset')}">
                            {csrf_field()}

                            <input type="hidden" name="token" value="{$token}">

                            <div class="{if $errors->has('email')} has-error{else}{/if}">
                                <label class="">E-Mail Address</label>

                                <div class="">
                                    <input type="email" class="" name="email" value="{$email or old('email')}">

                                    {if $errors->has('email')}
                                        <span class="">
                                        <strong>{$errors->first('email')}</strong>
                                    </span>
                                    {/if}
                                </div>
                            </div>

                            <div class="">
                                <label class="">Password</label>

                                <div class="">
                                    <input type="password" class="" name="password">

                                    {if $errors->has('password')}
                                        <span class="">
                                        <strong>{$errors->first('password')}</strong>
                                    </span>
                                    {/if}
                                </div>
                            </div>

                            <div class="{if $errors->has('password_confirmation')} has-error{else}{/if}">
                                <label class="">Confirm Password</label>
                                <div class="">
                                    <input type="password" class="" name="password_confirmation">

                                    {if $errors->has('password_confirmation')}
                                        <span class="">
                                        <strong>{$errors->first('password_confirmation')}</strong>
                                    </span>
                                    {/if}
                                </div>
                            </div>

                            <div class="">
                                <div class="">
                                    <button type="submit" class="">
                                        <i class=""></i>Reset Password
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
