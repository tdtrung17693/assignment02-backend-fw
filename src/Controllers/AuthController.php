<?php
namespace Controllers;

use Database;

class AuthController extends BaseController {
    protected \SessionManager $sessionManager;
    protected Database $database;
    public function __construct(Database $database, \SessionManager  $sessionManager)
    {
        $this->database = $database;
        $this->sessionManager = $sessionManager;
    }

    public function login() {
        return $this->view('login1');
    }

    public function register()
    {
        return $this->view('register');

    }

    public function forgotpw()
    {
        return $this->view('forgotpw');

    }

    public function checkRegister()
    {
        if (isset($_POST['check_fname']))
        {
            $fname = $_POST['check_fname'];
            if(strlen($fname) < 2 || strlen($fname) > 30) {

                return '<span class="text-danger"> Firstname: 2 - 30 characters!  </span>';
            }
            else
            {
                return '';
            }
        }
        if (isset($_POST['check_lname']))
        {
            $lname = $_POST['check_lname'];
            if(strlen($lname) < 2 || strlen($lname) > 30) {

                return '<span class="text-danger"> Lastname: 2 - 30 characters!   </span>';
            }
            else
            {
                return '';
            }
        
        }

        if (isset($_POST['check_pass']))
        {
            $pass = $_POST['check_pass'];
            if(strlen($pass) < 6 || strlen($pass) > 30) {

                return '<span class="text-danger"> Password: 6 - 30 characters!   </span>';
            }
            else
            {
                return '';
            }

        }

        if (isset($_POST['confirm']))
        {

            $pass =  $_POST['cf_pass'];
            $cf =  $_POST['confirm'];

            if ($pass != $cf || strlen($pass) == 0)
            {

                return '<span class="text-danger"> Missmatch password!  </span>';
            }
            else
            {
                return '';
            }

        }


        if (isset($_POST['user_name']))
        {
            $username = $_POST['user_name'];
            if (strlen($username) == 0)
            {
                return '<span class="text-danger"> Please enter username!  </span>';
            }
            else
            {
                $query = "SELECT * FROM  users WHERE  username ='$username'";
                $result = $this->database->query($query);
                if (mysqli_num_rows($result) > 0)
                {

                    return  '<span class="text-danger"> Username is already exits </span>';
                    
                }
                else
                {
                    return '<span class="text-success"> Username is available </span>';
                }
            }
        }

        if (isset($_POST['phone_num']))
        {
            $phonenum = $_POST['phone_num'];

            if (strlen($phonenum) == 0)
            {
                return '<span class="text-danger"> Please enter your phone number! </span>';
            }
            else
            {
                $query = "SELECT * FROM  users WHERE  phonenum ='$phonenum'";
                $result = $this->database->query($query);
                if (mysqli_num_rows($result) > 0)
                {
                    return '<span class="text-danger"> Phone number is already registered for another account</span>';
                }
                else
                {
                    
                    return '';
                }
            }

        }
        if (isset($_POST['check_email']))
        {
            
            $email = $_POST['check_email'];
            $check = preg_match("/^.*@.*\..*/i", $email);
        
            if (strlen($email) == 0)
            {

                return '<span class="text-danger"> Please enter your email!</span>';

            }
            elseif($check == 0) {

                return '<span class="text-danger"> Email must follow this format: sth@sth.sth! </span>';
            }
            else
            {
                $query = "SELECT * FROM  users WHERE  email ='$email'";
                $result = $this->database->query($query);
                if (mysqli_num_rows($result) > 0)
                {

                    return '<span class="text-danger"> Email is already registered for another account</span>';
                }
                else
                {
                    return '<span class="text-success"> Email is available </span>';

                }
            }

        }
    }


