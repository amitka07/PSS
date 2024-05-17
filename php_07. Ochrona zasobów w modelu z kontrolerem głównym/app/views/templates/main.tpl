<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{$page_description|default:'Opis domyślny'}">
	<title>{$page_title|default:"Tytuł domyślny"}</title>
	<link rel="stylesheet" href="{$conf->app_url}/assets/styles/styles.css">
	<link rel="icon" type="image/x-icon" href="{$conf->app_url}/assets/img/favicon.ico">
	<script src="{$conf->app_url}/assets/js/index.js"></script>
	<meta name="author" content="Arkadiusz Mitka">
</head>
<body>
	<div id="main" class="content">
		{block name=content} Domyślna treść zawartości ... {/block}
	</div>
</body>
</html>