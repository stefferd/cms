{* Smarty *}
{function name=catalogitems level=0}
    {counter start=0 skip=1 print=false assign=position}
    {$classes = array('main', 'child child_1', 'child child_2', 'child child_3', 'child child_4', 'child child_5')}
    <div class="span11">
        <div class="fluid-row">
            <div class="thumbnails" style="margin: 0 auto; width: 770px;">
                <div class="row">
                {foreach $data as $item}
                    <div class="span3 block {$classes[$position]}">
                        <div class="thumbnail-image">
                            {assign var=image value=CatalogController::getMainimageAndThumbs($item->id)}
                            {if $image[2] ne false}
                                {assign var=dimension value=CatalogController::resizeToWidth(205, $image[2])}
                                <a href="{$url}inventory/details/{$item->id}/">
                                    <img src="{$image[2]}" width="{$dimension.width}" height="{$dimension.height}" style="height: {$dimension.height}px; width: {$dimension.width}px;" />
                                    <!--
                                    <div style="display: none">
                                        {image_resize profile=0 src=$image[2] width=205 height=154 crop=true}
                                    </div>
                                    -->
                                </a>
                            {else}
                                {if $image[0] ne false}
                                    {assign var=dimension value=CatalogController::resizeToWidth(205, $image[0])}
                                    <a href="{$url}inventory/details/{$item->id}/">
                                        <img src="{$image[0]}" width="{$dimension.width}" height="{$dimension.height}" style="height: {$dimension.height}px; width: {$dimension.width}px;" />
                                    </a>
                                {else}
                                    &nbsp;
                                {/if}
                            {/if}
                        {*
                        {assign var=image value=CatalogController::getMainimage($item->getId())}
                        {if $image ne ''}
                            {assign var=dimension value=CatalogController::resizeToWidth(205, $image)}
                            <a href="{$url}inventory/details/{$item->getId()}/">
                                <img src="{$image}" width="{$dimension.width}" height="{$dimension.height}" style="height: {$dimension.height}px; width: {$dimension.width}px;" />
                            </a>
                            {else}
                            &nbsp;
                        {/if}
                        *}
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
            </div>
        </div>
    </div>
{/function}

<div class="container">
    <div class="span10 search">
        <fieldset>
            <legend>Search car</legend>
            <div class="span3">
                <div class="control-group">
                    <label for="brand">Brand</label>
                    <div class="controls">
                        <select class="span3" placeholder="Select a brand" id="brand" name="brand">
                            <option value="">Select a brand</option>
                        {foreach $brands as $brand}
                            <option value="{$brand}">{$brand}</option>
                        {/foreach}
                        </select>
                    </div>
                </div>
            </div>
            <div class="span3">
                <div class="control-group">
                    <label for="type">Type</label>
                    <div class="controls">
                        <input type="text" class="span3" placeholder="First select a brand" id="type" name="type" title="Type" />
                    </div>
                </div>
            </div>
            <div class="span3">
                <div class="control-group">
                    <label for="price">Max price</label>
                    <div class="controls">
                        <input type="text" class="span3" placeholder="Select a max price" id="price" name="price" title="Max price" />
                    </div>
                </div>
            </div>
            <div class="span2">
                <div class="control-group">
                    <label>&nbsp;</label>
                    <div class="controls">
                        <button type="submit" id="search" class="btn">Search</button>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
    <div id="cars">
        {call name=catalogitems data=$catalog level=0}
    </div>
    {$pagination}
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#brand').change(function() {
            var options = '<select name="type" id="type" class="span3"><option value="">Select a type</option>';
            $.get("{$url}ajax.php?module=catalog&action=get-types&item=" + $(this).val(), function(data) {
                var types = data.split(',');
                if (isArray(types)) {
                    for (var int = 0; int < types.length; int++) {
                        options += '<option value="' + types[int] + '">' + types[int] + '</option>';
                    }
                }
                options += '</select>';
                $('#type').parent('.controls').html(options);
            });
        });

        $('#search').click(
            function() {
                $('.pagination').hide();
                $('.thumbnails').html('One moment please, searching for cars that match the criteria. <img src="{$url}theme/default/images/ajax-loader.gif" alt="Loading" />');
                var html = '';
                $.post(
                    "{$url}ajax.php?module=catalog&action=search-cars", { brand : $('#brand').val(), type : $('#type').val(), price : $('#price').val() },
                    function(data) {
                        $('.thumbnails').html(data);
                    }
                )
            }
        );
    });

    function isArray(obj) {
        if (typeof obj != 'undefined') {
            return obj.constructor == Array;
        } else
            return false;
    }
</script>