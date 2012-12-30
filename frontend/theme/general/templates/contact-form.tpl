{function name=values}{if isset($values) && is_array($values)}{$values[$index]}{else}{''}{/if}{/function}

<div class="blocks">
    {if isset($error) && is_array($error)}
        {if count($error) > 0}
            <div class="message">
                {$error.message}
            </div>
        {/if}
    {/if}
    <div class="block double">
        <form class="contact" action="{$SCRIPT_NAME|replace:'index.php':''}contact/" method="POST" id="contactform">
            <div class="inputholder text">
                <div class="question text">
                    <label for="contact_name">Naam: *</label>
                </div>
                <div class="answer text">
                    <input type="text" value="{call name=values values=$values index='contact_name'}" class="text" id="contact_name" name="contact_name" title="Naam: *">
                </div>
            </div>
            <div class="inputholder text">
                <div class="question text">
                    <label for="contact_email">E-mail: *</label>
                </div>
                <div class="answer text">
                    <input type="text" value="{call name=values values=$values index='contact_email'}" class="text" id="contact_email" name="contact_email" title="E-mail: *">
                </div>
            </div>
            <div class="inputholder textarea">
                <div class="question textarea">
                    <label for="contact_message">Vraag / Opmerking: *</label>
                </div>
                <div class="answer textarea">
                    <textarea class="textarea" cols="40" rows="10" id="contact_message" name="contact_message" title="Vraag / Opmerking: *">{call name=values values=$values index='contact_message'}</textarea>
                </div>
            </div>
            <div class="explain">{$snippet_required}</div>
            <input type="submit" value="Verzenden" class="submit">
        </form>
    </div>
</div>