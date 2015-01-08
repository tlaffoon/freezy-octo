## Codeup App App

### Environment Configuration:

> Create the following folders in your public folder:
    mkdir doc-upload img-upload

> Necessary for uploads to function correctly.

    vim /etc/nginx/nginx.conf:
        client_max_body_size 20M;

    vim /etc/php5/fpm/php.ini:
        upload_max_filesize = 20M
        post_max_size = 20M

    sudo service nginx restart
    sudo service php5-fpm restart