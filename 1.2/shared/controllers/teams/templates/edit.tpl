{* Smarty *}
    <div class="form">
    <form action="{$SCRIPT_NAME|replace:'index.php':''}teams/update/{$teams->getId()}/" method="post" enctype="multipart/form-data">
        {if $error ne '' }
            {if $error eq 'user_not_found'} De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            {elseif $error eq 'email_invalid'} Vul een geldig emailadres in.
            {/if}
        {/if}
            <div class="blocks pageform">
                <div class="block settings">
                    <div class="field">
                        <div class="question"><label for="title">Team naam</label></div>
                        <div class="answer"><input id="title" name="title" type="text" value="{$teams->getTitle()|escape}" placeholder="Naam van het team" /></div>
                    </div>
                    <div class="field">
                        <div class="question"><label for="text">Team omschrijving</label></div>
                        <div class="answer"><textarea id="text" name="text" placeholder="Team omschrijving, max 320 karakters">{$teams->getText()}</textarea></div>
                    </div>
                    <div class="field">
                        <div class="question"><label for="picture">Team foto</label></div>
                        {if $teams->getPicture() ne ''}
                            <div class="answer">
                                <img src="{$SCRIPT_NAME|replace:'index.php':''}{$teams->getPicture()}" border="0" title="Teamfoto" />
                                <input type="hidden" name="picture" value="{$teams->getPicture()}" />
                                <input type="hidden" name="picturePresent" value="true" />
                            </div>
                        {else}
                            <div class="answer"><input id="picture" name="picture" type="file" value="" maxlength="160" placeholder="Locatie teamfoto" /></div>
                        {/if}
                    </div>
                    <div class="field">
                        <div class="question"><label for="active">Actief</label></div>
                        {if $teams->getActive() == 1 }
                            <div class="answer"><input id="active" name="active" type="checkbox" checked="checked" /></div>
                        {else}
                            <div class="answer"><input id="active" name="active" type="checkbox" /></div>
                        {/if}
                    </div>
                    <div class="buttons">
                        <input type="submit" value="Opslaan" />
                    </div>
                </div>
            </div>
    </form>
</div>