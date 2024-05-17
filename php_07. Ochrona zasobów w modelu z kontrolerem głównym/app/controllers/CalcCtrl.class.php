<?php

namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;

class CalcCtrl {

    private $form;
    private $result_calc;

    public function __construct(){
        $this->form = new CalcForm();
        $this->result_calc = new CalcResult();
    }

    public function getParams(){
        $this->form->loan_amount = $_REQUEST ['loan_amount'] ?? null;
        $this->form->years = $_REQUEST ['years'] ?? null;
        $this->form->interest_rate = $_REQUEST ['interest_rate'] ?? 0;
    }

    public function validate(): bool {
        if (! (isset ( $this->form->loan_amount ) && isset ( $this->form->years ) && isset ( $this->form->interest_rate ))) {
            return false;
        }

        if ($this->form->loan_amount == "" || $this->form->loan_amount <= 0) {
            getMessages()->addError('Nie podano kwoty');
        }
        if ($this->form->years == "" || $this->form->years <= 0 ) {
            getMessages()->addError('Nie podano ilości lat');
        }

        if (! getMessages()->isError()) {
            if ( is_int ( $this->form->loan_amount )) {
                getMessages()->addError('Kwota nie jest liczbą');
            }

            if ( is_int ( $this->form->years )) {
                getMessages()->addError('Lata nie jest liczbą');
            }

            if (!($this->form->interest_rate == '') && !is_numeric($this->form->interest_rate)) {
                getMessages()->addError('Procenty nie są liczbą');
            }
        }

        return ! getMessages()->isError();
    }

    public function action_process() {

        $this->getparams();
        $this->result_calc = 0;

        if ($this->validate()) {
            $this->form->loan_amount = intval($this->form->loan_amount);
            $this->form->years = intval($this->form->years);
            $this->form->interest_rate = intval($this->form->interest_rate) / 100;
            getMessages()-> addInfo('Parametry poprawne.');

            if ($this->form->interest_rate <= 0) {
                $this->result_calc = $this->form->loan_amount / ($this->form->years * 12);
            } else {
                $this->result_calc = ($this->form->loan_amount * (($this->form->interest_rate / 100) / 12) * ((1 + (($this->form->interest_rate / 100) / 12)) ** ($this->form->years * 12))) / ((((1 + ($this->form->interest_rate  / 12 / 100)) ** ($this->form->years* 12))) - 1);
            }

            $this->result_calc = round($this->result_calc, 2);
            getMessages()-> addInfo('Wykonano obliczenia.');
        }

        $this->generateView();
    }

    public function action_calcShow(){
        getMessages()->addInfo('Witaj w kalkulatorze kredytowym');
        $this->generateView();
    }

    public function generateView() {
        getSmarty()->assign('page_title','Kontroler główny & autoloader klas');
        getSmarty()->assign('page_description','Kontroler główny (jeden punkt wejścia) -> Nowa struktura  -> Przestrzenie nazw i automatyczne ładowanie klas');
        getSmarty()->assign('page_header','Początek organizacji frameworka');

        getSmarty()->assign('user',unserialize($_SESSION['user']));
        getSmarty()->assign('page_title','Kalkulator kredytowy');

        getSmarty()->assign('amount_curr','zł miesięcznie');
        getSmarty()->assign('loan_amount','Kwota kredytu: ');
        getSmarty()->assign('number_of_years','Ilość lat: ');
        getSmarty()->assign('percent_desc','Oprocentowanie (liczba całkowita np. 1): ');

        getSmarty()->assign('errors','Wystąpiły błędy:');
        getSmarty()->assign('info','Informacje:');
        getSmarty()->assign('calc_here','Wynik:');
        getSmarty()->assign('form_heading','Kalkulator Kredytowy');
        getSmarty()->assign('count','Oblicz jedną ratę');

        getSmarty()->assign('footer_1','Kalkulator kredytowy prosty widok Tomasz Bracik');
        getSmarty()->assign('footer_2','Z wykorzystaniem technologii php/smart/css');

        getSmarty()->assign('form',$this->form);

        if ($this->result_calc instanceof CalcResult) {
            getSmarty()->assign('res','');
        } else {
            getSmarty()->assign('res',$this->result_calc);
        }

        getSmarty()->display('CalcView.tpl');
    }
}

