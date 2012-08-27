<?php
/**
* @package: phpBB 3.0.8 :: Upload Toolkit -> root/uploadkit
* @version: $Id: index.php, v 0.1.0 2009/09/18 09:18:09Z leviatan21 Exp $
* @copyright: leviatan21 < info@mssti.com > (Gabriel) http://www.mssti.com/phpbb3/
* @license: http://opensource.org/licenses/gpl-license.php GNU Public License 
* @author: leviatan21 - http://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=345763
**/

/**
* Create a Custom bbcode
*
* BBCode usage :
*	[upfile]{SIMPLETEXT}[/upfile]
*
* HTML replacement :
*	<a href="#" onclick="javascript:popup('./uploadkit/index.php?dir={SIMPLETEXT}', 800, 600, 'Upload_{SIMPLETEXT}_file'); return false;" alt="Upload {SIMPLETEXT} file" title="Upload {SIMPLETEXT} file"><img src="./uploadkit/icon_upload.gif" alt="Upload {SIMPLETEXT} file" title="Upload {SIMPLETEXT} file" />&nbsp;Upload {SIMPLETEXT} file</a>
*	<a href="#" onclick="javascript:popup('./uploadkit/index.php', 800, 600, 'Upload_file'); return false;" alt="{L_UPLOADTOOLKIT}" title="{L_UPLOADTOOLKIT}"><img src="./uploadkit/icon_upload.gif" alt="{L_UPLOADTOOLKIT}" title="{L_UPLOADTOOLKIT}" />&nbsp;{L_UPLOADTOOLKIT}</a>
*
* Help line :
*	[upfile](Folder name|File type)[/upfile]
*
* Display on posting page :
*	Checked
**/

/**
* Add button in posting_buttons.html
* 	Prosilver :
* 	<input type="button" class="button2" name="{L_UPLOADTOOLKIT}" value="{L_UPLOADTOOLKIT}" title="{L_UPLOADTOOLKIT}" onclick="popup('{ROOT_PATH}uploadkit/index.php', 800, 600, 'Upload_file'); return false;"/>
* 	Subsilver2 :
* 	<input type="button" class="btnbbcode" name="{L_UPLOADTOOLKIT}" value="{L_UPLOADTOOLKIT}" title="{L_UPLOADTOOLKIT}" onclick="popup('{ROOT_PATH}uploadkit/index.php', 800, 600, 'Upload_file'); return false;"/>
**/

/**
* @ignore
**/
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

// Some oft used variables
$safe_mode		= (@ini_get('safe_mode') == '1' || strtolower(@ini_get('safe_mode')) === 'on') ? true : false;
$file_uploads	= (@ini_get('file_uploads') == '1' || strtolower(@ini_get('file_uploads')) === 'on') ? true : false;
$user->add_lang( array('acp/common', 'mods/uploadtoolkit') );

/**
* You can change the following options:
**/
$uploadtoolkit = array(
	'script'				=> "index.$phpEx",
	'folder'				=> "uploadkit/",
	'version'				=> "v0.1.4",
	'current_date'			=> $user->format_date(time(), false, true),

	// Setting 1: enable / disable the script
	'disabled'				=> false,

	// Setting 2: Forum Folder Name where uploaded files will go
	'upload_folder'			=> "{$phpbb_root_path}download/",

	// Option 3: Max File Size Permitted
		// (In MBytes)
	'max_filesize'			=> return_bytes(ini_get('upload_max_filesize')), // read the max value from the php.ini
//	'max_filesize'			=> return_bytes(1), // 1MB
		// (In KBytes)
//	'max_filesize'			=> 1024,  // 1MB

	// Option 4: Disk Quota (In KBytes)
		// (In MBytes)
	'user_quota'			=> return_bytes(10), // 10MB
		// (In KBytes)
//	'user_quota'			=> 10240, // 10MB

	// Option 5: Store logs
	'user_logs'				=> true,

	// Option 6: regular users can createa folder ?
	'user_create'			=> false,

	// Option 7: regular users can rename files ?
	'user_rename'			=> false,

	// Option 8: regular users can delete files ?
	'user_delete'			=> false,

	// Option 9: Notification Email address. Can be used to send a notification each time a file is uploaded.
	// Just leave at the default of 'noemail' to disable this feature
	'notification_email'	=> 'noemail', // $config['board_email'], //
	// Will send an email whenever a general error occurs. Such as no folder/file permission.
	'notify_general'		=> true,
	// Will send an email each time a file is uploaded
	'notify_upload'			=> true,
	// Will send an email each time a file is edited
	'notify_edit'			=> false,
	// Will send an email each time a file is renamed
	'notify_rename'			=> true,
	// Will send an email each time a file is deleted
	'notify_delete'			=> true,
	// Will send an email whenever a potential hack attempt occurs. Such as using "../" to try and switch directories.
	'notify_hack_attempts'	=> true,

	// bool overwrite If set to true, an already existing file will be overwritten
	'overwrite'				=> true,
	// Option 10: Permitted Extensions
	'extensions' => array(
		// Images:
		'[img]' => array(
			"gif",	// Graphic Interchange Format Image
			"jpg",	// e-JPG Graphic Image
			"jpe",	// JPEG Image
			"jpeg",	// JPEG Image
			"png",	// Portable (Public) Network Graphic
		),
		// General
		'[url]' => array(
			// Documents:
			"txt",	// Plain Text File
			"rtf",	// Rich Text Format File 
			"doc",	// Word Document
			"pdf",	// Acrobat Portable Document Format
			// Video:
			"avi",	// Audio Video Interleave File 
			"mpg",	// MPEG 1 System Stream 
			"mpeg", // MPEG Movie
			"mpe",	// MPEG Movie
			"wmv",	// Audio/Video Windows Media
			// Audio:
			"mp3",	// MPEG Audio Stream, Layer III 
			"wav",	// Waveform Audio 
			"wma",	// Windows Media Audio File
			// Misc:
			"rar",	// WinRAR Compresses Archive
			"zip",	// Compressed Archive File
		),
		// Flash
		'[flash]' => array(
			"swf",	// Flash Format File
		),
	),

	// Option 11: Thumbnail Extensions
	'thumb_extensions' => array(
			"gif",	// GIF Image
			"jpg",	// JPEG Image
			"jpe",	// JPEG Image
			"jpeg",	// JPEG Image
			"png",	// PNG Image
	),
	// Option 12: Thumbnail width in pixels
	'thumb_w_size'	=> 50,
	// Option 13: Thumbnail height in pixels
	'thumb_h_size'	=> 20,

	// Set hidden files for user settings
	'hidden_files' => array(
			"disabled.txt",
			"quota.txt",
			"maxsize.txt",
			"log.txt",
			"index.htm",
			"file.$phpEx",
	),
);

/******************************************************************************************************************************************************************************************************
* Lets begin the coding!
* 
* (DO NOT CHANGE ANYTHING AFTER THIS LINE!)
******************************************************************************************************************************************************************************************************/
$uploadtoolkit['script'] = $phpbb_root_path . $uploadtoolkit['folder'] . $uploadtoolkit['script'];

// Admin section - Start
$action = request_var('action', '');
if ($action || (isset($_POST['login'])))
{
	if ($action === 'admlogout')
	{
		$user->unset_admin();
		$redirect_url = append_sid($uploadtoolkit['script']);
		meta_refresh(3, $redirect_url);
		trigger_error($user->lang['ADM_LOGGED_OUT'] . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . $redirect_url . '">', '</a>'));
	}

	if ($action === 'admlogin' || (isset($_POST['login'])))
	{
		// Have they authenticated (again) as an admin for this session?
		if (!isset($user->data['session_admin']) || !$user->data['session_admin'])
		{
			login_box("index.$phpEx", $user->lang['LOGIN_ADMIN_CONFIRM'], $user->lang['LOGIN_ADMIN_SUCCESS'], true, false);
		}
	}
}
define('UT_ADMIN', ((!isset($user->data['session_admin']) || !$user->data['session_admin']) ? false : true));
// Admin section - End

/**
* Set up the user folder
**/
// Fix for ameisez
// $user_folder	= $uploadtoolkit['upload_folder'] . $_dir = request_var('dir', '', true);
$user_folder	= $uploadtoolkit['upload_folder'] . ((UT_ADMIN) ? '' : $user->data['user_id']);

