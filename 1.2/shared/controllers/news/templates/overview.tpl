{* Smarty *}
{function name=row level=0}
    {foreach $data as $news}
        <tr>
            <td>{$news->getTitle()|escape}</td>
            <td>{if $news->getActive() ne 0}Actief{else}Niet-actief{/if}</td>
            <td>{$news->getCreated()|date_format:"%d-%m-%Y"}</td>
            <td>{$news->getUpdated()|date_format:"%d-%m-%Y"}</td>
            <td><a href="{$SCRIPT_NAME|replace:'index.php':''}news/edit/{$news->getId()}/" title="Bewerken" class="btn btn-mini"><i class="icon-edit"></i> Bewerken</a></td>
            <td><a href="{$SCRIPT_NAME|replace:'index.php':''}news/delete/{$news->getId()}/" title="Verwijderen" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Verwijderen</a></td>
        </tr>
    {/foreach}
{/function}

<h1>Nieuws</h1>
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
        {call name=row data=$daonews->getEntries() daonews=$daonews}
    </tbody>
</table>
<a href="{$SCRIPT_NAME|replace:'index.php':''}news/create/" title="Pagina toevoegen" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Nieuws toevoegen</a>