Click here to reset your password: <a href="{$link = url('/password/reset', $token) + '?email=' + $user->getEmailForPasswordReset()|urlencode}">{$link}</a>
