{extends file="main.tpl"}

{block name=top}

<div class="my_form">
	<form action="{$conf->action_url}personList">
		<legend>Opcje wyszukiwania</legend>
		<fieldset>
			<input type="text" placeholder="Nazwisko" name="sf_surname" value="{$searchForm->surname}" /><br />
			<button type="submit">Filtruj</button>
		</fieldset>
	</form>
</div>	

{/block}

{block name=bottom}

<div class="bottom-margin">
<a href="{$conf->action_root}personNew">+ Nowa osoba</a>
</div>	

<table class="zigzag" id="tab_people">
<thead>
	<tr>
		<th>Imię</th>
		<th>Nazwisko</th>
		<th>Data ur.</th>
		<th>Opcje</th>
	</tr>
</thead>
<tbody>
{foreach $people as $p}
{strip}
	<tr>
		<td>{$p["name"]}</td>
		<td>{$p["surname"]}</td>
		<td>{$p["birthdate"]}</td>
		<td>
			<a href="{$conf->action_url}personEdit&id={$p['idperson']}">Edytuj</a>
			&nbsp;
			<a href="{$conf->action_url}personDelete&id={$p['idperson']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
