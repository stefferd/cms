<!-- The form for the car catalog type -->
<form action="{$SCRIPT_NAME|replace:'index.php':''}newsletter-plus/import/" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Contactpersonen importeren</legend>
        <div class="controls controls-row">
            <div class="control-group span5">
                <label class="control-label" for="csv">Selecteer uw Csv bestand om te importeren</label>
                <div class="controls">
                    <input type="file" id="csv" name="csv" class="input-medium" />
                </div>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <input type="submit" value="Opslaan" class="btn btn-primary" />
        <button type="button" onclick="document.location.href='{$SCRIPT_NAME|replace:'index.php':''}newsletter-plus/';" class="btn">Annuleren</button>
    </div>
</form>