<?php
include_once 'MainController.php';
require_once(__DIR__ . '/../config.php');


class AdminGetBookingList extends Controller{
    private $getBooking;
    private $getEvent;
  
    public function __construct() {
        $this->loadModel("getBooking");
        $this->getBooking = $this->model;

        $this->loadModel("getEvent");
        $this->getEvent = $this->model;
    }

    public function getBookingList () {
        return $this->getBooking->get();
        
    }

    public function getEventList () {
        return $this->getEvent->get();
        
    }

}