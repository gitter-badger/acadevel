{extends file="assets/index.tpl"}

{block name="content"}
    <div class="">
        <div class="">
            <div class="">
                <div class="">
                    <div class="">Login</div>
                    <div class="">
                        <form class="" role="form" method="POST" action="{url('/backend/login')}">
                            {csrf_field()}

                            <div class="{if $errors->has('email')} has-error{else}{/if}">
                                <label>E-Mail Address</label>

                                <div class="">
                                    <input type="email" name="email" value="{old('email')}">

                                    {if $errors->has('email')}
                                        <span class="">
                                        <strong>{$errors->first('email')}</strong>
                                    </span>
                                    {/if}
                                </div>
                            </div>

                            <div class="{if $errors->has('email')} has-error{else}{/if}">
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

                            <div class="">
                                <div class="">
                                    <div class="">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <div class="">
                                    <button type="submit" class="">
                                        <i class=""></i>Login
                                    </button>

                                    <a class="" href="{url('/password/reset')}">Forgot Your Password?</a>
                                </div>
                            </div>
                        </form>

                        <a href="{url('/register')}">
                            Register
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
{/block}
