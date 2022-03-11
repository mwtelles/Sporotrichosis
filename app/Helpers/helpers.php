<?php

/**
 * RETORNA O NOME DO MES A PARTIR DE SEU NUMERO - EX: MES 2 = FEVEREIRO
 * @param $mounth
 * @return string
 */
if(!function_exists('getLabelMounth')){
    function getLabelMounth($mounth)
    {
        return [
            'Janeiro',
            'Fevereiro',
            'Março',
            'Abril',
            'Maio',
            'Junho',
            'Julho',
            'Agosto',
            'Setembro',
            'Outubro',
            'Novembro',
            'Dezembro',
        ][(int)$mounth - 1];
    }
}

