{* Smarty *}
<h1>Nieuwsbrieven</h1>
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
    {section name=newsletterec loop=$data}
        {assign var=newsletter value=$data[newsletterec]}
        <tr onclick="document.location.href='{$SCRIPT_NAME|replace:'index.php':''}newsletterplus/edit/{$newsletter->getId()}/';">
            <td>{$newsletter->getTitle()|escape}</td>
            <td>{if $newsletter->getActive() ne 0}Actief{else}Niet-actief{/if}</td>
            <td>{$newsletter->getCreated()|date_format:"%d-%m-%Y"}</td>
            <td>{$newsletter->getUpdated()|date_format:"%d-%m-%Y"}</td>
            <td><a href="{$SCRIPT_NAME|replace:'index.php':''}newsletterplus/edit/{$newsletter->getId()}/" title="Bewerken" class="btn btn-mini"><i class="icon-edit"></i> Bewerken</a></td>
            <td><a href="{$SCRIPT_NAME|replace:'index.php':''}newsletterplus/delete/{$newsletter->getId()}/" title="Verwijderen" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Verwijderen</a></td>
        </tr>
    {/section}
    </tbody>
</table>
<a href="{$SCRIPT_NAME|replace:'index.php':''}newsletterplus/create/" title="Nieuwsbrief toevoegen" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Nieuwsbrief toevoegen</a>