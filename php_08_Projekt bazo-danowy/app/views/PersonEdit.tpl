{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="add_new" action="{$conf->action_root}personSave" method="post">
	<fieldset>
		<legend>Dane osoby</legend>
		<div>
            <label for="name">Imię</label>
            <input id="name" type="text" placeholder="imię" name="name" value="{$form->name}">
        </div>
		<div>
            <label for="surname">Nazwisko</label>
            <input id="surname" type="text" placeholder="nazwisko" name="surname" value="{$form->surname}">
        </div>
		<div>
            <label for="birthdate">Data ur.</label>
            <input id="birthdate" type="text" placeholder="data ur." name="birthdate" value="{$form->birthdate}">
        </div>
		<div>
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}personList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="{$form->id}">
</form>	
</div>

{/block}
