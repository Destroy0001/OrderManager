<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * User Controller
 *
 * @property \App\Model\Table\UserTable $User
 */
class UserController extends AppController
{

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $arr = array("login" => "true");
            }else{
                $arr = array("login" => "false");
            }
        }else{
            $arr = array("login" => "false");
            $this->redirect('/');
        }
    
        $this->autoRender = false;
        $this->response->type('json');
        $this->response->body(json_encode($arr));
        return $this->response; 
    }
    
    
    public function logout() {
        $this->Auth->logout();
        $this->autorender = false;
        $this->redirect('/');
    }
}
