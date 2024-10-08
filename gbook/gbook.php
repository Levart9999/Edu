<?php

session_start();
include "messages.php";
$messObj = new messages();

$addErrors = array();
$successMsg = '';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name      = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $email     = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $msg       = filter_var($_POST['msg'],FILTER_SANITIZE_EMAIL);

    if(strlen($name) < 8)
    {
        $addErrors[] = 'You Must Be Type Full Name';
    }
    if(! filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $addErrors[] = 'YouR Email Is Not Valid';
    }
    if(empty($addErrors))
    {
        if($messObj ->addMessage($name,$email,$msg))
        {
            $successMsg = "Message Added Success";
        }
        else
        {
            $addErrors[] = "Something Went Wrong Try Again";
        }
    }
}
?>
<div class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="section-header">
                <h1>Guest Book</h1>
            </div>
            <div class="row guestbook">
                <div class="col-md-12">
<?php
if(! empty($addErrors))
{
    foreach($addErrors as $error)
    {
        echo ' <div class="alert alert-danger">
                                            <p>'.$error.'</p>
                                        </div>';
    }
}
?>
<?php
if(! empty($successMsg))
{
    echo ' <div class="alert alert-success">
                                        <p>'.$successMsg.'</p>
                                    </div>';
}
?>
                    <div class="col-md-12">
                        <div class="section-header">
                            <h1>Add new message</h1>
                        </div>

                            <div class="form-group">
                                <label for="content" class="col-sm-3 control-label">Your message</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="6" id="content" name="content" placeholder="Message Content"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Your Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">Your Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-comments"></i> Add Message</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
