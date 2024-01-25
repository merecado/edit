<?php
if( isset($_POST['id']) || isset($_POST['url']) ){
    $id = $_POST['id'];
    $url = $_POST['url'];
    // $id = uniqid();

    // echo $name;
    // path to your JSON file
    $file = '../qr/users.json'; 
    // put the content of the file in a variable
    $data = file_get_contents($file); 
    print_r($data);
    echo '<br><br><br><br>';
    $encdata = json_decode($data);
    // print_r($encdata);
    echo '<br><br><br><br>' . $id;
    // 
    class USERS
    {
        public $redid;
        // public $name;
        public $url;
    }
    $newuser = new USERS();
    // $newuser->name = $name;
    $newuser->url = $url;
    $newuser->redid = $id;
    // $eachuser = [];
    // $txt = array_push($encdata , $newuser);
 
    foreach ($encdata as $e) {
        // print_r( $e );
        $checkid = $e->redid;
        $printname = $e->name;
        if ( $checkid == $id ) {
            # code...
            echo '<br><br><br><br>' . $printname . '<br><br><br><br>' ;
            $e->url = $url;
        }
    }
    print_r($encdata);

     $myfile = fopen("../qr/users.json", "w") or die("Unable to open file!");
     $txt = json_encode($encdata);
     fwrite($myfile, $txt);
     fclose($myfile);
     header("location:../users/");
    
} else {
    echo "please send user id";
}

?>