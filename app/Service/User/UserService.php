<?php 
namespace App\Service\User;
use App\Models\User;
use App\Dao\User\UserDao;
use App\Contract\Service\User\UserServiceInterface;
class userService implements UserServiceInterface {
    public $userDao;
    public function __construct (UserDao $user_dao)
    {
        $this->userDao = $user_dao;
    } 
    public function index(){
        return $this->userDao->index();
    } 
    public function storeCollectData($data)
    {
        $this->userDao->storeCollectData($data);
    }
    public function edit($id)
    {      
        return $users= $this->userDao ->edit($id);
    }

    public function delete($id){
        $this->userDao->delete($id);
    }
    public function  updateConfirm($user_data_to_update, $id){
        $this->userDao->updateConfirm($user_data_to_update, $id);
    }
    
    
} 
