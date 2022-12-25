# Show abuse mail for requested ip

URL: `/v1/:ip/abuseMail`
URL Parameters: `ip=[string]` where `ip` is your requested ip for abuse mail
Method: `GET`
Auth required: `NO`

## Success Response

Code: `200`
Response:

```json
{
  "information": {
    "status": 200,
    "message": null
  },
  "data": {
    "abuseMail": "helpdesk@apnic.net"
  }
}
```

## Error Response

Code: `500`
Response:

```json
{
  "information": {
    "status": 500,
    "message": "can not find abuse mail in whois information"
  },
  "data": null
}
```