<?php

use Brick\PhoneNumber\PhoneNumber;

function getContinentByIp($ip)
{
    $url = 'http://api.ipstack.com/' . $ip . '?access_key=d9f000dbc0237078dfb39bf8033d244c';
    $response = file_get_contents($url);
    $result = json_decode($response, TRUE);
    return $result['continent_code'];
}

function getContinentByPhoneNumber($phone)
{
    $country_code = PhoneNumber::parse('+' . $phone)->getCountryCode();
    $dbhost = 'remotemysql.com:3306';
    $dbuser = 'bH2QZ6bL7Y';
    $dbpass = 'QdocJbiznV';
    $dbname = 'bH2QZ6bL7Y';
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    $sql = "SELECT * FROM `COUNTRY_INFO` WHERE `Phone` LIKE $country_code";
    $result = $mysqli->query($sql)->fetch_all(MYSQLI_ASSOC);

    $mysqli->close();

    return $result[0]["Continent"];
}
