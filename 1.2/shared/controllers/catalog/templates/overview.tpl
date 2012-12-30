{* Smarty *}
<h1>Catalogus</h1>
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
    {section name=itemsec loop=$data}
        {assign var=item value=$data[itemsec]}
        <tr onclick="document.location.href='{$SCRIPT_NAME|replace:'index.php':''}catalog/edit/{$item->getId()}/';">
            <td>{$item->getTitle()|escape}</td>
            <td>{if $item->getActive() ne 0}Actief{else}Niet-actief{/if}</td>
            <td>{$item->getCreated()|date_format:"%d-%m-%Y"}</td>
            <td>{$item->getUpdated()|date_format:"%d-%m-%Y"}</td>
            <td><a href="{$SCRIPT_NAME|replace:'index.php':''}catalog/edit/{$item->getId()}/" title="Bewerken" class="btn btn-mini"><i class="icon-edit"></i> Bewerken</a></td>
            <td><a href="{$SCRIPT_NAME|replace:'index.php':''}catalog/delete/{$item->getId()}/" title="Verwijderen" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Verwijderen</a></td>
        </tr>
    {/section}
    </tbody>
</table>
<a href="{$SCRIPT_NAME|replace:'index.php':''}catalog/create/" title="Item toevoegen" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Item toevoegen</a>