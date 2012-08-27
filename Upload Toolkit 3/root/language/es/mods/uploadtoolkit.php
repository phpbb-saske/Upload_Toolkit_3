<?php
/**
* @package: phpBB 3.0.8 :: Upload Toolkit 3 -> root/language/es/mods :: [es][Spanish]
* @version: $Id: uploadtoolkit.php, v 0.0.1 2009/09/18 09:18:09Z leviatan21 Exp $
* @copyright: Saske < salva_bxt@hotmail.com > (Salva) http://www.phpbbsaske.eshost.es/foro/index.php
* @license: http://opensource.org/licenses/gpl-license.php GNU Public License 
* @author: Saske - http://www.phpbbsaske.eshost.es/foro/index.php
* @translator: leviatan21 - http://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=345763
**/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// "Page %s of %s" you can (and should) write "Page %1$s of %2$s", this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. "Message %d" is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., "Click %sHERE%s" is fine
// Reference : http://www.phpbb.com/mods/documentation/phpbb-documentation/language/index.php#lang-use-php
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'TOOLKIT_SASKE_LINK'		=> '<strong>Upload Toolkit 3 %1$s</strong> por <a href="http://www.phpbbsaske.eshost.es/foro/index.php" onclick="window.open(this.href);return false;" >Saske</a>',

// Front page common strings
	'TOOLKIT_DISABLED'			=> 'Su acceso a Upload Toolkit 3 esta desabilitado.<br />Por favorcontacte con el administrador del foro para más detalles.',
	'TOOLKIT_DISABLED_ERROR'	=> 'El acceso a los archivos está dañado o está utilizando una sintaxis incorrecta. Por favor, volver a crear el archivo de este usuario',
	'TOOLKIT_INDEX'				=> 'Indice gestor de archios',

	'TOOLKIT_LOGIN_EXPLAIN'		=> 'Tienes que estas registrado y conectado para usar <strong>Upload Toolkit</strong>.',
	'CLICK_RETURN_FOLDER'		=> '%1$sVolver a la carpeta anterior%2$s',
	'TOOLKIT_WELCOME'			=> 'Bienvenido',

// Agreement block
	'TOOLKIT_AGREEMENT'			=> 'Acuerdo de usuario',
	'TOOLKIT_AGREE_FULL'		=> '<span class="strong">Al utilizar <em>Upload Toolkit</em>se compromete a no subir los siguientes: </span>',
	// First rules
	'TOOLKIT_AGREE_SEE'			=> 'Al utilizr <em>Upload Toolkit</em> usted esta de acuerdo con %1$s estos %2$s terminos.',
	'TOOLKIT_AGREE_FULL_RULES'	=> array(
		'AGREE_RULE1'			=> 'Los archivos que infrinjan los derechos de autor de cualquier entidad. Esto incluye, pero no se limita a, las fotografías con derechos de autor, así como los archivos para los que usuario no tiene los permisos de uso y  distribución.',
		'AGREE_RULE2'			=> 'Archivos cuyo uso o propósito sea acosar a personas individuales o múltiples.',
		'AGREE_RULE3'			=> 'Archivos cuyo uso o propósito es la promoción de productos o servicios a través de anuncios o beneficio comercial. <br /> Esto incluye, pero no se limita a la publicidad, el spam de correo electrónico y la banners.',
		'AGREE_RULE4'			=> 'Archivos que son ilegales y / o están en violación de cualquier  ley de Estado Unidos o de cualquier otro pais.',
		'AGREE_RULE5'			=> 'Los archivos que son de carácter pornográfico.',
	),
	// Second rules
	'TOOLKIT_AGREE_ALSO'		=> '<span class="strong">También están de acuerdo:</span>',
	'TOOLKIT_AGREE_ALSO_RULES'	=> array(
		'AGREE_RULE1'			=> 'No hotlink / DirectLink a archivos  <span class="strong">"{BOARD_URL}"</span> de dominio sin el consentimiento previo de la administración.',
		'AGREE_RULE2'			=> 'Esto es robo de ancho de banda y su cuenta puede ser prohibida e informó a su proveedor de Internet!',
	),

