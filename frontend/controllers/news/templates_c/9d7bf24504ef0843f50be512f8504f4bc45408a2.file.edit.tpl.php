<?php /* Smarty version Smarty-3.1.8, created on 2012-08-10 21:54:10
         compiled from "../1.2/shared/controllers/pages/templates/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7526617050255cae99caf2-78750800%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d7bf24504ef0843f50be512f8504f4bc45408a2' => 
    array (
      0 => '../1.2/shared/controllers/pages/templates/edit.tpl',
      1 => 1344628864,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7526617050255cae99caf2-78750800',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50255caea280c4_16892643',
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
    'pages' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50255caea280c4_16892643')) {function content_50255caea280c4_16892643($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?>
    <div class="form">
    <form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
pages/update/<?php echo $_smarty_tpl->tpl_vars['pages']->value->getId();?>
/" method="post">
        <?php if ($_smarty_tpl->tpl_vars['error']->value!=''){?>
            <?php if ($_smarty_tpl->tpl_vars['error']->value=='user_not_found'){?> De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            <?php }elseif($_smarty_tpl->tpl_vars['error']->value=='email_invalid'){?> Vul een geldig emailadres in.
            <?php }?>
        <?php }?>
        <div class="blocks pageform">
            <div class="block">
                <div class="field">
                    <div class="question"><label for="title">Titel</label></div>
                    <div class="answer"><input id="title" name="title" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Titel" /></div>
                </div>
                <div class="field">
                    <div class="question"><label for="active">Actief</label></div>
                    <?php if ($_smarty_tpl->tpl_vars['pages']->value->getActive()==1){?>
                        <div class="answer"><input id="active" name="active" type="checkbox" checked="checked" /></div>
                    <?php }else{ ?>
                        <div class="answer"><input id="active" name="active" type="checkbox"/></div>
                    <?php }?>
                </div>
                <div class="field">
                    <div class="answer"><textarea id="tinymce" name="text" placeholder="Tekstuele inhoud"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value->getText(), ENT_QUOTES, 'UTF-8', true);?>
</textarea></div>
                </div>
                <div class="buttons">
                    <input type="submit" value="Opslaan" />
                </div>
                <div class="block closed">
                    <div class="header">SEO optimalisatie</div>
                    <div class="field">
                        <div class="question"><label for="metatitle">Meta titel</label></div>
                        <div class="answer"><input id="metatitle" name="metatitle" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value->getMetatitle(), ENT_QUOTES, 'UTF-8', true);?>
" maxlength="160" placeholder="Titel van de pagina voor de zoekmachines, max 160 karakters" /></div>
                    </div>
                    <div class="field">
                        <div class="question"><label for="metadescription">Meta omschrijving</label></div>
                        <div class="answer"><textarea id="metadescription" name="metadescription" placeholder="Omschrijving van de pagina voor de zoekmachines, max 320 karakters"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value->getMetadescription(), ENT_QUOTES, 'UTF-8', true);?>
</textarea></div>
                    </div>
                    <div class="field">
                        <div class="question"><label for="keywords">Trefwoorden (keywords)</label></div>
                        <div class="answer"><textarea id="keywords" name="keywords" placeholder="Zoekwoord suggesties voor de zoekmachines, max 20 suggesties" ><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value->getKeywords(), ENT_QUOTES, 'UTF-8', true);?>
</textarea></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div><?php }} ?>