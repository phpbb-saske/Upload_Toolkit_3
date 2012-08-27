<?php
/**
* @package: phpBB 3.0.8 :: Upload Toolkit 3 -> root/language/en/mods :: [en][English]
* @version: $Id: uploadtoolkit.php, v 0.1.4 2011/05/08 09:18:09Z Saske Exp $
* @copyright: leviatan21 < salva_bxt@hotmail.com > (Salva) http://www.espartapsp.zobyhost.com/index.php
* @license: http://opensource.org/licenses/gpl-license.php GNU Public License 
* @author: Saske1 - http://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=1310862
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
	'TOOLKIT_SASKE_LINK'		=> '<strong>Upload Toolkit 3 %1$s</strong> by <a href="http://www.phpbbsaske.eshost.es/foro/index.php" onclick="window.open(this.href);return false;" >Saske</a>',

// Front page common strings
	'TOOLKIT_DISABLED'			=> 'Your access to this toolkit has been disabled.<br />Please contact the board administrator for details.',
	'TOOLKIT_DISABLED_ERROR'	=> 'The access file is corrupt or is using an incorrect syntax. Please recreate the file for this user',
	'TOOLKIT_INDEX'				=> 'File Manager Index',

	'TOOLKIT_LOGIN_EXPLAIN'		=> 'The board requires you to be registered and logged in, to use <strong>Upload Toolkit</strong>.',
	'CLICK_RETURN_FOLDER'		=> '%1$sReturn to previous folder%2$s',
	'TOOLKIT_WELCOME'			=> 'Welcome',

// Agreement block
	'TOOLKIT_AGREEMENT'			=> 'User Agreement',
	'TOOLKIT_AGREE_FULL'		=> '<span class="strong">By using this <em>Upload Toolkit</em> you agree not to upload the following:</span>',
	// First rules
	'TOOLKIT_AGREE_SEE'			=> 'By using this <em>Upload Toolkit</em> you are agreeing to %1$s these %2$s terms.',
	'TOOLKIT_AGREE_FULL_RULES'	=> array(
		'AGREE_RULE1'			=> 'Files that infringe on the copyrights of any entity. This includes, but is not limited to, copyrighted photographs, as well as files for which user lacks usage and distribution permissions.',
		'AGREE_RULE2'			=> 'Files whose intended use or purpose is to harass individual or multiple persons.',
		'AGREE_RULE3'			=> 'Files whose intended use or purpose is the promotion of products or services through advertisements or commercial profit.<br />This includes, but is not limited to, email spam and banner advertisements.',
		'AGREE_RULE4'			=> 'Files that are illegal and/or are in violation of any United State or other country laws.',
		'AGREE_RULE5'			=> 'Files that are of pornographic nature.',
	),
	// Second rules
	'TOOLKIT_AGREE_ALSO'		=> '<span class="strong">You also agree:</span>',
	'TOOLKIT_AGREE_ALSO_RULES'	=> array(
		'AGREE_RULE1'			=> 'Not to hotlink/directlink files outside of the <span class="strong">"{BOARD_URL}"</span> domain without prior consent from the admin.',
		'AGREE_RULE2'			=> 'This is bandwidth theft and you account may be banned and your ISP informed!',
	),

// User files block
	'TOOLKIT_FOLDER_UP'			=> 'Up Folder',
	'TOOLKIT_MEW_UPLOAD'		=> 'Upload New File',
	'TOOLKIT_MY_FILES'			=> 'Uploaded Files',
	'TOOLKIT_NUMBER'			=> 'Nº',
	'TOOLKIT_THUMB'				=> 'Thumbnail',
	'TOOLKIT_FILE'				=> 'File',
	'TOOLKIT_FOLDER_NAME'		=> 'Folder Name',
	'TOOLKIT_FILE_NAME'			=> 'File Name',
	'TOOLKIT_SIZE'				=> 'File Size',
	'TOOLKIT_TIME'				=> 'File date',
	'TOOLKIT_ACTIONS'			=> 'Actions',
	'TOOLKIT_ACTIONS_RENAME'	=> 'Rename',
	'TOOLKIT_ACTIONS_DELETE'	=> 'Delete',
	'TOOLKIT_ACTIONS_EDIT'		=> 'Edit',
	'TOOLKIT_THUMB_SHOW'		=> 'Show Thumbnails',
	'TOOLKIT_THUMB_HIDE'		=> 'Hide Thumbnails',

	//
	'TOOLKIT_MAX_FILESIZE'		=> 'Max filesize is',
	'TOOLKIT_FILESIZE_EMPTY'	=> 'Could not obtain maxsize information from the current user’s maxsize file. The file exists but it cannot be read or it is empty.',
	'TOOLKIT_FILESIZE_ERROR'	=> 'The maxsize file is corrupt or is using an incorrect syntax. Please recreate the file for this user',
	'TOOLKIT_NOTE'				=> 'Note',
	'TOOLKIT_NOTES'				=> '<ul>
										<li>File names can only contain letters a-z, numbers, underscores, dashes, dots and parenthesis.</li>
										<li>If you are on a dial-up modem, or are uploading a large file, please be patient as it may take a few minutes to upload.</li>
										<li>You may only upload files with the following extensions : <br />%1$s</li>
									</ul>',

	//
	'TOOLKIT_DISK_QUOTA'		=> 'User Quota',
	'TOOLKIT_QUOTA_EMPTY'		=> 'Could not obtain quota information from the current user’s quota file. The file exists but it cannot be read or it is empty.',
	'TOOLKIT_QUOTA_ERROR'		=> 'The quota file is corrupt or is using an incorrect syntax. Please recreate the file for this user',
	'TOOLKIT_QUOTA_NOTE'		=> 'Used : %1$s of : %2$s',
	'TOOLKIT_QUOTA_INFO_DETAIL'	=> 'Details for the path',
	'TOOLKIT_QUOTA_INFO_FILES'	=> 'Total Files',
	'TOOLKIT_QUOTA_INFO_FOLDERS'=> 'Total Folders',
	'TOOLKIT_QUOTA_INFO_SIZE'	=> 'Total Size',
	'TOOLKIT_NO_FILES'			=> 'No files have been uploaded yet.',
	'TOOLKIT_NO_FILENAME'		=> 'You must specify a filename.',
	
	'TOOLKIT_HALT'				=> 'Upload Toolkit - General Halt!',
	'TOOLKIT_HALT_EMAIL'		=> 'User : %1$s <br />
									Is unable to create user folder as a file already exists with the same name.
									<br />Please check the CHMOD and/or file permissions.
									<br /> %2$s <br /> %3$s <br />At: %4$s',
	'TOOLKIT_HALT_MSG'			=> 	'<strong>General Halt:</strong> Unable to create user folder as a file already exists with the same name.
									<br />Please contact the forum admin and request that he delete the file named <strong>%1$s </strong> in the upload script folder.
									<br />A furthur has occured as the script was unable delete file mentioned.
									<br />Please check the CHMOD and/or file permissions.
									<br />I do not recommend using this script until the issue has been resolved',

	
// Edit, Create, Upload, Rename and Delete
	'TOOLKIT_STATUS'			=> 'Status',
	'TOOLKIT_DETAILS'			=> 'Details',
	'TOOLKIT_TRY_AGAIN'			=> 'Please, try again',

	// Edit
	'TOOLKIT_EDIT'				=> 'Edit file',
	'TOOLKIT_EDIT_FILE'			=> 'File',
	'TOOLKIT_BUTTON_SAVE'		=> 'Save now',
	'TOOLKIT_NO_EDITED'			=> 'Folder not saved.',
	'TOOLKIT_EDIT_NOTE'			=> '<ul>
									<li>quota.txt & maxsize.txt : values expressed in MBytes</li>
									<li>disabled.txt : 0 enaled, 1 disabled</li>
									</ul>',
	'TOOLKIT_EDITED_ERROR'		=> 'The file : <strong> %1$s </strong> is unable to be saved.
									<br />Please notify the admin of this error and check the CHMOD and/or file permissions.',
	'TOOLKIT_EDITED'			=> 'Upload Toolkit - File Edited',
	'TOOLKIT_EDITED_EMAIL'		=> 'User : %1$s <br />
									Has edited the file : <br /> %2$s <br />At: %3$s',
	'TOOLKIT_EDITED_SUCCESS'	=> 'File Edited.<br />
									The file : <strong> %1$s </strong> was edited successfully.',
	// Create
	'TOOLKIT_CREATE'			=> 'Add Folder',
	'TOOLKIT_CREATE_FOLDER'		=> 'Add New Folder',
	'TOOLKIT_CREATE_QUOTA'		=> 'Add quota file',
	'TOOLKIT_CREATE_MAXFILE'	=> 'Add filesize file',
	'TOOLKIT_CREATE_DISABLE'	=> 'Add disable file',

	'TOOLKIT_BUTTON_CREATE'		=> 'Add Now',
	'TOOLKIT_CREATE_NEWNAME'	=> 'New folder name',
	'TOOLKIT_CREATE_CONFIRM'	=> 'Create a New folder ?',
	'TOOLKIT_CREATE_EXPLAIN'	=> 'Are you sure you want to Create : <br />%1$s',
	'TOOLKIT_NO_CREATED'		=> 'Create Error.',
	'TOOLKIT_NO_CREATE_FILE'	=> 'The filename you specified is not valid for save.',
	'TOOLKIT_USED_FOLDERNAME'	=> 'The foldername you specified is already in use. Choose a different name.',
	'TOOLKIT_CREATED'			=> 'Upload Toolkit - Folder created',
	'TOOLKIT_CREATED_EMAIL'		=> 'User : %1$s <br />
									Has created the folder : <br /> %2$s <br />At: %4$s',
	'TOOLKIT_FILE_ERROR'		=> 'The file : <strong> %1$s </strong> is unable to be created.
									<br />Please notify the admin of this error and check the CHMOD and/or file permissions.',
	'TOOLKIT_CREATED_ERROR'		=> 'The folder : <strong> %1$s </strong> is unable to be created.
									<br />Please notify the admin of this error and check the CHMOD and/or file permissions.',
	'TOOLKIT_CREATED_SUCCESS'	=> 'Folder Created.<br />
									The Folder : <strong> %1$s </strong> was created successfully.',

	// Upload
	'TOOLKIT_POSTIT'			=> 'Post It',
	'TOOLKIT_UPLOAD'			=> 'Upload File',
	'TOOLKIT_NO_ROOM'			=> 'Disk Quota Exceeded.
									<br />You have no space available to continue uploading files.
									<br />Please contact the admin with this error and request increase the User/Disk Quota.',
	'TOOLKIT_BUTTON_UPLOAD'		=> 'Upload Now',
	'TOOLKIT_NO_UPLOADED'		=> 'File Upload Error',
	'TOOLKIT_NO_UPLOADFILE'		=> 'You did not specify a file to upload.
									<br />Please go back and click the browse button to select a file before hitting upload.',
	'TOOLKIT_NO_FILE_SIZE'		=> 'The file you uploaded is 0 bytes in size.
									<br />Please go back and select a file that contains data.',
	'TOOLKIT_BAD_EXT'			=> 'The file you uploaded does not contain a valid extension.
									<br />Please either change the extension to one that is valid or upload a different file.',
	'TOOLKIT_QUOTA_FULL'		=> 'The file you are trying to upload exceeds the allocated disk quota.
									<br />Please either upload a smaller file or delete some of your existing files.',
	'TOOLKIT_UPLOAD_FAIL'		=> 'File was not moved to the user folder.
									<br />Please contact the admin to check the CHMOD and/or file permissions.',
	'TOOLKIT_LARGE_FILE'		=> 'File too large.
									<br />File was not uploaded because it is larger then the allowed limit of %1$s
									<br />Please either compress your file to a smaller size or upload a different file.',
	'TOOLKIT_LARGE_PHPINI'		=> 'File was not uploaded because it is larger then the <em>upload_max_filesize</em> setting in the <em>php.ini</em> file.
									<br />Please contact the admin with this error and request that he/she either increase the setting in php.ini, or decreases the <strong>"max_filesize"</strong> for this script.',
	'TOOLKIT_UPLOAD_ERROR'		=> 'Error Number : %1$s 
									<br />File was not uploaded. Please contact the admin with this error if it persists after a second attempt.',
	'TOOLKIT_UPLOAD_SUCCESS'	=> 'Upload Complete.
									<br />File Name is : %1$s 
									<br />File Size is : %2$s
									<br />Your file was uploaded to : %3$s',
	'TOOLKIT_UPLOADED_LINK'		=> 'Simply copy and paste the path below into a post ',
	'TOOLKIT_UPLOADED'			=> 'Upload Toolkit - File Uploaded',
	'TOOLKIT_UPLOADED_EMAIL'	=> 'User : %1$s <br />
									Has uploaded the file :<br />%2$s<br />To :<br />%3$s<br />At: %4$s',
	// Rename
	'TOOLKIT_RENAME'			=> 'Rename File',
	'TOOLKIT_BUTTON_RENAME'		=> 'Rename Now',
	'TOOLKIT_RENAME_NEWNAME'	=> 'New file name',
	'TOOLKIT_RENAME_CONFIRM'	=> 'Are you sure you want to Rename this file ?',
	'TOOLKIT_RENAME_EXPLAIN'	=> 'Are you sure you want to Rename : <br />%1$s <br />to : <br />%2$s',
	'TOOLKIT_NO_RENAMED'		=> 'File not renamed.',
	'TOOLKIT_NO_RENAMEFILE'		=> 'You must specify a valid filename for rename.',
	'TOOLKIT_SAME_FILENAME'		=> 'You must specify a different filename.',
	'TOOLKIT_USED_FILENAME'		=> 'The filename you specified is already in use. Choose a different name.',
	'TOOLKIT_WRONG_EXT'			=> 'You cannot rename a file to use an extension that is not allowed.',
	'TOOLKIT_WRONG_NAME'		=> 'You cannot use disapproved characters in the filename.',
	'TOOLKIT_HACK_ATTEMPT'		=> 'Upload Toolkit - Hack Attempt Detected!',
	'TOOLKIT_HACK_ATTEMPT_EMAIL'=> 'User : %1$s <br />
									Has potentially attempted to exploit the Upload ToolKit.<br />
									Details: A forward or backward slash was givin by the user as the file path which could potentially allow external directory access.<br />
									The toolkit recognized the character(s) and the attempt has been blocked.<br /> %2$s <br /> %3$s <br />At: %4$s',
	'TOOLKIT_HACK_ATTEMPT_MSG'	=> 'Attempt at filepath modification detected!<br />
									The script’s execution has been halted and a log of your attempt has been reported to the admin,<br />
									along with your user information, IP address and timestamp.',
	'TOOLKIT_RENAME_ERROR'		=> 'The file : <strong> %1$s </strong> is unable to be renamed to : %2$s.
									<br />Please notify the admin of this error and check the CHMOD and/or file permissions.',
	'TOOLKIT_RENAME_SUCCESS'	=> 'File Renamed.
									<br />File Original file named : %1$s 
									<br />was successfully renamed to : %2$s',
	'TOOLKIT_RENAMED'			=> 'Upload Toolkit - File Renamed',
	'TOOLKIT_RENAMED_EMAIL'		=> 'User : %1$s <br />
									Has renamed the file : <br /> %2$s <br /> To : <br /> %3$s <br />At: %4$s',
	// Delete
	'TOOLKIT_DELETE'			=> 'Delete file',
	'TOOLKIT_BUTTON_DELETE'		=> 'Delete Now',
	'TOOLKIT_DELETE_CONFIRM'	=> 'Are you sure you want to Delete this file ?',
	'TOOLKIT_DELETE_EXPLAIN'	=> 'Are you sure you want to Delete : <br />%1$s',
	'TOOLKIT_NO_DELETED'		=> 'The file was not deleted.',
	'TOOLKIT_NO_DELETE_NAME'	=> 'You must specify a filename for delete.',
	'TOOLKIT_NO_DELETE_FILE'	=> 'The filename you specified is not valid file for delete.',
	'TOOLKIT_DELETE_ERROR'		=> 'The file : <strong> %1$s </strong> is unable to be deleted.
									<br />Please notify the admin of this error and check the CHMOD and/or file permissions.',
	'TOOLKIT_DELETE_SUCCESS'	=> 'File Deleted.<br />
									The file : <strong> %1$s </strong> was deleted successfully.',
	'TOOLKIT_DELETED'			=> 'Upload Toolkit - File Deleted',
	'TOOLKIT_DELETED_EMAIL'		=> 'User : %1$s <br />
									Has deleted the file : <br /> %2$s <br />At: %3$s',
));

?>