// User files block
	'TOOLKIT_FOLDER_UP'			=> 'Subir carpeta',
	'TOOLKIT_MEW_UPLOAD'		=> 'Subir nuevo archivo',
	'TOOLKIT_MY_FILES'			=> 'Archivos subidos',
	'TOOLKIT_NUMBER'			=> 'Nº',
	'TOOLKIT_THUMB'				=> '',
	'TOOLKIT_FILE'				=> 'Archivo',
	'TOOLKIT_FOLDER_NAME'		=> 'Nombre de la carpeta',
	'TOOLKIT_FILE_NAME'			=> 'Nombre del archivo',
	'TOOLKIT_SIZE'				=> 'Tamaño del archivo',
	'TOOLKIT_TIME'				=> 'Fecha',
	'TOOLKIT_ACTIONS'			=> 'Acciones',
	'TOOLKIT_ACTIONS_RENAME'	=> 'Renombrar',
	'TOOLKIT_ACTIONS_DELETE'	=> 'Eliminar',
	'TOOLKIT_ACTIONS_EDIT'		=> 'Editar',
	'TOOLKIT_THUMB_SHOW'		=> 'Ver Thumbnails',
	'TOOLKIT_THUMB_HIDE'		=> 'Ocultar Thumbnails',

	//
	'TOOLKIT_MAX_FILESIZE'		=> 'El tamaño maximo del archivo es',
	'TOOLKIT_FILESIZE_EMPTY'	=> 'No se pudo obtener información del tamañno del archivo del usuario actual. El archivo existe pero no se puede leer o está vacío.',
	'TOOLKIT_FILESIZE_ERROR'	=> 'El tamaño maximo del archivo  está dañado o está utilizando una sintaxis incorrecta. Por favor, volver a crear el archivo de este usuario',
	'TOOLKIT_NOTE'				=> 'Nota',
	'TOOLKIT_NOTES'				=> '<ul>
										<li>Los nombres de archivo sólo puede contener letras a-z, números, subrayados, guiones, puntos y paréntesis.</li>
										<li>Si usted usa módem de acceso telefónico, o esta cargando un archivo de gran tamaño, por favor, sea paciente ya que puede tomar unos minutos para cargar.</li>
										<li>Sólo puede cargar archivos con las siguientes extensiones: <br />%1$s</li>
									</ul>',

	//
	'TOOLKIT_DISK_QUOTA'		=> 'Quota de usuarios',
	'TOOLKIT_QUOTA_EMPTY'		=> 'No se pudo obtener información de cuota de archivo de cuota del usuario actual. El archivo existe pero no se puede leer o está vacío.',
	'TOOLKIT_QUOTA_ERROR'		=> 'El archivo de cuota está dañado o está utilizando una sintaxis incorrecta. Por favor, volver a crear el archivo de este usuario',
	'TOOLKIT_QUOTA_NOTE'		=> 'Utilidos : %1$s of : %2$s',
	'TOOLKIT_QUOTA_INFO_DETAIL'	=> 'Datelles de la rota',
	'TOOLKIT_QUOTA_INFO_FILES'	=> 'Archivos totales',
	'TOOLKIT_QUOTA_INFO_FOLDERS'=> 'Carpetas totales',
	'TOOLKIT_QUOTA_INFO_SIZE'	=> 'Tamaño total',
	'TOOLKIT_NO_FILES'			=> 'No se han subido archivos aun',
	'TOOLKIT_NO_FILENAME'		=> 'Debe especificar un nombre de archivo.',
	
	'TOOLKIT_HALT'				=> 'Upload Toolkit - General Halt!',
	'TOOLKIT_HALT_EMAIL'		=> 'Usuario : %1$s <br />
									No puede crear carpeta de usuario como un archivo que ya existe con el mismo nombre.
									<br />Por favor revise los permisos chamod de la carpeta
									<br /> %2$s <br /> %3$s <br />At: %4$s',
	'TOOLKIT_HALT_MSG'			=> 	'<strong>General Halt:</strong> No se puede crear carpeta de usuario como ya existe un archivo con el mismo nombre.