// Navigate - Start
$action			= request_var('action', '', true);
$change_dir		= request_var('change_dir', array(''));
$cookie_folder	= request_var($config['cookie_name'] . '_user_folder', '', false, true);
$_folder		= request_var('user_folder', '', true);
if ($_folder || $cookie_folder)
{
	if ($action)
	{
		$user_folder = $_folder;
	}
	else
	{
		if (sizeof($change_dir))
		{
			if ($change_dir[0] == $user->lang['TOOLKIT_FOLDER_UP'])
			{
				$user_folder = reverse_strrchr($_folder, '/');
			}
			else
			{
				$user_folder = "$_folder/{$change_dir[0]}";
			}
		}
		else
		{
			if ($cookie_folder != $user_folder && UT_ADMIN)
			{
				$user_folder = $cookie_folder;
			}
		}
	}

	// Do not go further that the main folder
	$clear_upload_folder = str_replace(array('.', '/'), array('', ''), $uploadtoolkit['upload_folder']);
	if (!$pos = strpos($user_folder, $clear_upload_folder))
	{
		/**
		* Do not disturb with a warning, just fix it 
		* uploadtoolkit_trigger_error($user->lang['TOOLKIT_HACK_ATTEMPT']);
		**/
		$user_folder = $uploadtoolkit['upload_folder'];
	}
}
// Adjust destination path (no trailing slash)
$uploadtoolkit['user_folder'] = $user_folder = (substr($user_folder, -1, 1) == '/') ? substr($user_folder, 0, -1) : $user_folder;
// Save the value into a cookie for 30 minutes
$user->set_cookie('user_folder', $user_folder, time() + 18000); //36000
// Navigate - End

/**
* Check if the user have a maximun disk storage quota
**/
//$user->data['uploadtoolkit_user_quota'] = 1024; // force to 1GB
uploadtoolkit_optionset(2, 'uploadtoolkit_user_quota', 1024); // Admin/Founder forced to 1024MB = 1GB
if ($user_quota = check_user_quota())
{
	// (In MBytes)
	$uploadtoolkit['user_quota'] = return_bytes($user_quota);
	// (In KBytes)
//	$uploadtoolkit['user_quota'] = $user_quota;
}

/**
* Check if the user have a maximun file size quota
**/
// $user->data['uploadtoolkit_max_filesize'] = 1000;
// uploadtoolkit_optionset(2, 'uploadtoolkit_max_filesize', 1000);
if ($user_filesize = check_max_filesize())
{
	// (In MBytes)
	$uploadtoolkit['max_filesize'] = return_bytes($user_filesize);
	// (In KBytes)
//	$uploadtoolkit['max_filesize'] = $user_filesize;
}

/**
* Check if the user have access to this script
**/
// $user->data['uploadtoolkit_disabled'] = true;
// uploadtoolkit_optionset(2, 'uploadtoolkit_disabled', true);
if (check_user_access())
{
	global $user;
	$message = $user->lang['TOOLKIT_DISABLED'];
	$message = $message . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a> ');
	trigger_error($message);
}

// Output page
page_header($user->lang['INDEX']);

// Assign index specific vars
$template->assign_vars(array(
	'U_ACTION'				=> append_sid($uploadtoolkit['script']),
	'U_TOOLKIT_INDEX'		=> append_sid($uploadtoolkit['script']),
	'L_TOOLKIT_SASKE_LINK'	=> sprintf($user->lang['TOOLKIT_SASKE_LINK'], $uploadtoolkit['version']),
	'S_UPLOADTOOLKIT_ENABLE'				=> (isset($config['allow_uploadtoolkit'])) ? $config['allow_uploadtoolkit'] : false,
	'USER_NAME'				=> $user->data['username'],
	'USER_ID'				=> $user->data['user_id'],
	'USER_FOLDER'			=> $uploadtoolkit['user_folder'],
	'L_TOOLKIT_NOTES'		=> sprintf($user->lang['TOOLKIT_NOTES'], uploadtoolkit_availale_ext('list')),
));

$action = (isset($_POST['edit'])   && sizeof(request_var('edit',   array('' => 0)))) ? 'edit'   : '';
$action = (isset($_POST['create']) && sizeof(request_var('create', array('' => 0)))) ? 'create' : '';
$action = (isset($_POST['rename']) && sizeof(request_var('rename', array('' => 0)))) ? 'rename' : '';
$action = (isset($_POST['delete']) && sizeof(request_var('delete', array('' => 0)))) ? 'delete' : '';
$action = request_var('action', $action, true);
$cancel	= (isset($_POST['cancel']) && !isset($_POST['save'])) ? true : false;
// print_r("action=($action) cancel=($cancel)");
switch ($action)
{
	case 'upload' :
		uploadtoolkit_upload();
		break;

	case 'edit' :
		$return = uploadtoolkit_edit();
		$action = (!$return) ? '' : $action;
	//	break;

	case 'create' :
		if (!$cancel)
		{
			uploadtoolkit_create();
			break;
		}

	case 'rename' :
		if (!$cancel)
		{
			uploadtoolkit_rename();
			break;
		}

	case 'delete' :
		if (!$cancel)
		{
			uploadtoolkit_delete();
			break;
		}

	default:
		uploadtoolkit_front_page();
		break;
}

$template->set_filenames(array(
	'body' => 'uploadtoolkit_body.html')
);

page_footer();

/******************************************************************************************************************************************************************************************************
* Define Some Functions
******************************************************************************************************************************************************************************************************/

function uploadtoolkit_admin($mode = 'front_page', $vars = '')
{
	global $user;

	if ($user->data['user_type'] != USER_FOUNDER)
	{
		return;
	}

	global $uploadtoolkit, $template;

	// Assign index specific vars
	$template->assign_vars(array(
		'UT_ADMIN'		=> UT_ADMIN,
		'S_FOUNDER'		=> ($user->data['user_type'] == USER_FOUNDER) ? true : false,
		'U_ADM_LOGIN'	=> append_sid($uploadtoolkit['script'], array('action' => 'admlogin'), true, $user->session_id),
		'U_ADM_LOGOUT'	=> append_sid($uploadtoolkit['script'], array('action' => 'admlogout')),
	));
}

/** 
* @source : http://us2.php.net/manual/en/function.strrchr.php#64157
* @param string		$haystack	string to search in
* @param string		$needle		string to search for
* @param bool		$trail		 use $trail to include needle chars including and past last needle
* @return string	Return everything up to last instance of needle
**/
function reverse_strrchr($haystack, $needle, $trail = 0)
{
    return strrpos($haystack, $needle) ? substr($haystack, 0, strrpos($haystack, $needle) + $trail) : false;
}

