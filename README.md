# Catatan
Sistem Manajemen Kursus Mengemudi &amp; Menjahit Codeigniter
Untuk menjalankan aplikasi ini pastikan di buatkan virtual hostnya dan juga tambahkan .htaccess
untuk lebih lanjut silahkan kontak
Facebook : https://www.facebook.com/opChaky.it





<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /

    #Removes access to the system folder by users.
    #Additionally this will allow you to create a System.php controller,
    #previously this would not have been possible.
    #'system' can be replaced if you have renamed your system folder.
    RewriteCond %{REQUEST_URI} ^system.*
    RewriteRule ^(.*)$ /index.php?/$1 [L]
    
    #When your application folder isn't in the system folder
    #This snippet prevents user access to the application folder
    #Submitted by: Fabdrol
    #Rename 'application' to your applications folder name.
    RewriteCond %{REQUEST_URI} ^application.*
    RewriteRule ^(.*)$ /index.php?/$1 [L]

    #Checks to see if the user is attempting to access a valid file,
    #such as an image or css document, if this isn't true it sends the
    #request to index.php
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php?/$1 [L]
</IfModule>

<IfModule !mod_rewrite.c>
    # If we don't have mod_rewrite installed, all 404's
    # can be sent to index.php, and everything works as normal.
    # Submitted by: ElliotHaughin

    ErrorDocument 404 /index.php
</IfModule>

<IfModule mod_deflate.c>
    AddOutputFilter DEFLATE js css
    AddOutputFilterByType DEFLATE text/plain text/xml application/xhtml+xml text/css   application/xml application/rss+xml application/atom_xml application/x-javascript application/x-httpd-php application/x-httpd-fastphp text/html

    #The following lines are to avoid bugs with some browsers
    BrowserMatch ^Mozilla/4 gzip-only-text/html
    BrowserMatch ^Mozilla/4\.0[678] no-gzip
    BrowserMatch \bMSIE !no-gzip !gzip-only-text/html
</IfModule>

<IfModule mod_headers.c>
    <FilesMatch "\.(js|css|xml|gz)$">
        Header append Vary Accept-Encoding
    </FilesMatch>
    <FilesMatch "\.(ico|jpe?g|png|gif|swf)$">
        Header set Cache-Control "public"
    </FilesMatch>
    <FilesMatch "\.(css)$">
        Header set Cache-Control "public"
    </FilesMatch>
    <FilesMatch "\.(js)$">
        Header set Cache-Control "private"
    </FilesMatch>
    <FilesMatch "\.(x?html?|php)$">
        Header set Cache-Control "private, must-revalidate"
    </FilesMatch>
</IfModule>