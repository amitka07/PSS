<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';
//załaduj Smarty
require_once _ROOT_PATH.'/vendor/autoload.php';

use Smarty\Smarty;

//get params
function getParams(&$loan_amount,&$loan_years,&$interest_rate){
	$form['loan_amount'] = isset($_REQUEST['loan_amount']) ? $_REQUEST['loan_amount'] : null;
	$form['loan_years'] = isset($_REQUEST['loan_years']) ? $_REQUEST['loan_years'] : null;
	$form['interest_rate'] = isset($_REQUEST['interest_rate']) ? $_REQUEST['interest_rate'] : null;	
}



//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$form,&$infos,&$msgs,&$hide_intro){
// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($form['loan_amount']) && isset($form['loan_years']) && isset($form['oprocentowanie']) )) 		return false;
	
	$hide_intro = true;

	$infos [] = 'Przekazano parametry.';

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $form['loan_amount'] == "") $msgs [] = 'Nie podano kwoty';
	if (  $form['loan_years'] == "") $msgs [] = 'Nie podano okresu spłaty kredytu';
	if ( $form['interest_rate'] == "") $msgs [] = 'Nie podano oprocentowania';
	


	//Przypadek gdy brak parametrow
	if (count ( $msgs ) != 0) return false;{
	
	
	if (! is_numeric(  $form['loan_amount'] )) $msgs [] = 'Wartość kredytu nie jest liczbą całkowitą';

	
	if (! is_numeric(  $form['loan_years'] )) $msgs [] = 'Okres spłaty kredytu nie jest liczbą całkowitą';
		

	if (! is_numeric( $form['interest_rate'] )) $msgs [] = 'Oprocentowanie nie jest liczbą całkowitą';
	
	}
	if (count ( $msgs ) != 0) return false;
    else return true;
}

function process(&$form,&$infos,&$msgs,&$result){
    $infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
    
    //konwersja parametrów na float
    $form['loan_amount'] = floatval($form['loan_amount']);
    $form['loan_years'] = floatval($form['loan_years']);
    $form['interest_rate'] = floatval($form['interest_rate']);
    
    //obliczanie kalkulatora kredytowego
    $monthinterest = ($form['interest_rate'] / 100) / 12; //miesiączne oprocentowanie
    $monthnumber = $form['loan_years'] * 12; //liczba miesięcy
    $monthly_payment  = ($form['loan_amount'] * $monthinterest) / (1 - pow(1 + $monthinterest, -$monthnumber));
    $monthly_payment = round($monthly_payment, 2);  //zaokrąlenie do dwóch miejsc po przecinku
}

//definicja zmiennych kontrolera
$form = null;
$infos = array();
$messages = array();
$result = null;
$hide_intro = false;

getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
	process($form,$infos,$messages,$result);
}
// 4. Przygotowanie danych dla szablonu

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Przykład 04');
$smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header','Szablony Smarty');

$smarty->assign('hide_intro',$hide_intro);

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc_kredyt.html');