/**
* Enter description here...
**/
function uploadtoolkit_front_page()
{
	global $uploadtoolkit, $user, $template, $phpbb_root_path;

	$user_folder 	= $uploadtoolkit['user_folder'];
	$upload_folder	= $uploadtoolkit['upload_folder'];
	$show_thumb		= request_var('thumbnails', 0, true);

	$message		= '';
	$acumulate		= 0;

	$dir_info		= uploadtoolkit_get_dir_info($user_folder);
	$user_quota 	= $dir_info['quota'];
	$user_files 	= $dir_info['content'];

	if (!file_exists($user_folder))
	{
		$message = $user->lang['TOOLKIT_NO_FILES'];
	}
	else
	{
		if (!sizeof($user_files))
		{
			$message = $user->lang['TOOLKIT_NO_FILES'];
		}
		else
		{
			$file_counter	= 0;
			foreach ($user_files as $file)
			{
				$is_dir		= false;
				$file_url	= "$user_folder/$file";
				$thumb_url	= '';
				$file_thumb = '';

				// Only founders can see folders
				if (is_dir($file_url))
				{
					// Do not go further that the main folder
					if ($file == '.' || $file_url == "$upload_folder..")
					{
						continue;
					}
					$is_dir	= true;
					$file_counter--;
				}
				else
				{
					$thumb_url	= "$user_folder/thumb_$file";
				}
				$file_counter++;

				if ($show_thumb)
				{
					if (file_exists($thumb_url))
					{
						$file_thumb = '<img src="' . $thumb_url .'" alt="' . $user->lang['IMAGE'] . '" title="' . $user->lang['IMAGE'] . '"/>';
					}
					else
					{
						if (in_array(uploadtoolkit_get_extension($file, false), $uploadtoolkit['thumb_extensions']))
						{
							$width = '';
							$height = '';
							// check image with timeout to ensure we don't wait quite long
							$timeout = 5;
							$old = ini_set('default_socket_timeout', $timeout);
							if ($dimension = @getimagesize($file_url))
							{
								if ($dimension !== false)
								{
									if ($dimension[0] > $uploadtoolkit['thumb_w_size'])
									{
										$width = ' width="' . $uploadtoolkit['thumb_w_size'] . '"';
									}

									if ($dimension[1] > $uploadtoolkit['thumb_h_size'])
									{
										$height = ' height="' . $uploadtoolkit['thumb_h_size'] . '"';
									}
								}
							}
							ini_set('default_socket_timeout', $old);

							$file_thumb = '<img src="' . $file_url . '"' . $width . $height . ' alt="' . $user->lang['IMAGE'] . '" title="' . $user->lang['IMAGE'] . '"/>';
						}
					}
				}

				$special_file = (in_array($file, $uploadtoolkit['hidden_files'])) ? true : false;

				// Regular files
				if (!$is_dir)
				{
					$template->assign_block_vars("ufiles", array(
						'FILE_ID'			=> $file_counter,
						'FILE_THUMB'		=> $file_thumb,
						'FILE_NAME'			=> $file,
						'FILE_HREF'			=> $file_url,
						'FILE_SIZE'			=> uploadtoolkit_filesize("$user_folder/$file"),
						'FILE_TIME'			=> $user->format_date(filemtime("$user_folder/$file")),
						'FILE_CLASS'		=> ($special_file) ? 'strong warning' : 'normal',
						'U_ACTION_EDIT'		=> ($special_file && UT_ADMIN) ? "?action=edit" : '',
						'U_ACTION_RENAME'	=> ($uploadtoolkit['user_rename'] || UT_ADMIN) ? "?action=rename" : '',
						'U_ACTION_DELETE'	=> ($uploadtoolkit['user_delete'] || UT_ADMIN) ? "?action=delete" : '',
					));
					$acumulate += filesize("$user_folder/$file");
				}
				// Folders ( Only founders can see folders )
				else
				{
					$template->assign_block_vars("ufolders", array(
						'FOLDER_NAME'		=> $file,
						'FOLDER_HREF'		=> ($file != '..') ? $file : $user->lang['TOOLKIT_FOLDER_UP'],
						'U_ACTION_RENAME'	=> ($file != '..') ? "?action=rename" : '',
						'U_ACTION_DELETE'	=> ($file != '..') ? "?action=delete" : '',
					));
				}

				// Whih files can Create ?
				if ($special_file)
				{
					$ext	  = uploadtoolkit_get_extension($file);
					$ext_len  = strlen($ext);
					$filename = ($ext) ? substr($file, 0, - ($ext_len + 1)) : $file;
					$template->assign_vars(array(
						'S_HAVE_' . strtoupper($filename)	=> true,
					));
				}

			}
		}
		unset($user_files);
	}

	display_agreement_rules();

	// Assign index specific vars
	$template->assign_vars(array(
		'S_FRONTPAGE'			=> true,

		'FILESIZE'				=> $uploadtoolkit['max_filesize'],
		'MAX_FILESIZE'			=> get_formatted_filesize($uploadtoolkit['max_filesize']),
		'S_THUMBNAILS'			=> $show_thumb,
		'U_ACTION_CREATE'		=> ($uploadtoolkit['user_create'] || UT_ADMIN) ? "?action=create" : '',
		'S_ACTIONS'				=> ($uploadtoolkit['user_rename'] || $uploadtoolkit['user_delete'] || UT_ADMIN),
		'S_THUMBNAIL_SIZE'		=> $uploadtoolkit['thumb_w_size'],

		'S_CAN_UPLOAD'			=> ($user_quota['size'] > $uploadtoolkit['user_quota']) ? false : true,
		'MESSAGE'				=> ($message != '') ? $message : false,

		'QUOTA_BG'				=> (((int) $user_quota['percent_float']) >= 90) ? 'ff0000' /*red*/ : ((((int) $user_quota['percent_float']) >= 70) ? 'F9FF5A' /*yellow*/ : '00ff00' /*green*/),
		'QUOTA_PERCENT'			=> (((int) $user_quota['percent_float']) > 100) ? 100 : $user_quota['percent_float'],
		'QUOTA_PERCENT_FLOAT'	=> ($user_quota['percent_float']) ? $user_quota['percent_float'] : 0 ,
		'QUOTA_INFO_PATH'		=> str_replace($phpbb_root_path, generate_board_url() . '/', $user_folder),
		'QUOTA_INFO_USER'		=> get_formatted_filesize($uploadtoolkit['user_quota']),
		'QUOTA_INFO_SIZE'		=> get_formatted_filesize($user_quota['size']),
		'QUOTA_INFO_FILES'		=> $user_quota['count'],
		'QUOTA_INFO_FOLDERS'	=> $user_quota['dircount'],
		// If is founder show size from all files and folders
		'QUOTA_INFO_ACUMULATE'	=> (UT_ADMIN) ? get_formatted_filesize($user_quota['size']) : sprintf($user->lang['TOOLKIT_QUOTA_NOTE'], get_formatted_filesize($acumulate), get_formatted_filesize($uploadtoolkit['user_quota'])),
	));

	uploadtoolkit_admin('front_page', $user_quota);
}

/**
* Enter description here...
**/
function display_agreement_rules()
{
	global $uploadtoolkit, $user, $template;

	$agreement = request_var('agreement', 0);

	if (isset($user->lang['TOOLKIT_AGREEMENT']))
	{
		$template->assign_vars(array(
			'S_DISPLAY_AGREEMENT'	=> true,
			'S_AGREEMENT'			=> $agreement,
			'L_TOOLKIT_AGREE_SEE'	=> sprintf($user->lang['TOOLKIT_AGREE_SEE'], '<a href="' . append_sid($uploadtoolkit['script'], array('agreement' => '1')) . '">', '</a>'),
		));
	}

	if ($agreement)
	{
		foreach ($user->lang['TOOLKIT_AGREE_FULL_RULES'] as $offset => $rule)
		{
			$template->assign_block_vars('rulesrow', array(
				'AGREE_RULE_TEXT'	=> $rule
			));
		}

		if (isset($user->lang['TOOLKIT_AGREE_ALSO']))
		{
			foreach ($user->lang['TOOLKIT_AGREE_ALSO_RULES'] as $offset => $rule)
			{
				if (strpos($rule, '{BOARD_URL}'))
				{
					$rule = str_replace('{BOARD_URL}', generate_board_url(), $rule);
				}

				$template->assign_block_vars('alsorulesrow', array(
					'AGREE_ALSO_TEXT'	=> $rule
				));
			}
		}
	}
}

