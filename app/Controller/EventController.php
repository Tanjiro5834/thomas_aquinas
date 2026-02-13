<?php
require_once __DIR__ . '/../Models/Event.php';

class EventController{
    private $eventModel;

    public function __construct(){
        $this->eventModel = new Event();
    }

    public function createEvent($name, $description, $eventDate, $location){
        if(empty($name) || empty($description) || empty($eventDate) || empty($location)) {
            throw new InvalidArgumentException("All fields are required.");
        }

        return $this->eventModel->create($name, $description, $eventDate, $location);
    }

    public function getEvents(){
        return $this->eventModel->getAll();
    }

    public function deleteEvent($id){
        if(empty($id)) {
            throw new InvalidArgumentException("Event ID is required.");
        }

        return $this->eventModel->deleteEvent($id);
    }

    public function editEvent($id, $name, $description, $eventDate, $location){
        if(empty($id) || empty($name) || empty($description) || empty($eventDate) || empty($location)) {
            throw new InvalidArgumentException("All fields are required.");
        }

        return $this->eventModel->editEvent($id, $name, $description, $eventDate, $location);
    }
}