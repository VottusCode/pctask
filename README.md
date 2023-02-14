# Test Task

A simple Laravel REST API with authentication using Laravel Sanctum.

## Setting up

1. Install dependencies
```shell
composer install
```

2. Setup database in .env (rename .env.example to .env first)
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

3. Run database migrations
```shell
php artisan migrate
```

4. Start the webserver
```shell
php artisan serve
```

## Authentication

### Creating a new user

```
POST /api/auth/register
```
```json
{
  "name": "John Doe",
  "email": "johndoe@example.com",
  "password": "johnisthebest"
}
```

Response 

```json
{
  "token": "..."
}
```

### Signing in

```
POST /api/auth/login
```
```json
{
  "email": "johndoe@example.com",
  "password": "johnisthebest"
}
```

Response

```json
{
  "token": "..."
}
```


### Using the token

To authenticate using the given token, use the `Authorization` header:

```
Authorization: Bearer <token>
```

## Products

You must be authenticated to use the /api/products routes.

### Create a Product

```
POST /api/products
```

```json
{
  "name": "Product Name",
  "url": "https://url.com/to-product",
  "price": 39.9,
  "visible": false
}
```

Response

```json
{
  "data": {
    "id": "98775a2f-ea4b-4698-86de-842efe70c64d",
    "name": "Product Name",
    "url": "https://url.com/to-product",
    "price": 39.9,
    "visible": false
  }
}
```

### Get all products

```
GET /api/products
```

Response

```json
{
  "data": [
    {
      "id": "98775a2f-ea4b-4698-86de-842efe70c64d",
      "name": "Product Name",
      "url": "https://url.com/to-product",
      "price": 39.9,
      "visible": false
    }
  ]
}
```

### Get a specific product

```
GET /api/product/{id}
```

Response

```json
{
  "data": {
    "id": "98775a2f-ea4b-4698-86de-842efe70c64d",
    "name": "Product Name",
    "url": "https://url.com/to-product",
    "price": 39.9,
    "visible": false
  }
}
```

### Update a specific product

```
PUT|PATCH /api/product/{id}
```
```json
{
  "name": "Updated Name",
  "url": "https://updated-url.com/to-product",
  "price": 39.9,
  "visible": false
}
```

Response

```json
{
  "data": {
    "id": "98775a2f-ea4b-4698-86de-842efe70c64d",
    "name": "Updated Name",
    "url": "https://updated-url.com/to-product",
    "price": 39.9,
    "visible": false
  }
}
```

### Delete a specific product

```
DELETE /api/product/{id}
```

Response

```
204 No Content
```
