# Testapp

Docker container with PHP 8.2 + MySQL 8 + NGINX + test Symfony 6.3 project

## Installation

```bash
git clone https://github.com/enver-kalinin/test1.git
make all
```

## Usage

URL domain1.localhost:8001 shows "Hello Module1"

URL domain2.localhost:8001 shows "Hello Module2"

Subdomains are stored in the database and associated with modules. If you change the subdomain in the database, the associated module will be available under the new subdomain.

Each module has own controller with own routes and service with own config.