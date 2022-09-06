<?php

    class HTMLFilter {

        function __construct($html) {
            $this->html = $html;
        }

        function getContent ($start,$final) {
            return $start.explode($final,explode($start,$this->html)[1])[0].$final;
        }

        function getContentHTML ($html,$start,$final) {
            return $start.explode($final,explode($start,$html)[1])[0].$final;
        }

        function getContentHTMLByTag ($html,$tag) {
            $start = $tag;
            $final = explode(" ",$start)[0];
            $content = "<".$start.explode($final,explode($start,$html)[1])[0]."</".$final.">";
            return $content;
        }

    }


?>