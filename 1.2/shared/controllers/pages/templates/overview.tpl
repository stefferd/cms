{* Smarty *}
{function name=row level=0}
    {$classes = array('main', 'child child_1', 'child child_2', 'child child_3', 'child child_4', 'child child_5')}
    {foreach $data as $page}
    <tr class="{$classes[$level]}">
        <td>{$page->getTitle()|escape}</td>
        <td>{if $page->getActive() ne 0}Actief{else}Niet-actief{/if}</td>
        <td>{$page->getCreated()|date_format:"%d-%m-%Y"}</td>
        <td>{$page->getUpdated()|date_format:"%d-%m-%Y"}</td>
        <td><a href="{$SCRIPT_NAME|replace:'index.php':''}pages/edit/{$page->getId()}/" title="Bewerken" class="btn btn-mini"><i class="icon-edit"></i> Bewerken</a></td>
        <td><a href="{$SCRIPT_NAME|replace:'index.php':''}pages/delete/{$page->getId()}/" title="Verwijderen" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Verwijderen</a></td>
    </tr>
        {$children = $daopage->getChildren($page->getId())}
        {assign var=count value=$children|@count}
        {if $count > 0}
            {call name=row data=$children daopage=$daopage level=$level+1}
        {/if}
    {/foreach}
{/function}

<h1>Pagina's</h1>
<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>Titel</th>
            <th>Actief</th>
            <th>Aangemaakt op</th>
            <th>Aangepast op</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        {call name=row data=$daopage->getMain() daopage=$daopage}
    </tbody>
</table>
<a href="{$SCRIPT_NAME|replace:'index.php':''}pages/create/" title="Pagina toevoegen" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Pagina toevoegen</a>