<?php
   
    class Table {
        private $value;
        function __construct($value) {
            $value = preg_replace('/h2/','',$value);
            $value = preg_replace('/center/','',$value);
            $value = preg_replace('/Ano/','',$value);
            $value = preg_replace('/Ano/','',$value);
            $value = preg_replace('/Janeiro/','',$value);
            $value = preg_replace('/Fevereiro/','',$value);
            $value = preg_replace('/Março/','',$value);
            $value = preg_replace('/Abril/','',$value);
            $value = preg_replace('/Maio/','',$value);
            $value = preg_replace('/Junho/','',$value);
            $value = preg_replace('/Julho/','',$value);
            $value = preg_replace('/Agosto/','',$value);
            $value = preg_replace('/Setembro/','',$value);
            $value = preg_replace('/Outubro/','',$value);
            $value = preg_replace('/Novembro/','',$value);
            $value = preg_replace('/Dezembro/','',$value);
            $value = preg_replace('/ead/','',$value);
            $value = preg_replace('/Total/','',$value);
            $value = preg_replace('/background/','',$value);
            $value = preg_replace('/-/','',$value);
            $value = preg_replace('/color/','',$value);
            $value = preg_replace('/:/','',$value);
            $value = preg_replace('/=/','',$value);
            $value = preg_replace('/"/','',$value);
            $value = preg_replace('/line/','',$value);
            $value = preg_replace('/style/','',$value);
            $value = preg_replace('/rgba((.*?))/','',$value);
            $value = preg_replace('/\(/','',$value);
            $value = preg_replace('/\)/','',$value);
            $value = preg_replace('/\,/','',$value);
            $value = preg_replace('/\./','',$value);
            $value = preg_replace('/\;/','',$value);
            $value = preg_replace('/id/','',$value);
            $value = preg_replace('/tbody/','',$value);
            $value = preg_replace('/table/','',$value);
            $value = preg_replace('/tr/','',$value);
            $value = preg_replace('/th/','',$value);
            $value = preg_replace('/td/','',$value); 
            $value = preg_replace('/[^[:alpha:]_]/','',$value);  
            $value = str_replace("MximoMdiaMnimo", "", $value);    
            $this->value=$value;
        }
        public function __toString():string {
            return $this->value;   
        }
    }

?>    