/**
* Enter description here...
**/
function uploadtoolkit_upload()
{
	global $uploadtoolkit, $user, $template, $phpbb_root_path, $phpEx;

	// Check if the user have access
	if ($uploadtoolkit['disabled'] && UT_ADMIN == false)
	{
		$redirect= append_sid($uploadtoolkit['script']);
		$message = $user->lang['TOOLKIT_DISABLED'];
		uploadtoolkit_trigger_error($message, '', $redirect);
	}

	$max_filesize = $uploadtoolkit['max_filesize'];

	$extensions = uploadtoolkit_availale_ext('ext');

	// Checks for user folders
	$user_folder = $uploadtoolkit['user_folder'];

	$error		= array();
	$uploaded	= false;
	$file_link	= '';
	$file_tag	= '';

	if (file_exists($user_folder))
	{
		if (is_dir($user_folder) == true)
		{
			$correct_user_folder = true;
		}
		else
		{
			@unlink($user_folder);

			if (!@mkdir($user_folder, 0777))
			{
				// Send Mail
				if ($uploadtoolkit['notification_email'] != 'noemail' && $uploadtoolkit['notify_general'])
				{
					$subject = $user->lang['TOOLKIT_HALT'];
					$message = sprintf($user->lang['TOOLKIT_HALT_EMAIL'], $user->data['username'], $user_folder, $file_link, $uploadtoolkit['current_date']);
					uploadtoolkit_email($user->data['username'], $user->data['user_email'], $subject, $message);
				}

				// Log what we did
				if ($uploadtoolkit['user_logs'])
				{
					uploadtoolkit_log('TOOLKIT_HALT', $user_folder, $file_link, $uploadtoolkit['current_date']);
				}

				$redirect	= append_sid("{$phpbb_root_path}index.$phpEx");
				$message	= sprintf($user->lang['TOOLKIT_HALT_MSG'], $user_folder);
				uploadtoolkit_trigger_error($message, '', $redirect);
			}

			phpbb_chmod($user_folder, CHMOD_ALL);
			@touch("$user_folder/index.htm");
			$correct_user_folder = true;
		}
	}
	else
	{
		if (!@mkdir($user_folder, 0777))
		{
			// Send Mail
			if ($uploadtoolkit['notification_email'] != 'noemail' && $uploadtoolkit['notify_general'])
			{
				$subject = $user->lang['TOOLKIT_HALT'];
				$message = sprintf($user->lang['TOOLKIT_HALT_EMAIL'], $user->data['username'], $user_folder, $file_link, $uploadtoolkit['current_date']);
				uploadtoolkit_email($user->data['username'], $user->data['user_email'], $subject, $message);
			}

			// Log what we did
			if ($uploadtoolkit['user_logs'])
			{
				uploadtoolkit_log('TOOLKIT_HALT', $user_folder, $file_link, $uploadtoolkit['current_date']);
			}

			$redirect	= append_sid("{$phpbb_root_path}index.$phpEx");
			$message	= sprintf($user->lang['TOOLKIT_HALT_MSG'], $user_folder);
			uploadtoolkit_trigger_error($message, '', $redirect);
		}
		@touch("$user_folder/index.htm");
		phpbb_chmod($user_folder, CHMOD_ALL);
		$correct_user_folder = true;
	}

	//	Check if a file was specified
	if (isset($_FILES['fupload']))
	{
		$dir_info		= uploadtoolkit_get_dir_info($user_folder);
		$user_quota		= $dir_info['quota'];

		$tmp_filename	= $_FILES['fupload']['tmp_name'];
		$filename		= $_FILES['fupload']['name'];
		$tmp_filesize	= $_FILES['fupload']['size'];
	//	$tmp_filesize	= filesize($tmp_filename);

		if (trim($_FILES['fupload']['name'] == ''))
		{
			$error[] = $user->lang['TOOLKIT_NO_UPLOADFILE'];
		}

		// Begin checking safe filename to see if it is blank and convert it to 'file'
		if (uploadtoolkit_get_filename($filename, true) == '.' . uploadtoolkit_get_extension($filename, false))
		{
			$filename = 'file.'.uploadtoolkit_get_extension($filename, false);
		}

	//	if (filesize($filename) < 1 )
		// Check if empty file got uploaded (not catched by is_uploaded_file)
		if (isset($tmp_filesize) && $tmp_filesize == 0)
		{
			$error[] = $user->lang['TOOLKIT_NO_FILE_SIZE'];
		}
		else if (($tmp_filesize + $user_quota['size']) > $uploadtoolkit['user_quota'])
		{
			$error[] = $user->lang['TOOLKIT_QUOTA_FULL'];
		}
		else if (in_array(uploadtoolkit_get_extension($filename, true), $extensions) == false)
		{
			$error[] = $user->lang['TOOLKIT_BAD_EXT'];
		}
		else if ((filesize($tmp_filename) / 1024) > $max_filesize)
		{
			$error[] = sprintf($user->lang['TOOLKIT_LARGE_FILE'], $max_filesize);
		}
	}

	if (!sizeof($error))
	{
		// After directory tests, begin renaming and moving file
		//	Check if a file was specified
		if ($_FILES['fupload']['error'] == 0)
		{
			// Create Thumbnail - Start
			$user->add_lang('posting');

			global $phpbb_root_path, $phpEx, $config;

			include($phpbb_root_path . 'includes/functions_posting.' . $phpEx);
			include_once($phpbb_root_path . 'includes/functions_upload.' . $phpEx);

			$upload = new fileupload();

			// Set allowed extensions
			$upload->set_allowed_extensions($extensions);

			// check content
			$upload->set_disallowed_content(explode('|', $config['mime_triggers']));

			$filedata = array(
				'error'		=> array(),
				'thumbnail'	=> true,
			);

			$file = $upload->form_upload('fupload');

			$file->clean_filename('real');

			// Begin check on file that already exists
			$overwrite = $uploadtoolkit['overwrite'];
			if (!$overwrite)
			{
				$file->realname = uploadtoolkit_auto_rename($file, $file->realname);
				$file->clean_filename('real');
			}

			if (sizeof($file->error))
			{
				$error = $file->error;
				$filedata['thumbnail'] = false;
			}

			$file->move_file(str_replace($phpbb_root_path, '', $user_folder), $overwrite, true, CHMOD_ALL);

			if (sizeof($file->error))
			{
				$file->remove();
				$error = array_merge($error, $file->error);
				$error[] = $user->lang['TOOLKIT_UPLOAD_FAIL'];
			}

			if (!sizeof($file->error))
			{
				$filename = $file->realname;
				$file_link = str_replace($phpbb_root_path, generate_board_url() . '/', "$user_folder/$filename");

				// Try to find wich bbcode shoul we use for this file - Start
				$file_tag = $file_link;
				$groups = uploadtoolkit_availale_ext('groups');
				foreach ($groups as $tag => $ext)
				{
					if (in_array(uploadtoolkit_get_extension($file_link), $ext))
					{
						$file_tag = $tag . $file_link . str_replace('[', '[/', $tag);
					}
				}
				// Try to find wich bbcode shoul we use for this file - End

				// Create Thumbnail - Start
				if ($filedata['thumbnail'])
				{
					$config['img_min_thumb_filesize'] = $config['img_max_thumb_width'] = $uploadtoolkit['thumb_w_size'];
					if (!create_thumbnail("$user_folder/$filename", "$user_folder/thumb_$filename", $file->get('mimetype')))
					{
						$filedata['thumbnail'] = false;
					}
				}
				// Create Thumbnail - End

				$error[] = sprintf($user->lang['TOOLKIT_UPLOAD_SUCCESS'], $filename, uploadtoolkit_filesize("$user_folder/$filename"), '<a href="' . "$user_folder/$filename" . '" onclick="window.open(this.href);return false;">' . $file_link . '</a>');
				$uploaded = true;
				// Send Mail
				if ($uploadtoolkit['notification_email'] != 'noemail' && $uploadtoolkit['notify_upload'])
				{
					$subject = $user->lang['TOOLKIT_UPLOADED'];
					$message = sprintf($user->lang['TOOLKIT_UPLOADED_EMAIL'], $user->data['username'], $filename, $file_link, $uploadtoolkit['current_date']);
					uploadtoolkit_email($user->data['username'], $user->data['user_email'], $subject, $message);
				}

				// Log what we did
				if ($uploadtoolkit['user_logs'])
				{
					uploadtoolkit_log('TOOLKIT_UPLOADED', $filename, $file_link, $uploadtoolkit['current_date']);
				}
			}
		}
		// First fallback if incorrect error
		else if (isset($_FILES['fupload']['error']) && $_FILES['fupload']['error'] == 1)
		{
			$error[] = $user->lang['TOOLKIT_LARGE_PHPINI'];
		}
		else if (isset($_FILES['fupload']['error']) && $_FILES['fupload']['error'] != 0)
		{
			$error[] = sprintf($user->lang['TOOLKIT_UPLOAD_ERROR'], $_FILES['fupload']['error']);
		}
		// Unidentified upload error fallback
		else
		{
			$error[] = sprintf($user->lang['TOOLKIT_UPLOAD_ERROR'], @$_FILES['fupload']['error']);
		}
	}

	// Assign index specific vars
	$template->assign_vars(array(
		'S_UPLOAD'		=> true,
		'S_UPLOADED'	=> $uploaded,
		'ERROR_MSG'		=> implode('<br />', str_replace($phpbb_root_path, generate_board_url() . '/', $error)),
		'FILE_LINK'		=> $file_link,
		'FILE_TAG'		=> $file_tag,
	));

	return ;
}

/**
* Enter description here...
**/
function uploadtoolkit_edit($_file = '')
{
	global $uploadtoolkit, $user, $template, $phpbb_root_path, $phpEx, $safe_mode;

	// Check if the user have access
	if ($uploadtoolkit['disabled'] && UT_ADMIN == false)
	{
		$redirect= append_sid($uploadtoolkit['script']);
		$message = $user->lang['TOOLKIT_DISABLED'];
		uploadtoolkit_trigger_error($message, '', $redirect);
	}

	// Checks for user folders
	$user_folder	= $uploadtoolkit['user_folder'];

	$error			= array();
	$edit_file		= (isset($_POST['edit'])) ? array_keys(request_var('edit', array('' => 0))) : array(0 => $_file);
	$origfilename	= $edit_file[0];
	$filename		= utf8_normalize_nfc("$user_folder/$origfilename");
	$edited			= false;

	$edit_data		= utf8_normalize_nfc(request_var('edit_data', '', true));
	$edit_data		= htmlspecialchars_decode($edit_data);
	$text_rows		= max(5, min(999, request_var('text_rows', 20)));

	$save_changes	= (isset($_POST['save'])) ? true : false;

	if (isset($_POST['cancel']))
	{
		if ($special_file = (in_array($origfilename, $uploadtoolkit['hidden_files'])) ? true : false)
		{
			@unlink($filename);
			$save_changes = false;
		}
		return false;
	}

	// First check if the file already exist 
	if (!$filename || !file_exists($filename))
	{
		$error[] = $user->lang['TOOLKIT_NO_CREATE_FILE']; //."filename=($filename)";
	}
	else
	{
		if (!$edit_data && !$save_changes)
		{
			if (!($fp = @fopen($filename, 'r')))
			{
				$error[] = sprintf($user->lang['TOOLKIT_EDITED_ERROR'], $filename);
			}
			$edit_data = fread($fp, filesize($filename));
			fclose($fp);
			$text_rows = max(5, min(999, sizeof(explode("\n", $edit_data)) + 1));
		}

		if ($save_changes)
		{
			// Try to write the file
			if (file_exists($filename) && @is_writable($filename))
			{
				$fp = @fopen($filename, 'wb');
				if ($fp)
				{
					fwrite($fp, $edit_data);
					@fclose($fp);

					$edited	= true;

					// Send Mail
					if ($uploadtoolkit['notification_email'] != 'noemail' && $uploadtoolkit['notify_edit'])
					{
						$subject = $user->lang['TOOLKIT_EDITED'];
						$message = sprintf($user->lang['TOOLKIT_EDITED_EMAIL'], $user->data['username'], $filename, $uploadtoolkit['current_date']);
						uploadtoolkit_email($user->data['username'], $user->data['user_email'], $subject, $message);
					}

					// Log what we did
					if ($uploadtoolkit['user_logs'])
					{
						uploadtoolkit_log('TOOLKIT_EDITED', $filename, '', $uploadtoolkit['current_date']);
					}

					$error[] 	= sprintf($user->lang['TOOLKIT_EDITED_SUCCESS'], $filename);
					$redirect	= append_sid($uploadtoolkit['script']);
					meta_refresh(5, $redirect);
				}
				else
				{
					$error[] = sprintf($user->lang['TOOLKIT_EDITED_ERROR'], $filename);
				}
			}
			else
			{
				$error[] = sprintf($user->lang['TOOLKIT_EDITED_ERROR'], $filename);
			}
		}
	}

	// Assign index specific vars
	$template->assign_vars(array(
		'S_EDIT'			=> true,
		'S_EDITED'			=> $edited,
		'ERROR_MSG'			=> implode('<br />', str_replace($phpbb_root_path, generate_board_url() . '/', $error)),
		'FILE_LINK'			=> $origfilename,
		'U_FULL_ORIGINAL'	=> str_replace($phpbb_root_path, generate_board_url() . '/', "$user_folder/$origfilename"),
		'FILE_DATA'			=> utf8_htmlspecialchars($edit_data),
		'TEXT_ROWS'			=> $text_rows,
	));

	return true;
}

