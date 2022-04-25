<?php

final class EventController
{
    private $model;

    public function __construct()
    {
        $this->model = new document;
    }

    public function index(){

        /** Definition of a data table defined below. **/
        $data = [];

        View::render('event/index', $data);
    }
}