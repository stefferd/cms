{* Smarty *}
{foreach from=$pages item=page}
    <div class="row instance {cycle values="odd,even"}">
        <div class="column column1">{$page->getTitle()|escape}</div>
        <div class="column column2">{if $page->getActive() ne 0}Actief{else}Niet-actief{/if}</div>
        <div class="column column3">{$page->getCreated()|date_format:"%d-%m-%Y"}</div>
        <div class="column column4">{$page->getUpdated()|date_format:"%d-%m-%Y"}</div>
        <div class="column column5"><a href="{$SCRIPT_NAME|replace:'index.php':''}pages/edit/{$page->getId()}/" title="Bewerken">Bewerken</a></div>
        <div class="column column6"><a href="{$SCRIPT_NAME|replace:'index.php':''}pages/delete/{$page->getId()}/" title="Verwijderen">Verwijderen</a></div>
    </div>
{/foreach}