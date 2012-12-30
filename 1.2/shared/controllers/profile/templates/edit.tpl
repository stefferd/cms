{* Smarty *}
<div class="form">
    <form action="{$SCRIPT_NAME|replace:'index.php':''}users/update/{$profile->getId()}/" method="post">
        {if $error ne '' }
            {if $error eq 'user_not_found'} De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            {elseif $error eq 'email_invalid'} Vul een geldig emailadres in.
            {/if}
        {/if}
        <div class="field">
            <div class="question"><label for="name">Naam</label></div>
            <div class="answer"><input id="name" name="name" type="text" value="{$profile->getName()}" placeholder="Naam" /></div>
        </div>
        <div class="field">
            <div class="question"><label for="lastname">Achternaam</label></div>
            <div class="answer"><input id="lastname" name="lastname" type="text" value="{$profile->getLastname()}" placeholder="Achternaam" /></div>
        </div>
        <div class="field">
            <div class="question"><label for="email">E-mailadres</label></div>
            <div class="answer"><input id="email" name="email" type="text" value="{$profile->getEmailaddress()}" placeholder="E-mailadres" /></div>
        </div>
        <div class="field">
            <div class="question"><label>Geboortedatum</label></div>
            <div class="answer">{$profile->getBirthday()|date_format:"%d-%m-%Y"}</div>
        </div>
        <div class="buttons">
            <input type="submit" value="Opslaan" />
        </div>
    </form>
</div>