    public function sendRegister()
    {
        
            $fname = $_POST['firstName'];
            $lname = $_POST['lastName'];
            $phonenumber = $_POST['phone'];
            $username = $_POST['username'];
            $password1 = $_POST['password'];
            $email = $_POST['email'];
            $day = $_POST['day'];
            $m = $_POST['month'];
            $y = $_POST['year'];
            $address = $_POST['address'];
    
            $bdate = "$m $day $year";
            $bd  = date("Y - m -d",strtotime($bdate));   
            $password = md5($password1);
            $cf =  $_POST['confirmpassword'];

            $checkMail = preg_match("/^.*@.*\..*/i", $email);


            $check = true;
            if(strlen($fname) < 2 || strlen($fname) > 30) {
                $check = false;
        
            }
            elseif(strlen($lname) < 2 || strlen($lname) > 30) {
                $check = false;

            }

            elseif(strlen($password1) < 6 || strlen($password1) > 30) {
                $check = false;

            }
            elseif ($password1 != $cf || strlen($password1) == 0)
            {
                $check = false;

            }

            elseif ($password1 != $cf || strlen($password1) == 0)
            {
                $check = false;

            }

            elseif (strlen($username) == 0)
            {
                $check = false;

            }
            elseif (strlen($username) != 0)
            {
                $query = "SELECT * FROM  users WHERE  username ='$username'";
                $result = $this->database->query($query);
                if (mysqli_num_rows($result) > 0)
                {
                    $check = false;

                }
            }
            elseif (strlen($phonenumber) == 0)
            {
                $check = false;

        
            }
            elseif (strlen($phonenumber) != 0)
            {
                $query = "SELECT * FROM  users WHERE  phonenum ='$phonenumber'";
                $result = $this->database->query($query);
                
                if (mysqli_num_rows($result) > 0)
                {
                    $check = false;

                }
            }
            elseif($checkMail == 0) {
                $check = false;

        
            }
            elseif($checkMail == 0) 
            {
                $query = "SELECT * FROM  users WHERE  email ='$email'";
                $result = $this->database->query($query);
                if (mysqli_num_rows($result) > 0)
                {
                    $check = false;

                }
            }
            else{
                $check = true;

            }

        if ($check)
        {
            $query = "INSERT INTO users (fname,lname,phonenum,email,username,password,bdate,address) 
                    VALUES ('$fname','$lname','$phonenumber','$email','$username','$password','$bd','$address')";
            $this->database->query($query);    

            return $this->response->redirect('/login1?inform=Create account successfully - Login now!');

        }
        else
        {
            return $this->response->redirect('/register?error=Please enter valid infomation!');

        }
    }


    public function doLogin() {
        $this->sessionManager->start();


        $uname = $_POST['username'];
        $password1 = $_POST['password'];

        $password = md5($password1);

        $sql = "SELECT * FROM users WHERE  username ='$uname'";
        $result = $this->database->query($sql);

        if (mysqli_num_rows($result) === 1)
        {
            $row = $result->fetch_assoc();
            if ($row['username'] == $uname && $row['password'] === $password)
            {
                if (!empty($_POST['remember_me']))
                {
                    setcookie("member_login",$uname,time()+ (10 * 365 * 24  * 60 * 60));
                    setcookie("member_password",$password1,time()+ (10 * 365 * 24  * 60 * 60));
                }
                else 
                {
                    if (isset($_COOKIE['member_login']))
                    {
                        setcookie("member_login","");
                    }
                    if (isset($_COOKIE['member_password']))
                    {
                        setcookie("member_password","");
                    }
                }
                $this->sessionManager->set('username',$row['username']);
                $this->sessionManager->set('id',$row['id']);

                return $this->response->redirect('/');
            }
            else
            {
                return $this->response->redirect('/login1?wrong=Incorrect User Name or Password');

            }
        }

        else
        {
            return $this->response->redirect('/login1?wrong=Incorrect User Name or Password');
        }
    }

    public function checkForgotpw()
    {
        $getPass = $_POST['getPass'];
        $sql = "SELECT * FROM users WHERE  phonenum = '$getPass' OR email = '$getPass'";
        $result = $this->database->query($sql);
        if (mysqli_num_rows($result) === 1)
        {
            return $this->response->redirect('/login1?success=Success! Check your email to get password');

        }
        else
        {
            return $this->response->redirect('/forgotpw?error= Can not find your account!');
        }

    }
    public function logout() {
        $this->sessionManager->destroy();
        return $this->response->redirect('/login1');
    }
}