{* Smarty *}
    <div class="form">
    <form action="{$SCRIPT_NAME|replace:'index.php':''}newsletter/update/{$newsletter->getId()}/" method="post" enctype="multipart/form-data">
        {if $error ne '' }
            {if $error eq 'user_not_found'} De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            {elseif $error eq 'email_invalid'} Vul een geldig emailadres in.
            {/if}
        {/if}
            <div class="blocks pageform">
                <div class="block settings">
                    <div class="field">
                        <div class="question"><label for="title">Titel</label></div>
                        <div class="answer"><input id="title" name="title" type="text" value="{$newsletter->getTitle()|escape}" placeholder="Nieuwsbrief titel" /></div>
                    </div>
                    <div class="field">
                        <div class="question"><label for="document">Document</label></div>
                        {if $newsletter->getDocument() ne ''}
                            <div class="answer"><a href="{$SCRIPT_NAME|replace:'index.php':''}{$newsletter->getDocument()}" title="Document">{$newsletter->getTitle()}</a></div>
                        {else}
                            <div class="answer"><input id="document" name="document" type="file" placeholder="Document locatie" /></div>
                        {/if}
                    </div>
                    <div class="field">
                        <div class="question"><label for="active">Actief</label></div>
                        {if $newsletter->getActive() == 1 }
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