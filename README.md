# Laravel Project Setup Instructions

Follow these steps to run the project locally.

## Requirements

- PHP >= 8.2
- Composer
- MySQL

## Installation Steps

1. **Clone the Repository**
   ```bash
   git clone https://github.com/Faruque5698/Tasks.git
   cd your-laravel-project
 2. **Copy .env File**
    ```bash
    cp .env.example .env
    ```

3. **Configure Environment Variables**
   ```ini
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
    ```
4. **Install Dependencies**
   ```bash
   composer install
   ```
      
5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```
   
6. **Run Migrations**
   ```bash
    php artisan migrate
    ```
7. **Serve the Application**
   ```bash
   php artisan serve
   ```
   
**API Documentation**
## API Reference

###  Blog
#### Create posts
```http
  Post /api/posts
```
#### Request Body
```json
{   
    "title": "My First Post",
    "content": "This is my content."
}

```
#### Response
```json

{
    "id": 1,
    "title": "My First Post",
    "content": "This is my content.",
    "created_at": "2023-10-01T12:00:00Z"
}

```
#### Get all posts
```http
  GET /api/posts
```
#### Response
```json
[
    {
        "id": 1,
        "title": "My First Post",
        "content": "This is my content.",
        "created_at": "2023-10-01T12:00:00Z"
    },
    {
        "id": 2,
        "title": "My Second Post",
        "content": "This is my content.",
        "created_at": "2023-10-02T12:00:00Z"
    }
]
```
#### Get a single post
```http
  GET /api/posts/{id}
```
#### Response
```json
{
    "id": 1,
    "title": "My First Post",
    "content": "This is my content.",
    "created_at": "2023-10-01T12:00:00Z"
}
```

### User

#### User registration
```http
  POST /api/register
```

#### Request body 
```json
{
  "name": "John Doe",
  "email": "johndoe@example.com",
  "password": "password123",
  "password_confirmation": "password123"
}
```
#### Response
```json
{
    "id": 1,
    "name": "John Doe",
    "email": "johndoe@example.com"
}
```

### Task
#### Create a task
```http
  POST /api/tasks
```
#### Request Body
```json
{
    "title": "Finish Laravel test",
}
```
#### Response
```json
{
    "id": 1,
    "title": "Finish Laravel test",
    "is_completed": false,
    "created_at": "2023-10-01T12:00:00Z"
}
```
#### Get is_completed false all tasks
```http
  GET /api/tasks
```
#### Response
```json
[
    {
        "id": 1,
        "title": "Finish Laravel test",
        "is_completed": false,
        "created_at": "2023-10-01T12:00:00Z"
    },
    {
        "id": 2,
        "title": "Finish Laravel test2",
        "is_completed": false,
        "created_at": "2023-10-02T12:00:00Z"
    }
]
```
#### Get is_completed true all tasks
```http
  pathch /api/tasks/1
```
#### Request Body
```json
{
    "is_completed": true
}
```
#### Response
```json
{
    "id": 1,
    "title": "Finish Laravel test",
    "is_completed": true,
    "created_at": "2023-10-01T12:00:00Z"
}
```
