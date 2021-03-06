<!-- The form for the car catalog type -->
{if $catalogitem->getId() ne ''}
    <form action="{$SCRIPT_NAME|replace:'index.php':''}catalog/update/{$catalogitem->getId()}/" method="post" enctype="multipart/form-data">
{else}
    <form action="{$SCRIPT_NAME|replace:'index.php':''}catalog/save/" method="post" enctype="multipart/form-data">
{/if}
    <fieldset>
        <legend>Item toevoegen</legend>
        <div class="controls controls-row">
            <div class="control-group span10">
                <label class="control-label" for="title">Titel</label>
                <div class="controls">
                    <input type="text" id="title" name="title" placeholder="Titel" class="span10" value="{$catalogitem->getTitle()|escape}" />
                </div>
            </div>
            <div class="control-group span1">
                <label class="control-label" for="active">Actief</label>
                <div class="controls">
                    <input id="active" name="active" type="checkbox" checked="checked" />
                </div>
            </div>
        </div>
        {if (defined('use_free_fields') && $smarty.const.use_free_fields == true)}
            <div class="controls controls-row">
                <div class="control-group span3">
                    <label class="control-label" for="free_field_one">Categorie</label>
                    <div class="controls">
                        <select name="free_field_one" id="free_field_one">
                            <option value="schilderij-aquarel" {if $catalogitem->getFreeFieldOne() == 'schilderij-aquarel'} selected{/if}>Schilderij - Aquarel</option>
                            <option value="schilderij-gemenged" {if $catalogitem->getFreeFieldOne() == 'schilderij-gemenged'} selected{/if}>Schilderij - Gemenged</option>
                            <option value="schilderij-olieverf" {if $catalogitem->getFreeFieldOne() == 'schilderij-olieverf'} selected{/if}>Schilderij - Olieverf</option>
                            <option value="beeld" {if $catalogitem->getFreeFieldOne() == 'beeld'} selected{/if}>Beeld</option>
                            <option value="tekening" {if $catalogitem->getFreeFieldOne() == 'tekening'} selected{/if}>Tekening</option>
                        </select>
                    </div>
                </div>
                <div class="control-group span3">
                    <label class="control-label" for="free_field_two">Prijs</label>
                    <div class="controls">
                        <input type="text" name="free_field_two" id="free_field_two" value="{$catalogitem->getFreeFieldTwo()|escape}" />
                    </div>
                </div>
                <div class="control-group span3">
                    <label class="control-label" for="free_boolean_one">Toon op welkomstpagina</label>
                    <div class="controls">
                        <input type="checkbox" name="free_boolean_one" id="free_boolean_one" value="1" {if $catalogitem->getFreeBooleanOne() == 1}checked="true"{/if} />
                    </div>
                </div>
            </div>
        {/if}
    </fieldset>
    <fieldset>
        <legend>Omschrijving</legend>
        <textarea id="text" name="text" placeholder="Auto omschrijving" style="height: 200px;">{$catalogitem->getText()|escape}</textarea>
    </fieldset>
    {if $catalogitem->getId() ne ''}
        <fieldset>
            <legend>Foto's</legend>
            <div class="controls controls-row">
                <div class="control-group span5">
                    <label class="control-label" for="pictures">Selecteer uw foto's om toe te voegen</label>
                    <div class="controls">
                        <input type="file" id="pictures" name="pictures[]" multiple class="input-medium" />
                    </div>
                </div>
                <div class="span12">
                    <div clas="row-fluid">
                        <ul class="thumbnails">
                            {foreach from=$pictures item=picture key=count}
                                {if ! $picture|strstr:"cache"}
                                    <li id="image{$count}" class="span4">
                                        <div class="thumbnail">
                                            <a class="lightbox" href="{$picture}">
                                                {imagesize src=$picture width=300 height=200}
                                            </a>
                                            <div class="caption">
                                                <button type="button" class="btn btn-danger" data-loading-text="Bezig met verwijderen..." onclick="afbeeldingVerwijderen('{$picture}', 'image{$count}');">Verwijderen</button>
                                            </div>
                                        </div>
                                    </li>
                                {/if}
                            {/foreach}
                        </ul>
                    </div>
                </div>
            </div>
        </fieldset>
    {/if}
    <div class="form-actions">
        <input type="submit" value="Opslaan" class="btn btn-primary" onmouseup="showLoading();" />
        <button type="button" onclick="document.location.href='{$SCRIPT_NAME|replace:'index.php':''}catalog/';" class="btn">Annuleren</button>
    </div>
</form>
<script type="text/javascript">
    function setMainimage(picture, id) {
        $('#mainimage').val(picture);
        $('#' + id).addClass('mainimage');
        $('#' + id).children('.thumbnail').children('.caption').append('<span>Hoofdafbeelding</span>');
    }

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
                '<p>De gegevens samen met de foto\'s worden opgeslagen, een moment geduld aub. Afhankelijk van de grote van de afbeeldingen kan het enige tijd duren...</p>' +
                '</div>' +
                '<div class="modal-footer">' +
                '<a href="#" class="btn">Close</a>' +
                '</div>' +
                '</div>');
    }

    function afbeeldingVerwijderen(url, id) {
        $.post("{$SCRIPT_NAME|replace:'index.php':''}ajax.php?module=catalog&action=delete-image", { picture: url } , function(data) {
            $('.thumbnails').before('<div class="alert fade in alert-block alert-error" id="' + id + '-alert">'
                    + '<button data-dismiss="alert" class="close" type="button">×</button>'
                    + 'Bezig met verwijderen.'
                    + '</div>');
        }).complete(
                function() {
                    $('#' + id + '-alert').remove();
                    $('.thumbnails').before('<div class="alert fade in">'
                            + '<button data-dismiss="alert" class="close" type="button">×</button>'
                            + 'Afbeelding is verwijderd.'
                            + '</div>');
                    $('#' + id).remove();
                }
        );
    }

    $(document).ready(function() {
        $('a.lightbox').lightBox();
        setTimeout(function() {
            $('#text_ifr').attr('style', 'width: 100%; height: 200px; display: block;');
            $('#text_tbl').attr('style', 'width: 940px; height: 250px;');
        }, 500);
    });
</script>