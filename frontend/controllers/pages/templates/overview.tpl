{* Smarty *}
{debug}
{function name=row level=0}
    {$classes = array('main', 'child child_1', 'child child_2', 'child child_3', 'child child_4', 'child child_5')}
    {foreach $data as $page}
    <div class="row instance {cycle values="odd,even"} {$classes[$level]}">
        <div class="column column1">{$page->getTitle()|escape}</div>
        <div class="column column2">{if $page->getActive() ne 0}Actief{else}Niet-actief{/if}</div>
        <div class="column column3">{$page->getCreated()|date_format:"%d-%m-%Y"}</div>
        <div class="column column4">{$page->getUpdated()|date_format:"%d-%m-%Y"}</div>
        <div class="column column5"><a href="{$SCRIPT_NAME|replace:'index.php':''}pages/edit/{$page->getId()}/" title="Bewerken">Bewerken</a></div>
        <div class="column column6"><a href="{$SCRIPT_NAME|replace:'index.php':''}pages/delete/{$page->getId()}/" title="Verwijderen">Verwijderen</a></div>
    </div>
        {$children = $daopage->getChildren($page->getId())}
        {assign var=count value=$children|@count}
        {if $count > 0}
            {call name=row data=$children daopage=$daopage level=$level+1}
        {/if}
    {/foreach}
{/function}

<div class="blocks pages">
    <div class="header">
        <h2>Pagina's</h2>
        <span class="action"><a href="{$SCRIPT_NAME|replace:'index.php':''}pages/create/" title="Pagina toevoegen">Pagina toevoegen</a></span>
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
        {call name=row data=$daopage->getMain() daopage=$daopage}
    </div>
</div>