/**
* Enter description here...
**/
function uploadtoolkit_create()
{
	global $uploadtoolkit, $user, $template, $phpbb_root_path, $phpEx;

	// Check if the user have access
	if ($uploadtoolkit['disabled'] || (!$uploadtoolkit['user_create'] && UT_ADMIN == false))
	{
		$redirect= append_sid($uploadtoolkit['script']);
		$message = $user->lang['TOOLKIT_DISABLED'];
		uploadtoolkit_trigger_error($message, '', $redirect);
	}

	$error				= array();
	$file_type			= request_var('create', array(0 => ''));
	$file_type			= (!empty($file_type[0])) ? $file_type[0] : '';
	$newfoldername		= request_var('folder_name', '', true);
	// Checks for user folders
	$user_folder		= $uploadtoolkit['user_folder'];

	if ($file_type != 'folder' && !$newfoldername)
	{
		if ($file_type == '')
		{
			return false;
		}
		$fp = @fopen("$user_folder/$file_type.txt", 'wb');
		if ($fp)
		{
			@flock($fp, LOCK_EX);
			fwrite($fp, "1");
			@flock($fp, LOCK_UN);
			fclose($fp);
			phpbb_chmod("$user_folder/$file_type.txt", CHMOD_ALL);

			return uploadtoolkit_edit("$file_type.txt");
		}
		else
		{
			$error[] = sprintf($user->lang['TOOLKIT_FILE_ERROR'], "$user_folder/$file_type.txt");
		}
	}

	$newfoldername_url	= "$user_folder/$newfoldername";

	// Begin check for attempts to move outside the user folder
	if (strstr($newfoldername, '\\') || strstr($newfoldername, '/'))
	{
		// Send Mail
		if ($uploadtoolkit['notification_email'] != 'noemail' && $uploadtoolkit['notify_hack_attempts'])
		{
			$subject = $user->lang['TOOLKIT_HACK_ATTEMPT'];
			$message = sprintf($user->lang['TOOLKIT_HACK_ATTEMPT_EMAIL'], $user->data['username'], $newfoldername_url, '', $uploadtoolkit['current_date']);
			uploadtoolkit_email($user->data['username'], $user->data['user_email'], $subject, $message);
		}

		// Log what we did
		if ($uploadtoolkit['user_logs'])
		{
			uploadtoolkit_log('TOOLKIT_HACK_ATTEMPT', $newfoldername_url, '', $uploadtoolkit['current_date'], true);
		}

		// This will only be triggered if the user tried to trick the script.
		$redirect	= append_sid("{$phpbb_root_path}index.$phpEx");
		$message	= $user->lang['TOOLKIT_HACK_ATTEMPT_MSG'];
		uploadtoolkit_trigger_error($message, '', $redirect);
	}

	$created = false;
	if ($newfoldername != '')
	{
	//	$newfoldername = str_replace('/', '', $newfoldername);

	//	$dir_info	= uploadtoolkit_get_dir_info($user_folder);
	//	$user_quota = $dir_info['quota'];
	//	$user_files = $dir_info['content'];

		// First check if the file already exist 
		if (file_exists($newfoldername_url))
		{
			$error[] = $user->lang['TOOLKIT_USED_FOLDERNAME']."($newfoldername_url)";
		}

		// Bad characters
		$newfoldername = uploadtoolkit_get_filename($newfoldername, true);
		if ($newfoldername != strtolower($newfoldername))
		{
			$error[] = $user->lang['TOOLKIT_WRONG_NAME'];
		}

		if (!sizeof($error))
		{
			if (confirm_box(true))
			{
				if (!@file_exists($newfoldername_url) && @is_writable($user_folder))
				{
					if (!is_dir($newfoldername_url))
					{
						$result = @mkdir($newfoldername_url, 0777);
					}

					if ($result)
					{
						$created = true;
						phpbb_chmod($newfoldername_url, CHMOD_ALL);

						// Send Mail
						if ($uploadtoolkit['notification_email'] != 'noemail' && $uploadtoolkit['notify_rename'])
						{
							$subject = $user->lang['TOOLKIT_CREATED'];
							$message = sprintf($user->lang['TOOLKIT_CREATED_EMAIL'], $user->data['username'], $newfoldername_url, $uploadtoolkit['current_date']);
							uploadtoolkit_email($user->data['username'], $user->data['user_email'], $subject, $message);
						}

						// Log what we did
						if ($uploadtoolkit['user_logs'])
						{
							uploadtoolkit_log('TOOLKIT_RENAMED', $newfoldername_url, '', $uploadtoolkit['current_date']);
						}

						$error[] 	= sprintf($user->lang['TOOLKIT_CREATED_SUCCESS'], $newfoldername);
						$redirect	= append_sid($uploadtoolkit['script']);
						meta_refresh(5, $redirect);
					}
					else
					{
						$error[] = sprintf($user->lang['TOOLKIT_CREATED_ERROR'], $origfilename, $newfilename);
					}
				}
				else
				{
					$error[] = sprintf($user->lang['TOOLKIT_CREATED_ERROR'], $origfilename, $newfilename);
				}
			}
			else
			{
				$s_hidden_fields = array(
					'user_folder'	=> $user_folder,
					'folder_name'	=> $newfoldername,
					'action'		=> 'create'
				);

				// Assign index specific vars
				$template->assign_vars(array(
					'L_TOOLKIT_CONFIRM_EXPLAIN' => sprintf($user->lang['TOOLKIT_CREATE_EXPLAIN'], '<span class="strong">' . $newfoldername . '</span>'),
				));
				confirm_box(false, $user->lang['TOOLKIT_CREATE_CONFIRM'], build_hidden_fields($s_hidden_fields),'uploadtoolkit_body.html');
			}
		}
	}

	// Assign index specific vars
	$template->assign_vars(array(
		'S_CREATE'			=> true,
		'S_CREATED'			=> $created,
		'ERROR_MSG'			=> implode('<br />', str_replace($phpbb_root_path, generate_board_url() . '/', $error)),
		'U_ACTION'			=> append_sid($uploadtoolkit['script'], array('action' => 'create')),
	));

	return true;
}

