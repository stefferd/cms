<?php /* Smarty version Smarty-3.1.8, created on 2013-01-16 11:21:13
         compiled from "../1.2/shared/controllers/catalog/templates/form-car.tpl" */ ?>
<?php /*%%SmartyHeaderCode:210662844450dcdf55308bc2-17079085%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c012c028ce0063a6f7c0091d9a6007d08d849507' => 
    array (
      0 => '../1.2/shared/controllers/catalog/templates/form-car.tpl',
      1 => 1358331519,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210662844450dcdf55308bc2-17079085',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50dcdf55345bd0_78092613',
  'variables' => 
  array (
    'catalogitem' => 0,
    'SCRIPT_NAME' => 0,
    'pictures' => 0,
    'picture' => 0,
    'count' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50dcdf55345bd0_78092613')) {function content_50dcdf55345bd0_78092613($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_function_imagesize')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/function.imagesize.php';
?><!-- The form for the car catalog type -->
<?php if ($_smarty_tpl->tpl_vars['catalogitem']->value->getId()!=''){?>
    <form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
catalog/update/<?php echo $_smarty_tpl->tpl_vars['catalogitem']->value->getId();?>
/" method="post" enctype="multipart/form-data">
<?php }else{ ?>
    <form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
catalog/save/" method="post" enctype="multipart/form-data">
<?php }?>
    <fieldset>
        <legend>Item toevoegen</legend>
        <div class="controls controls-row">
            <div class="control-group span10">
                <label class="control-label" for="title">Titel</label>
                <div class="controls">
                    <input type="text" id="title" name="title" placeholder="Titel" class="span10" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['catalogitem']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
" />
                </div>
            </div>
            <div class="control-group span1">
                <label class="control-label" for="active">Actief</label>
                <div class="controls">
                    <input id="active" name="active" type="checkbox" checked="checked" />
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Auto kenmerken</legend>
        <div class="controls controls-row">
            <div class="control-group span5">
                <label class="control-label" for="brand">Merk</label>
                <div class="controls">
                    <input type="text" id="brand" name="brand" placeholder="Merk" class="input-xlarge" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['catalogitem']->value->getBrand(), ENT_QUOTES, 'UTF-8', true);?>
" />
                </div>
            </div>
            <div class="control-group span5 offset1">
                <label class="control-label" for="type">Uitvoering</label>
                <div class="controls">
                    <input type="text" id="type" name="type" placeholder="Uitvoering" class="input-xlarge" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['catalogitem']->value->getType(), ENT_QUOTES, 'UTF-8', true);?>
" />
                </div>
            </div>
        </div>
        <div class="controls controls-row">
            <div class="control-group span5">
                <label class="control-label" for="engine">Motor</label>
                <div class="controls">
                    <input type="text" id="engine" name="engine" placeholder="Motor" class="input-medium" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['catalogitem']->value->getEngine(), ENT_QUOTES, 'UTF-8', true);?>
" />
                </div>
            </div>
            <div class="control-group span5 offset1">
                <label class="control-label" for="transmission">Transmissie</label>
                <div class="controls">
                    <select id="transmission" name="transmission" class="input-medium">
                        <option value="MT" <?php if ($_smarty_tpl->tpl_vars['catalogitem']->value->getTransmission()=='MT'){?>selected<?php }?>>Handgeschakeld</option>
                        <option value="AT" <?php if ($_smarty_tpl->tpl_vars['catalogitem']->value->getTransmission()=='AT'){?>selected<?php }?>>Automaat</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="controls controls-row">
            <div class="control-group span5">
                <label class="control-label" for="year">Bouwjaar</label>
                <div class="controls input-append">
                    <input type="text" id="year" name="year" placeholder="Bouwjaar" class="input-small" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['catalogitem']->value->getYear(), ENT_QUOTES, 'UTF-8', true);?>
" />
                    <span class="add-on">(yyyy)</span>
                </div>
            </div>
            <div class="control-group span5 offset1">
                <label class="control-label" for="state">Staat</label>
                <div class="controls">
                    <select id="state" name="state" class="input-medium">
                        <option value="foresale" <?php if ($_smarty_tpl->tpl_vars['catalogitem']->value->getState()=='forsale'){?>selected<?php }?>>Te koop</option>
                        <option value="arrivingsoon" <?php if ($_smarty_tpl->tpl_vars['catalogitem']->value->getState()=='arrivingsoon'){?>selected<?php }?>>Binnenkort binnen</option>
                        <option value="reserved" <?php if ($_smarty_tpl->tpl_vars['catalogitem']->value->getState()=='reserved'){?>selected<?php }?>>Gereserveerd</option>
                        <option value="sold" <?php if ($_smarty_tpl->tpl_vars['catalogitem']->value->getState()=='sold'){?>selected<?php }?>>Verkocht</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="controls controls-row">
            <div class="control-group span5">
                <label class="control-label" for="milage">Kilometerstand</label>
                <div class="controls input-append">
                    <input type="text" id="milage" name="milage" placeholder="Kilometerstand" class="input-medium" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['catalogitem']->value->getMilage(), ENT_QUOTES, 'UTF-8', true);?>
" />
                    <span class="add-on">km</span>
                </div>
            </div>
            <div class="control-group span5 offset1">
                <label class="control-label" for="price">Prijs</label>
                <div class="controls input-prepend">
                    <span class="add-on">&euro;</span>
                    <input id="price" name="price" type="text" placeholder="Prijs" class="input-medium" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['catalogitem']->value->getPrice(), ENT_QUOTES, 'UTF-8', true);?>
" />
                </div>
            </div>
        </div>
        <div class="controls controls-row">
            <div class="control-group span5">
                <label class="control-label" for="transportCostPerKm">Transportkosten per km</label>
                <div class="controls input-prepend input-append">
                    <span class="add-on">&euro;</span>
                    <input type="text" id="transportCostPerKm" name="transportCostPerKm" placeholder="Transportkosten per km" class="input-medium" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['catalogitem']->value->getTransportCostPerKm(), ENT_QUOTES, 'UTF-8', true);?>
" />
                    <span class="add-on">p. km</span>
                </div>
            </div>
            <div class="control-group span5 offset1">
                <label class="control-label" for="state">Locatie</label>
                <div class="controls">
                    <select id="location" name="location" class="input-medium">
                        <option value="Ooij" <?php if ($_smarty_tpl->tpl_vars['catalogitem']->value->getLocation()=='Ooij'){?>selected<?php }?>>Ooij</option>
                        <option value="Polsbroek" <?php if ($_smarty_tpl->tpl_vars['catalogitem']->value->getLocation()=='Polsbroek'){?>selected<?php }?>>Polsbroek</option>
                    </select>
                </div>
            </div>
            <div class="control-group span5 offset1">
                <label class="control-label" for="state">Youtube video</label>
                <div class="controls">
                    <input type="text" id="youtube" name="youtube" placeholder="Youtube" class="input-medium" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['catalogitem']->value->getYoutube(), ENT_QUOTES, 'UTF-8', true);?>
" />
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Omschrijving</legend>
        <textarea id="text" name="text" placeholder="Auto omschrijving" style="height: 200px;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['catalogitem']->value->getText(), ENT_QUOTES, 'UTF-8', true);?>
</textarea>
    </fieldset>
    <?php if ($_smarty_tpl->tpl_vars['catalogitem']->value->getId()!=''){?>
    <fieldset>
        <legend>Foto's</legend>
        <input type="hidden" id="mainimage" name="mainimage" value="<?php echo $_smarty_tpl->tpl_vars['catalogitem']->value->getMainimage();?>
" />
        <div class="controls controls-row">
            <div class="control-group span5">
                <label class="control-label" for="pictures">Selecteer uw foto's om toe te voegen</label>
                <div class="controls">
                    <input type="file" id="pictures" name="pictures[]" multiple class="input-medium" />
                </div>
            </div>
            <div class="span12">
                <div clas="row-fluid">
                    <ul class="thumbnails">
                    <?php  $_smarty_tpl->tpl_vars['picture'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['picture']->_loop = false;
 $_smarty_tpl->tpl_vars['count'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['pictures']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['picture']->key => $_smarty_tpl->tpl_vars['picture']->value){
$_smarty_tpl->tpl_vars['picture']->_loop = true;
 $_smarty_tpl->tpl_vars['count']->value = $_smarty_tpl->tpl_vars['picture']->key;
?>
                        <?php if (!strstr($_smarty_tpl->tpl_vars['picture']->value,"cache")){?>
                        <li id="image<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['picture']->value==$_smarty_tpl->tpl_vars['catalogitem']->value->getMainImage()){?> class="span4 mainimage"<?php }else{ ?> class="span4"<?php }?>>
                            <div class="thumbnail">
                                <a class="lightbox" href="<?php echo $_smarty_tpl->tpl_vars['picture']->value;?>
">
                                    <?php echo smarty_function_imagesize(array('src'=>$_smarty_tpl->tpl_vars['picture']->value,'width'=>300,'height'=>200),$_smarty_tpl);?>

                                </a>
                                <div class="caption">
                                    <button type="button" class="btn btn-danger" data-loading-text="Bezig met verwijderen..." onclick="afbeeldingVerwijderen('<?php echo $_smarty_tpl->tpl_vars['picture']->value;?>
', 'image<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
');">Verwijderen</button>
                                    <?php if ($_smarty_tpl->tpl_vars['picture']->value!=$_smarty_tpl->tpl_vars['catalogitem']->value->getMainImage()){?><button type="button" class="btn" onclick="setMainimage('<?php echo $_smarty_tpl->tpl_vars['picture']->value;?>
', 'image<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
');">Hoofdafbeelding</button><?php }?>
                                </div>
                            </div>
                        </li>
                        <?php }?>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </fieldset>
    <?php }?>
    <div class="form-actions">
        <input type="submit" value="Opslaan" class="btn btn-primary" onmouseup="showLoading();" />
        <button type="button" onclick="document.location.href='<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
catalog/';" class="btn">Annuleren</button>
    </div>
</form>
<script type="text/javascript">
    function setMainimage(picture, id) {
        $('#mainimage').val(picture);
        $('#' + id).addClass('mainimage');
        $('#' + id).children('.thumbnail').children('.caption').append('<span>Hoofdafbeelding</span>');
    }

    function showLoading() {
        $('.btn, a').each(function() {
            if (!$(this).hasClass('btn-primary')) {
                $(this).attr('disabled', true);
            }
        });
        $('body').append('<div class="modal">' +
                            '<div class="modal-header">' +
                                '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
                                '<h3>Opslaan</h3>' +
                            '</div>' +
                            '<div class="modal-body">' +
                                '<p>De gegevens samen met de foto\'s worden opgeslagen, een moment geduld aub. Afhankelijk van de grote van de afbeeldingen kan het enige tijd duren...</p>' +
                            '</div>' +
                            '<div class="modal-footer">' +
                                '<a href="#" class="btn">Close</a>' +
                            '</div>' +
                         '</div>');
    }

    function afbeeldingVerwijderen(url, id) {
        $.post("<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
ajax.php?module=catalog&action=delete-image", { picture: url } , function(data) {
            $('.thumbnails').before('<div class="alert fade in alert-block alert-error" id="' + id + '-alert">'
                + '<button data-dismiss="alert" class="close" type="button">×</button>'
                + 'Bezig met verwijderen.'
            + '</div>');
        }).complete(
            function() {
                $('#' + id + '-alert').remove();
                $('.thumbnails').before('<div class="alert fade in">'
                    + '<button data-dismiss="alert" class="close" type="button">×</button>'
                    + 'Afbeelding is verwijderd.'
                + '</div>');
                $('#' + id).remove();
            }
        );
    }
    
    $(document).ready(function() {
        $('a.lightbox').lightBox();
        setTimeout(function() {
            $('#text_ifr').attr('style', 'width: 100%; height: 200px; display: block;');
            $('#text_tbl').attr('style', 'width: 940px; height: 250px;');
        }, 500);
    });
</script><?php }} ?>