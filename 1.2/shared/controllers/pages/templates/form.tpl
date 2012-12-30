{* Smarty *}
<div class="form">
    <form action="{$SCRIPT_NAME|replace:'index.php':''}pages/save/" method="post">
    {if $error ne '' }
        {if $error eq 'user_not_found'} De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            {elseif $error eq 'email_invalid'} Vul een geldig emailadres in.
        {/if}
    {/if}
        <div class="blocks pageform">
            <div class="block">
                <div class="field">
                    <div class="question"><label for="title">Titel</label></div>
                    <div class="answer"><input id="title" name="title" type="text" value="" placeholder="Titel" /></div>
                </div>
                <div class="field">
                    <div class="question"><label for="parent">Koppelen onder pagina</label></div>
                    <div class="answer">
                        <select name="parent" id="parent">
                            <option value="0">Niet koppelen</option>
                        {foreach $possibleParents as $parent}
                            {strip}
                                <option value="{$parent.id}">{$parent.value}</option>
                            {/strip}
                        {/foreach}
                        </select>
                    </div>
                </div>
                <div class="field">
                    <div class="question"><label for="active">Actief</label></div>
                    <div class="answer"><input id="active" name="active" type="checkbox" checked="checked" /></div>
                </div>
                <div class="field memo">
                    <div class="question"><label for="tinymce">Tekst</label></div>
                    <div class="answer"><textarea id="tinymce" name="text" placeholder="Tekstuele inhoud"><h1>Titel</h1><p>Tekstuele inhoud van de pagina</p></textarea></div>
                </div>
                <div class="buttons">
                    <input type="submit" value="Opslaan" />
                </div>
                <div class="block closed">
                    <div class="header">SEO optimalisatie</div>
                    <div class="field">
                        <div class="question"><label for="metatitle">Meta titel</label></div>
                        <div class="answer"><input id="metatitle" name="metatitle" type="text" value="{$pages->getMetatitle()|escape}" maxlength="160" placeholder="Titel van de pagina voor de zoekmachines, max 160 karakters" /></div>
                    </div>
                    <div class="field">
                        <div class="question"><label for="metadescription">Meta omschrijving</label></div>
                        <div class="answer"><textarea id="metadescription" name="metadescription" placeholder="Omschrijving van de pagina voor de zoekmachines, max 320 karakters">{$pages->getMetadescription()|escape}</textarea></div>
                    </div>
                    <div class="field">
                        <div class="question"><label for="keywords">Trefwoorden (keywords)</label></div>
                        <div class="answer"><textarea id="keywords" name="keywords" placeholder="Zoekwoord suggesties voor de zoekmachines, max 20 suggesties" >{$pages->getKeywords()|escape}</textarea></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>