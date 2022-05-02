<?php


if(! function_exists('not_empty')){
    function not_empty($fields = []){
        if(count($fields) != 0){
            foreach($fields as $field){
                if(empty($_POST[$field]) || trim($_POST[$field]) == ""){
                    return false;
                }
            }
            return true;
        }
    }
}


if (! function_exists ( 'is_already_in_use' ) )
{
	function is_already_in_use ( $field, $value ,$table )
	{
		global $db ;

		$q = $db->prepare("SELECT id FROM $table WHERE $field = ?");
		$q->execute( [$value] );
		$count = $q->rowCount();
		$q->closeCursor();
		return $count;
	}
}

// Gere l'Etat actif de nos différents liens cliquables 
if ( ! function_exists ('set_active') )
{
    function set_active( $path , $class='active' )
    {
        $page = trim( strrchr( $_SERVER['SCRIPT_NAME'] , '/' ) , '/' );

        if ( $page == $path.'.php' )
        {
            return $class;
        }
        else
        {
            return "";
        }
    }
}

if ( ! function_exists ('redirect') )
{
    function redirect( $page )
    {
        header("Location: ".$page);
        exit();
    }
}

if ( ! function_exists ('set_flash') )
{
    function set_flash($message,$type='info')
    {
       if(isset($_SESSION['notification']['message']) && isset($_SESSION['notification']['type'])){
            $_SESSION['notification']['message'] = $message;
            $_SESSION['notification']['type'] = $type;
       }
    }
}