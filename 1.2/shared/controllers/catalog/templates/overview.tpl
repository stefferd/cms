{* Smarty *}
<h1>{$smarty.const.catalog_title}</h1>
<div style="margin: 5px;font-size: 11px;">Totaal: <strong><span id="total"></span></strong></div>
<a href="{$SCRIPT_NAME|replace:'index.php':''}catalog/create/" title="Item toevoegen" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Item toevoegen</a>
<table class="table table-hover table-striped table-bordered">
    <thead>
    <tr>
        <th>Images</th>
        <th>Id</th>
        <th>Titel</th>
        <th>Aangemaakt op</th>
        <th>Aangepast op</th>
        <th>&nbsp;</th>
        {if Rights::catalog_note}<th>&nbsp;</th>{/if}
        {if Rights::catalog_newsletter}<th>&nbsp;</th>{/if}
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    {section name=itemsec loop=$data}
        {assign var=item value=$data[itemsec]}
        {if $item->getFreeBooleanOne() == 1}
            {$title = ' title="Wordt getoond op de welkomspagina"'}
            {$style = ' style="background: #347ACE;"'}
        {else}
            {$title = ''}
            {$style = ''}
        {/if}
        <tr{$title}>
            {assign var=picture value=CatalogController::getImage($item->getId())}
            {if $picture != null}
                <td{$style}>
                    {imagesize src=$picture width=50 height=50 crop=true}
                </td>
            {else }
                <td{$style}>&nbsp;</td>
            {/if}
            <td{$style}>{$item->getId()}</td>
            <td{if $item->getFreeFieldOne() != ''} title="{$item->getFreeFieldOne()|escape}"{/if}{$style}>{$item->getTitle()|escape}</td>
            <td{$style}>{$item->getCreated()|date_format:"%d-%m-%Y"}</td>
            <td{$style}>{$item->getUpdated()|date_format:"%d-%m-%Y"}</td>
            <td{$style}><a href="{$SCRIPT_NAME|replace:'index.php':''}catalog/edit/{$item->getId()}/" title="Bewerken" class="btn btn-mini"><i class="icon-edit"></i> Bewerken</a></td>
            {if Rights::catalog_note}<td><a href="{$SCRIPT_NAME|replace:'index.php':''}note/create/{$item->getId()}/" title="Notitie maken" class="btn btn-mini"><i class="icon-edit"></i> Notitie</a></td>{/if}
            {if Rights::catalog_newsletter}<td><a href="{$SCRIPT_NAME|replace:'index.php':''}newsletter-plus/prepare/{$item->getId()}/" title="Verwijderen" class="btn btn-mini"><i class="icon-envelope"></i> Nieuwsbrief</a></td>{/if}
            <td{$style}><a href="#" data-delete="{$SCRIPT_NAME|replace:'index.php':''}catalog/delete/{$item->getId()}/" title="Verwijderen" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Verwijderen</a></td>
        </tr>
    {/section}
    </tbody>
</table>
<a href="{$SCRIPT_NAME|replace:'index.php':''}catalog/create/" title="Item toevoegen" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Item toevoegen</a>
<script type="text/javascript">
    $('.btn-danger').click(function() {
        var delUrl = $(this).attr('data-delete');
        var deleteMessage = confirm('Weet u zeker dat u dit item wilt verwijderen?');
        if (deleteMessage) {
            document.location.href = delUrl;
        }
    });

    $(document).ready(function() {
        var target = $('#total');
        var total = $('table').children('tbody').children('tr').length;
        target.html(total);
    })
</script>