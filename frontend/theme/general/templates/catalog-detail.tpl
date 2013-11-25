{* Smarty *}

<div class="container">
    <button class="btn" onclick="document.location.href='{$url}inventory/';" style="margin-left: 20px; padding-bottom: 5px;">Back to inventory</button>
    <h1 style="margin-left: 20px; margin-bottom: 10px;">{$item->title}</h1>
    <div class="fluid-row">
        <div class="span11">
            <div class="row">
                <div class="span8">
                    <div class="row">
                        <div class="span4">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td><strong>Brand</strong></td>
                                    <td>{$item->brand}</td>
                                </tr>

                                <tr>
                                    <td><strong>Engine</strong></td>
                                    <td>{$item->engine}</td>
                                </tr>
                                <tr>
                                    <td><strong>Make</strong></td>
                                    <td>{$item->year}</td>
                                </tr>
                                <tr>
                                    <td><strong>Milage</strong></td>
                                    <td>{$item->milage}</td>
                                </tr>
                                {*<tr>
                                    <td><strong>Transport cost per km</strong></td>
                                    <td>&euro; {$item->getTransportCostPerKm()} each km</span></td>
                                </tr>*}
                            </table>
                        </div>
                        <div class="span4">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td><strong>Type</strong></td>
                                    <td>{$item->type}</td>
                                </tr>
                                <tr>
                                    <td><strong>Transmission</strong></td>
                                    <td>
                                    {if $item->transmission == 'MT'}
                                        Manual transmission
                                        {else}
                                        Automatic transmission
                                    {/if}
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Status</strong></td>
                                    <td>
                                    {if $item->state == 'arrivingsoon'}
                                        Arriving soon
                                        {elseif $item->state == 'forsale'}
                                        For sale
                                        {elseif $item->state == 'reserved'}
                                        Reserved
                                        {elseif $item->state == 'sold'}
                                        Sold
                                    {/if}
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Location</strong></td>
                                    <td>{$item->location}</td>
                                </tr>
                                <tr>
                                    <td><strong>Inventory number:</strong></td>
                                    <td>{$item->id}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span8">
                            {$item->text}
                        </div>
                    </div>
                    <div class="row">
                        <div class="span8 detail">
                            <div class="price">
                                Only for <span class="price">&euro; {$item->price}</span>
                            </div>
                        </div>
                    </div>
                    {if $item->youtube ne ''}
                        <div class="row">
                            <div class="span8">
                                <iframe title="YouTube video player" class="youtube-player" type="text/html" width="600" height="350" src="{$item->youtube}" frameborder="0" allowFullScreen></iframe>
                            </div>
                        </div>
                    {/if}
                    <div class="row">
                        <div class="span8">
                            Click on the image to enlarge
                        </div>
                    </div>
                    <div class="row">
                        <div class="span8 thumbs">
                        {assign var=images value=CatalogController::parseImages($item->id)}
                        {assign var=imagethumbs value=CatalogController::parseThumbsImages($item->id)}
                        {foreach from=$images key=index item=image}
                            <div class="span2">
                                <a class="lightbox" href="{$image}">
                                    {assign var=dimension value=CatalogController::resizeToHeight(95, $imagethumbs[$index])}
                                    <img src="{$imagethumbs[$index]}" width="{$dimension.width}" height="{$dimension.height}" style="height: {$dimension.height}px; width: {$dimension.width}px;" />
                                </a>
                            </div>
                        {/foreach}
                        </div>
                    </div>
                </div>
                <div class="span3 beige">
                    <form action="{$SCRIPT_NAME|replace:'index.php':''}inventory/contact/{$item->id}//" method="POST">
                        <fieldset>
                            <legend>Contact seller</legend>
                                {if isset($message) && is_array($message)}
                                    {if count($message) > 0}
                                        <div class="control-group">
                                            <label>{$message.message}</label>
                                        </div>
                                        {else}
                                        <div class="control-group">
                                            <label for="name">Name</label>
                                            <div class="controls">
                                                <input type="text" value="" placeholder="Name" id="name" name="name" title="Name" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="email">Email</label>
                                            <div class="controls">
                                                <input type="text" value="" placeholder="Email" id="email" name="email" title="Email" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="email">Message</label>
                                            <div class="controls">
                                                <textarea placeholder="Ask your question here" id="message" name="message" title="Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" class="btn">Send</button>
                                            </div>
                                        </div>
                                    {/if}
                                {/if}
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <button class="btn" onclick="document.location.href='{$url}inventory/';" style="margin-left: 20px; padding-top: 5px;">Back to inventory</button>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('a.lightbox').lightBox();
    });
</script>