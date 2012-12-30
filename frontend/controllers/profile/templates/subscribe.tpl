{* Smarty *}

<form action="{$SCRIPT_NAME|replace:'index.php':''}profile/subscription/" method="post">
    {if $error ne '' }
        {if $error eq 'user_not_found'} De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
        {elseif $error eq 'email_invalid'} Vul een geldig emailadres in.
        {/if}
    {/if}
    <div class="field double-answer">
        <div class="question"><label for="name">Naam / Achternaam</label></div>
        <div class="answer"><input id="name" name="name" type="text" value="" /></div>
        <div class="answer"><input id="lastname" name="lastname" type="text" value="" /></div>
    </div>
    <div class="field">
        <div class="question"><label for="emailaddress">Emailadres</label></div>
        <div class="answer"><input id="emailaddress" name="emailaddress" type="text" value="" /></div>
    </div>
    <div class="buttons">
        <input type="submit" value="Aanmelden" />
    </div>
</form>