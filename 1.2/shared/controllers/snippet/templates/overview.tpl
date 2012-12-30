{* Smarty *}
<div class="blocks snippets">
    <div class="header">
        <h2>Snippets</h2>
        <span class="action"><a href="{$SCRIPT_NAME|replace:'index.php':''}snippet/create/" title="Pagina toevoegen">Snippet toevoegen</a></span>
    </div>
    <div class="block pages">
        <div class="row header">
            <div class="column column1">Titel</div>
            <div class="column column2">Actief</div>
            <div class="column column3">Aangemaakt op</div>
            <div class="column column4">Aangepast op</div>
            <div class="column column5">&nbsp;</div>
            <!--<div class="column column6">&nbsp;</div>-->
        </div>
    {section name=snippetsec loop=$data}
        {assign var=snippet value=$data[snippetsec]}
        <div class="row instance">
            <div class="column column1">{$snippet->getTitle()|escape}</div>
            <div class="column column2">{if $snippet->getActive() ne 0}Actief{else}Niet-actief{/if}</div>
            <div class="column column3">{$snippet->getCreated()|date_format:"%d-%m-%Y"}</div>
            <div class="column column4">{$snippet->getUpdated()|date_format:"%d-%m-%Y"}</div>
            <div class="column column5"><a href="{$SCRIPT_NAME|replace:'index.php':''}snippet/edit/{$snippet->getId()}/" title="Bewerken">Bewerken</a></div>
            <!--<div class="column column6"><a href="{$SCRIPT_NAME|replace:'index.php':''}snippet/delete/{$snippet->getId()}/" title="Verwijderen">Verwijderen</a></div>-->
        </div>
    {/section}
    </div>
</div>