/**
* Enter description here...
**/
function uploadtoolkit_rename()
{
	global $uploadtoolkit, $user, $template, $phpbb_root_path, $phpEx;

	// Check if the user have access
	if ($uploadtoolkit['disabled'] || (!$uploadtoolkit['user_rename'] && UT_ADMIN == false))
	{
		$redirect= append_sid($uploadtoolkit['script']);
		$message = $user->lang['TOOLKIT_DISABLED'];
		uploadtoolkit_trigger_error($message, '', $redirect);
	}

	$extensions = uploadtoolkit_availale_ext('ext');

	$error			= array();
	$rename_file	= (isset($_POST['rename'])) ? array_keys(request_var('rename', array('' => 0))) : array(0 => '');
	$origfilename	= $rename_file[0];
	$newfilename	= request_var('rename_filename', '', true);

	// Checks for user folders
	$user_folder	= $uploadtoolkit['user_folder'];

	// Begin check for attempts to move outside the user folder
	if (strstr($newfilename, '\\') || strstr($newfilename, '/') || strstr($origfilename, '\\') || strstr($origfilename, '/'))
	{
		$newfilename_url	= "$user_folder/$newfilename";
		$origfilename_url	= "$user_folder/$origfilename";

		// Send Mail
		if ($uploadtoolkit['notification_email'] != 'noemail' && $uploadtoolkit['notify_hack_attempts'])
		{
			$subject = $user->lang['TOOLKIT_HACK_ATTEMPT'];
			$message = sprintf($user->lang['TOOLKIT_HACK_ATTEMPT_EMAIL'], $user->data['username'], $origfilename_url, $newfilename_url, $uploadtoolkit['current_date']);
			uploadtoolkit_email($user->data['username'], $user->data['user_email'], $subject, $message);
		}

		// Log what we did
		if ($uploadtoolkit['user_logs'])
		{
			uploadtoolkit_log('TOOLKIT_HACK_ATTEMPT', $origfilename_url, $newfilename_url, $uploadtoolkit['current_date'], true);
		}

		// This will only be triggered if the user tried to trick the script.
		$redirect	= append_sid("{$phpbb_root_path}index.$phpEx");
		$message	= $user->lang['TOOLKIT_HACK_ATTEMPT_MSG'];
		uploadtoolkit_trigger_error($message, '', $redirect);
	}

	$renamed = false;
	if ($origfilename != '' && $newfilename != '')
	{
		$newfilename = str_replace('/', '', $newfilename);
		$newfilename = str_replace('\\', '', $newfilename);

		$dir_info	= uploadtoolkit_get_dir_info($user_folder);
	//	$user_quota = $dir_info['quota'];
		$user_files = $dir_info['content'];

		$newextension = uploadtoolkit_get_extension($newfilename, true);

		// First check if the file already exist 
		if (!file_exists("$user_folder/$origfilename"))
		{
			$error[] = $user->lang['TOOLKIT_NO_RENAMEFILE'];
		}

		// Name already in use
		if (file_exists("$user_folder/$newfilename"))
		{
			$error[] = $user->lang['TOOLKIT_USED_FILENAME'];
		}

		// If we are renaming a file, make sure it have an extension
		if (is_file("$user_folder/$origfilename") && $newextension == '' && $newfilename != '' )
		{
			$newfilename = $newfilename . '.' . uploadtoolkit_get_extension($origfilename, true);
		}

		// Same name as original file
		if ($newfilename == $origfilename)
		{
			$error[] = $user->lang['TOOLKIT_SAME_FILENAME'];
		}

		// Not authorized extension in files
		if (is_file("$user_folder/$origfilename") && !in_array($newextension, $extensions))
		{
			$error[] = $user->lang['TOOLKIT_WRONG_EXT'];
		}

		// Bad characters
		$newfilename = uploadtoolkit_get_filename($newfilename, true);
		if ($newfilename != strtolower($newfilename))
		{
			$error[] = $user->lang['TOOLKIT_WRONG_NAME'];
		}

		if (!sizeof($error))
		{
			if (confirm_box(true))
			{
				$origfilename_url	=  "$user_folder/$origfilename";
				$newfilename_url	=  "$user_folder/$newfilename";

				if (@file_exists($origfilename_url) && @is_writable($user_folder) && @is_writable($origfilename_url))
				{
					$result = @rename($origfilename_url, $newfilename_url);

					if ($result)
					{
						$renamed = true;
						phpbb_chmod($newfilename_url, CHMOD_ALL);

						// Send Mail
						if ($uploadtoolkit['notification_email'] != 'noemail' && $uploadtoolkit['notify_rename'])
						{
							$subject = $user->lang['TOOLKIT_RENAMED'];
							$message = sprintf($user->lang['TOOLKIT_RENAMED_EMAIL'], $user->data['username'], $origfilename_url, $newfilename_url, $uploadtoolkit['current_date']);
							uploadtoolkit_email($user->data['username'], $user->data['user_email'], $subject, $message);
						}

						// Log what we did
						if ($uploadtoolkit['user_logs'])
						{
							uploadtoolkit_log('TOOLKIT_RENAMED', $origfilename_url, $newfilename_url, $uploadtoolkit['current_date']);
						}

						$error[] 	= sprintf($user->lang['TOOLKIT_RENAME_SUCCESS'], $origfilename_url, $newfilename_url);
						$redirect	= append_sid($uploadtoolkit['script']);
						meta_refresh(5, $redirect);
					}
					else
					{
						$error[] = sprintf($user->lang['TOOLKIT_RENAME_ERROR'], $origfilename, $newfilename);
					}
				}
				else
				{
					$error[] = sprintf($user->lang['TOOLKIT_RENAME_ERROR'], $origfilename, $newfilename);
				}
			}
			else
			{
				$s_hidden_fields = array(
					'user_folder'			=> $user_folder,
					"rename[$origfilename]"	=> $origfilename,
					'rename_filename'		=> $newfilename,
					'action'				=> 'rename'
				);

				// Assign index specific vars
				$template->assign_vars(array(
					'L_TOOLKIT_CONFIRM_EXPLAIN' => sprintf($user->lang['TOOLKIT_RENAME_EXPLAIN'], '<span class="strong">' . $origfilename . '</span>', '<span class="strong">' . $newfilename . '</span>'),
				));
				confirm_box(false, $user->lang['TOOLKIT_RENAME_CONFIRM'], build_hidden_fields($s_hidden_fields),'uploadtoolkit_body.html');
			}
		}
	}

	// Assign index specific vars
	$template->assign_vars(array(
		'S_RENAME'			=> true,
		'S_RENAMED'			=> $renamed,

		'ERROR_MSG'			=> implode('<br />', str_replace($phpbb_root_path, generate_board_url() . '/', $error)),
		'U_RENAME'			=> $newfilename,
		'U_ORIGINAL'		=> $origfilename,
		'U_FULL_ORIGINAL'	=> str_replace($phpbb_root_path, generate_board_url() . '/', "$user_folder/$origfilename"),
		'U_ACTION'			=> append_sid($uploadtoolkit['script'], array('action' => 'rename')), //'filename' => $origfilename)),
	));

	return true;
}

/**
* Enter description here...
**/
function uploadtoolkit_delete()
{
	global $uploadtoolkit, $user, $template, $phpbb_root_path;

	// Check if the user have access
	if ($uploadtoolkit['disabled'] || (!$uploadtoolkit['user_delete'] && UT_ADMIN == false))
	{
		$redirect= append_sid($uploadtoolkit['script']);
		$message = $user->lang['TOOLKIT_DISABLED'];
		uploadtoolkit_trigger_error($message, '', $redirect);
	}

	$error			= array();
	$delete_file	= (isset($_POST['delete'])) ? array_keys(request_var('delete', array('' => 0))) : array(0 => '');
	$origfilename	= $delete_file[0];

	// Checks for user folders
	$user_folder 	= $uploadtoolkit['user_folder'];
	$filename		= "$user_folder/$origfilename";

	$u_action		= append_sid($uploadtoolkit['script']);

	$deleted = false;
	// First check if the file already exist 
	if (!$filename || !file_exists($filename))
	{
		$error[] = $user->lang['TOOLKIT_NO_CREATE_FILE'];
	}
	else
	{
		if (confirm_box(true))
		{
			if (@file_exists($filename) && @is_writable($user_folder) && @is_writable($filename))
			{
				if (is_file($filename))
				{
					$result = @unlink($filename);
				}
				else if (is_dir($filename))
				{
					$result = uploadtoolkit_remove($filename);
				}

				if ($result)
				{
					$deleted = true;

					// Send Mail
					if ($uploadtoolkit['notification_email'] != 'noemail' && $uploadtoolkit['notify_delete'])
					{
						$subject = $user->lang['TOOLKIT_DELETED'];
						$message = sprintf($user->lang['TOOLKIT_DELETED_EMAIL'], $user->data['username'], $filename, $uploadtoolkit['current_date']);
						uploadtoolkit_email($user->data['username'], $user->data['user_email'], $subject, $message);
					}

					// Log what we did
					if ($uploadtoolkit['user_logs'])
					{
						uploadtoolkit_log('TOOLKIT_DELETED', $filename, '', $uploadtoolkit['current_date']);
					}

					$error[]	= sprintf($user->lang['TOOLKIT_DELETE_SUCCESS'], $origfilename);
					$redirect	= append_sid($uploadtoolkit['script']);
					meta_refresh(5, $redirect);
				}
				else
				{
					$error[] = $user->lang['TOOLKIT_DELETE_ERROR'];
				}
			}
			else
			{
				$error[] = $user->lang['TOOLKIT_DELETE_ERROR'];
			}
		}
		else
		{
			$s_hidden_fields = array(
				'user_folder'			=> $user_folder,
				"delete[$origfilename]"	=> $origfilename,
				'action'				=> 'delete'
			);
			// Assign index specific vars
			$template->assign_vars(array(
				'L_TOOLKIT_CONFIRM_EXPLAIN' => sprintf($user->lang['TOOLKIT_DELETE_EXPLAIN'], '<span class="strong">' . str_replace($phpbb_root_path, generate_board_url() . '/', "$user_folder/$origfilename") . '</span>'),
			));

			confirm_box(false, $user->lang['TOOLKIT_DELETE_CONFIRM'], build_hidden_fields($s_hidden_fields),'uploadtoolkit_body.html');
		}
	}

	// Assign index specific vars
	$template->assign_vars(array(
		'S_DELETE'		=> true,
		'S_DELETED'		=> $deleted,
		'ERROR_MSG'		=> implode('<br />', str_replace($phpbb_root_path, generate_board_url() . '/', $error)),
		'U_ACTION'		=> $u_action,
	));

	return true;
}

