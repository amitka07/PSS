<?php
/* Smarty version 3.1.30, created on 2022-10-21 14:07:02
  from "C:\xampp\htdocs\php_06_namespaces\app\views\CalcView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63528b66839b86_70860343',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '539dfb074d54a411cf2dd51c3f900d2dc26cedc6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_06_namespaces\\app\\views\\CalcView.tpl',
      1 => 1666353985,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_63528b66839b86_70860343 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_45569195163528b66823231_58206967', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_122347647363528b66839680_47586827', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'footer'} */
class Block_45569195163528b66823231_58206967 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Przykładowa treść stopki <?php
}
}
/* {/block 'footer'} */
/* {block 'messages'} */
class Block_175916020763528b66834bd7_23619608 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
				<h4>Wystąpiły błędy: </h4>
				<ol class="err">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
?>
						<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</ol>
			<?php }?>
		<?php
}
}
/* {/block 'messages'} */
/* {block 'infos'} */
class Block_29595980163528b66837761_07508232 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
				<h4>Informacje: </h4>
				<ol class="inf">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
?>
						<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</ol>
			<?php }?>
		<?php
}
}
/* {/block 'infos'} */
/* {block 'result'} */
class Block_45127611663528b66839240_74048880 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			<?php if ($_smarty_tpl->tpl_vars['res']->value) {?>
				<h4>Wynik</h4>
				<p class="res">
					<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
 <?php echo (($tmp = @$_smarty_tpl->tpl_vars['amount_curr']->value)===null||$tmp==='' ? "zł" : $tmp);?>

				</p>
			<?php }?>
		<?php
}
}
/* {/block 'result'} */
/* {block 'content'} */
class Block_122347647363528b66839680_47586827 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<h3>Prosty kalkulator</h3>
	<form class="credit_form" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute" method="post">
		<label for="id_x"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['loan_amount']->value)===null||$tmp==='' ? "Kwota" : $tmp);?>
 </label>
		<input id="id_x" onfocus="this.value=''" type="text" name="amount" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->amount;?>
 "/><br />
		<label for="id_y"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['number_of_years']->value)===null||$tmp==='' ? "Lata" : $tmp);?>
 </label>
		<input id="id_y" onfocus="this.value=''" type="text" name="months" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->months;?>
 "/><br />
		<label for="id_z"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['percent_desc']->value)===null||$tmp==='' ? "Oprocentowanie" : $tmp);?>
 </label>
		<input id="id_z" onfocus="this.value=''" type="text" name="percent" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->percent;?>
 "/><br />
		<input type="submit" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['count']->value)===null||$tmp==='' ? "X" : $tmp);?>
"/>
	</form>
	<div class="messages">
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_175916020763528b66834bd7_23619608', 'messages', $this->tplIndex);
?>

		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_29595980163528b66837761_07508232', 'infos', $this->tplIndex);
?>

		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_45127611663528b66839240_74048880', 'result', $this->tplIndex);
?>

	</div>
<?php
}
}
/* {/block 'content'} */
}
