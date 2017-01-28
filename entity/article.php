<?php
/**
*
* Knowledge Base extension for the phpBB Forum Software package.
*
* @copyright (c) 2017 kinerity <https://www.project-w.org>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace kinerity\knowledgebase\entity;

/**
* Entity for a single article
*/
class article implements article_interface
{
	/**
	* Data for this entity
	*
	* @var array
	*/
	protected $data;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/**
	* The database table the categories are stored in
	*
	* @var string
	*/
	protected $kb_articles_table;

	/**
	* Constructor
	*
	* @param \phpbb\db\driver\driver_interface    $db                  Database object
	* @param string                               $kb_articles_table   Name of the table used to store article data
	* @access public
	*/
	public function __construct(\phpbb\db\driver\driver_interface $db, $kb_articles_table)
	{
		$this->db = $db;
		$this->kb_articles_table = $kb_articles_table;
	}

	/**
	* Load the data from the database for this article
	*
	* @param int $id Article identifier
	* @param string $sql_where SQL where clause
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	* @throws \kinerity\knowledgebase\exception\out_of_bounds
	*/
	public function load($id, $sql_where = '')
	{
		$sql = 'SELECT *
			FROM ' . $this->kb_articles_table . '
			WHERE article_id = ' . (int) $id . "
				$sql_where";
		$result = $this->db->sql_query($sql);
		$this->data = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		if ($this->data === false)
		{
			// A article does not exist
			throw new \kinerity\knowledgebase\exception\out_of_bounds('article_id');
		}

		return $this;
	}

	/**
	* Insert the article for the first time
	*
	* Will throw an exception if the article was already inserted (call save() instead)
	*
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	* @throws \kinerity\knowledgebase\exception\out_of_bounds
	*/
	public function insert()
	{
		if (!empty($this->data['article_id']))
		{
			// The article already exists
			throw new \kinerity\knowledgebase\exception\out_of_bounds('article_id');
		}

		// Make extra sure there is no article_id set
		unset($this->data['article_id']);

		// Insert the article data to the database
		$sql = 'INSERT INTO ' . $this->kb_articles_table . ' ' . $this->db->sql_build_array('INSERT', $this->data);
		$this->db->sql_query($sql);

		// Set the article_id using the id created by the SQL insert
		$this->data['article_id'] = (int) $this->db->sql_nextid();

		return $this;
	}

	/**
	* Save the current settings to the database
	*
	* This must be called before closing or any changes will not be saved!
	* If adding a article (saving for the first time), you must call insert() or an exception will be thrown
	*
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	* @throws \kinerity\knowledgebase\exception\out_of_bounds
	*/
	public function save()
	{
		if (empty($this->data['article_id']))
		{
			// The article does not exist
			throw new \kinerity\knowledgebase\exception\out_of_bounds('article_id');
		}

		// Copy the data array, filtering out the article_id identifier
		// so we do not attempt to update the row's identity column.
		$sql_array = array_diff_key($this->data, array('article_id' => null));

		// Update the page data in the database
		$sql = 'UPDATE ' . $this->kb_articles_table . '
			SET ' . $this->db->sql_build_array('UPDATE', $sql_array) . '
			WHERE article_id = ' . $this->get_id();
		$this->db->sql_query($sql);

		return $this;
	}

	/**
	* Get id
	*
	* @return int Article identifier
	* @access public
	*/
	public function get_id()
	{
		return isset($this->data['article_id']) ? (int) $this->data['article_id'] : 0;
	}

	/**
	* Get author
	*
	* @return string Author
	* @access public
	*/
	public function get_author()
	{
		return (string) get_username_string('full', $this->data['article_poster_id'], $this->data['article_poster_name'], $this->data['article_poster_colour']);
	}

	/**
	* Get time
	*
	* @return int Time identifier
	* @access public
	*/
	public function get_time()
	{
		return isset($this->data['article_time']) ? (int) $this->data['article_time'] : 0;
	}

	/**
	* Get edit time
	*
	* @return int Edit time identifier
	* @access public
	*/
	public function get_edit_time()
	{
		return isset($this->data['article_edit_time']) ? (int) $this->data['article_edit_time'] : 0;
	}

	/**
	* Get views
	*
	* @return int View identifier
	* @access public
	*/
	public function get_views()
	{
		return isset($this->data['article_views']) ? (int) $this->data['article_views'] : 0;
	}

	/**
	* Get visibility
	*
	* @return int Visibility identifier
	* @access public
	*/
	public function get_visibility()
	{
		return isset($this->data['article_visibility']) ? (int) $this->data['article_visibility'] : 0;
	}

	/**
	* Get title
	*
	* @return string Title
	* @access public
	*/
	public function get_title()
	{
		return isset($this->data['article_title']) ? (string) $this->data['article_title'] : '';
	}

	/**
	* Set title
	*
	* @param string $title
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	* @throws \kinerity\knowledgebase\exception\unexpected_value
	*/
	public function set_title($title)
	{
		// Enforce a string
		$title = (string) $title;

		// We limit the title length to 200 characters
		if (truncate_string($title, 200) != $title)
		{
			throw new \kinerity\knowledgebase\exception\unexpected_value(array('title', 'TOO_LONG'));
		}

		// Set the title on our data array
		$this->data['article_title'] = $title;

		return $this;
	}