/**
* Delete a file, or a folder and its contents (stack algorithm)
*
* @author      Aidan Lister <aidan@php.net>
* @version     1.0.0
* @link        http://aidanlister.com/repos/v/function.rmdirr.php
* @param       string   $dirname    Directory to delete
* @return      bool     Returns TRUE on success, FALSE on failure
**/
function uploadtoolkit_remove($dirname)
{
	// Sanity check
	if (!file_exists($dirname))
	{
		return false;
	}

	// Simple delete for a file
	if (is_file($dirname) || is_link($dirname))
	{
		return @unlink($dirname);
	}

	// Create and iterate stack
	$stack = array($dirname);
	while ($entry = array_pop($stack))
	{
		// Watch for symlinks
		if (is_link($entry))
		{
			@unlink($entry);
			continue;
		}

		// Attempt to remove the directory
		if (@rmdir($entry))
		{
			continue;
		}

		// Otherwise add it to the stack
		$stack[] = $entry;
		$dh = @opendir($entry);

		if ($dh)
		{
			while (($child = readdir($dh)) !==  false)
			{
				// Ignore pointers
				if ($child === '.' || $child === '..')
				{
					continue;
				}
				// Unlink files and add directories to stack
				$child = $entry . DIRECTORY_SEPARATOR . $child;
				if (is_dir($child) && !is_link($child))
				{
					$stack[] = $child;
				}
				else
				{
					@unlink($child);
				}
			}
			closedir($dh);
		}
	//	print_r($stack);
	}

    return true;
}

/**
 * Retrieve information about a folder
 *
 * @param string	$path	 path to analize
 * @return array	with quota and files in the given path
 */
function uploadtoolkit_get_dir_info($path)
{
	global $uploadtoolkit, $user, $phpEx;

	$totalsize	= 0;
	$totalcount	= 0;
	$dircount	= 0;
	$contents	= array();
	$special	= array();

	$extensions = uploadtoolkit_availale_ext('ext');

	if ($handle = @opendir($path))
	{
		while (false !== ($file = readdir($handle)))
		{
			$nextpath = $path . '/' . $file;
			if ($file != '.' && $file != '..' && !is_link($nextpath))
			{
				if (is_dir($nextpath))
				{
					$dircount++;
					$dirresult	= uploadtoolkit_get_dir_info($nextpath);
					$totalsize	+= $dirresult['quota']['size'];
					$totalcount += $dirresult['quota']['count'];
					$dircount	+= $dirresult['quota']['dircount'];

					// Only founders can navigate (see folders)
					if ($file != '.' && UT_ADMIN)
					{
						$special[] = basename($file);
					}
				}
				else if (is_file($nextpath))
				{
					// Always Skip "special" files
					if (strpos($file, "thumb_") !== false || $file == "file.$phpEx"|| $file == "index.htm")
					{
					//	print_r("Skipping 1=($file)<br />");
						continue;
					}

					// Only founders can see unautorized file extensions
					if (!in_array(uploadtoolkit_get_extension($nextpath, true), $extensions) && !UT_ADMIN)
					{
					//	print_r("Skipping 2=($file)<br />");
						continue;
					}

					// Only founders can see hidden files
					if (!in_array($file, $uploadtoolkit['hidden_files']))
					{
						// quota
						$totalsize += filesize($nextpath);
						$totalcount++;
						// content
						$contents[] = basename($file);
					}
					else
					{
						if (UT_ADMIN)
						{
							$special[] = basename($file);
						}
					//	print_r("Skipping 3=($file)<br />");
					}
				}
			}
			else
			{
				// Only founders can navigate (see Up folder)
				if ($file == '..' && UT_ADMIN)
				{
					$special[] = basename($file);
				}
			}
		}
		closedir ($handle);
	}

	sort($special);
	sort($contents);

	return array(
		'quota' 	=> array(
			'count'			=> $totalcount,
			'dircount'		=> $dircount,
			'size'			=> $totalsize,
			'percent_float'	=> round(($totalsize / (int) $uploadtoolkit['user_quota'])*100, 2),
		),
		// Special files goes first
		'content'	=>	array_merge($special, $contents),
	);
}

/**
* Separate tags from extensions
*
* @param string $mode	list/ext/groups
* @return unknown
**/
function uploadtoolkit_availale_ext($mode = 'list')
{
	global $uploadtoolkit;

	$availale	= $uploadtoolkit['extensions'];
	$extensions	= array();
	$groups		= array();
	foreach ($availale as $tags => $group)
	{
		$groups[$tags] = $group;
		sort($group);
		foreach ($group as $ext)
		{
			$extensions[] = $ext;
		}
	}

	switch ($mode)
	{
		case 'list' :
			$extension_list = implode(", ", $extensions);
			return $extension_list;
			break;
		case 'ext' :
			return $extensions;
			break;
		case 'groups' :
			return $groups;
			break;
	}
}

function uploadtoolkit_filesize($file)
{
	$size = filesize($file);
	return get_formatted_filesize($size);
}

function uploadtoolkit_get_extension($filename, $lowercase = false)
{
	$ext = end(explode('.', $filename));

	if ($ext == $filename)
	{
		$ext = '';
	}

	return ($lowercase) ? strtolower($ext) : $ext;
}

function uploadtoolkit_get_filename($filename, $safe = false)
{
	$ext = uploadtoolkit_get_extension($filename);
	$ext_len = strlen($ext);

	$filename = ($ext) ? substr($filename, 0, - ($ext_len + 1)) : $filename;

	if ($safe)
	{
		$ext = strtolower($ext);
		$safe_filename = strtolower($filename);
		$safe_filename = str_replace(" ", "_", $safe_filename);
	//	$safe_filename = preg_replace('/[^a-z0-9()\-_]/', '', $safe_filename);
		$safe_filename = preg_replace('/[^a-z0-9().\-_]/', '', $safe_filename);

		if (strlen($safe_filename) > 50)
		{
			$safe_filename = substr($safe_filename, 0, 50);
		}

		$filename = $safe_filename . (($ext) ? ".$ext" : '');
	}

	return $filename;
}

function uploadtoolkit_auto_rename($file, $filename)
{
	global $uploadtoolkit, $user;

	$origfilename = $filename;
	$ext = uploadtoolkit_get_extension($filename);
	$ext = strtolower($ext);

	$filename = uploadtoolkit_get_filename($filename, true);
	$tmpname1 = uploadtoolkit_get_filename($filename);

	if ($tmpname1 == '')
	{
		$tmpname1 = 'file';
	}
	else
	{
		$tmpname1 = $tmpname1;
	}

	$user_folder 	= $uploadtoolkit['user_folder'];
	$dir_info		= uploadtoolkit_get_dir_info($user_folder);
//	$user_quota		= $dir_info['quota'];
	$user_files		= $dir_info['content'];

	$file_sfx = 0;
	$counter = 0;

	if (sizeof($user_files))
	{
		if (in_array("$tmpname1.$ext", $user_files))
		{
			$holdfilename = "$tmpname1.$ext";

			while (in_array($holdfilename, $user_files))
			{
				if ($counter > 200) { break; }
				$counter++;
				$file_sfx++;

				$holdfilename = $tmpname1;
				$holdfilename .= "($file_sfx)";
				$holdfilename .= ".$ext";

				$file->realname = $holdfilename;
				$file->clean_filename('real');
				$holdfilename = $file->realname;
			}

			$filename = $tmpname1;
			$filename .= "($file_sfx)";

			$file->realname = $filename;
			$file->clean_filename('real');
			$filename = $file->realname;
		}
		else
		{
			$filename = $tmpname1;
		}

		$tmpname2 = $filename;
		$filename = $tmpname2;
		$filename .= ".$ext";

		$ext = uploadtoolkit_get_extension($filename);
		$shortname = uploadtoolkit_get_filename($filename);

		$filename = $shortname;
		$filename .= ".$ext";
	}
	else
	{
		$filename = $filename;
	}

	return $filename;
}

