<?php

// KONTROLER strony kalkulatora kredytowego

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

//security kontrolera- - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
include _ROOT_PATH.'/app/security/check.php';

//pet params
function getParams(&$loan_amount,&$loan_years,&$interest_rate){
	$loan_amount = isset($_REQUEST['loan_amount']) ? $_REQUEST['loan_amount'] : null;
	$loan_years = isset($_REQUEST['loan_years']) ? $_REQUEST['loan_years'] : null;
	$interest_rate = isset($_REQUEST['interest_rate']) ? $_REQUEST['interest_rate'] : null;	
}


// walidacja parametrów 
//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$loan_amount,&$loan_years,&$interest_rate,&$messages){
// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($loan_amount) && isset($loan_years) && isset($interest_rate))) {
		
		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $loan_amount == "") {
		$messages [] = 'Nie podano kwoty';
	}

	if ( $loan_years == "") {
		$messages [] = 'Nie podano okresu spłaty kredytu';
	}

	if ( $interest_rate == "") {
		$messages [] = 'Nie podano oprocentowania';
	}


	//Przypadek gdy brak parametrow
	if (count ( $messages ) != 0) return false;
	
	
	if (! is_numeric( $loan_amount )) {
		$messages [] = 'Wartość kredytu nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $loan_years )) {
		$messages [] = 'Okres spłaty kredytu nie jest liczbą całkowitą';
	}	

	if (! is_numeric( $interest_rate )) {
		$messages [] = 'Oprocentowanie nie jest liczbą całkowitą';
	}

	if (count ( $messages ) != 0) return false;
    else return true;
}

function process(&$loan_amount,&$loan_years,&$interest_rate,&$messages,&$monthly_payment){
    global $role;
    
    //konwersja parametrów na float
    $loan_amount = floatval($loan_amount);
    $loan_years = floatval($loan_years);
    $interest_rate = floatval($interest_rate);
    
    //obliczanie kalkulatora kredytowego
    $monthinterest = ($interest_rate / 100) / 12; //miesiączne oprocentowanie
    $monthnumber = $loan_years * 12; //liczba miesięcy
    $monthly_payment  = ($loan_amount * $monthinterest) / (1 - pow(1 + $monthinterest, -$monthnumber));
    $monthly_payment = round($monthly_payment, 2);  //zaokrąlenie do dwóch miejsc po przecinku
}

//definicja zmiennych kontrolera
$loan_amount = null;
$loan_years = null;
$interest_rate = null;
$monthly_payment = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($loan_amount,$loan_years,$interest_rate);
if ( validate($loan_amount,$loan_years,$interest_rate,$messages) ) { // gdy brak błędów
    process($loan_amount,$loan_years,$interest_rate,$messages,$monthly_payment);
}

// Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$loan_amount,$loan_years,$interest_rate,$monthly_payment)
//   będą dostępne w dołączonym skrypcie
include 'calc_loan_view.php';