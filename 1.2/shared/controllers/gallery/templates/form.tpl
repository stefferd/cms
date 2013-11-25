<!-- The form for the car catalog type -->
{if $gallery->getId() ne ''}
    <form action="{$SCRIPT_NAME|replace:'index.php':''}gallery/update/{$gallery->getId()}/" method="post" enctype="multipart/form-data">
{else}
    <form action="{$SCRIPT_NAME|replace:'index.php':''}gallery/save/" method="post" enctype="multipart/form-data">
{/if}
    <fieldset>
        <legend>Album toevoegen</legend>
        <div class="controls controls-row">
            <div class="control-group span10">
                <label class="control-label" for="name">Naam</label>
                <div class="controls">
                    <input type="text" id="name" name="name" placeholder="Naam" class="span10" value="{$gallery->getName()|escape}" />
                </div>
            </div>
            <div class="control-group span1">
                <label class="control-label" for="active">Actief</label>
                <div class="controls">
                    <input id="active" name="active" type="checkbox" checked="checked" />
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Omschrijving</legend>
        <div class="controls controls-row">
            <div class="control-group span10">
                <textarea id="description" rows="5" class="span11" contenteditable="true" name="description" placeholder="Plaats hier uw notitie">{$gallery->getDescription()|escape}</textarea>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <input type="submit" value="Opslaan" class="btn btn-primary" onmouseup="showLoading();" />
        <button type="button" onclick="document.location.href='{$SCRIPT_NAME|replace:'index.php':''}gallery/';" class="btn">Annuleren</button>
    </div>
</form>
{if $gallery->getId() ne ''}
    <form action="{$SCRIPT_NAME|replace:'index.php':''}gallery/upload/{$gallery->getId()}/" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Foto toevoegen</legend>
            <div class="controls controls-row">
                <div class="control-group span10">
                    <label class="control-label" for="picture">Bestand</label>
                    <div class="controls">
                        <input type="file" id="picture" name="picture" placeholder="picture" />
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="form-actions">
            <input type="submit" value="Foto opslaan" class="btn btn-primary" onmouseup="showLoading();" />
        </div>
    </form>
    {if $pictures ne null}
        <fieldset>
            <legend>Foto's</legend>
            <div class="row">
                {foreach $pictures as $picture}
                    <div class="span3">
                        <img src="{$smarty.const.url}{$picture->getUrl()}" style="max-width: 100%; max-height: 100%;" />
                    </div>
                {/foreach}
            </div>
        </fieldset>
    {/if}
{/if}
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