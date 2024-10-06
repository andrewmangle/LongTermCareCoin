<?php

set_time_limit(0);

require('exampleBase.php');
use Web3\Contract;
set_time_limit(0);
//curl_setopt($ch, CURLOPT_TIMEOUT, 500)

// Call to a smart contract  - works!
$testAbi = '[ { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash9", "type": "bytes32" } ], "name": "PatientHash9", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash3", "type": "bytes32" } ], "name": "PatientHash3", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash8", "type": "bytes32" } ], "name": "PatientHash8", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "HashN", "type": "bytes32" } ], "name": "PatientHashN", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash7", "type": "bytes32" } ], "name": "PatientHash7", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash4", "type": "bytes32" } ], "name": "PatientHash4", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash5", "type": "bytes32" } ], "name": "PatientHash5", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "typeID", "type": "uint8" }, { "name": "PRHash", "type": "bytes32" } ], "name": "newPatient", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [], "name": "owner", "outputs": [ { "name": "", "type": "address", "value": "0x0c0c665b6db2b5535c0c434d32a8700b45394900" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [ { "name": "patientID", "type": "uint32" } ], "name": "getPatientRecordA", "outputs": [ { "name": "patienttype", "type": "uint8", "value": "0" }, { "name": "hash1", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash2", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash3", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash4", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash5", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash6", "type": "bytes32" } ], "name": "PatientHash6", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "patientID", "type": "uint32" } ], "name": "getPatientRecordB", "outputs": [ { "name": "patienttype", "type": "uint8", "value": "0" }, { "name": "hash6", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash7", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash8", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash9", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hashN", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash2", "type": "bytes32" } ], "name": "PatientHash2", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "inputs": [], "payable": true, "stateMutability": "payable", "type": "constructor" } ]';
$contractAddress = '0xDba6d0A315043740A262eFfe2e018d0F95ec536E';
$contract = new Contract('http://127.0.0.1:8545',$testAbi);
$patientID = $_GET["patientID"];
$querytype = $_GET["resultType"];
if ($querytype  == "1"){
	$functionName = 'getPatientRecordA';
}else {
	$functionName = 'getPatientRecordB';
}
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