<br /> Por favor, pongase en contacto con el administrador del foro y pida que se elimine el archivo denominado<strong>%1$s </strong> en la carpeta del script
									<br />Un furthur ha ocurrido que el script no pudo eliminar el archivo mencionado.
									<br />Por favor revise los permisos chamod del archivo.
									<br />No se recomienda utilizar esta secuencia de comandos hasta que el problema se ha resuelto',

	
// Edit, Create, Upload, Rename and Delete
	'TOOLKIT_STATUS'			=> 'Estado',
	'TOOLKIT_DETAILS'			=> 'Detalles',
	'TOOLKIT_TRY_AGAIN'			=> 'Por favor ,vuelva a intentarlo',

	// Edit
	'TOOLKIT_EDIT'				=> 'Editar archivo',
	'TOOLKIT_EDIT_FILE'			=> 'Archivo',
	'TOOLKIT_BUTTON_SAVE'		=> 'Guardar',
	'TOOLKIT_NO_EDITED'			=> 'Carpeta no guardada.',
	'TOOLKIT_EDIT_NOTE'			=> '<ul>
									<li>quota.txt & maxsize.txt : valores expresados en MBytes</li>
									<li>disabled.txt : 0 habilitado, 1 disabilitado</li>
									</ul>',
	'TOOLKIT_EDITED_ERROR'		=> 'El archivo: <strong> %1$s </strong> no puede ser salvado.
									<br />Por favor notifique al administradpr el error y revise los permisos CHAMOD de los archivos.',
	'TOOLKIT_EDITED'			=> 'Upload Toolkit - archivo editado',
	'TOOLKIT_EDITED_EMAIL'		=> 'Usuario : %1$s <br />
									Ha editado el archivo <br /> %2$s <br />En: %3$s',
	'TOOLKIT_EDITED_SUCCESS'	=> 'Archivo editado.<br />
									El archivo: <strong> %1$s </strong> ha dio editado con exito.',
	// Create
	'TOOLKIT_CREATE'			=> 'Añadir carpeta',
	'TOOLKIT_CREATE_FOLDER'		=> 'Añadir nueva carpeta',
	'TOOLKIT_CREATE_QUOTA'		=> 'Añadir quota de archive',
	'TOOLKIT_CREATE_MAXFILE'	=> 'Añadir tamaño del archivo',
	'TOOLKIT_CREATE_DISABLE'	=> 'Añadir archivo desabilitado',

	'TOOLKIT_BUTTON_CREATE'		=> 'Añadir ahora',
	'TOOLKIT_CREATE_NEWNAME'	=> 'Nombre la nueva carpeta',
	'TOOLKIT_CREATE_CONFIRM'	=> 'Crear nueva carpeta?',
	'TOOLKIT_CREATE_EXPLAIN'	=> '¿Está seguro que desea crear: <br />%1$s',
	'TOOLKIT_NO_CREATED'		=> 'Error creando.',
	'TOOLKIT_NO_CREATE_FILE'	=> 'El nombre del archivo que ha especificado no es válido para guardarlo.',
	'TOOLKIT_USED_FOLDERNAME'	=> 'El nombre de carpeta que ha especificado ya está en uso. Elega un nombre diferente.',
	'TOOLKIT_CREATED'			=> 'Upload Toolkit - carpeta creada',
	'TOOLKIT_CREATED_EMAIL'		=> 'Usurio : %1$s <br />
									Ha creado la carpeta: <br /> %2$s <br />En: %4$s',
	'TOOLKIT_FILE_ERROR'		=> 'El archivo: <strong> %1$s </strong> no ha podido ser creado.
									<br />Por favor notifique al administradpr el error y revise los permisos CHAMOD de los archivos.',
	'TOOLKIT_CREATED_ERROR'		=> 'El archivo : <strong> %1$s </strong> no ha podido ser creado.
									<br />Por favor notifique al administradpr el error y revise los permisos CHAMOD de los archivos.',
	'TOOLKIT_CREATED_SUCCESS'	=> 'Carpeta creada.<br />
									La carpeta : <strong> %1$s </strong> ha sio creada con exito.',

	// Upload
	'TOOLKIT_POSTIT'			=> 'Post It',
	'TOOLKIT_UPLOAD'			=> 'Subir archivo',
	'TOOLKIT_NO_ROOM'			=> 'Quota de disco excedida.
									<br />Usted no tiene espacio para seguir subiendo archivos.
									<br />Pongase en contacto con el administrador y pide más quota de disco para',
	'TOOLKIT_BUTTON_UPLOAD'		=> 'Subir ahora',
	'TOOLKIT_NO_UPLOADED'		=> 'Error subiendo archivo',
	'TOOLKIT_NO_UPLOADFILE'		=> 'No ha especificado un archivo para cargar.
									<br />Por favor, regrese y haga clic en el botón Examinar para seleccionar un archivo antes de subir.',
	'TOOLKIT_NO_FILE_SIZE'		=> 'El archivo que ha subido tiene 0 bythes de tamaño.
									<br />Por favor, regrese y seleccione un archivo que contengaa datos.',
	'TOOLKIT_BAD_EXT'			=> 'El archivo que has subido no contiene una extensión válida.
									<br />Por favor, cambie la extensión a otra que sea válida o carge un archivo diferente.',
	'TOOLKIT_QUOTA_FULL'		=> 'El archivo que está intentando subir supera la cuota de disco asignado.
									<br />Por favor,  suba un archivo más pequeño o elimine algunos de los archivos existentes.',
	'TOOLKIT_UPLOAD_FAIL'		=> 'El archivo no se mueve a la carpeta de usuario.
									<br />Póngase en contacto con el administrador para comprobar el CHMOD y / o permisos de archivo.',
	'TOOLKIT_LARGE_FILE'		=> 'Archivo demasiado grande.
									<br /> El archivo no se ha subido debido a que es más grande que el límite permitido de%1$s
									<br />Por favor, comprima sus archivos a un tamaño menor o carge un archivo diferente.',
	'TOOLKIT_LARGE_PHPINI'		=> 'El archivo no se ha subido debido a que es más grande que el <em> tamaño maximo permitdio</em> ajustado <em>php.ini</em> file.
									<br /> Póngase en contacto con el administrador y notifique este error y peda que se  aumente el ajuste en el php.ini, o disminuye el<strong>"tamaño maximo"</strong> en el script.',
	'TOOLKIT_UPLOAD_ERROR'		=> 'Error Number : %1$s 
									<br />El archivo no se ha subido. Póngase en contacto con el administrador si este error si persiste después de un segundo intento.',
	'TOOLKIT_UPLOAD_SUCCESS'	=> 'Subida completada.
									<br />Nombre del archivo : %1$s 
									<br />Tamaño del archivo : %2$s
									<br /> Su archivo fue subido a: %3$s',
	'TOOLKIT_UPLOADED_LINK'		=> 'Simplemente copie y pegue la ruta de acceso siguiente en un mensaje ',
	'TOOLKIT_UPLOADED'			=> 'Upload Toolkit - Archivo subido',
	'TOOLKIT_UPLOADED_EMAIL'	=> 'Usuario : %1$s <br />
									Ha subido el archivo :<br />%2$s<br />Para :<br />%3$s<br />En: %4$s',
	// Rename
	'TOOLKIT_RENAME'			=> 'Renombrar archivo',
	'TOOLKIT_BUTTON_RENAME'		=> 'Renombrar ahora',
	'TOOLKIT_RENAME_NEWNAME'	=> 'Nuevo nombre de archivo',
	'TOOLKIT_RENAME_CONFIRM'	=> '¿Estás seguro de que desea cambiar el nombre de este archivo ?',
	'TOOLKIT_RENAME_EXPLAIN'	=> '¿Estás seguro de que desea cambiar el nombre de: <br />%1$s <br />to : <br />%2$s',
	'TOOLKIT_NO_RENAMED'		=> 'Archivo no renombrado.',
	'TOOLKIT_NO_RENAMEFILE'		=> 'Debe especificar un nombre de archivo válido para cambiar el nombre.',
	'TOOLKIT_SAME_FILENAME'		=> 'You must specify a different filename.',
	'TOOLKIT_USED_FILENAME'		=> 'El nombre de archivo especificado esta en uso. Eliga un nombre difernete.',
	'TOOLKIT_WRONG_EXT'			=> 'No se puede cambiar el nombre de un archivo a una extensión, que no está permitida.',
	'TOOLKIT_WRONG_NAME'		=> 'Usted no puede utilizar caracteres rechazados en el nombre del archivo.',
	'TOOLKIT_HACK_ATTEMPT'		=> 'Upload Toolkit -¡Intento de Hack detectado! ',
	'TOOLKIT_HACK_ATTEMPT_EMAIL'=> 'Usuario : %1$s <br />
									Tiene un exploit pontencialmente peligroso en Upload ToolKit.<br />
									Detalles: Una barra inclinada hacia delante o hacia atrás  por el usuario como la ruta del archivo que podría permitir el acceso externo al directorio.<br />
									El toolkit reconoce el carácter (s) y el intento ha sido bloqueado.<br /> %2$s <br /> %3$s <br />En: %4$s',
	'TOOLKIT_HACK_ATTEMPT_MSG'	=> '¡Intento de modificación de rutas de los archivos detectados!<br />
									La ejecución del script se ha detenido y un registro de su intento ha sido comunicada a la administración<br />junto con la información de usuario, dirección IP y la fecha y hora.',
	'TOOLKIT_RENAME_ERROR'		=> 'El archivo : <strong> %1$s </strong> es incapaz de cambiar el nombre de: %2$s.
									<br />Por favor notifique el error al administrador y revise los permisos CHAMOD de los archivos',
	'TOOLKIT_RENAME_SUCCESS'	=> 'Archivo renombrado.
									<br />Archivo original renombrado : %1$s 
									<br />fue renombrado con exito : %2$s',
	'TOOLKIT_RENAMED'			=> 'Upload Toolkit - Archivo renombrado',
	'TOOLKIT_RENAMED_EMAIL'		=> 'Usuario : %1$s <br />
									Ha cambiado el nombre del archivo: <br /> %2$s <br /> Para : <br /> %3$s <br />En: %4$s',
	// Delete
	'TOOLKIT_DELETE'			=> 'Eliminar archivo',
	'TOOLKIT_BUTTON_DELETE'		=> 'Eliminar ahora',
	'TOOLKIT_DELETE_CONFIRM'	=> '¿Estás seguro que quieres eliminar este archivo?',
	'TOOLKIT_DELETE_EXPLAIN'	=> 'Está seguro que desea eliminar : <br />%1$s',
	'TOOLKIT_NO_DELETED'		=> 'El archivo no se ha eliminado.',
	'TOOLKIT_NO_DELETE_NAME'	=> 'Debe especificar un nombre de archivo para eliminarlo.',
	'TOOLKIT_NO_DELETE_FILE'	=> 'El nombre del archivo que ha especificado no es válido para eliminar archivos.',
	'TOOLKIT_DELETE_ERROR'		=> 'El archivo: <strong> %1$s </strong> no pudo ser eliminado.
									<br />Por favor notifique el error al administrador y revise los permisos CHAMOD de los archivos.',
	'TOOLKIT_DELETE_SUCCESS'	=> 'Archivo eliminado.<br />
									El archivo : <strong> %1$s </strong> se ha eliminado con éxito.',
	'TOOLKIT_DELETED'			=> 'Upload Toolkit - Archivo elminado',
	'TOOLKIT_DELETED_EMAIL'		=> 'Usurio : %1$s <br />
									Ha eliminado el archivo: <br /> %2$s <br />En: %3$s',
));

?>