{* Smarty *}
<div class="form">
    <form action="{$SCRIPT_NAME|replace:'index.php':''}snippet/save/" method="post">
        {if $error ne '' }
            {if $error eq 'user_not_found'} De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            {elseif $error eq 'email_invalid'} Vul een geldig emailadres in.
            {/if}
        {/if}
        <div class="blocks pageform">
            <div class="block settings">
                <div class="field">
                    <div class="question"><label for="title">Titel</label></div>
                    <div class="answer"><input id="title" name="title" type="text" value="" placeholder="Titel" /></div>
                </div>
                <div class="field">
                    <div class="question"><label for="active">Actief</label></div>
                    <div class="answer"><input id="active" name="active" type="checkbox" checked="checked" /></div>
                </div>
                <div class="buttons">
                    <input type="submit" value="Opslaan" />
                </div>
            </div>
            <div class="block page">
                <div class="field">
                    <div class="answer"><textarea id="tinymce" name="text" placeholder="Tekstuele inhoud"></textarea></div>
                </div>
            </div>
        </div>
    </form>
</div>