	/**
	* Get description
	*
	* @return string Description
	* @access public
	*/
	public function get_description()
	{
		return isset($this->data['article_desc']) ? (string) $this->data['article_desc'] : '';
	}

	/**
	* Set description
	*
	* @param string $description
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	* @throws \kinerity\knowledgebase\exception\unexpected_value
	*/
	public function set_description($description)
	{
		// Enforce a string
		$description = (string) $description;

		// Set the description on our data array
		$this->data['article_desc'] = $description;

		return $this;
	}

	/**
	* Get message for edit
	*
	* @return string
	* @access public
	*/
	public function get_message_for_edit()
	{
		// Use defaults if these haven't been set yet
		$message = isset($this->data['article_text']) ? $this->data['article_text'] : '';
		$uid = isset($this->data['bbcode_uid']) ? $this->data['bbcode_uid'] : '';
		$options = isset($this->data['bbcode_options']) ? (int) $this->data['bbcode_options'] : 0;

		// Generate for edit
		$message_data = generate_text_for_edit($message, $uid, $options);

		return $message_data['text'];
	}

	/**
	* Get message for display
	*
	* @param bool $censor_text True to censor the text (Default: true)
	* @return string
	* @access public
	*/
	public function get_message_for_display($censor_text = true)
	{
		// If these haven't been set yet; use defaults
		$message = isset($this->data['article_text']) ? $this->data['article_text'] : '';
		$uid = isset($this->data['bbcode_uid']) ? $this->data['bbcode_uid'] : '';
		$bitfield = isset($this->data['bbcode_bitfield']) ? $this->data['bbcode_bitfield'] : '';
		$options = isset($this->data['bbcode_options']) ? (int) $this->data['bbcode_options'] : 0;

		// Generate for display
		return generate_text_for_display($message, $uid, $bitfield, $options, $censor_text);
	}

	/**
	* Set message
	*
	* @param string $message
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function set_message($message)
	{
		// Prepare the text for storage
		$uid = $bitfield = $flags = '';
		generate_text_for_storage($message, $uid, $bitfield, $flags, $this->message_bbcode_enabled(), $this->message_magic_url_enabled(), $this->message_smilies_enabled());

		// Set the message to our data array
		$this->data['article_text'] = $message;
		$this->data['bbcode_uid'] = $uid;
		$this->data['bbcode_bitfield'] = $bitfield;
		// Flags are already set

		return $this;
	}

	/**
	* Check if bbcode is enabled on the message
	*
	* @return bool
	* @access public
	*/
	public function message_bbcode_enabled()
	{
		return ($this->data['bbcode_options'] & OPTION_FLAG_BBCODE);
	}

	/**
	* Enable bbcode on the message
	*
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_enable_bbcode()
	{
		$this->set_message_option(OPTION_FLAG_BBCODE);

		return $this;
	}

	/**
	* Disable bbcode on the message
	*
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_disable_bbcode()
	{
		$this->set_message_option(OPTION_FLAG_BBCODE, true);

		return $this;
	}

	/**
	* Check if magic_url is enabled on the message
	*
	* @return bool
	* @access public
	*/
	public function message_magic_url_enabled()
	{
		return ($this->data['bbcode_options'] & OPTION_FLAG_LINKS);
	}

	/**
	* Enable magic url on the message
	*
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_enable_magic_url()
	{
		$this->set_message_option(OPTION_FLAG_LINKS);

		return $this;
	}

	/**
	* Disable magic url on the message
	*
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_disable_magic_url()
	{
		$this->set_message_option(OPTION_FLAG_LINKS, true);

		return $this;
	}

	/**
	* Check if smilies are enabled on the message
	*
	* @return bool
	* @access public
	*/
	public function message_smilies_enabled()
	{
		return ($this->data['bbcode_options'] & OPTION_FLAG_SMILIES);
	}

	/**
	* Enable smilies on the message
	*
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_enable_smilies()
	{
		$this->set_message_option(OPTION_FLAG_SMILIES);

		return $this;
	}

	/**
	* Disable smilies on the message
	*
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_disable_smilies()
	{
		$this->set_message_option(OPTION_FLAG_SMILIES, true);

		return $this;
	}

	/**
	* Set option helper
	*
	* @param int $option_value Value of the option
	* @param bool $negate Negate (unset) option (Default: False)
	* @param bool $reparse_message Re-parse the message after setting option (Default: True)
	* @return void
	* @access protected
	*/
	protected function set_message_option($option_value, $negate = false, $reparse_message = true)
	{
		// Set bbcode_options to 0 if it does not yet exist
		$this->data['bbcode_options'] = isset($this->data['bbcode_options']) ? $this->data['bbcode_options'] : 0;

		// If we're setting the option and the option is not already set
		if (!$negate && !($this->data['bbcode_options'] & $option_value))
		{
			// Add the option to the options
			$this->data['bbcode_options'] += $option_value;
		}

		// If we're un-setting the option and the option is already set
		if ($negate && $this->data['bbcode_options'] & $option_value)
		{
			// Subtract the option from the options
			$this->data['bbcode_options'] -= $option_value;
		}

		// Re-parse the message
		if ($reparse_message && !empty($this->data['article_text']))
		{
			$message = $this->data['article_text'];

			decode_message($message, $this->data['bbcode_uid']);

			$this->set_message($message);
		}
	}
}
