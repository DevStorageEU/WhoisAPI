
# WhoisAPI

WhoisAPI is a software with an API interface through which you can get Whois data by making an API request and passing an IP address.

## Installation

To install WhoisAPI, make sure that [PHP Composer](https://getcomposer.org/) is installed on your system. Then run the following command in the terminal:

`composer require devstorage/whoisapi` 

## Usage

To query Whois data for an IP address, call the following URL:

`https://whoisapi.openapi.devstorage.net/v1/whois?ip=IP-ADDRESS` 

Replace `IP-ADDRESS` with the IP address whose Whois data you want to retrieve. The API returns the Whois data in JSON format.

Example:

`https://whoisapi.openapi.devstorage.net/v1/whois?ip=8.8.8.8` 

This call returns the Whois data for the IP address 8.8.8.8.

## Library usage

To use WhoisAPI in your PHP code, first load the library with Composer:


`require_once __DIR__ . '/vendor/autoload.php';` 

Then you can use the library as follows:

```
use WhoisAPI\WhoisClient;

$client = new WhoisClient();
$whois = $client->lookup('8.8.8.8');

print_r($whois);
```

This code outputs the Whois data for the IP address 8.8.8.8.

## License

WhoisAPI is licensed under the Apache License 2.0. For more information, see the [LICENSE](https://github.com/DevStorageEU/WhoisAPI/blob/main/LICENSE) file.
