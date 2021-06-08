<?php
namespace Controllers;

use Authenticator;
use Database;
use Request;

class ContactController extends BaseController
{
    protected Database $database;
    protected \SessionManager $sessionManager;

    public function __construct(Database $database, \SessionManager $sessionManager)
    {
        $this->database = $database;
        $this->sessionManager = $sessionManager;
    }

    public function index()
    {
        return $this->view('contact');
    }

    public function sendContact()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];

        if (strlen($name) > 30  || strlen($email) > 30)
        {
            return $this->response->redirect('/contact?error=Invalid infomation!');
        }
        $message = $_POST['message'];
        $sql = "INSERT INTO contact (name,email,message) VALUES ('$name','$email','$message')";
        $this->database->query($sql);
        return $this->response->redirect('/contact?success=Thank for contacting us!');
    }
}