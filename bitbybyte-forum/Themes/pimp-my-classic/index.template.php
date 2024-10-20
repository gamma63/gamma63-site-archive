<?php
// Version: 2.0 RC1; index

/*	This template is, perhaps, the most important template in the theme. It
	contains the main template layer that displays the header and footer of
	the forum, namely with main_above and main_below. It also contains the
	menu sub template, which appropriately displays the menu; the init sub
	template, which is there to set the theme up; (init can be missing.) and
	the linktree sub template, which sorts out the link tree.

	The init sub template should load any data and set any hardcoded options.

	The main_above sub template is what is shown above the main content, and
	should contain anything that should be shown up there.

	The main_below sub template, conversely, is shown after the main content.
	It should probably contain the copyright statement and some other things.

	The linktree sub template should display the link tree, using the data
	in the $context['linktree'] variable.

	The menu sub template should display all the relevant buttons the user
	wants and or needs.

	For more information on the templating system, please see the site at:
	http://www.simplemachines.org/
*/

// Initialize the template... mainly little settings.
function template_init()
{
	global $context, $settings, $options, $txt;

	/* Use images from default theme when using templates from the default theme?
		if this is 'always', images from the default theme will be used.
		if this is 'defaults', images from the default theme will only be used with default templates.
		if this is 'never' or isn't set at all, images from the default theme will not be used. */
	$settings['use_default_images'] = 'never';

	/* What document type definition is being used? (for font size and other issues.)
		'xhtml' for an XHTML 1.0 document type definition.
		'html' for an HTML 4.01 document type definition. */
	$settings['doctype'] = 'xhtml';

	/* The version this template/theme is for.
		This should probably be the version of SMF it was created for. */
	$settings['theme_version'] = '2.0 RC1';

	/* Set a setting that tells the theme that it can render the tabs. */
	$settings['use_tabs'] = false;

	/* Use plain buttons - as oppossed to text buttons? */
	$settings['use_buttons'] = false;

	/* Show sticky and lock status separate from topic icons? */
	$settings['separate_sticky_lock'] = false;

	/* Does this theme use the strict doctype? */
	$settings['strict_doctype'] = false;

	/* Does this theme use post previews on the message index? */
	$settings['message_index_preview'] = false;
	
	/* Set the following variable to true if this theme requires the optional theme strings file to be loaded. */
	$settings['require_theme_strings'] = true;
}

// The main sub template above the content.
function template_html_above()
{
	global $context, $settings, $options, $scripturl, $txt, $modSettings;

	// Show right to left and the character set for ease of translating.
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"', $context['right_to_left'] ? ' dir="rtl"' : '', '><head>
	<meta http-equiv="Content-Type" content="text/html; charset=', $context['character_set'], '" />
	<meta name="description" content="', $context['page_title_html_safe'], '" />
	<meta name="keywords" content="', $context['meta_keywords'], '" />
	<script language="JavaScript" type="text/javascript" src="', $settings['default_theme_url'], '/scripts/script.js?rc1"></script>
	<script language="JavaScript" type="text/javascript" src="', $settings['theme_url'], '/scripts/theme.js?b4"></script>
	<script language="JavaScript" type="text/javascript"><!-- // --><![CDATA[
		var smf_theme_url = "', $settings['theme_url'], '";
		var smf_default_theme_url = "', $settings['default_theme_url'], '";
		var smf_images_url = "', $settings['images_url'], '";
		var smf_scripturl = "', $scripturl, '";
		var smf_iso_case_folding = ', $context['server']['iso_case_folding'] ? 'true' : 'false', ';
		var smf_charset = "', $context['character_set'], '";', $context['show_pm_popup'] ? '
		if (confirm("' . $txt['show_personal_messages'] . '"))
			window.open(smf_prepareScriptUrl(smf_scripturl) + "action=pm");' : '', '
		var ajax_notification_text = "', $txt['ajax_in_progress'], '";
		var ajax_notification_cancel_text = "', $txt['modify_cancel'], '";
	// ]]></script>
	<title>', $context['page_title_html_safe'], '</title>
	<link rel="stylesheet" type="text/css" href="', $settings['theme_url'], '/style.css?rc1" />
	<link rel="stylesheet" type="text/css" href="', $settings['default_theme_url'], '/css/print.css?rc1" media="print" />';

	// Please don't index these Mr Robot.
	if (!empty($context['robot_no_index']))
		echo '
	<meta name="robots" content="noindex" />';

	/* Internet Explorer 4/5 and Opera 6 just don't do font sizes properly. (they are big...)
		Thus, in Internet Explorer 4, 5, and Opera 6 this will show fonts one size smaller than usual.
		Note that this is affected by whether IE 6 is in standards compliance mode.. if not, it will also be big.
		Standards compliance mode happens when you use xhtml... */
	if ($context['browser']['needs_size_fix'])
		echo '
	<link rel="stylesheet" type="text/css" href="', $settings['default_theme_url'], '/css/fonts-compat.css" />';

	// Show all the relative links, such as help, search, contents, and the like.
	echo '
	<link rel="help" href="', $scripturl, '?action=help" />
	<link rel="search" href="' . $scripturl . '?action=search" />
	<link rel="contents" href="', $scripturl, '" />';

	// If RSS feeds are enabled, advertise the presence of one.
	if (!empty($modSettings['xmlnews_enable']))
		echo '
	<link rel="alternate" type="application/rss+xml" title="', $context['forum_name_html_safe'], ' - RSS" href="', $scripturl, '?type=rss;action=.xml" />';

	// If we're viewing a topic, these should be the previous and next topics, respectively.
	if (!empty($context['current_topic']))
		echo '
	<link rel="prev" href="', $scripturl, '?topic=', $context['current_topic'], '.0;prev_next=prev" />
	<link rel="next" href="', $scripturl, '?topic=', $context['current_topic'], '.0;prev_next=next" />';

	// If we're in a board, or a topic for that matter, the index will be the board's index.
	if (!empty($context['current_board']))
		echo '
	<link rel="index" href="' . $scripturl . '?board=' . $context['current_board'] . '.0" />';

	// Output any remaining HTML headers. (from mods, maybe?)
	echo $context['html_headers'], '
</head>
<body>';
}

