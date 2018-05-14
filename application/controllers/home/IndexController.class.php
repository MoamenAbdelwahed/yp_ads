<?php

class IndexController extends Controller{
    public function indexAction(){
        $adsModel = new AdsModel("ads");
        $ads = $adsModel->getAds();
        include CURR_VIEW_PATH . "home.php";
    }

    public function showAction(){
        $id = $_GET['id'];
        $adsModel = new AdsModel("ads");
        $ad = $adsModel->getAd($id);

        $commentsModel = new CommentsModel("comments");
        $comments = $commentsModel->getComments($id);
        include CURR_VIEW_PATH . "show.php";
    }

    public function CommentAction(){
        $commentsModel = new CommentsModel("comments");
        $commentsModel->postOne($_GET['id'],$_POST);
        header('location: /ads');
    }
}