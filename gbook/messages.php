<?php
require ('dbconnect.php');

class messages extends dbconnect
{
      public function addMessage($name, $email, $msg)
      {
          $stmt = $this->connection()->prepare(
              "INSERT INTO 'msgs'('name', 'email', 'msg') 
                     VALUES (:name, :email, :msg)");

          $result = $stmt->execute(array(
              'name'  => $name,
              'email'  => $email,
              'msg'  => $msg,
          ));

          if($result)
          {
              return true;
          }
          return false;
      }

     public function updateMessage($id, $msg)
     {
         $stmt = $this->connection()->prepare("UPDATE 'msgs' SET 
                                                      'msg' = :msg WHERE 
                                                       id = :id ");
         $result = $stmt->execute(array(
            'msg' => $msg,
            'id' => $id
         ));

         if($result)
         {
         return true;
         }
         return false;
     }

     public function deleteMessage($id)
     {
         $stmt = $this->connection()->prepare("DELETE FROM 'msgs'
                                                    WHERE id = :id ");
         $stmt->bindParam(":id",$id);
         $result = $stmt->execute();

         if($result)
         {
             return true;
         }
         return false;
     }

}
