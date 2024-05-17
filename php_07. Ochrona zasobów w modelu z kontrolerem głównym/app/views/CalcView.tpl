{extends file="main.tpl"}

{block name=content}

<div class="menu-top">
	<a href="{$conf->action_url}logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span class="user-info">użytkownik: {$user->login}, rola: {$user->role}</span>
</div>

<div class="banner">
	<img class="pepe" alt="" src="{$conf->app_url}/assets/img/pepe_happy.png">
</div>


<h3>Prosty kalkulator kredytowy</h3>
<form class="credit_form" action="{$conf->action_root}process" method="post">
	<label for="id_x"> {$loan_amount|default:"Kwota"} </label>
	<input id="id_x" onfocus="this.value=''" type="text" name="amount" value="{$form->amount} "/><br />
	<label for="id_y"> {$number_of_years|default:"Lata"} </label>
	<input id="id_y" onfocus="this.value=''" type="text" name="months" value="{$form->months} "/><br />
	<label for="id_z"> {$percent_desc|default:"Oprocentowanie"} </label>
	<input id="id_z" onfocus="this.value=''" type="text" name="percent" value="{$form->percent} "/><br />
	<input type="submit" value="{$count|default:"X"}"/>
</form>

{include file='messages.tpl'}

{if $res}
	<h4>Wynik</h4>
	<p class="res">
		{$res} {$amount_curr|default:"zł"}
	</p>
{/if}

{/block}