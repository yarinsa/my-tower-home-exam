<?php

require './model/phoneLog.class.php';


// Params: 
// key - The field key to match the value to
// value - The field value that matches to the key
// The function iterates trough a multidimensional array and returns the first index where the key matches the value 
// Will return false if item doesn't exist
function getIndex($key, $value, $matrix)
{
    for ($i = 0; $i < count($matrix); $i++) {
        for ($j = 0; $j < count($matrix[$i]); $j++) {
            if ($matrix[$i][$key] === $value) {
                return $i;
            }
        }
    }
    return false;
}

//The function gets a File Input name attribute value and returns the requested data in an array.
function getTableDataByCSV($input_name)
{
    $file = (isset($_REQUEST[$input_name])) ? $_REQUEST[$input_name] : null;
    $data = [];

    if (($h = fopen("{$file}", "r")) !== FALSE) {

        while (($record = fgetcsv($h, 1000, ",")) !== FALSE) {

            $phone_log = new PhoneLog($record[0], $record[1], $record[2], $record[3], $record[4]);

            $index = getIndex('costumer_id', $phone_log->customer_id, $data);
            $is_within_continent = (getContinentByPhoneNumber($phone_log->phone) === getContinentByIp($phone_log->ip));

            if ($index !== false) { // Record about this client already exist
                $data[$index]['total_calls']++;
                $data[$index]['total_duration'] += $phone_log->duration;

                if ($is_within_continent) {
                    $data[$index]['total_duration_within_continent'] += $phone_log->duration;
                    $data[$index]['total_calls_within_continent']++;
                }
            } else {
                $is_within_continent ? $total_calls_within_continent = 1 : $total_calls_within_continent = 0;
                $is_within_continent ? $total_duration_within_continent = $phone_log->duration : $total_duration_within_continent = 0;

                $data[] = array(
                    'costumer_id' => $phone_log->customer_id,
                    'total_calls' => 1,
                    'total_duration' => $phone_log->duration,
                    //                    'total_calls_within_continent' => $total_calls_within_continent,
                    //                    'total_duration_within_continent' => $total_duration_within_continent,
                );
            }
        }

        fclose($h);
    }

    return $data;
}