/**
* Check User Specific Quota in KB
**/
function check_user_quota()
{
	global $user, $uploadtoolkit;

	$quota			= 0;
	// Checks for user folders
	$user_folder	= $uploadtoolkit['upload_folder'] . $user->data['user_id'];

	if (isset($user->data['uploadtoolkit_user_quota']) && $user->data['uploadtoolkit_user_quota'] > 0)
	{
		$quota = $user->data['uploadtoolkit_user_quota'];
	}
	else if (file_exists("$user_folder/quota.txt"))
	{
		if (!$file = @file("$user_folder/quota.txt"))
		{
			trigger_error($user->lang['TOOLKIT_QUOTA_EMPTY']);
		}

		if (!isset($file[0]) || ($file[0] > 0 == false || $file[0] < 99999999 == false))
		{
			trigger_error($user->lang['TOOLKIT_QUOTA_ERROR']);
		}

		$quota = $file[0];
	}

	return (int) $quota;
}

/**
* Check User Specific Max Filesize
**/
function check_max_filesize()
{
	global $user, $uploadtoolkit;

	$filesize = 0;
	// Checks for user folders
	$user_folder = $uploadtoolkit['upload_folder'] . $user->data['user_id'];

	if (isset($user->data['uploadtoolkit_max_filesize']) && $user->data['uploadtoolkit_max_filesize'] > 0)
	{
		$filesize = $user->data['uploadtoolkit_max_filesize'];
	}
	else if (file_exists("$user_folder/maxsize.txt"))
	{
		if (!$file = @file("$user_folder/maxsize.txt"))
		{
			trigger_error($user->lang['TOOLKIT_FILESIZE_EMPTY']);
		}

		if (!isset($file[0]) || ($file[0] > 0 == false || $file[0] < 9999999999999 == false))
		{
			trigger_error($user->lang['TOOLKIT_FILESIZE_ERROR']);
		}

		$filesize = $file[0];
	}

	return (int) $filesize;
}

/**
* Check User Specific disable option
**/
function check_user_access()
{
	global $user, $db, $uploadtoolkit;

	$disabled = $uploadtoolkit['disabled'];
	// Checks for user folders
	$user_folder = $uploadtoolkit['upload_folder'] . $user->data['user_id'];

	// Reject anonymous users and bots
	if ($user->data['user_id'] == ANONYMOUS || $user->data['is_bot'])
	{
		global $phpbb_root_path, $phpEx;

		meta_refresh(10, append_sid("{$phpbb_root_path}index.$phpEx"));

		$user->session_kill();
		$user->session_begin();
		$message = $user->lang['TOOLKIT_LOGIN_EXPLAIN'];
		$message = $message . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a> ');
		trigger_error($message);
	}

	// Reject banned User
	$sql = 'SELECT ban_userid
		FROM ' . BANLIST_TABLE . '
		WHERE ban_userid = ' . (int) $user->data['user_id'] . '
			AND ban_exclude <> 1';
	$result = $db->sql_query($sql);
	$user->data['uploadtoolkit_disabled'] = $db->sql_fetchfield('ban_userid');
	$db->sql_freeresult($result);

	if (isset($user->data['uploadtoolkit_disabled']) && $user->data['uploadtoolkit_disabled'] > 0)
	{
		$disabled = true;
	}
	else if (file_exists("$user_folder/disabled.txt"))
	{
		$file = @file("$user_folder/disabled.txt");
		if (!$file || !isset($file[0]))
		{
			trigger_error($user->lang['TOOLKIT_DISABLED_ERROR']);
		}

		$disabled = $file[0];
		$disabled = ((int) $disabled == 1) ? true : false;
	}

	return $disabled;
}

/**
* Optionset replacement for this module based on $user->data
**/
function uploadtoolkit_optionset($user_id, $key, $value)
{
	global $user, $db;

	if ($user->data['user_id'] == $user_id)
	{
		$user->data[$key] = $value;
	}

	return;
}

function uploadtoolkit_log($lang, $origfilename_url = '', $newfilename_url = '', $current_date, $ip = false)
{
	global $user, $uploadtoolkit, $phpbb_root_path;

	if (!$uploadtoolkit['user_logs'])
	{
		return;
	}

	// Checks for user folders
	$log_file = $uploadtoolkit['upload_folder'] . $user->data['user_id'] . "/log.txt";
	$the_file = '';

	if (!file_exists($log_file))
	{
		@touch($log_file);
		phpbb_chmod($log_file, CHMOD_ALL);
	}
	else
	{
		$the_file = trim(file_get_contents($log_file)) . "\r\n";
	}

	$new_line = $user->lang[$lang] .(($ip) ? ' (' . (string) $user->ip . ')' : '') . ' :: ' . $current_date . ' : ' . $origfilename_url . (($newfilename_url) ? ' => ' . $newfilename_url : '');
	$new_line = str_replace($phpbb_root_path, generate_board_url() . '/', $new_line);

	if ($file = @fopen($log_file, 'w+'))
	{
		@flock($file, LOCK_EX);
		@fwrite($file, $the_file . $new_line);
		@flock($file, LOCK_UN);
		@fclose($file);
	}

	return;
}

function uploadtoolkit_email($name, $email, $subject, $message, $cc = '')
{
	global $user, $config, $phpbb_root_path, $phpEx;

	// Set here an emailadress where the contactform will send mails to. If it's empty the board emailadress will be used.
	$board_mail	= '';

	include_once($phpbb_root_path . 'includes/functions_messenger.' . $phpEx);
	$messenger	= new messenger(false);

	$email_tpl	= 'uploadtoolkit_email';
	$email_lang = $config['default_lang'];

	$board_mail	= ($board_mail) ? $board_mail : $config['board_email'];
	$name		= utf8_normalize_nfc($name);
	$email		= $email;
	$subject	= utf8_normalize_nfc($subject);
	$message	= utf8_normalize_nfc($message);
	$message	= str_replace('<br />', "\r\n", $message);
	$message	= str_replace($phpbb_root_path, generate_board_url() . '/', $message);
	$cc			= (isset($cc)) ? true : false;

	$messenger->headers('X-AntiAbuse: Board servername - ' . $config['server_name']);
	$messenger->headers('X-AntiAbuse: User_id - ' . $user->data['user_id']);
	$messenger->headers('X-AntiAbuse: Username - ' . $name);
	$messenger->headers('X-AntiAbuse: User IP - ' . $user->ip);

	$messenger->template($email_tpl, $email_lang);
	$messenger->to($board_mail, $config['sitename']);
	if ($cc)
	{
		$messenger->cc($email, $name);
	}
	$messenger->subject(htmlspecialchars_decode($subject));

	$messenger->assign_vars(array(
		'MESSAGE'	=> htmlspecialchars_decode($message),
	));

	$contact_return = $messenger->send(NOTIFY_EMAIL);
	unset($messenger);

	return $contact_return;
}

/**
* Display size 
**/
function return_bytes($val)
{
	$val = trim($val);
//	$last = strtolower($val[strlen($val)-1]);
	$last = strtolower(substr($val,strlen($val/1),1));
	if ($last == '')
	{
		$last = 'm';
	}

	switch($last)
	{
		// The 'G' modifier is available since PHP 5.1.0
		case 'g':
			$val *= 1024;
		case 'm':
			$val *= 1024;
		case 'k':
			$val *= 1024;
	}

    return $val;
}

/**
* Display messages
**/
function uploadtoolkit_trigger_error($msg_text, $msg_title = '', $redirect = '')
{
	global $template, $user, $uploadtoolkit;

	$msg_text  = (!empty($user->lang[$msg_text])) ? $user->lang[$msg_text] : $msg_text;
	$msg_text .= ($redirect) ? '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . $redirect . '">', '</a> ') : '';

	$msg_title = (!$msg_title) ? $user->lang['INFORMATION'] : ((!empty($user->lang[$msg_title])) ? $user->lang[$msg_title] : $msg_title);

	page_header($msg_title);

	// Checks for user folders
	$user_folder = $uploadtoolkit['user_folder'];

	$template->assign_vars(array(
		'S_ERROR_HANDLER'	=> true,
		'MESSAGE_TITLE'		=> $msg_title,
		'MESSAGE_TEXT'		=> $msg_text,
		'USER_FOLDER'		=> $user_folder,
	));

	$template->set_filenames(array(
		'body' => 'uploadtoolkit_body.html')
	);

	page_footer();

	garbage_collection();

	exit_handler();
}

?>