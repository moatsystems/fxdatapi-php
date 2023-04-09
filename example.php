<?php

require_once './src/currensees.php';

use Currensees\Currensees;

// Initialize the Currensees SDK
$currensees = new Currensees();

// Set your username and password for the Currency API
$username = 'your_username';
$password = 'your_password';

// Log in to the API and obtain a token (if necessary)
$loginResult = $currensees->login($username, $password);
if ($loginResult) {
    echo "Login successful.\n";
} else {
    die("Login failed.\n");
}

// Set currency conversion details
$date = '2023_04_05';
$baseCurrency = 'GBP';
$targetCurrency = 'EUR';
$amount = 1000;

// Call the convert method to perform the currency conversion
$conversionResult = $currensees->convert($date, $baseCurrency, $targetCurrency, $amount);
if ($conversionResult) {
    echo "Conversion result: " . json_encode($conversionResult) . "\n";
} else {
    echo "Currency conversion failed: " . $conversionResult['error'] . "\n";
}

// Call the convertAll method to convert the base currency to all available target currencies
$convertAllResult = $currensees->convertAll($baseCurrency, $amount, $date);
if ($convertAllResult) {
    echo "Conversion to all currencies successful:\n";
    echo json_encode($convertAllResult) . "\n";
} else {
    echo "Conversion to all currencies failed: " . $convertAllResult['error'] . "\n";
}

// Set the date for which you want to retrieve the currencies
$day = '02';
$month = '04';
$year = '2023';

// Set the UUID of the currency you want to retrieve
$uuid = 'currency_uuid';

// Call the getCurrencies method to get the available currencies for the given date
$currenciesResult = $currensees->getCurrencies($username, $day, $month, $year);
if ($currenciesResult) {
    echo "Currencies for " . $day . "/" . $month . "/" . $year . ":\n";
    echo json_encode($currenciesResult) . "\n";
} else {
    echo "Failed to retrieve currencies for the given date.\n";
}

// Call the getCurrency method to get the details of the specific currency for the given date
$currencyResult = $currensees->getCurrency($uuid, $username, $day, $month, $year);
if ($currencyResult) {
    echo "Currency details for " . $day . "/" . $month . "/" . $year . ":\n";
    echo json_encode($currencyResult) . "\n";
} else {
    echo "Failed to retrieve currency details for the given date.\n";
}

?>