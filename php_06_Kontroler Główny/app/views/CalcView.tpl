{extends file="main.tpl"}

{block name=footer} Przykładowa treść stopki {/block}

{block name=content}
	<h3>Prosty kalkulator</h3>
	<form class="credit_form" action="{$conf->action_root}calcCompute" method="post">
		<label for="id_x"> {$loan_amount|default:"Kwota"} </label>
		<input id="id_x" onfocus="this.value=''" type="text" name="amount" value="{$form->amount} "/><br />
		<label for="id_y"> {$number_of_years|default:"Lata"} </label>
		<input id="id_y" onfocus="this.value=''" type="text" name="months" value="{$form->months} "/><br />
		<label for="id_z"> {$percent_desc|default:"Oprocentowanie"} </label>
		<input id="id_z" onfocus="this.value=''" type="text" name="percent" value="{$form->percent} "/><br />
		<input type="submit" value="{$count|default:"X"}"/>
	</form>
	<div class="messages">
		{block name=messages}
			{if $msgs->isError()}
				<h4>Wystąpiły błędy: </h4>
				<ol class="err">
					{foreach $msgs->getErrors() as $err}
						{strip}
							<li>{$err}</li>
						{/strip}
					{/foreach}
				</ol>
			{/if}
		{/block}
		{block name=infos}
			{if $msgs->isInfo()}
				<h4>Informacje: </h4>
				<ol class="inf">
					{foreach $msgs->getInfos() as $inf}
						{strip}
							<li>{$inf}</li>
						{/strip}
					{/foreach}
				</ol>
			{/if}
		{/block}
		{block name=result}
			{if $res}
				<h4>Wynik</h4>
				<p class="res">
					{$res} {$amount_curr|default:"zł"}
				</p>
			{/if}
		{/block}
	</div>
{/block}
