{* Smarty *}
<div class="row">
{counter start=0 skip=1 print=false assign=position}
{foreach $data as $item}
    <div class="span3 block">
        <div class="thumbnail-image">
            {assign var=image value=CatalogController::getMainimageAndThumbs($item->id)}
            {if $image[2] ne false}
                {assign var=dimension value=CatalogController::resizeToWidth(205, $image[2])}
                <a href="{$url}inventory/details/{$item->id}/">
                    <img src="{$image[2]}" width="{$dimension.width}" height="{$dimension.height}" style="height: {$dimension.height}px; width: {$dimension.width}px;" />
                    <div style="display: none">
                        {image_resize profile=0 src=$image[2] width=205 height=154 crop=true}
                    </div>
                </a>
                {else}
                {if $image[0] ne false}
                    {assign var=dimension value=CatalogController::resizeToWidth(205, $image[0])}
                    <a href="{$url}inventory/details/{$item->getId()}/">
                        <img src="{$image[0]}" width="{$dimension.width}" height="{$dimension.height}" style="height: {$dimension.height}px; width: {$dimension.width}px;" />
                    </a>
                    {else}
                    &nbsp;
                {/if}
            {/if}
        </div>
        <div class="caption">
            <h3>{$item->title|escape}</h3>
            <dl class="dl-horizontal">
                <dt>Inventory</dt>
                <dd>{$item->id}</dd>
                <dt>Location</dt>
                <dd>{$item->location}</dd>
                <dt>Make</dt>
                <dd>{$item->year}</dd>
                <dt>Brand</dt>
                <dd>{$item->brand}</dd>
                <dt>Type</dt>
                <dd>{$item->type}</dd>
            </dl>
            <p>Only for <span class="price">&euro; {$item->price}</span></p>
            <a class="btn" href="{$url}inventory/details/{$item->id}/">More details</a>
        </div>
    </div>
    {counter}
    {if $position mod 3 == 0}
    </div>
    <div class="row">
    {/if}
{/foreach}
</div>