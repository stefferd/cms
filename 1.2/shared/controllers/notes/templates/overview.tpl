{* Smarty *}
<h1>Notities</h1>
<table class="table table-hover table-striped table-bordered">
    <thead>
    <tr>
        <th>Id</th>
        <th>Naam</th>
        <th>Email</th>
        <th>Aangemaakt op</th>
        <th>Van</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    {section name=itemsec loop=$data}
        {assign var=item value=$data[itemsec]}
        <tr>
            <td>{$item->getId()}</td>
            <td>{$item->getName()|escape}</td>
            <td>{$item->getEmail()|escape}</td>
            <td>{$item->getCreated()|date_format:"%d-%m-%Y"}</td>
            <td>{ProfileController::getFullname($item->getUser())|escape}</td>
            <td><a href="{$SCRIPT_NAME|replace:'index.php':''}note/edit/{$item->getId()}/" title="Bewerken" class="btn btn-mini"><i class="icon-edit"></i> Bewerken</a></td>
            <td><a href="#" data-delete="{$SCRIPT_NAME|replace:'index.php':''}note/delete/{$item->getId()}/" title="Verwijderen" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Verwijderen</a></td>
        </tr>
    {/section}
    </tbody>
</table>
<script type="text/javascript">
    $('.btn-danger').click(function() {
        var delUrl = $(this).attr('data-delete');
        var deleteMessage = confirm('Weet u zeker dat u dit item wilt verwijderen?');
        if (deleteMessage) {
            document.location.href = delUrl;
        }
    });
</script>