<?php

    function connect(){
   	   $connect = mysql_connect('localhost', 'root', '');
       $db = mysql_select_db('practice');  
       return $connect;
    }
    
    function get_user($id)
    {
    	connect();

    	$sql = "select * from users where id=$id";

        $query = mysql_query($sql);

        if($query)
        {
            if(mysql_num_rows($query)==1)
            {
            	$row = mysql_fetch_object($query);
            	return $row;
            }
        }
        return null;
    }

    function get_user_list()
    {
    	connect();

         $sql = "select * from users order by id asc";

        $query = mysql_query($sql);

        if($query)
        {
            if(mysql_num_rows($query)>0)
            {
            	$people = array();
            	while($row = mysql_fetch_object($query))
            	{
            		$people[]=$row;
            	}
            	return $people;
            }
        }
        return null;	
    }
    
    $method = $_SERVER['REQUEST_METHOD'];

    if (strtolower($method)=='post')
    {
        
    	if(isset($_POST['task']) && $_POST['task']=="get_user_list")
    	{
           $people=get_user_list();
           echo json_encode($people);

    	}

    	else if(isset($_POST['task']) && $_POST['task']=="get_user")
    	{
           $user=get_user($_POST['id']);
           echo json_encode($user);
    	}

    	else if(isset($_POST['task']) && $_POST['task']=="save_user")
        {
           $first_name =  addslashes($_POST['first_name']);
    	   $surname    =  addslashes($_POST['surname']);
    	   $dob        =  addslashes($_POST['dob']);
    	   $id         =  addslashes($_POST['id']);

    	   $connect=connect();

    	   if($connect)
    	   {

               if($id==0){

    	   	  
    	   	   	  $sql = "insert into users (first_name, surname, dob) values('$first_name', '$surname', '$dob')";
                  $query = mysql_query($sql);
  
                 if($query)
                   {
            	   $id = mysql_insert_id();
            	   $user = get_user($id);
            	   echo json_encode($user);
                   }
    	        }
    	    else
    	    {
                 $sql = "update users set first_name='$first_name', surname='$surname', dob='$dob' where id='$id'";
                 $query=mysql_query($sql);
    	   	     if($query)
    	   	     {
    	   	     	echo 1;
    	   	     }
    	   	     else 
    	   	     {
    	   	     	echo 0;
    	   	     }
    	    }
        }
   }
       
}
    

    

 ?>