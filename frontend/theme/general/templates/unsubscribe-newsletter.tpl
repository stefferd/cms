{function name=values}{if isset($values) && is_array($values)}{$values[$index]}{else}{''}{/if}{/function}
<h1>Unsubscribe to our newsletter</h1>
<div class="row">
    <div class="span8">
        <form action="{$SCRIPT_NAME|replace:'index.php':''}newsletter-plus/unsubscribe/" method="POST">
            <fieldset>
                {if isset($message) && is_array($message)}
                    {if count($message) > 0}
                        <div class="control-group">
                            <label>{$message.message}</label>
                        </div>
                    {else}
                        <div class="control-group">
                            <label>Fill in your emailaddress to unsubscribe to our newsletter and push the button "Unsubscribe"</label>
                        </div>
                        <div class="control-group">
                            <label for="email">Email</label>
                            <div class="controls">
                                <input type="text" class="span3" value="" placeholder="Email" id="email" name="email" title="Email" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn">Unsubscribe</button>
                            </div>
                        </div>
                    {/if}
                {/if}
            </fieldset>
        </form>
    </div>
</div>