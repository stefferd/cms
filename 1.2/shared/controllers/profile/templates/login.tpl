{* Smarty *}
<form class="form-signin" action="{$SCRIPT_NAME|replace:'index.php':''}profile/login/" method="post">
    <h2 class="form-signin-heading">Inloggen</h2>
    {if $error ne '' }
        {if $error eq 'user_not_found'} De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            {elseif $error eq 'email_invalid'} Vul een geldig emailadres in.
        {/if}
    {/if}
    <input type="text" name="username" placeholder="Gebruikersnaam / E-mailadres" class="input-block-level">
    <input type="password" name="password" placeholder="Wachtwoord" class="input-block-level">
    <button type="submit" class="btn btn-large btn-primary">Inloggen</button>
</form>