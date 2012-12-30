{* Smarty *}
<div class="form">
    <form action="{$SCRIPT_NAME|replace:'index.php':''}teams/save/" method="post" enctype="multipart/form-data">
        {if $error ne '' }
            {if $error eq 'user_not_found'} De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            {elseif $error eq 'email_invalid'} Vul een geldig emailadres in.
            {/if}
        {/if}
        <div class="blocks pageform">
            <div class="block settings">
                <div class="field">
                    <div class="question"><label for="title">Team naam</label></div>
                    <div class="answer"><input id="title" name="title" type="text" value="" placeholder="Naam van het team" /></div>
                </div>
                <div class="field">
                    <div class="question"><label for="text">Team omschrijving</label></div>
                    <div class="answer"><textarea id="text" name="text" placeholder="Team omschrijving, max 320 karakters"></textarea></div>
                </div>
                <div class="field">
                    <div class="question"><label for="picture">Team foto</label></div>
                    <div class="answer">
                        <input id="picture" class="droparea thumb" onchange="Default.imagePreview(this, '#preview');" name="picture" type="file" value="" data-width="140" data-canvas="true" placeholder="Locatie teamfoto" />
                        <img id="preview" src="#" alt="Afbeelding preview" />
                    </div>
                </div>
                <div class="field">
                    <div class="question"><label for="active">Actief</label></div>
                    <div class="answer"><input id="active" name="active" type="checkbox" checked="checked" /></div>
                </div>
                <div class="buttons">
                    <input type="submit" value="Opslaan" />
                </div>
            </div>
        </div>
    </form>
</div>
