<?php /* Smarty version Smarty-3.1.8, created on 2012-12-25 10:18:10
         compiled from "../1.2/shared/controllers/teams/templates/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7415235525032a7c661f3d1-60952996%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e613f4a017df659f840d7654606c180030feb4a7' => 
    array (
      0 => '../1.2/shared/controllers/teams/templates/edit.tpl',
      1 => 1356426895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7415235525032a7c661f3d1-60952996',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5032a7c66ab149_29663931',
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
    'teams' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5032a7c66ab149_29663931')) {function content_5032a7c66ab149_29663931($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?>
    <div class="form">
    <form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
teams/update/<?php echo $_smarty_tpl->tpl_vars['teams']->value->getId();?>
/" method="post" enctype="multipart/form-data">
        <?php if ($_smarty_tpl->tpl_vars['error']->value!=''){?>
            <?php if ($_smarty_tpl->tpl_vars['error']->value=='user_not_found'){?> De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            <?php }elseif($_smarty_tpl->tpl_vars['error']->value=='email_invalid'){?> Vul een geldig emailadres in.
            <?php }?>
        <?php }?>
            <div class="blocks pageform">
                <div class="block settings">
                    <div class="field">
                        <div class="question"><label for="title">Team naam</label></div>
                        <div class="answer"><input id="title" name="title" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['teams']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Naam van het team" /></div>
                    </div>
                    <div class="field">
                        <div class="question"><label for="text">Team omschrijving</label></div>
                        <div class="answer"><textarea id="text" name="text" placeholder="Team omschrijving, max 320 karakters"><?php echo $_smarty_tpl->tpl_vars['teams']->value->getText();?>
</textarea></div>
                    </div>
                    <div class="field">
                        <div class="question"><label for="picture">Team foto</label></div>
                        <?php if ($_smarty_tpl->tpl_vars['teams']->value->getPicture()!=''){?>
                            <div class="answer">
                                <img src="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
<?php echo $_smarty_tpl->tpl_vars['teams']->value->getPicture();?>
" border="0" title="Teamfoto" />
                                <input type="hidden" name="picture" value="<?php echo $_smarty_tpl->tpl_vars['teams']->value->getPicture();?>
" />
                                <input type="hidden" name="picturePresent" value="true" />
                            </div>
                        <?php }else{ ?>
                            <div class="answer"><input id="picture" name="picture" type="file" value="" maxlength="160" placeholder="Locatie teamfoto" /></div>
                        <?php }?>
                    </div>
                    <div class="field">
                        <div class="question"><label for="active">Actief</label></div>
                        <?php if ($_smarty_tpl->tpl_vars['teams']->value->getActive()==1){?>
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