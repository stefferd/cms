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
    </fieldset
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
        </div>
    </fieldset>
    <fieldset>
        <legend>Omschrijving</legend>
        <textarea id="text" name="text" placeholder="Auto omschrijving">{$catalogitem->getText()|escape}</textarea>
    </fieldset>
    <fieldset>
        <legend>Foto's</legend>
        <div class="controls controls-row">
            <div class="control-group span5">
                <label class="control-label" for="pictures">Selecteer uw foto's om toe te voegen</label>
                <div class="controls">
                    <input type="file" id="pictures" name="pictures[]" multiple class="input-medium" />
                </div>
            </div>
            <div class="control-group span12">
                {foreach from=$pictures item=picture}
                    {imagesize src=$picture width=120}
                {/foreach}
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <input type="submit" value="Opslaan" class="btn btn-primary" />
        <button type="button" class="btn">Annuleren</button>
    </div>
</form>
