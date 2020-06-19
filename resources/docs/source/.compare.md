---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Hospital

The class of the hospital
<!-- START_01298058fadc1532cadf543e62b33892 -->
## create

> Example request:

```bash
curl -X POST \
    "http://localhost/api/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"username":"eligendi","password":"aspernatur","password_confirmation":"et","name":"error","address_location":"distinctio","x_location":"sed","y_location":"ut","free_slots_high":"quisquam","free_slots_medium":"aut","free_slots_low":"pariatur","price_high":"qui","price_medium":"sit","price_low":"labore"}'

```

```javascript
const url = new URL(
    "http://localhost/api/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "username": "eligendi",
    "password": "aspernatur",
    "password_confirmation": "et",
    "name": "error",
    "address_location": "distinctio",
    "x_location": "sed",
    "y_location": "ut",
    "free_slots_high": "quisquam",
    "free_slots_medium": "aut",
    "free_slots_low": "pariatur",
    "price_high": "qui",
    "price_medium": "sit",
    "price_low": "labore"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "Hospital": {
        "username": "",
        "name": "",
        "address_location": "",
        "x_location": "",
        "y_location": "",
        "free_slots_high": "",
        "free_slots_medium": "",
        "free_slots_low": "",
        "price_high": "",
        "price_medium": "",
        "price_low": ""
    },
    "token": "",
    "token_type": ""
}
```
> Example response (405):

```json
{
    "error": ""
}
```

### HTTP Request
`POST api/create`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `username` | string |  required  | .
        `password` | string |  required  | .
        `password_confirmation` | string |  required  | the confirmation of input password.
        `name` | string |  required  | .
        `address_location` | string |  required  | .
        `x_location` | string |  required  | .
        `y_location` | string |  required  | .
        `free_slots_high` | string |  required  | .
        `free_slots_medium` | string |  required  | .
        `free_slots_low` | string |  required  | .
        `price_high` | string |  required  | .
        `price_medium` | string |  required  | .
        `price_low` | string |  required  | .
    
<!-- END_01298058fadc1532cadf543e62b33892 -->

<!-- START_97ad4c9ccc533033a36a9c2ecd5525ee -->
## signin

> Example request:

```bash
curl -X POST \
    "http://localhost/api/signin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"username":"omnis","password":"vitae"}'

```

```javascript
const url = new URL(
    "http://localhost/api/signin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "username": "omnis",
    "password": "vitae"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "Hospital": {
        "username": "",
        "name": "",
        "address_location": "",
        "x_location": "",
        "y_location": "",
        "free_slots_high": "",
        "free_slots_medium": "",
        "free_slots_low": "",
        "price_high": "",
        "price_medium": "",
        "price_low": ""
    },
    "token": "",
    "token_type": ""
}
```
> Example response (405):

```json
{
    "error": ""
}
```

### HTTP Request
`POST api/signin`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `username` | string |  required  | .
        `password` | string |  required  | .
    
<!-- END_97ad4c9ccc533033a36a9c2ecd5525ee -->

<!-- START_367358a4dd6a1024185fa1c77f6d482a -->
## changepassword

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/changepassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"oldpassword":"et","password":"quis","password_confirmation":"quos"}'

```

```javascript
const url = new URL(
    "http://localhost/api/changepassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "oldpassword": "et",
    "password": "quis",
    "password_confirmation": "quos"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": ""
}
```
> Example response (405):

```json
{
    "error": ""
}
```

### HTTP Request
`POST api/changepassword`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `oldpassword` | string |  required  | the old password.
        `password` | string |  required  | the new password.
        `password_confirmation` | string |  required  | the confirmation of new password.
    
<!-- END_367358a4dd6a1024185fa1c77f6d482a -->

<!-- START_db986ce9e0e20223b2e3d795ad769cf9 -->
## deletephone

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/deletephone" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"phone":"id"}'

```

```javascript
const url = new URL(
    "http://localhost/api/deletephone"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "phone": "id"
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": ""
}
```
> Example response (405):

```json
{
    "error": ""
}
```

### HTTP Request
`DELETE api/deletephone`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `phone` | string |  required  | the phone you want to delete.
    
<!-- END_db986ce9e0e20223b2e3d795ad769cf9 -->

<!-- START_7144131ad5bca44c2e4c38d23eb6be68 -->
## addphone

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/addphone" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"phone":"sunt"}'

```

```javascript
const url = new URL(
    "http://localhost/api/addphone"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "phone": "sunt"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": ""
}
```
> Example response (405):

```json
{
    "error": ""
}
```

### HTTP Request
`GET api/addphone`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `phone` | string |  required  | the phone you want to add.
    
<!-- END_7144131ad5bca44c2e4c38d23eb6be68 -->

<!-- START_bfd94d52f65d7e0282e0634b79e28c7b -->
## logout

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Good Bey"
}
```

### HTTP Request
`DELETE api/logout`


<!-- END_bfd94d52f65d7e0282e0634b79e28c7b -->

