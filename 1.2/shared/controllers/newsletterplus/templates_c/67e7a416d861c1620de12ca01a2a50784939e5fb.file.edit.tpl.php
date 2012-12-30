<?php /* Smarty version Smarty-3.1.8, created on 2012-08-23 22:54:43
         compiled from "../1.2/shared/controllers/newsletter/templates/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146932678350369531c25038-43629014%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67e7a416d861c1620de12ca01a2a50784939e5fb' => 
    array (
      0 => '../1.2/shared/controllers/newsletter/templates/edit.tpl',
      1 => 1345755275,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146932678350369531c25038-43629014',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50369531cb66c6_62675199',
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
    'newsletter' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50369531cb66c6_62675199')) {function content_50369531cb66c6_62675199($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?>
    <div class="form">
    <form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
newsletter/update/<?php echo $_smarty_tpl->tpl_vars['newsletter']->value->getId();?>
/" method="post" enctype="multipart/form-data">
        <?php if ($_smarty_tpl->tpl_vars['error']->value!=''){?>
            <?php if ($_smarty_tpl->tpl_vars['error']->value=='user_not_found'){?> De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            <?php }elseif($_smarty_tpl->tpl_vars['error']->value=='email_invalid'){?> Vul een geldig emailadres in.
            <?php }?>
        <?php }?>
            <div class="blocks pageform">
                <div class="block settings">
                    <div class="field">
                        <div class="question"><label for="title">Titel</label></div>
                        <div class="answer"><input id="title" name="title" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Nieuwsbrief titel" /></div>
                    </div>
                    <div class="field">
                        <div class="question"><label for="document">Document</label></div>
                        <?php if ($_smarty_tpl->tpl_vars['newsletter']->value->getDocument()!=''){?>
                            <div class="answer"><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
<?php echo $_smarty_tpl->tpl_vars['newsletter']->value->getDocument();?>
" title="Document"><?php echo $_smarty_tpl->tpl_vars['newsletter']->value->getTitle();?>
</a></div>
                        <?php }else{ ?>
                            <div class="answer"><input id="document" name="document" type="file" placeholder="Document locatie" /></div>
                        <?php }?>
                    </div>
                    <div class="field">
                        <div class="question"><label for="active">Actief</label></div>
                        <?php if ($_smarty_tpl->tpl_vars['newsletter']->value->getActive()==1){?>
                            <div class="answer"><input id="active" name="active" type="checkbox" checked="checked" /></div>
                        <?php }else{ ?>
                            <div class="answer"><input id="active" name="active" type="checkbox" /></div>
                        <?php }?>
                    </div>
                    <div class="buttons">
                        <input type="submit" value="Opslaan" />
                    </div>
                </div>
            </div>
    </form>
</div><?php }} ?>