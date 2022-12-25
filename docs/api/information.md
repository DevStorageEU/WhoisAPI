# Show whois information for requested ip

URL: `/v1/:ip/`
URL Parameters: `ip=[string]` where `ip` is your requested ip for whois information
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
  "data": "% [whois.apnic.net]\n% Whois data copyright terms    http:\/\/www.apnic.net\/db\/dbcopyright.html\n\n% Information related to '1.1.1.0 - 1.1.1.255'\n\n% Abuse contact for '1.1.1.0 - 1.1.1.255' is 'helpdesk@apnic.net'\n\ninetnum:        1.1.1.0 - 1.1.1.255\nnetname:        APNIC-LABS\ndescr:          APNIC and Cloudflare DNS Resolver project\ndescr:          Routed globally by AS13335\/Cloudflare\ndescr:          Research prefix for APNIC Labs\ncountry:        AU\norg:            ORG-ARAD1-AP\nadmin-c:        AR302-AP\ntech-c:         AR302-AP\nabuse-c:        AA1412-AP\nstatus:         ASSIGNED PORTABLE\nremarks:        ---------------\nremarks:        All Cloudflare abuse reporting can be done via\nremarks:        resolver-abuse@cloudflare.com\nremarks:        ---------------\nmnt-by:         APNIC-HM\nmnt-routes:     MAINT-AU-APNIC-GM85-AP\nmnt-irt:        IRT-APNICRANDNET-AU\nlast-modified:  2020-07-15T13:10:57Z\nsource:         APNIC\n\nirt:            IRT-APNICRANDNET-AU\naddress:        PO Box 3646\naddress:        South Brisbane, QLD 4101\naddress:        Australia\ne-mail:         helpdesk@apnic.net\nabuse-mailbox:  helpdesk@apnic.net\nadmin-c:        AR302-AP\ntech-c:         AR302-AP\nauth:           # Filtered\nremarks:        helpdesk@apnic.net was validated on 2021-02-09\nmnt-by:         MAINT-AU-APNIC-GM85-AP\nlast-modified:  2021-03-09T01:10:21Z\nsource:         APNIC\n\norganisation:   ORG-ARAD1-AP\norg-name:       APNIC Research and Development\ncountry:        AU\naddress:        6 Cordelia St\nphone:          +61-7-38583100\nfax-no:         +61-7-38583199\ne-mail:         helpdesk@apnic.net\nmnt-ref:        APNIC-HM\nmnt-by:         APNIC-HM\nlast-modified:  2017-10-11T01:28:39Z\nsource:         APNIC\n\nrole:           ABUSE APNICRANDNETAU\naddress:        PO Box 3646\naddress:        South Brisbane, QLD 4101\naddress:        Australia\ncountry:        ZZ\nphone:          +000000000\ne-mail:         helpdesk@apnic.net\nadmin-c:        AR302-AP\ntech-c:         AR302-AP\nnic-hdl:        AA1412-AP\nremarks:        Generated from irt object IRT-APNICRANDNET-AU\nabuse-mailbox:  helpdesk@apnic.net\nmnt-by:         APNIC-ABUSE\nlast-modified:  2021-03-09T01:10:22Z\nsource:         APNIC\n\nrole:           APNIC RESEARCH\naddress:        PO Box 3646\naddress:        South Brisbane, QLD 4101\naddress:        Australia\ncountry:        AU\nphone:          +61-7-3858-3188\nfax-no:         +61-7-3858-3199\ne-mail:         research@apnic.net\nnic-hdl:        AR302-AP\ntech-c:         AH256-AP\nadmin-c:        AH256-AP\nmnt-by:         MAINT-APNIC-AP\nlast-modified:  2018-04-04T04:26:04Z\nsource:         APNIC\n\n% Information related to '1.1.1.0\/24AS13335'\n\nroute:          1.1.1.0\/24\norigin:         AS13335\ndescr:          APNIC Research and Development\n                6 Cordelia St\nmnt-by:         MAINT-AU-APNIC-GM85-AP\nlast-modified:  2018-03-16T16:58:06Z\nsource:         APNIC\n\n% This query was served by the APNIC Whois Service version 1.88.16 (WHOIS-UK4)"
}
```

## Error Response

Code: `500`
Response:

```json
{
  "information": {
    "status": 500,
    "message": "no valid ip address 1.1.1.1dad"
  },
  "data": null
}
```