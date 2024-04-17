<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';

use Smarty\Smarty;
/** Kontroler kalkulatora
 *
 */
class CalcCtrl {

	private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku
	private $hide_intro; //zmienna informująca o tym czy schować intro

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
		$this->hide_intro = false;
	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->loan_amount = isset($_REQUEST['loan_amount']) ? $_REQUEST['loan_amount'] : null;
		$this->form->loan_years = isset($_REQUEST['loan_years']) ? $_REQUEST['loan_years'] : null;
		$this->form->interest_rate = isset($_REQUEST['interest_rate']) ? $_REQUEST['interest_rate'] :  null;	
	}
	
	/** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->loan_amount ) && isset ( $this->form->loan_years ) && isset ( $this->form->interest_rate ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false; //zakończ walidację z błędem
		} else { 
			$this->hide_intro = true; //przyszły pola formularza, więc - schowaj wstęp
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->loan_amount == "") {
			$this->msgs->addError('Nie podano wartości kredytu');
		}
		if ($this->form->loan_years == "") {
			$this->msgs->addError('Nie podano lat spłaty');
		}
		if ($this->form->interest_rate == "") {
			$this->msgs->addError('Nie podano oprocentowania');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! $this->msgs->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->loan_amount )) {
				$this->msgs->addError('Wartość kredytu nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->loan_years )) {
				$this->msgs->addError('Wartość roku/lat nie jest liczbą całkowitą');
			}
			if (! is_numeric ( $this->form->interest_rate )) {
				$this->msgs->addError('Wartość oprocentowania nie jest liczbą ');
			}
		}
		
		return ! $this->msgs->isError();
	}
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function process(){

		$this->getparams();

		if ($this->validate()) {
				
			//konwersja parametrów na int
			$this->form->loan_amount = intval($this->form->loan_amount);
			$this->form->loan_years = intval($this->form->loan_years);
			$this->form->interest_rate = intval($this->form->interest_rate);
			$this->msgs->addInfo('Parametry poprawne.');
				
			//wykonanie operacji
				function process(&$form, &$infos, &$msgs, &$result) {
					$infos[] = 'Parametry poprawne. Wykonuję obliczenia.';
				
			//konwersja parametrów
			$this->form->loan_amount = floatval($this->form->loan_amount);
			$this->form->loan_years = floatval($this->form->loan_years);
			$this->form->interest_rate = floatval($this->form->interest_rate);
			$this->msgs->addInfo('Parametry poprawne.');
				
			
				// Obliczanie kalkulatora kredytowego
				$monthinterest = ($this->form->interest_rate / 100) / 12; // Miesięczne oprocentowanie
				$monthnumber = $this->form->loan_years * 12; // Liczba miesięcy
				$result  = ($this->form->loan_amount * $monthinterest) / (1 - pow(1 + $monthinterest, -$monthnumber));
				$result = round($result, 2);  // Zaokrąglenie do dwóch miejsc po przecinku
				
				$this->msgs->addInfo('Miesiączna rata kredytu została obliczona');
				// Przypisanie wyniku do obiektu wynikowego
				$this->result->result = $result;
			}
			
			
			$this->msgs->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	
	
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Przykład 05');
		$smarty->assign('page_description','Obiektowość. Funkcjonalność aplikacji zamknięta w metodach różnych obiektów. Pełen model MVC.');
		$smarty->assign('page_header','Obiekty w PHP');
				
		$smarty->assign('hide_intro',$this->hide_intro);
		
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
		
		$smarty->display($conf->root_path.'/app/CalcView.html');
	}
}
