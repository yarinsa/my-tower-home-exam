
<?php

class PhoneLog
{

    public $customer_id;
    public $date;
    public $duration;
    public $phone;
    public $ip;

    function __construct($customer_id, $date, $duration, $phone, $ip)
    {
        $this->customer_id = $customer_id;
        $this->date = $date;
        $this->phone = $phone;
        $this->duration = $duration;
        $this->ip = $ip;
    }
}
?>