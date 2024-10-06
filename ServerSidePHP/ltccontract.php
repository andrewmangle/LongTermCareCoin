<?php

set_time_limit(0);

require('./exampleBase.php');
use Web3\Contract;
set_time_limit(0);
//curl_setopt($ch, CURLOPT_TIMEOUT, 500)

// unlock account - works but not with the other part of the program
$personal = $web3->personal;
$scaccount = '0x0c0C665B6DB2b5535c0C434D32A8700b45394900';
$personal->unlockAccount($scaccount, 'zjmBQcBtcyHYzNTuZ8m5fGE5d6gj', function ($err, $unlocked) {
	if ($err !== null) {
		echo 'Error During Unlock Account: ' . $err->getMessage();
		return;
	}
	if ($unlocked) {
        	echo 'SC account is unlocked!';
	} else {
	    echo 'SC  account is not unlocked';
	}
}); 

// Call to a smart contract  - works!
$testAbi = '[ { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash9", "type": "bytes32" } ], "name": "PatientHash9", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash3", "type": "bytes32" } ], "name": "PatientHash3", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash8", "type": "bytes32" } ], "name": "PatientHash8", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "HashN", "type": "bytes32" } ], "name": "PatientHashN", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash7", "type": "bytes32" } ], "name": "PatientHash7", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash4", "type": "bytes32" } ], "name": "PatientHash4", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash5", "type": "bytes32" } ], "name": "PatientHash5", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "typeID", "type": "uint8" }, { "name": "PRHash", "type": "bytes32" } ], "name": "newPatient", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [], "name": "owner", "outputs": [ { "name": "", "type": "address", "value": "0x0c0c665b6db2b5535c0c434d32a8700b45394900" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [ { "name": "patientID", "type": "uint32" } ], "name": "getPatientRecordA", "outputs": [ { "name": "patienttype", "type": "uint8", "value": "0" }, { "name": "hash1", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash2", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash3", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash4", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash5", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash6", "type": "bytes32" } ], "name": "PatientHash6", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "patientID", "type": "uint32" } ], "name": "getPatientRecordB", "outputs": [ { "name": "patienttype", "type": "uint8", "value": "0" }, { "name": "hash6", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash7", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash8", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash9", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hashN", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash2", "type": "bytes32" } ], "name": "PatientHash2", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "inputs": [], "payable": true, "stateMutability": "payable", "type": "constructor" } ]';
$contractAddress = '0xDba6d0A315043740A262eFfe2e018d0F95ec536E';
$contract = new Contract('http://127.0.0.1:8545',$testAbi);
$patientID = '11';
$functionName = 'getPatientRecordA';
$contract->at($contractAddress)->call($functionName,$patientID,
	function ($err, $result) {
            	if ($err !== null) {
                throw $err;
            	}
            	if ($result) {
                	echo "Call a contract for patientID" . $patientID . " \n\n";
			var_dump($result) . "\n\n" ;
            	}
	});
echo "</br></br>";

// Need to unlock the account - BRIEFLY!!

//$httpClient = ('http://127.0.0.1:8545');
//$privateKey = "0x0c0C665B6DB2b5535c0C434D32A8700b45394900";
//$passworkKey = "zjmBQcBtcyHYzNTuZ8m5fGE5d6gj";
//$openTime = 15;

//$data = array (
//	"jsonrpc" => "2.0",
//	"method" =>"personal_unlockAccount",
//	"params" => ['0x0c0C665B6DB2b5535c0C434D32A8700b45394900', 'zjmBQcBtcyHYzNTuZ8m5fGE5d6gj', 15],
//	"id" => 67);

//$json_encoded_data = json_encode($data);
//var_dump($json_encoded_data);
//$ch = curl_init($httpClient);
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
 //       curl_setopt($ch, CURLOPT_POSTFIELDS, $json_encoded_data);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  //      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
     //           'Content-Type: application/json',
   //             'Content-Length: ' . strlen($json_encoded_data))
  //      );

//        $result = json_decode(curl_exec($ch));
 //       curl_close($ch);

  //      $parsed = $result->result;
//        echo $parsed. "</br>";


// Working - Update the smart contract ;) 
$fromwho = '0x0c0C665B6DB2b5535c0C434D32A8700b45394900';
$patientID = '12';
$functionName = "newPatient";
$typeID = '12';
$PRHash = '0xbbb';
$functionData = "0x" . $contract->at($contractAddress)->getData($functionName, $patientID, $typeID, $PRHash);
$httpClient = ('http://127.0.0.1:8545');
$params2=[];
$params2[0]=array('from'=>$fromwho, 'to'=>$contractAddress, 'gas'=>'0x28488', 'gasPrice'=>'0x30D40', 'data'=>$functionData);
$data = array(
	"jsonrpc" =>"2.0",
	"method" => "eth_sendTransaction",
	"params" => $params2,
	"id" => 1);
$json_encoded_data = json_encode($data);
//echo $json_encoded_data;
// could just create the data in JSON format
$ch = curl_init($httpClient);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_encoded_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($json_encoded_data)));
	$out = curl_exec($ch);
	echo $out;
        $result=json_decode($out);
	curl_close($ch);


// lock does not work - setting duration of unlock
/* Can't lock :/
$personal = $web3->personal;
$scaccount = '0x0c0C665B6DB2b5535c0C434D32A8700b45394900';
$personal->lockAccount($scaccount, function ($err, $locked) {
        if ($err !== null) {
                echo 'Error: ' . $err->getMessage();
                return;
        }
        if ($locked) {
                echo 'SC account is locked!';
        } else {
            echo 'SC account is unlocked';
        }
}); 
*/
