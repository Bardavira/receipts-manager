# SplitPay API

This is a Symfony-based project running on Docker, using MySQL and API Platform. It provides a RESTful API for managing appointments, clients, services, products, and more.

---

## 🚀 Getting Started

### 1. Clone the repository

```bash
git clone https://github.com/your-username/splitpay-api.git
cd splitpay-api
```

### 2. Start the containers

Make sure you have Docker and Docker Compose installed.

```bash
docker-compose up -d --build
```

This will start the following containers:

php: Symfony backend server

db: MySQL 8 database

composer: For managing PHP dependencies (runs manually)

### 3. Install dependencies
Use the Composer container to install PHP dependencies:

```bash
docker-compose run --rm composer install
```

### 4. Create the database

```bash
docker exec -it symfony_php php bin/console doctrine:database:create
docker exec -it symfony_php php bin/console doctrine:migrations:migrate
```

### 5. Access the application
Once the containers are running and migrations are applied, access the API in your browser or Postman:

```bash
http://localhost:8000/api
```
