{function name=values}{if isset($values) && is_array($values)}{$values[$index]}{else}{''}{/if}{/function}

<div class="row">
    <div class="span8">
        <form class="contact" action="{$SCRIPT_NAME|replace:'index.php':''}contact-us/" method="POST" id="contactform">
            <fieldset>
                <legend>Contactform</legend>
                {if isset($error) && is_array($error)}
                    {if count($error) > 0}
                        <div class="message">
                            {$error.message}
                        </div>
                    {/if}
                {/if}
                <div class="control-group">
                    <label class="control-label" for="contact_name">Name:</label>
                    <div class="controls">
                        <input type="text" class="span7" value="{call name=values values=$values index='contact_name'}" placeholder="Name" id="contact_name" name="contact_name" title="Name" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="contact_email">Email:</label>
                    <div class="controls">
                        <input type="text" class="span7" value="{call name=values values=$values index='contact_email'}" id="contact_email" name="contact_email" title="Email" placeholder="Email" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="contact_message">Message:</label>
                    <div class="controls">
                        <textarea class="textarea span7" cols="40" rows="10" id="contact_message" name="contact_message" placeholder="Type your message here" title="Message:">{call name=values values=$values index='contact_message'}</textarea>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <span class="help-block">All fields are required</span>
                        <button type="submit" class="btn">Send email</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="span3 newsletter well">
        <form action="{$SCRIPT_NAME|replace:'index.php':''}contact-us/subscribe/" method="POST">
            <fieldset>
                <legend>Subscribe to our newsletter</legend>
                {if isset($message) && is_array($message)}
                    {if count($message) > 0}
                        <div class="control-group">
                            <label>{$message.message}</label>
                        </div>
                    {else}
                        <div class="control-group">
                            <label for="name">Name</label>
                            <div class="controls">
                                <input type="text" class="span3" value="{call name=values values=$values index='name'}" placeholder="Name" id="name" name="name" title="Name" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="email">Email</label>
                            <div class="controls">
                                <input type="text" class="span3" value="{call name=values values=$values index='email'}" placeholder="Email" id="email" name="email" title="Email" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn">Subscribe</button>
                            </div>
                        </div>
                    {/if}
                {/if}
            </fieldset>
        </form>
    </div>
</div>