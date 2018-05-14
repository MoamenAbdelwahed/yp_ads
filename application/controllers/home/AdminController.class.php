<?php

class AdminController extends Controller{
    public function loginAction(){
        include CURR_VIEW_PATH . "login.php";
    }

    public function loginFormAction(){
        $adminModel = new AdminModel("admins");
        $admin = $adminModel->login($_POST['username'],md5($_POST['password']));
        if(count($admin) > 0){
            $_SESSION['username'] = $_POST['username'];
            header('location: /ads/index.php?c=admin&a=panel');
        }else{
            header('location: /ads/index.php?c=admin&a=login');
        }
    }

    public function panelAction(){
        $adsModel = new AdsModel("ads");
        $ads = $adsModel->getAds();
        include CURR_VIEW_PATH . "panel.php";
    }

    public function addAction(){
        include CURR_VIEW_PATH . "add.php";
    }

    public function addFormAction(){
        $adsModel = new AdsModel("ads");
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        move_uploaded_file($file_tmp,"public/images/".$file_name);
        $imagePath = "public/images/".$file_name;
        $ad = $adsModel->postOne(['image'=>$imagePath,'description'=>$_POST['description']]);
        header('location: /ads/index.php?c=admin&a=panel');
    }
    public function editAction(){
        $adsModel = new AdsModel("ads");
        $ad = $adsModel->getAd($_GET['id']);
        include CURR_VIEW_PATH . "edit.php";
    }

    public function editFormAction(){
        $adsModel = new AdsModel("ads");
        if($_FILES){
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
            move_uploaded_file($file_tmp,"public/images/".$file_name);
            $imagePath = "public/images/".$file_name;
            $ad = $adsModel->update(['id'=>$_GET['id'],'image'=>$imagePath,'description'=>$_POST['description']]);
        }else{
            $ad = $adsModel->update(['id'=>$_GET['id'],'description'=>$_POST['description']]);
        }
        header('location: /ads/index.php?c=admin&a=panel');
    }

    public function deleteAction(){
        if($_SESSION['username']){
            $adsModel = new AdsModel("ads");
            $ads = $adsModel->delete($_GET['id']);
            header('location: /ads/index.php?c=admin&a=panel');
        }
    }
}