{* Smarty *}
<div class="row">
{counter start=0 skip=1 print=false assign=position}
{foreach $data as $item}
    <div class="span3 block">
        <div class="thumbnail">
            {assign var=images value=CatalogController::parseImages($item->getId())}
            {if $image ne '' and strlen($images[0]) > 0}
                {imagesize src=$images[0] width=300 height=200 crop=true}
            {else}
                &nbsp;
            {/if}
        </div>
        <div class="caption">
            <h3>{$item->getTitle()|escape}</h3>
            <dl class="dl-horizontal">
                <dt>Location</dt>
                <dd>{$item->getLocation()}</dd>
                <dt>Make</dt>
                <dd>{$item->getYear()}</dd>
                <dt>Brand</dt>
                <dd>{$item->getBrand()}</dd>
                <dt>Type</dt>
                <dd>{$item->getType()}</dd>
            </dl>
            <p>Only for <span class="price">&euro; {$item->getPrice()}</span></p>
            <a class="btn" href="{$url}inventory/details/{$item->getId()}/">More details</a>
        </div>
    </div>
    {counter}
    {if $position mod 3 == 0}
    </div>
    <div class="row">
    {/if}
{/foreach}
</div>