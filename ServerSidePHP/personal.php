<?php

require('./exampleBase.php');

$personal = $web3->personal;
$newAccount = '';

echo 'Personal Create Account and Unlock Account' . PHP_EOL;

// create account
$personal->newAccount('ExD3RkHaguDiFb24mVMRiHhQDjBN', function ($err, $account) use (&$newAccount) {
	if ($err !== null) {
	    echo 'Error: ' . $err->getMessage();
		return;
	}
	$newAccount = $account;
	echo 'New account: ' . $account . PHP_EOL;
});

$personal->unlockAccount($newAccount, 'ExD3RkHaguDiFb24mVMRiHhQDjBN', function ($err, $unlocked) {
	if ($err !== null) {
		echo 'Error: ' . $err->getMessage();
		return;
	}
	if ($unlocked) {
        echo 'New account is unlocked!' . PHP_EOL;
	} else {
	    echo 'New account isn\'t unlocked' . PHP_EOL;
	}
});


// get balance
$web3->eth->getBalance($newAccount, function ($err, $balance) {
	if ($err !== null) {
		echo 'Error: ' . $err->getMessage();
		return;
	}
	echo 'Balance: ' . $balance->toString() . PHP_EOL;
});