function template_body_above()
{
	global $context, $settings, $options, $scripturl, $txt, $modSettings;

	// The logo, user information, news, and menu.
	echo '<p align="center">';
	template_menu();
	echo '
    <div style="text-align: left; margin-top: -110px;">
        <a href="/soft/ermakovexe.zip"><img src="', $settings['theme_url'], '/images/ermakovexe.gif" alt="ERMAKOV EXE" width="128" height="128" /></a>
    </div>';
	echo '
	</p>
	<table cellspacing="0" cellpadding="0" border="0" align="center" width="95%" class="tborder">
		<tr style="background-color: #202020;">
			<td valign="middle" align="left"><img src="', !empty($settings['header_logo_url']) ? $settings['header_logo_url'] : $settings['images_url'] . '/smflogo.gif', '" alt="" width="128" height="128" /></td>
			<td valign="middle" colspan="2">';

	// If the user is logged in, display stuff like their name, new messages, etc.
	if ($context['user']['is_logged'])
	{
		echo '
				', $txt['hello_member'], ' <b>', $context['user']['name'], '</b>', $context['allow_pm'] ? ', ' . $txt['msg_alert_you_have'] . ' <a href="' . $scripturl . '?action=pm">' . $context['user']['messages'] . ' ' . ($context['user']['messages'] != 1 ? $txt['msg_alert_messages'] : $txt['message_lowercase']) . '</a>' . $txt['newmessages4'] . ' ' . $context['user']['unread_messages'] . ' ' . ($context['user']['unread_messages'] == 1 ? $txt['newmessages0'] : $txt['newmessages1']) : '', '.';

		// Are there any members waiting for approval?
		if (!empty($context['unapproved_members']))
			echo '<br />
				', $context['unapproved_members'] == 1 ? $txt['approve_thereis'] : $txt['approve_thereare'], ' <a href="', $scripturl, '?action=admin;area=viewmembers;sa=browse;type=approve">', $context['unapproved_members'] == 1 ? $txt['approve_member'] : $context['unapproved_members'] . ' ' . $txt['approve_members'], '</a> ', $txt['approve_members_waiting'];

		// Is the forum in maintenance mode?
		if ($context['in_maintenance'] && $context['user']['is_admin'])
			echo '<br />
				<b>', $txt['maintain_mode_on'], '</b>';

		if (!empty($context['open_mod_reports']) && $context['show_open_reports'])
			echo '<br />
				<a href="', $scripturl, '?action=moderate;area=reports">', sprintf($txt['mod_reports_waiting'], $context['open_mod_reports']), '</a>';
	}
	// Otherwise they're a guest - so politely ask them to register or login.
	else
		echo '
				', sprintf($txt['welcome_guest'], $txt['guest_title']);

	echo '
				<br />', $context['current_time'], '
			</td>
		</tr>
		<tr class="windowbg2">
			<td colspan="2" valign="middle" align="left" class="tborder" style="border-width: 1px 0 0 0; font-size: small; padding-left: 1ex;">';
	// forum activity rating - delete the following code if you do not want it... but why? It's awesome :)
global $db_prefix, $smcFunc;
$yesterday = time() - 86399;
$request = $smcFunc['db_query']('', '
                              SELECT COUNT(*)
                              FROM {db_prefix}messages
                              WHERE poster_time > {int:yesterday}',
            array(
                             'yesterday' => $yesterday,
                      )
);
list ($count) = $smcFunc['db_fetch_row']($request);


if ($count == 0)
   echo " <b>",$txt['activity_rating'], ":</b> <img src='", $settings["theme_url"], "/images/warning_mute.gif' alt='No Posts'/>";
elseif ($count < 10)
   echo " <b>", $txt['activity_rating'], ":</b> <img src='", $settings["theme_url"], "/images/star.gif' alt='One Star'/>";
elseif ($count < 25)
   echo " <b>", $txt['activity_rating'], ":</b> <img src='", $settings["theme_url"], "/images/star2.gif' alt='Two Star'/>";
elseif ($count < 50)
   echo " <b>", $txt['activity_rating'], ":</b> <img src='", $settings["theme_url"], "/images/star3' alt='Three Star'/>";
elseif ($count < 100)
   echo " <b>", $txt['activity_rating'], ":</b> <img src='", $settings["theme_url"], "/images/star4.gif' alt='Four Star'/>";
else
   echo " <b>", $txt['activity_rating'], ":</b> <img src='", $settings["theme_url"], "/images/star5.gif' alt='Five Star'/>";

echo "&nbsp;<b>", $txt['activity_posts'], ":</b> $count/24hrs"; 

$smcFunc['db_free_result']($request); // Did I use this right and put it in the right spot?!
	// forum activity rating - It ends here	

	// read unread posts 
	echo ' </td><td class="tborder" style="border-width: 1px 0 0 0; padding-right: 1ex;">
	<a href="', $scripturl, '?action=unread">', $txt['show_unread_posts'],'</a>&nbsp;|
	<a href="', $scripturl, '?action=unreadreplies">', $txt['unread_replies'],'</a>&nbsp;|
	<a href="', $scripturl, '?action=profile;area=showposts">', $txt['own_posts'],'</a>&nbsp;|
	<a href="', $scripturl, '?action=recent">', $txt['recent_posts'],'</a>';

echo '		</td>
		</tr>';

	// Show a random news item? (or you could pick one from news_lines...)
	if (!empty($settings['enable_news']))
		echo '
		<tr class="windowbg">
			<td colspan="3" height="24" class="tborder" style="border-width: 1px 0 0 0; padding-left: 1ex;">
				<b>', $txt['news'], ':</b> ', $context['random_news_line'], '
			</td>
		</tr>';

	echo '
	</table>

	<br />
	<table cellspacing="0" cellpadding="10" border="0" align="center" width="95%" class="tborder">
		<tr><td valign="top" style="background-color: #000000;">';
}

