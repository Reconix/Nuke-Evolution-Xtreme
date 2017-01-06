<?php
/*=======================================================================
 Nuke-Evolution Xtreme: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Installer
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : lang-install.php
   Author        : JeFFb68CAM (www.Evo-Mods.com)
   Version       : 1.0.0
   Date          : 11.05.2005 (mm.dd.yyyy)

   Notes         : You may NOT use this installer for your own
                   needs or script. It is written specifically
                   for Nuke-Evolution.
************************************************************************/

$step_a[1] = "Inicio";
$step_a[2] = "Permisos Requeridos";
$step_a[3] = "Archivo de Configuración";
$step_a[4] = "Verificación de Sistema";
$step_a[5] = "Instalación";
$step_a[6] = "Configuración de la página";

$install_lang['briefing'] = "Esto instalará $nuke_name en su servidor";
$install_lang['couldnt_connect'] = "Problema conectando a la base de datos<br />";
$install_lang['couldnt_select_db'] = "Problema seleccionando la base de datos<br />";
$install_lang['continue'] = "Continúe al paso";
$install_lang['connection_failed'] = "La conexión al servidor ha fallado! Asegurese que su configuración está correcta.";
$install_lang['connection_failed2'] = "La conexión a la base de datos ha fallado! Asegurese que su configuración está correcta. (Nombre de la base)";
$install_lang['chmod'] = "Cambiar los permisos de los archivos requeridos (CHMOD)";
$install_lang['config_maker'] = "Generador de Config.php";
$install_lang['configure'] = "Configuración de la página";
$install_lang['cant_open'] = "Problema abriendo archivo";
$install_lang['cantwrite'] = "Problema escribiendo al archivo";
$install_lang['chmod_failed'] = "Uno o más archivos ha fallado, por favor hágalo manualmente.";
$install_lang['config_success'] = "Config.php generado exitosamente.";
$install_lang['cookie_name'] = "Nombre de Cookie:";
$install_lang['cookie_path'] = "Dirección de Cookie:";
$install_lang['cookie_domain'] = "Domain de Cookie:";
$install_lang['config_failed'] = "Generación de Config.php falló.";
$install_lang['installer_heading'] = "Instalador :: Paso";
$install_lang['installer_heading2'] = "de";
$install_lang['dbhost'] = "Host de Database:";
$install_lang['dbname'] = "Nombre de Database:";
$install_lang['dbuser'] = "Usuario de Database:";
$install_lang['dbpass'] = "Contraseña de Database:";
$install_lang['dbtype'] = "Tipo de Database:";
$install_lang['dbhost_error'] = "Debes entrar un host (estándar es \"localhost\")";
$install_lang['dbname_error'] = "Debes entrar un nombre.";
$install_lang['dbuser_error'] = "Debes entrar un usuario.";
$install_lang['dbpass_error'] = "Debes entrar una contraseña.";
$install_lang['dbtype_error'] = "Debes seleccionar un tipo de base.";
$install_lang['data_success'] = "Validación de data y servidor de SQL completa!";
$install_lang['die_message'] = "Error General";
$install_lang['prefix'] = "Prefijo:";
$install_lang['user_prefix'] = "Prefijo de Usuario:";
$install_lang['confirm_data'] = "Confirmar Data";
$install_lang['server_check'] = "Verificar Servidor";
$install_lang['skip'] = "Brincar Configuración";
$install_lang['failed'] = "FALLÓ";
$install_lang['success'] = "ÉXITO";
$install_lang['thefile'] = "El Archivo";
$install_lang['is_missing'] = "está perdido.<br />";
$install_lang['prefix_error'] = "Debes entrar un prefijo.";
$install_lang['uprefix_error'] = "Debes entrar un prefijo de usuario.";
$install_lang['mysql_incorrect'] = "<font color=red>Su versión de MySQL no es correcta!</font><br />Tu servidor esta usando la versión '.$sql_version.' de MySQL y 4.x es requerida.";
$install_lang['dbtype_que'] = "Usted ha escogido una base diferente a MySQL como tipo, estas seguro/a que quieres utilizar esta? Si no estas seguro/a, debes ir atrás y seleccionar MySQL.";
$install_lang['session_lost'] = "Tu data de sesión ha sido perdida, por favor vuelva a empezar.";
$install_lang['php_ver'] = "Tu versión de PHP es incorrecta!</font></strong><br />4.x.x es requerida - Tu versión es";
$install_lang['checks_good'] = "La verificación ha sido exitosa. Por favor continúe.";
$install_lang['sql_error'] = "Ha habido un error de MySQL. <strong>Detalles del error:</strong></font><br />";
$install_lang['install_success'] = "Su instalación de $nuke_name ha sido exitosa.";
$install_lang['get_config_error'] = "No pude encontrar información de configuración<br />";
$install_lang['update_fail'] = "Error actualizando configuración para";
$install_lang['sitename'] = "Nombre de la página:";
$install_lang['sitedescr'] = "Descripción de la página:";
$install_lang['namechange'] = "Permitir Cambio de Nombre:";
$install_lang['yes'] = "Si:";
$install_lang['no'] = "No:";
$install_lang['email_sig'] = "Firma de E-mail:";
$install_lang['site_email'] = "E-mail de la página:";
$install_lang['default_lang'] = "Lenguaje estándar:";
$install_lang['server_name'] = "Nombre del Servidor:";
$install_lang['server_port'] = "Puerto del Servidor:";
$install_lang['done'] = "Gracias por utilizar Nuke-Evolution.<br /><br /><a href=index.php>Ir a tu página</a>";
$install_lang['delete'] = "<font color=\"red\">Porfavor remover install.php y la carpeta de instalación (install)</font>";
$install_lang['install_complete_header'] = " :: Instalación completa";
$install_lang['general_message'] = "Mensaje General";
$install_lang['data_error'] = "Error abriendo data.txt";
$install_lang['safe_mode'] = "Su php está en safe mode.<br /><br />Esto no permite que el instalador termine.<br /><br />Debe instalar Nuke-Evolution manualmente.<br /><br />Por favor vea el file de ayuda para instalar manualmente.";

?>