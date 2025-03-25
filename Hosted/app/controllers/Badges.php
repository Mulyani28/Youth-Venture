<?php

class Badges extends Controller{
private $postModel;
    public function __construct(){
        $this->postModel=$this->model('Badge');
    }
//test push
    public function index(){

        $badges = $this->postModel->findAllBadges();
        $data=[
            'badges'=>$badges
        ];
        $this->view('badges/index',$data);
    }
}?>