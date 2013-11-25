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
    </fieldset>
    <fieldset>
        <legend>Auto kenmerken</legend>
        <div class="controls controls-row">
            <div class="control-group span5">
                <label class="control-label" for="brand">Merk</label>
                <div class="controls">
                    <input type="text" id="brand" name="brand" placeholder="Merk" class="input-xlarge" value="{$catalogitem->getBrand()|escape}" />
                </div>
            </div>
            <div class="control-group span5 offset1">
                <label class="control-label" for="type">Uitvoering</label>
                <div class="controls">
                    <input type="text" id="type" name="type" placeholder="Uitvoering" class="input-xlarge" value="{$catalogitem->getType()|escape}" />
                </div>
            </div>
        </div>
        <div class="controls controls-row">
            <div class="control-group span5">
                <label class="control-label" for="engine">Motor</label>
                <div class="controls">
                    <input type="text" id="engine" name="engine" placeholder="Motor" class="input-medium" value="{$catalogitem->getEngine()|escape}" />
                </div>
            </div>
            <div class="control-group span5 offset1">
                <label class="control-label" for="transmission">Transmissie</label>
                <div class="controls">
                    <select id="transmission" name="transmission" class="input-medium">
                        <option value="MT" {if $catalogitem->getTransmission() == 'MT'}selected{/if}>Handgeschakeld</option>
                        <option value="AT" {if $catalogitem->getTransmission() == 'AT'}selected{/if}>Automaat</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="controls controls-row">
            <div class="control-group span5">
                <label class="control-label" for="year">Bouwjaar</label>
                <div class="controls input-append">
                    <input type="text" id="year" name="year" placeholder="Bouwjaar" class="input-small" value="{$catalogitem->getYear()|escape}" />
                    <span class="add-on">(yyyy)</span>
                </div>
            </div>
            <div class="control-group span5 offset1">
                <label class="control-label" for="state">Staat</label>
                <div class="controls">
                    <select id="state" name="state" class="input-medium">
                        <option value="foresale" {if $catalogitem->getState() == 'forsale'}selected{/if}>Te koop</option>
                        <option value="arrivingsoon" {if $catalogitem->getState() == 'arrivingsoon'}selected{/if}>Binnenkort binnen</option>
                        <option value="reserved" {if $catalogitem->getState() == 'reserved'}selected{/if}>Gereserveerd</option>
                        <option value="sold" {if $catalogitem->getState() == 'sold'}selected{/if}>Verkocht</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="controls controls-row">
            <div class="control-group span5">
                <label class="control-label" for="milage">Kilometerstand</label>
                <div class="controls input-append">
                    <input type="text" id="milage" name="milage" placeholder="Kilometerstand" class="input-medium" value="{$catalogitem->getMilage()|escape}" />
                    <span class="add-on">km</span>
                </div>
            </div>
            <div class="control-group span5 offset1">
                <label class="control-label" for="price">Prijs</label>
                <div class="controls input-prepend">
                    <span class="add-on">&euro;</span>
                    <input id="price" name="price" type="text" placeholder="Prijs" class="input-medium" value="{$catalogitem->getPrice()|escape}" />
                </div>
            </div>
        </div>
        <div class="controls controls-row">
            <div class="control-group span5">
                <label class="control-label" for="transportCostPerKm">Transportkosten per km</label>
                <div class="controls input-prepend input-append">
                    <span class="add-on">&euro;</span>
                    <input type="text" id="transportCostPerKm" name="transportCostPerKm" placeholder="Transportkosten per km" class="input-medium" value="{$catalogitem->getTransportCostPerKm()|escape}" />
                    <span class="add-on">p. km</span>
                </div>
            </div>
            <div class="control-group span5 offset1">
                <label class="control-label" for="state">Locatie</label>
                <div class="controls">
                    <select id="location" name="location" class="input-medium">
                        <option value="Ooij" {if $catalogitem->getLocation() == 'Ooij'}selected{/if}>Ooij</option>
                        <option value="Polsbroek" {if $catalogitem->getLocation() == 'Polsbroek'}selected{/if}>Polsbroek</option>
                    </select>
                </div>
            </div>
            <div class="control-group span5 offset1">
                <label class="control-label" for="state">Youtube video</label>
                <div class="controls">
                    <input type="text" id="youtube" name="youtube" placeholder="Youtube" class="input-medium" value="{$catalogitem->getYoutube()|escape}" />
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Omschrijving</legend>
        <textarea id="text" name="text" placeholder="Auto omschrijving" style="height: 200px;">{$catalogitem->getText()|escape}</textarea>
    </fieldset>
    {if $catalogitem->getId() ne ''}
    <fieldset>
        <legend>Foto's</legend>
        <input type="hidden" id="mainimage" name="mainimage" value="{$catalogitem->getMainimage()}" />
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
                        <li id="image{$count}"{if $picture == $catalogitem->getMainImage()} class="span4 mainimage"{else} class="span4"{/if}>
                            <div class="thumbnail">
                                <a class="lightbox" href="{$picture}">
                                    {imagesize src=$picture width=300 height=200}
                                </a>
                                <div class="caption">
                                    <button type="button" class="btn btn-danger" data-loading-text="Bezig met verwijderen..." onclick="afbeeldingVerwijderen('{$picture}', 'image{$count}');">Verwijderen</button>
                                    {if $picture != $catalogitem->getMainImage()}<button type="button" class="btn" onclick="setMainimage('{$picture}', 'image{$count}');">Hoofdafbeelding</button>{/if}
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