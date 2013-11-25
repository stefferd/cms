{* Smarty *}
<form style="margin-top: 50px;">
    <fieldset>
        <legend>Nieuwsbrief: {$title}</legend>
        <div class="control-group">
            <label>Verstuurd op</label>
            {$send|date_format:"%d-%m-%Y"}
        </div>
        <div class="control-group" style="text-align: center;">
            {$content}
        </div>
    </fieldset>
    <div class="form-actions">
        <button type="button" onclick="document.location.href='{$SCRIPT_NAME|replace:'index.php':''}newsletter-plus/';" class="btn">Terug naar overzicht</button>
    </div>
</form>