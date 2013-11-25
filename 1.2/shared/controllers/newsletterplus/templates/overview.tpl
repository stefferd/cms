{* Smarty *}
<h1>Nieuwsbrieven</h1>
<form class="form-search" action="{$smarty.const.url}newsletter-plus/search/" method="post">
    <input type="text" class="input-medium search-query">
    <button type="submit" class="btn">Search</button>
</form>
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
        <tr>
            <td>{$newsletter->getTitle()|escape}</td>
            <td>{if $newsletter->getActive() ne 0}Actief{else}Niet-actief{/if}</td>
            <td>{$newsletter->getCreated()|date_format:"%d-%m-%Y"}</td>
            <td>{$newsletter->getUpdated()|date_format:"%d-%m-%Y"}</td>
            <td><a href="{$SCRIPT_NAME|replace:'index.php':''}newsletter-plus/show/{$newsletter->getId()}/" title="Bekijken" class="btn btn-mini"><i class="icon-eye-open"></i> Bekkijken</a></td>
        </tr>
    {/section}
    </tbody>
</table>