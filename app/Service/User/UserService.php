<?php 
namespace App\Service\User;
use App\Dao\User\UserDao;
use App\Contract\Service\User\UserServiceInterface;
class userService implements UserServiceInterface
    {
    private $userDao;
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
    public function findUserById($id)
    {      
        return $users= $this->userDao ->findUserById($id);
    }

    public function delete($id)
    {
        $this->userDao->delete($id);
    }
    public function  updateUser($user_data_to_update, $id)
    {
        $this->userDao->updateUser($user_data_to_update, $id);
    }
    public function search($name, $email,$start_date , $end_date)
    {   
        return  $this->userDao->search($name, $email,$start_date , $end_date);
       
    }
    
    
} 
