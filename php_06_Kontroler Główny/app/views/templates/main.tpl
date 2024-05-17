<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{$page_description|default:'Opis domyślny'}">
	<title>{$page_title|default:"Tytuł domyślny"}</title>
	<link rel="stylesheet" href="{$conf->app_url}/assets/styles/styles.css">
	<link rel="icon" type="image/x-icon" href="{$conf->app_url}/assets/img/favicon.ico">
	<script src="{$conf->app_url}/assets/js/index.js"></script>
	<meta name="author" content="Tomasz Bracik">
</head>
<body>

<div id="app_top" class="menu">
	<div class="my-menu">
		<a href="">Kalkulator Kredytowy</a>
		<ul>
			<li><a href="#">Góra strony</a></li>
			<li><a href="#main">Idź do kalkulatora</a></li>
		</ul>
	</div>
</div>

<div class="header">
	<img class="pepe" alt="" src="{$conf->app_url}/assets/img/pepe_happy.png">
	<h1>{$page_title|default:"Tytuł domyślny"}</h1>
	<h2>{$page_header|default:"Tytuł domyślny"}</h2>
	<p>{$page_description|default:"Opis domyślny"}</p>
</div>

<div id="main" class="content">
	{block name=content} Domyślna treść zawartości ... {/block}
</div>

<div class="footer">
	<p>
		{block name=footer} Domyślna treść stopki ... {/block}
	</p>
	<p>
		{block name=footer_desc} Dodatkowy tekst stopki {/block}
	</p>
</div>
</body>
</html>