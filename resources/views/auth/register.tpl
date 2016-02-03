{extends file="assets/index.tpl"}

{block name="content"}
    <div class="">
        <div class="">
            <div class="">
                <div class="">
                    <div class="">Register</div>
                    <div class="">
                        <form class="" role="form" method="POST" action="{url('/register')}">
                            {csrf_field()}

                            <div class="{if $errors->has('name')} has-error{else}{/if}">
                                <label class="">Name</label>

                                <div class="">
                                    <input type="text" class="" name="name" value="{old('name')}">

                                    {if $errors->has('name')}
                                        <span class="">
                                        <strong>{$errors->first('name')}</strong>
                                    </span>
                                    {/if}
                                </div>
                            </div>

                            <div class="{if $errors->has('email')} has-error{else}{/if}">
                                <label class="">E-Mail Address</label>

                                <div class="">
                                    <input type="email" class="" name="email" value="{old('email')}">

                                    {if $errors->has('email')}
                                        <span class="">
                                        <strong>{$errors->first('email')}</strong>
                                    </span>
                                    {/if}
                                </div>
                            </div>

                            <div class="{if $errors->has('password')} has-error{else}{/if}">
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

                            <div class="form-group{if $errors->has('password_confirmation')} has-error{else}{/if}">
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
                                        <i class=""></i>Register
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
