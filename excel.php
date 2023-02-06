<?php

date_default_timezone_set('America/Lima');

class Excel{

    public function generateExcel(){

        $data = file_get_contents("clientes.json");
        $a_customers = json_decode($data, true);

        $download_day = str_replace(':','-',date('d-m-Y-h:i:s'));
        $path_file = 'mails/mail_'. $download_day . '.csv';
        
        $fp = fopen($path_file, 'w');

        fputcsv($fp, array_keys($a_customers[0]));

        foreach ($a_customers as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
        return $path_file;  
    }
}
?>
