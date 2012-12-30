<?php /* Smarty version Smarty-3.1.8, created on 2012-08-23 23:03:50
         compiled from "../1.2/shared/controllers/news/templates/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:50400492350369ab6b5abc0-58435085%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c387e334eecb35d269269c5b5b9ac6299c59bd8f' => 
    array (
      0 => '../1.2/shared/controllers/news/templates/edit.tpl',
      1 => 1345752930,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50400492350369ab6b5abc0-58435085',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
    'news' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50369ab6bcfec5_53090368',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50369ab6bcfec5_53090368')) {function content_50369ab6bcfec5_53090368($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?>
    <div class="form">
    <form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
news/update/<?php echo $_smarty_tpl->tpl_vars['news']->value->getId();?>
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
                    <div class="answer"><input id="title" name="title" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['news']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Titel" /></div>
                </div>
                <div class="field">
                    <div class="question"><label for="active">Actief</label></div>
                    <?php if ($_smarty_tpl->tpl_vars['news']->value->getActive()==1){?>
                        <div class="answer"><input id="active" name="active" type="checkbox" checked="checked" /></div>
                    <?php }else{ ?>
                        <div class="answer"><input id="active" name="active" type="checkbox"/></div>
                    <?php }?>
                </div>
                <div class="field">
                    <div class="answer"><textarea id="tinymce" name="text" placeholder="Tekstuele inhoud"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['news']->value->getText(), ENT_QUOTES, 'UTF-8', true);?>
</textarea></div>
                </div>
                <div class="buttons">
                    <input type="submit" value="Opslaan" />
                </div>
            </div>
        </div>
    </form>
</div><?php }} ?>