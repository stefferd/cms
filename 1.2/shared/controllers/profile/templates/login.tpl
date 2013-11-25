{* Smarty *}
<form class="form-signin" action="{$SCRIPT_NAME|replace:'index.php':''}profile/login/" method="post">
    <h3 class="form-signin-heading">Inloggen</h3>
    {if $error ne '' }
        {if $error eq 'user_not_found'} De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            {elseif $error eq 'email_invalid'} Vul een geldig emailadres in.
        {/if}
    {/if}
    <div class="img" style="width: 100%; height: 75px; margin-bottom: 30px;">
        <div class="login" style="width: 75px; height: 75px; border: 2px solid #9E9E9E; border-radius: 150px;margin: 0 auto;text-align: center; background-color: #FFF;">
            <span class="icon-user" style="margin-top: 30px;">&nbsp;</span>
        </div>
    </div>
    <input type="text" name="username" placeholder="Gebruikersnaam / E-mailadres" class="input-block-level" style="margin-bottom: 0; border-radius: 5px 5px 0 0; border-bottom: 0; padding: 10px;">
    <input type="password" name="password" placeholder="Wachtwoord" class="input-block-level" style="margin-bottom: 30px; border-radius: 0 0 5px 5px; padding: 10px;">
    <button type="submit" class="btn btn-large btn-primary">Inloggen</button>
</form>