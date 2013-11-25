{* Smarty *}
{function name=news level=0}
    {counter start=0 skip=1 print=false assign=position}
    {$classes = array('main', 'child child_1', 'child child_2', 'child child_3', 'child child_4', 'child child_5')}
    <ul class="news">
    {foreach $data as $news}
        <li>
            <div>{$news->text}</div>
        </li>
        {counter}
    {/foreach}
    </ul>
{/function}

<div class="row">
    <div class="span7">
        {$content}
        <div id="myCarousel" class="carousel slide">
            <!-- Carousel items -->
            <div class="carousel-inner">
                {counter start=0 skip=1 print=false assign=position}
                {foreach $cars as $car}
                    {if $position < 3}
                        {assign var=image value=CatalogController::getMainimageAndThumbs($car->id)}
                        {if $image[1] ne false}
                            <div class="item{if $position == 0} active{/if}">
                                {assign var=dimension value=CatalogController::resizeToWidth(530, $image[1])}
                                <img src="{$image[1]}" width="{$dimension.width}" height="{$dimension.height}" style="height: {$dimension.height}px; width: {$dimension.width}px;" title="{$car->title}" alt="{$car->title}" />
                                <div class="carousel-caption">
                                    <h4>{$car->title}</h4>
                                </div>
                            </div>
                            {counter}
                        {else}
                            {if $image[0] ne false}
                                <div class="item{if $position == 0} active{/if}">
                                    {assign var=dimension value=CatalogController::resizeToWidth(530, $image[0])}
                                    <img src="{$image[0]}" width="{$dimension.width}" height="{$dimension.height}" style="height: {$dimension.height}px; width: {$dimension.width}px;" title="{$car->title}" alt="{$car->title}" />
                                    <div class="carousel-caption">
                                        <h4>{$car->title}</h4>
                                    </div>
                                </div>
                                {counter}
                            {/if}
                        {/if}
                    {/if}
                {/foreach}
            </div>
        </div>
    </div>
    <div class="span4" style="background-color: #00483a; padding: 10px; border: 5px solid #d4cd86; border-radius: 5px;">
        <aside style="margin-top: 20px;">
            <h4>CLASSIC CAR NEWS</h4>
            {call name=news data=$lastestnews limit=2 level=0}
        </aside>
    </div>
    <div class="span4 newsletter well" style="margin-top: 10px;">
        <form action="{$SCRIPT_NAME|replace:'index.php':''}home/subscribe/" method="POST">
            <fieldset>
                <legend>Subscribe to our newsletter</legend>
                {if count($message) > 0}
                    <div class="control-group">
                        <label>{$message.message}</label>
                    </div>
                {/if}
                <div class="control-group">
                    <label for="name">Name</label>
                    <div class="controls">
                        <input type="text" class="span4" value="" placeholder="Name" id="name" name="name" title="Name" />
                    </div>
                </div>
                <div class="control-group">
                    <label for="email">Email</label>
                    <div class="controls">
                        <input type="text" class="span4" value="" placeholder="Email" id="email" name="email" title="Email" />
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">Subscribe</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.carousel').carousel({
                interval: 5000
            });
        });
    </script>
</div>