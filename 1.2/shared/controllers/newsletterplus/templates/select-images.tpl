<form action="{$SCRIPT_NAME|replace:'index.php':''}newsletter-plus/send/{$catalogitem->getId()}/" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Nieuwsbrief versturen</legend>
        <div class="row">
            {foreach from=$pictures item=picture key=count}
                {if ! $picture|strstr:"cache"}
                    <div id="image{$count}" class="span3">
                        <div class="thumbnail">
                            <a class="lightbox" href="{$picture}">
                                {imagesize src=$picture width=300 height=200}
                            </a>
                            <div class="caption">
                                <button type="button" class="btn" onclick="addImageToSelection('{$picture}', 'image{$count}');">Toevoegen aan nieuwsbrief</button>
                            </div>
                        </div>
                    </div>
                {/if}
            {/foreach}
        </div>
        <input type="hidden" name="imagesForNewsletter" id="imagesForNewsletter" value="" />
    </fieldset>
    <div class="form-actions">
        <input type="submit" value="Versturen" class="btn btn-primary" />
        <button type="button" onclick="document.location.href='{$SCRIPT_NAME|replace:'index.php':''}catalog/';" class="btn">Annuleren</button>
    </div>
</form>
<script type="text/javascript">
    function addImageToSelection(url, sourceId) {
        var field = $('#imagesForNewsletter');
        var value = field.val();

        if (value.length > 0) {
            value += ',' + url;
        } else {
            value = url;
        }
        field.val(value);
        $('#' + sourceId).addClass('selected');
    }
</script>