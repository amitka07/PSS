<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{$page_description|default:'Opis domyślny'}">
	<title>{$page_title|default:"Projekt z bazą danych"}</title>
	<link rel="stylesheet" href="{$conf->app_url}/assets/styles/styles.css">
	<link rel="icon" type="image/x-icon" href="{$conf->app_url}/assets/img/favicon.ico">
	<script src="{$conf->app_url}/assets/js/index.js"></script>
	<meta name="author" content="Arkadiusz Mitka">
</head>

<body style="margin: 20px;">

<div class="menu">
	<a href="{$conf->action_root}personList" class="pure-menu-heading pure-menu-link">Lista</a>
	{if count($conf->roles)>0}
		<a href="{$conf->action_root}logout" class="pure-menu-heading pure-menu-link">Wyloguj</a>
	{else}
		<a href="{$conf->action_root}loginShow" class="pure-menu-heading pure-menu-link">Zaloguj</a>
	{/if}
</div>

{block name=top} {/block}

{block name=messages}

{if $msgs->isError()}
<div class="err">
	<ul>
	{foreach $msgs->getErrors() as $msg}
	{strip}
		<li>{$msg}</li>
	{/strip}
	{/foreach}
	</ul>
</div>
{/if}

{if $msgs->isInfo()}
<div class="inf">
	<ul>
	{foreach $msgs->getInfos() as $msg}
	{strip}
		<li>{$msg}</li>
	{/strip}
	{/foreach}
	</ul>
</div>
{/if}

{/block}

{block name=bottom} {/block}

</body>

</html>