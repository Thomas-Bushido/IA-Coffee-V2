<?php
include_once 'MainController.php';
require_once(__DIR__ . '/../config.php');


class AdminGetBookingList extends Controller{
    private $getBooking;
  
    public function __construct() {
        $this->loadModel("getBooking");
        $this->getBooking = $this->model;
    }

    public function getBookingList () {
        return $this->getBooking->get();
        
    }

}