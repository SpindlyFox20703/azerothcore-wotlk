# Docker Compose Web Stack

A simple Docker Compose setup for a web application stack featuring PHP, Nginx, and MySQL.

## Overview

This project provides a containerized development environment with the following services:
- **PHP**: Custom PHP application container
- **Nginx**: Web server (latest version)
- **MySQL**: Database server (version 8.0)

## Quick Start

1. Clone this repository:
   ```bash
   git clone <repository-url>
   cd docker-compose
   ```

2. Copy the environment file and customize if needed:
   ```bash
   cp .env.example .env
   ```

3. Start the services:
   ```bash
   docker-compose up -d
   ```

4. Access the application:
   - Web application: http://localhost:8080
   - MySQL database: localhost:3307

The application will show a status page confirming that PHP and MySQL are working correctly.

## Services Configuration

### Nginx
- **Image**: nginx:alpine
- **Port**: 8080 (host) → 80 (container)
- **Configuration**: Custom nginx.conf for PHP-FPM integration
- **Document Root**: ./src

### MySQL Database
- **Image**: mysql:8.0
- **Port**: 3307 (host) → 3306 (container)
- **Database**: app_db (configurable via .env)
- **User**: app_user (configurable via .env)
- **Persistent Storage**: Named volume for data persistence
- **Health Check**: Built-in MySQL health monitoring

### PHP
- **Image**: php:8.2-fpm
- **FastCGI**: Communicates with Nginx via PHP-FPM
- **Document Root**: ./src
- **Database Support**: PDO MySQL extension included

## Usage

To stop the services:
```bash
docker-compose down
```

To view logs:
```bash
docker-compose logs
```

To rebuild services after changes:
```bash
docker-compose up --build
```

## Requirements

- Docker
- Docker Compose

## Environment Variables

Copy `.env.example` to `.env` and customize the following variables:

- `DB_ROOT_PASSWORD`: MySQL root password
- `DB_NAME`: Database name
- `DB_USER`: Application database user
- `DB_PASSWORD`: Application database password

## File Structure

```
.
├── README.md
├── docker-compose.yaml
├── .env.example         # Environment variables template
├── nginx/
│   └── nginx.conf       # Nginx configuration
└── src/                 # PHP application files
    └── index.php        # Sample PHP file with database test
```