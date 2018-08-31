<?php // for MailChimp API v3.0

include('MailChimp.php');  // path to API wrapper downloaded from GitHub

use \DrewM\MailChimp\MailChimp;

function storeAddress() {

    $key        = "ac185368691e4a654265c45daa9e759b-us18";
    $list_id    = "5ebcea91a5";

    $merge_vars = array(
        'IGHANDLE'     => $_POST['IGHANDLE']
    );

    $mc = new MailChimp($key);

    // add the email to your list
    $result = $mc->post('/lists/'.$list_id.'/members', array(
            'email_address' => 'valencia.eugenio@gmail.com',
            'status'        => 'subscribed'     // double opt-in
            // 'status'     => 'subscribed'  // single opt-in
        )
    );

    alert($result)

    return json_encode($result);

}

// If being called via ajax, run the function, else fail

if ($_POST['ajax']) {
    var_dump($result); // send the response back through Ajax
} else {
    echo 'Method not allowed - please ensure JavaScript is enabled in this browser';
}
