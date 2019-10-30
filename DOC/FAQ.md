# Frequently asked question

## How to send mail from localhost using gmail server

<https://stackoverflow.com/questions/33969783/phpubuntu-send-email-using-gmail-form-localhost/45125490#45125490>

Please do following steps to send mail from *localhost* on **Ubuntu/Linux** through **gmail** :

For that you need to install **`msmtp`** on Linux/Ubuntu server.

Gmail uses ***https://*** (it's hyper text secure) so you need install `ca-certificates`

```bash
~$ sudo apt-get install msmtp ca-certificates
```

It will take few seconds to install `msmtp` package.

Now you have to create configuration file(**`msmtprc`**) using , gedit editor.

```bash
    ~$ sudo gedit /etc/msmtprc
```

Now you have to copy and paste following code in gedit (*file you created with above command*) 

```bash
defaults
tls on
tls_starttls on
tls_trust_file /etc/ssl/certs/ca-certificates.crt

account default
host smtp.gmail.com
port 587
auth on
user MY_GMAIL_ID@gmail.com
password MY_GMAIL_PASSSWORD
from MY_GMAIL_ID@gmail.com
logfile /var/log/msmtp.log
```

Don't forget to replace **MY_GMAIL_ID** with your "*gmail id*" and **MY_GMAIL_PASSSWORD** with your "*gmail password*" in above lines of code.

Now create `msmtp.log` as

```bash
~$ sudo touch /var/log/msmtp.log
```

You have to make this file readable by anyone with

```bash
~$ sudo chmod 0644 /etc/msmtprc
```

Now Enable sendmail log file as writable with

```bash
~$ sudo chmod 0777 /var/log/msmtp.log
```

Your configuration for gmail's SMTP is now ready. Now send one test email as

```bash
~$ echo -e "Subject: Test Mail\r\n\r\nThis is my first test email." |msmtp --debug --from=default -t MY_GMAIL_ID@gmail.com
```

 Please check your Gmail inbox.

----------

Now if you want to send email with php from localhost please follow below instructions:-

Open and edit *`php.ini`* file

```bash
~$ sudo gedit /etc/php/7.0/apache2/php.ini
```

You have to set ***sendmail_path*** in your *`php.ini`* file.

Check your SMTP path with

```bash
~$ which msmtp
```

and you will get `/usr/bin/msmtp` like that.

Search `sendmail_path` in *`php.ini`* and edit as below

```bash
; For Unix only.  You may supply arguments as well (default: "sendmail -t -i").
; http://php.net/sendmail-path
sendmail_path = /usr/bin/msmtp -t
```

Please check 3rd line carefully there is no semicolon before `sendmail_path`.

Now save and exit from gedit. Now it's time to restart your *`apache`*

```bash
~$ sudo /etc/init.d/apache2 restart
```

Now create one php file with mail function from http://in2.php.net/manual/en/function.mail.php.

Do test and enjoy !!
