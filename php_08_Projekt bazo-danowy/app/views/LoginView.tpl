{extends file="main.tpl"}

{block name=top}
<form action="{$conf->action_root}login" method="post" class="login_view">
	<legend class="login_legend">Logowanie do systemu</legend>
	<fieldset>
        <div>
			<label for="id_login">login: </label>
			<input id="id_login" type="text" name="login" value="{$form->login}"/>
		</div>
        <div>
			<label for="id_pass">pass: </label>
			<input id="id_pass" type="password" name="pass" /><br />
		</div>
		<div>
			<input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	
{/block}
