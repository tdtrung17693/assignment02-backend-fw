# Backend FW

## How to run with Docker

### Prerequisites

- Docker
- Docker Compose
  
### Run
Make sure that Docker is running.

Navigate to the project root and run the following command:

```shell
$ docker-compose -f docker-compose.yml up
```

## How to run with XAMPP

Open Apache's `httpd.conf`

Add a Virtual Host

```apacheconf
<VirtualHost assignment.local:80>
    DocumentRoot "E:\xampp\htdocs\server\public"
    ServerName assignment.local
    <Directory "E:\xampp\htdocs\server">
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Order allow,deny
        allow from all
        Require all granted
    </Directory>
</VirtualHost>
```

Replace the directory to suit your environment.

You also need to add the following entry into your `hosts` file in order
to access the website through the host name `assignment.local`

```text
127.0.0.1 assignment.local
```