function template_body_below()
{
	global $context, $settings, $options, $scripturl, $txt;

	echo '
		</td></tr>
	</table>';

	// Show a vB style login for quick login?
	if ($context['show_quick_login'])
	{
		echo '
	<table cellspacing="0" cellpadding="0" border="0" align="center" width="95%">
		<tr><td nowrap="nowrap" align="right">
			<script language="JavaScript" type="text/javascript" src="', $settings['default_theme_url'], '/scripts/sha1.js"></script>

			<form action="', $scripturl, '?action=login2" method="post" accept-charset="', $context['character_set'], '"', empty($context['disable_login_hashing']) ? ' onsubmit="hashLoginPassword(this, \'' . $context['session_id'] . '\');"' : '', '><br />
				<input type="text" name="user" size="7" />
				<input type="password" name="passwrd" size="7" />
				<select name="cookielength">
					<option value="60">', $txt['one_hour'], '</option>
					<option value="1440">', $txt['one_day'], '</option>
					<option value="10080">', $txt['one_week'], '</option>
					<option value="43200">', $txt['one_month'], '</option>
					<option value="-1" selected="selected">', $txt['forever'], '</option>
				</select>
				<input type="submit" value="', $txt['login'], '" /><br />
				', $txt['quick_login_dec'], '
				<input type="hidden" name="hash_passwrd" value="" />
			</form>
		</td></tr>
	</table>';
	}

	// Don't show a login box, just a break.
	else
		echo '
	<br />';

	// Show the "Powered by" and "Valid" logos, as well as the copyright.  Remember, the copyright must be somewhere!
	echo '
	<br />

	<table cellspacing="0" cellpadding="3" border="0" align="center" width="95%" class="tborder">
		<tr style="background-color: #202020;">
			<td width="28%" valign="middle" align="left" style="padding-left:10px;"> 
	', $txt['NoRemove_ThemeCopyright'] ,'
			</td>
			<td width="44%" valign="middle" align="center">
				', theme_copyright(), '
			</td>
			<td width="28%" valign="middle" align="right" style="padding-right:10px;">
				<a href="http://validator.w3.org/check/referer" target="_blank" class="new_win"><span>XHTML</span></a> |
				<a id="button_wap2" href="', $scripturl , '?wap2" class="new_win"><span>WAP2</span></a>
			</td>
		</tr>
	</table>';

	// Show the load time?
	if ($context['show_load_time'])
		echo '
	<div align="center" class="smalltext">
		', $txt['page_created'], $context['load_time'], $txt['seconds_with'], $context['load_queries'], $txt['queries'], '
	</div>';
}

