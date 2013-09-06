Installing ssh2 extension

1. Download libssh2 from http://www.libssh2.org/download/libssh2-1.4.3.tar.gz, untar it.
or newer relase from http://www.libssh2.org
Install it using the following commands.

./configure
make
make install


2. Now download the pecl-ssh2 installer from http://pecl.php.net/get/ssh2-0.10.tgz
untar it & cd to that folder 

cd ssh2-0.11.0
phpize 
./configure –with-ssh2 
make

3. After this a ssh2.so will be created in module folder in current directory 
we will be copying this to extesion dir

4. This will give the path of extension directory 
grep extension_dir /usr/local/Zend/etc/php.ini

5. Now copy the ssh2.so
cp modules/ssh2.so /path/to/extension/dir 

6. Add the extension to your php.ini
extension=ssh2.so

7. Save the file & Restart httpd.

8. service apache2 restart

NOTE : If there is any error try running command with sudo or extract above in diffrent directory.
