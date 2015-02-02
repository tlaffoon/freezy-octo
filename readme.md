## Codeup App App 

## Application Configuration

Use the .env-template file to configure your administrative user locally.

    <?php

    return array(

        'DB_NAME' => '',
        'DB_USER' => '',
        'DB_PASS' => '',

        'ADMIN_USER' => '',
        'ADMIN_PASS' => '',
        'ADMIN_EMAIL' => '',
        'ADMIN_GENDER' => '',
        'ADMIN_FIRSTNAME' => '',
        'ADMIN_LASTNAME' => '',
        'ADMIN_FULLNAME' => '',
        'ADMIN_PHONE' => '',
    );

The database host will be local (127.0.0.1) regardless.  Other settings will differ depending on what you configure locally.  The admin information is used for your user in the seeder.

### Environment Configuration:

> Create the following folders in your public folder:
    mkdir doc-upload img-upload

> This step is necessary for resume uploads to function correctly.

    vim /etc/nginx/nginx.conf:
        client_max_body_size 20M;

    vim /etc/php5/fpm/php.ini:
        upload_max_filesize = 20M
        post_max_size = 20M

    sudo service nginx restart
    sudo service php5-fpm restart