<!-- START_762dbf4bac3ece23ad09bdef164f5808 -->
## update

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"quasi","address_location":"ea","free_slots_high":"consequatur","free_slots_medium":"sit","free_slots_low":"voluptas","price_high":"explicabo","price_medium":"tenetur","price_low":"sit"}'

```

```javascript
const url = new URL(
    "http://localhost/api/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "quasi",
    "address_location": "ea",
    "free_slots_high": "consequatur",
    "free_slots_medium": "sit",
    "free_slots_low": "voluptas",
    "price_high": "explicabo",
    "price_medium": "tenetur",
    "price_low": "sit"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": ""
}
```
> Example response (405):

```json
{
    "error": ""
}
```

### HTTP Request
`GET api/update`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | .
        `address_location` | string |  required  | .
        `free_slots_high` | string |  required  | .
        `free_slots_medium` | string |  required  | .
        `free_slots_low` | string |  required  | .
        `price_high` | string |  required  | .
        `price_medium` | string |  required  | .
        `price_low` | string |  required  | .
    
<!-- END_762dbf4bac3ece23ad09bdef164f5808 -->

#general


<!-- START_7f7e095ddeda28003db18fb2d10cf7ce -->
## find_hospitals_by_location

> Example request:

```bash
curl -X GET \
    -G "http://localhost/find_hospitals_by_location" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"xloc":0.739,"yloc":669368004.053564,"type":"a"}'

```

```javascript
const url = new URL(
    "http://localhost/find_hospitals_by_location"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "xloc": 0.739,
    "yloc": 669368004.053564,
    "type": "a"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "hospitals": [
        {
            "id": 10,
            "username": "willa.feil@example.com",
            "name": "Simonis-Runolfsson",
            "address_location": "33425 Zion Underpass Suite 088\nGreenburgh, ID 39725-9264",
            "x_location": 89,
            "y_location": 13.1,
            "free_slots_high": 22,
            "free_slots_medium": 15,
            "free_slots_low": 45,
            "price_high": 5367,
            "price_medium": 678,
            "price_low": 327,
            "created_at": "2020-06-19T13:25:48.000000Z",
            "updated_at": "2020-06-19T13:25:48.000000Z",
            "phones": [
                23432432,
                101221321
            ],
            "distance": 12.984991336154215
        },
        {
            "id": 9,
            "username": "cleo.ernser@example.net",
            "name": "Hill, Stamm and Schuster",
            "address_location": "51897 Lera Road\nNorth Thaliatown, MT 94461",
            "x_location": 79,
            "y_location": 20.8,
            "free_slots_high": 19,
            "free_slots_medium": 51,
            "free_slots_low": 46,
            "price_high": 5832,
            "price_medium": 1557,
            "price_low": 650,
            "created_at": "2020-06-19T13:25:48.000000Z",
            "updated_at": "2020-06-19T13:25:48.000000Z",
            "phones": [
                555555,
                333
            ],
            "distance": 21.015232570685484
        }
    ]
}
```
> Example response (404):

```json
{
    "error": ""
}
```

### HTTP Request
`GET find_hospitals_by_location`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `xloc` | float |  required  | .
        `yloc` | float |  required  | .
        `type` | string |  required  | .
    
<!-- END_7f7e095ddeda28003db18fb2d10cf7ce -->

<!-- START_15b650ba181d6179430696670ca5c26b -->
## get_all_hospitals

> Example request:

```bash
curl -X GET \
    -G "http://localhost/hospitals" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/hospitals"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "hospitals": [
        {
            "id": 10,
            "username": "willa.feil@example.com",
            "name": "Simonis-Runolfsson",
            "address_location": "33425 Zion Underpass Suite 088\nGreenburgh, ID 39725-9264",
            "x_location": 89,
            "y_location": 13.1,
            "free_slots_high": 22,
            "free_slots_medium": 15,
            "free_slots_low": 45,
            "price_high": 5367,
            "price_medium": 678,
            "price_low": 327,
            "created_at": "2020-06-19T13:25:48.000000Z",
            "updated_at": "2020-06-19T13:25:48.000000Z",
            "phones": [
                123,
                444
            ]
        },
        {
            "id": 9,
            "username": "cleo.ernser@example.net",
            "name": "Hill, Stamm and Schuster",
            "address_location": "51897 Lera Road\nNorth Thaliatown, MT 94461",
            "x_location": 79,
            "y_location": 20.8,
            "free_slots_high": 19,
            "free_slots_medium": 51,
            "free_slots_low": 46,
            "price_high": 5832,
            "price_medium": 1557,
            "price_low": 650,
            "created_at": "2020-06-19T13:25:48.000000Z",
            "updated_at": "2020-06-19T13:25:48.000000Z",
            "phones": [
                555
            ]
        }
    ]
}
```
> Example response (404):

```json
{
    "error": ""
}
```

### HTTP Request
`GET hospitals`


<!-- END_15b650ba181d6179430696670ca5c26b -->


