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
    -d '{"username":"aut","password":"nobis","password_confirmation":"vitae","name":"ipsam","address_location":"aut","x_location":"dolores","y_location":"unde","free_slots_high":"dicta","free_slots_medium":"ipsum","free_slots_low":"omnis","price_high":"aut","price_medium":"eligendi","price_low":"mollitia"}'

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
    "username": "aut",
    "password": "nobis",
    "password_confirmation": "vitae",
    "name": "ipsam",
    "address_location": "aut",
    "x_location": "dolores",
    "y_location": "unde",
    "free_slots_high": "dicta",
    "free_slots_medium": "ipsum",
    "free_slots_low": "omnis",
    "price_high": "aut",
    "price_medium": "eligendi",
    "price_low": "mollitia"
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
    -d '{"username":"ab","password":"quibusdam"}'

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
    "username": "ab",
    "password": "quibusdam"
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
    -d '{"oldpassword":"quaerat","password":"rem","password_confirmation":"quia"}'

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
    "oldpassword": "quaerat",
    "password": "rem",
    "password_confirmation": "quia"
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
    -d '{"phone":"omnis"}'

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
    "phone": "omnis"
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
    -d '{"phone":"dicta"}'

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
    "phone": "dicta"
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
    -d '{"name":"et","address_location":"in","free_slots_high":"inventore","free_slots_medium":"enim","free_slots_low":"adipisci","price_high":"ratione","price_medium":"architecto","price_low":"et"}'

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
    "name": "et",
    "address_location": "in",
    "free_slots_high": "inventore",
    "free_slots_medium": "enim",
    "free_slots_low": "adipisci",
    "price_high": "ratione",
    "price_medium": "architecto",
    "price_low": "et"
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


