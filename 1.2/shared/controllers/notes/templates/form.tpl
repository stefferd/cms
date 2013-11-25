<!-- The form for the car catalog type -->
{if $item->getId() ne ''}
    <form action="{$SCRIPT_NAME|replace:'index.php':''}note/update/{$item->getId()}/" method="post" enctype="multipart/form-data">
{else}
    <form action="{$SCRIPT_NAME|replace:'index.php':''}note/save/" method="post" enctype="multipart/form-data">
{/if}
    <fieldset>
        <legend>Notitie toevoegen</legend>
        <div class="controls controls-row">
            <div class="control-group span10">
                <label class="control-label" for="name">Naam</label>
                <div class="controls">
                    <input type="text" id="name" name="name" placeholder="Naam" class="span10" value="{$item->getName()|escape}" />
                </div>
            </div>
            <div class="control-group span1">
                <label class="control-label" for="active">Actief</label>
                <div class="controls">
                    <input id="active" name="active" type="checkbox" checked="checked" />
                </div>
            </div>
        </div>
        <div class="controls controls-row">
            <div class="control-group span5">
                <label class="control-label" for="email">Email</label>
                <div class="controls">
                    <input type="text" id="email" name="email" placeholder="Email" class="input-xlarge" value="{$item->getEmail()|escape}" />
                </div>
            </div>
            <div class="control-group span5 offset1">
                <label class="control-label">Notitie voor {$car->getTitle()} {$car->getYear()}</label>
                <div class="controls">
                    Met id {$car->getId()}
                </div>
                <input type="hidden" name="catalog" class="input-xlarge" value="{$item->getCatalog()|escape}" />
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Notitie</legend>
        <textarea id="text" name="text" placeholder="Plaats hier uw notitie">{$item->getText()|escape}</textarea>
    </fieldset>
    <div class="form-actions">
        <input type="submit" value="Opslaan" class="btn btn-primary" onmouseup="showLoading();" />
        <button type="button" onclick="document.location.href='{$SCRIPT_NAME|replace:'index.php':''}catalog/';" class="btn">Annuleren</button>
    </div>
</form>
<script type="text/javascript">
    function showLoading() {
        $('.btn, a').each(function() {
            if (!$(this).hasClass('btn-primary')) {
                $(this).attr('disabled', true);
            }
        });
        $('body').append('<div class="modal">' +
                            '<div class="modal-header">' +
                                '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
                                '<h3>Opslaan</h3>' +
                            '</div>' +
                            '<div class="modal-body">' +
                                '<p>De gegevens worden opgeslagen, dit kan enige tijd duren...</p>' +
                            '</div>' +
                            '<div class="modal-footer">' +
                                '<a href="#" class="btn">Close</a>' +
                            '</div>' +
                         '</div>');
    }
</script>