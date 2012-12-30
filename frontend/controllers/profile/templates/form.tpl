{* Smarty *}
<div class="form">
    <form action="{$SCRIPT_NAME|replace:'index.php':''}users/save/" method="post">
        {if $error ne '' }
            {if $error eq 'user_not_found'} De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            {elseif $error eq 'email_invalid'} Vul een geldig emailadres in.
            {/if}
        {/if}
        <div class="field">
            <div class="question"><label for="name">Naam</label></div>
            <div class="answer"><input id="name" name="name" type="text" value="" placeholder="Naam" /></div>
        </div>
        <div class="field">
            <div class="question"><label for="lastname">Achternaam</label></div>
            <div class="answer"><input id="lastname" name="lastname" type="text" value="" placeholder="Achternaam" /></div>
        </div>
        <div class="field">
            <div class="question"><label for="email">E-mailadres</label></div>
            <div class="answer"><input id="email" name="email" type="text" value="" placeholder="E-mailadres" /></div>
        </div>
        <div class="field">
            <div class="question"><label for="password">Password</label></div>
            <div class="answer"><input id="password" name="password" type="password" value="" placeholder="Wachtwoord" /></div>
        </div>
        <div class="field">
            <div class="question"><label>Geboortedatum</label></div>
            <div class="answer">{html_select_date prefix='birthday' start_year='+1'
       end_year='1900'}</div>
        </div>
        <div class="buttons">
            <input type="submit" value="Opslaan" />
        </div>
    </form>
</div>