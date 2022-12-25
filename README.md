# WhoisAPI

WhoisAPI is a software with an API interface through which you can get IP-Address Whois data by making an API request
and passing an IP address.

## Server Requirements

- PHP >= 8.0
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- PHP Composer

## Installation

```
git clone https://github.com/DevStorageEU/WhoisAPI.git
cd WhoisAPI/application/
composer install
mv .env.example .env
```

## Configuration

- `APP_KEY`: Generate the key with this command `php artisan generate:key` and copy & paste the key in to .env
- `APP_URL`: Change it to your url

## Usage

To query Whois data for an IP address, call the following URL:

`https://whoisapi.openapi.devstorage.net/v1/whois?ip=IP-ADDRESS`

Replace `IP-ADDRESS` with the IP address whose Whois data you want to retrieve. The API returns the Whois data in JSON
format.

Example:

`https://whoisapi.openapi.devstorage.net/v1/whois?ip=8.8.8.8`

This call returns the Whois data for the IP address 8.8.8.8.

## Endpoints

[You find API documentation here](docs/api/README.md)

## License

WhoisAPI is licensed under the Apache License 2.0. For more information, see the [LICENSE](https://github.com/DevStorageEU/WhoisAPI/blob/main/LICENSE) file.
