{* Smarty *}
{function name=row level=0}
    {$classes = array('main', 'child child_1', 'child child_2', 'child child_3', 'child child_4', 'child child_5')}
    {foreach $data as $news}
        <div class="row instance {cycle values="odd,even"} {$classes[$level]}">
            <div class="column column1">{$news->getTitle()|escape}</div>
            <div class="column column2">{if $news->getActive() ne 0}Actief{else}Niet-actief{/if}</div>
            <div class="column column3">{$news->getCreated()|date_format:"%d-%m-%Y"}</div>
            <div class="column column4">{$news->getUpdated()|date_format:"%d-%m-%Y"}</div>
            <div class="column column5"><a href="{$SCRIPT_NAME|replace:'index.php':''}news/edit/{$news->getId()}/" title="Bewerken">Bewerken</a></div>
            <div class="column column6"><a href="{$SCRIPT_NAME|replace:'index.php':''}news/delete/{$news->getId()}/" title="Verwijderen">Verwijderen</a></div>
        </div>
    {/foreach}
{/function}

<div class="blocks pages">
    <div class="header">
        <h2>Nieuws</h2>
        <span class="action"><a href="{$SCRIPT_NAME|replace:'index.php':''}news/create/" title="Pagina toevoegen">Nieuws toevoegen</a></span>
    </div>
    <div class="block news">
        <div class="row header">
            <div class="column column1">Titel</div>
            <div class="column column2">Actief</div>
            <div class="column column3">Aangemaakt op</div>
            <div class="column column4">Aangepast op</div>
            <div class="column column5">&nbsp;</div>
            <!--<div class="column column6">&nbsp;</div>-->
        </div>
        {call name=row data=$daonews->getEntries() daonews=$daonews}
    </div>
</div>