function template_html_below()
{
	global $context, $settings, $options, $scripturl, $txt, $modSettings;

	// The following will be used to let the user know that some AJAX process is running
	echo '
	<div id="ajax_in_progress" style="display: none;', $context['browser']['is_ie'] && !$context['browser']['is_ie7'] ? 'position: absolute;' : '', '">', $txt['ajax_in_progress'], '</div>';

	// And then we're done!
	echo '
</body>
</html>';
}

// Show a linktree.  This is that thing that shows "My Community | General Category | General Discussion"..
function theme_linktree()
{
	global $context, $settings, $options;

	// Folder style or inline?  Inline has a smaller font.
	echo '<span class="nav"', $settings['linktree_inline'] ? ' style="font-size: smaller;"' : '', '>';

	// Each tree item has a URL and name.  Some may have extra_before and extra_after.
	foreach ($context['linktree'] as $link_num => $tree)
	{
		// Show the | | |-[] Folders.
		if (!$settings['linktree_inline'])
		{
			if ($link_num > 0)
				echo str_repeat('<img src="' . $settings['images_url'] . '/icons/linktree_main.gif" alt="| " border="0" />', $link_num - 1), '<img src="' . $settings['images_url'] . '/icons/linktree_side.gif" alt="|-" border="0" />';
			echo '<img src="' . $settings['images_url'] . '/icons/folder_open.gif" alt="+" border="0" />&nbsp; ';
		}

		// Show something before the link?
		if (isset($tree['extra_before']))
			echo $tree['extra_before'];

		// Show the link, including a URL if it should have one.
		echo '<b>', $settings['linktree_link'] && isset($tree['url']) ? '<a href="' . $tree['url'] . '" class="nav">' . $tree['name'] . '</a>' : $tree['name'], '</b>';

		// Show something after the link...?
		if (isset($tree['extra_after']))
			echo $tree['extra_after'];

		// Don't show a separator for the last one.
		if ($link_num != count($context['linktree']) - 1)
			echo $settings['linktree_inline'] ? ' &nbsp;|&nbsp; ' : '<br />';
	}

	echo '</span>';
}

// Show the menu up top.  Something like [home] [help] [profile] [logout]...
function template_menu()
{
	global $context, $settings, $options, $scripturl, $txt;

	// We aren't showing all the buttons in this theme.
	$hide_buttons = array('pm', 'mlist');
	
	echo '<div class="menu-container">';

	foreach ($context['menu_buttons'] as $act => $button)
		if (in_array($act, $hide_buttons))
			continue;
		else
			echo '
					<a href="', $button['href'], '">', $settings['use_image_buttons'] ? '<img src="' . $settings['theme_url'] . '/images/english/' . $act . '.gif" alt="' . $button['title'] . '" border="0" />' : $button['title'], '</a>', !empty($button['is_last']) ? '' : $context['menu_separator'];
		
	echo '</div>';
}

// Generate a strip of buttons, out of buttons.
function template_button_strip($button_strip, $direction = 'top', $custom_td = '')
{
	global $settings, $context, $txt, $scripturl;

	// Create the buttons...
	$buttons = array();
	foreach ($button_strip as $key => $value)
		if (!isset($value['test']) || !empty($context[$value['test']]))
			$buttons[] = '<a href="' . $value['url'] . '"' . (isset($value['active']) ? ' class="active"' : '') . (isset($value['custom']) ? ' ' . $value['custom'] : '') . '>' . ($settings['use_image_buttons'] ? '<img src="' . $settings['images_url'] . '/' . ($value['lang'] ? $context['user']['language'] . '/' : '') . $value['image'] . '" alt="' . $txt[$value['text']] . '" border="0" />' : $txt[$value['text']]) . '</a>';

	if (empty($button_strip))
		return '';

	echo '
		<div ', $custom_td, '>', implode($context['menu_separator'], $buttons) , '</div>';
}

?>