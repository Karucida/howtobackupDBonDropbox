Seguir el tutorial de dropbox:
https://www.dropbox.com/es_ES/install-linux

32-bit:

cd ~ && wget -O - "https://www.dropbox.com/download?plat=lnx.x86" | tar xzf -
64-bit:

cd ~ && wget -O - "https://www.dropbox.com/download?plat=lnx.x86_64" | tar xzf -
A continuación, ejecuta el daemon de Dropbox desde la carpeta .dropbox-dist recién creada.

~/.dropbox-dist/dropboxd

Si ejecutas Dropbox en tu servidor por primera vez, se te pedirá que copies y pegues un enlace en un navegador activo para crear una nueva cuenta o añadir tu servidor a una cuenta existente. Una vez hecho esto, se creará la carpeta de Dropbox en tu directorio principal. Descarga este script de Python para controlar Dropbox desde la línea de comandos. Para poder acceder fácilmente, añade un enlace simbólico al script en cualquier parte de la RUTA.

Ruta de carpeta:
cd ~/Dropbox/

Crear Screen:
screen -S Dropboxsync
-S Da un nombre al screen en este caso para identificarlo si tuvieramos más

~/.dropbox-dist/dropboxd

para salir del screen
ctr+a+d

Crear backups desde php:
https://github.com/Karucida/howtobackupDBonDropbox/backup.php

