<?php

class ndbSDK {
    private $baseURL;
    private $token;
    private $username;
    public function __construct($username,$token) {
        $this->baseURL = "https://nigeriansonly.com/db/api";
        $this->token = $token;
        $this->username = $username;
    }

    

    // Helper method for sending HTTP requests
private function sendRequest($url, $method = 'GET', $params = [], $headers = []) {
    $ch = curl_init();

    // Set the request URL
    curl_setopt($ch, CURLOPT_URL, $url);

    // Set the request method
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

    // Set the request headers
    $allHeaders = array_merge($headers, ['Token: ' . $this->token]);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $allHeaders);

    // Set the request parameters
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    } else {
        $url .= '?' . http_build_query($params);
        curl_setopt($ch, CURLOPT_URL, $url);
    }

    // Return the response as a string instead of outputting it
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request
    $response = curl_exec($ch);

    // Close cURL handle
    curl_close($ch);

    // Return the response
    return $response;
}

    
    public function createAccount($username, $email, $password) {
    $url = $this->baseURL . '/create_account';
    $params = [
        'username' => $username,
        'email' => $email,
        'password' => $password
    ];

    $response = $this->sendRequest($url, 'POST', $params);

    return $response;
}


    public function makeDB($database) {
    $url = $this->baseURL . '/'.$this->username.'/make_database';
    $params = [
        'database' => $database
    ];

    $response = $this->sendRequest($url, 'POST', $params);

    return $response;
}


    public function dropDB($database) {
    $url = $this->baseURL . '/'.$this->username.'/drop_database';
    $params = [
        'database' => $database
    ];

    $response = $this->sendRequest($url, 'POST', $params);

    return $response;
}


//table query

    public function makeTABLE($db, $table,$scheme = []) {
    $url = $this->baseURL . '/'.$this->username.'/'.$db.'/make_table';
    $params = [
        'table' => $table,
        'scheme' => $scheme,
    ];
//return $scheme['content'];
    $response = $this->sendRequest($url, 'POST', $params);

    return $response;
}

    public function addToTABLE($db, $table,$data = []) {
    $url = $this->baseURL . '/'.$this->username.'/'.$db.'/add';
    $params = [
        'table' => $table,
        'data' => $data,
    ];

    $response = $this->sendRequest($url, 'POST', $params);

    return $response;
}


    public function dropTABLE($db, $table) {
    $url = $this->baseURL . '/'.$this->username.'/'.$db.'/drop';
    $params = [
        'table' => $table
    ];

    $response = $this->sendRequest($url, 'POST', $params);

    return $response;
}

    public function selectTABLE($db, $table,$option = []) {
    $url = $this->baseURL . '/'.$this->username.'/'.$db.'/select';
    $params = [
        'table' => $table,
        'option'=>$option
    ];

    $response = $this->sendRequest($url, 'POST', $params);

    return $response;
}

    public function updateTABLE($db, $table,$set = [], $option = []) {
    $url = $this->baseURL . '/'.$this->username.'/'.$db.'/update';
    $params = [
        'table' => $table,
        'option'=>$option,
        'set'=>$set
    ];

    $response = $this->sendRequest($url, 'POST', $params);

    return $response;
}

    public function deleteFromTABLE($db, $table,$option = []) {
    $url = $this->baseURL . '/'.$this->username.'/'.$db.'/delete';
    $params = [
        'table' => $table,
        'option'=>$option
    ];

    $response = $this->sendRequest($url, 'POST', $params);

    return $response;
}

    public function emptyTABLE($db, $table) {
    $url = $this->baseURL . '/'.$this->username.'/'.$db.'/empty';
    $params = [
        'table' => $table
    ];

    $response = $this->sendRequest($url, 'POST', $params);

    return $response;
}

    public function tableSCHEME($db, $table) {
    $url = $this->baseURL . '/'.$this->username.'/'.$db.'/scheme';
    $params = [
        'table' => $table
    ];

    $response = $this->sendRequest($url, 'POST', $params);

    return $response;
}

}


?>
