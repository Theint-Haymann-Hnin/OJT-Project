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
    // public function store($data)
    // {
    //     $this->userDao->store($data);
    // }
    public function storeCollectData($data)
    {
        $this->userDao->storeCollectData($data);
    }

    public function delete($id){
        $this->userDao->delete($id);
    }
    // public function update($user_data_to_update, $id){
    //     $this->userDao->update($user_data_to_update, $id);
    // }
    
    
} 
