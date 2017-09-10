<?php
/**
 *
 * Knowledge Base extension for the phpBB Forum Software package
 *
 * @copyright (c) 2017, kinerity, https://www.acsyste.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace kinerity\knowledgebase\entity;

/**
 * Functions for a single entity
 */
class functions implements functions_interface
{
	/** @var array */
	protected $data;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var string */
	protected $kb_categories_table;

	/**
	 * Constructor
	 *
	 * @param \phpbb\db\driver\driver_interface $db
	 * @param string                            $kb_categories_table
	 * @access public
	 */
	public function __construct(\phpbb\db\driver\driver_interface $db, $kb_categories_table)
	{
		$this->db = $db;
		$this->kb_categories_table = $kb_categories_table;
	}

	/**
	 * Load the data from the database for this entity
	 *
	 * @param int
	 * @return $this object for chaining calls; load()->set()->save()
	 * @access public
	 * @throws \kinerity\knowledgebase\exception\out_of_bounds
	 */
	public function load($id)
	{
		$sql = 'SELECT *
			FROM ' . $this->kb_categories_table . '
			WHERE category_id = ' . (int) $id;
		$result = $this->db->sql_query($sql);
		$this->data = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		if ($this->data === false)
		{
			// A entity does not exist
			throw new \kinerity\knowledgebase\exception\out_of_bounds('category_id');
		}

		return $this;
	}

	/**
	 * Insert the entity for the first time
	 *
	 * Will throw an exception if the entity was already inserted (call save() instead)
	 *
	 * @return $this object for chaining calls; load()->set()->save()
	 * @access public
	 * @throws \kinerity\knowledgebase\exception\out_of_bounds
	 */
	public function insert()
	{
		if (!empty($this->data['category_id']))
		{
			// The entity already exists
			throw new \kinerity\knowledgebase\exception\out_of_bounds('category_id');
		}

		$sql = 'SELECT MAX(right_id) AS right_id
			FROM ' . $this->kb_categories_table;
		$result = $this->db->sql_query($sql);
		$row = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		// Sets values required for the nested set system
		$this->data['left_id'] = $row['right_id'] + 1;
		$this->data['right_id'] = $row['right_id'] + 2;

		// Make extra sure there is no category_id set
		unset($this->data['category_id']);

		// Insert the entity data to the database
		$sql = 'INSERT INTO ' . $this->kb_categories_table . ' ' . $this->db->sql_build_array('INSERT', $this->data);
		$this->db->sql_query($sql);

		// Set the category_id using the id created by the SQL insert
		$this->data['category_id'] = (int) $this->db->sql_nextid();

		return $this;
	}

	/**
	 * Save the current settings to the database
	 *
	 * This must be called before closing or any changes will not be saved!
	 * If adding a entity (saving for the first time), you must call insert() or an exception will be thrown
	 *
	 * @return $this object for chaining calls; load()->set()->save()
	 * @access public
	 * @throws \kinerity\knowledgebase\exception\out_of_bounds
	 */
	public function save()
	{
		if (empty($this->data['category_id']))
		{
			// The entity does not exist
			throw new \kinerity\knowledgebase\exception\out_of_bounds('category_id');
		}

		// Copy the data array, filtering out the category_id identifier
		// so we do not attempt to update the row's identity column.
		$sql_array = array_diff_key($this->data, array('category_id' => null));

		// Update the page data in the database
		$sql = 'UPDATE ' . $this->kb_categories_table . '
			SET ' . $this->db->sql_build_array('UPDATE', $sql_array) . '
			WHERE category_id = ' . (int) $this->get_id();
		$this->db->sql_query($sql);

		return $this;
	}

	/**
	 * Get id
	 *
	 * @return integer
	 * @access public
	 */
	public function get_id()
	{
		return isset($this->data['category_id']) ? (int) $this->data['category_id'] : 0;
	}

	/**
	 * Get title
	 *
	 * @return string
	 * @access public
	 */
	public function get_title()
	{
		return isset($this->data['category_name']) ? (string) $this->data['category_name'] : '';
	}

	/**
	 * Set title
	 *
	 * @param string
	 * @return $this
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
		$this->data['category_name'] = $title;

		return $this;
	}

	/**
	 * Get description for edit
	 *
	 * @return string
	 * @access public
	 */
	public function get_description_for_edit()
	{
		// Use defaults if these haven't been set yet
		$description = isset($this->data['category_description']) ? $this->data['category_description'] : '';
		$uid = isset($this->data['bbcode_uid']) ? $this->data['bbcode_uid'] : '';
		$options = isset($this->data['bbcode_options']) ? (int) $this->data['bbcode_options'] : 0;

		// Generate for edit
		$description_data = generate_text_for_edit($description, $uid, $options);

		return $description_data['text'];
	}

	/**
	 * Get description for display
	 *
	 * @param bool
	 * @return mixed|string
	 * @access public
	 */
	public function get_description_for_display($censor_text = true)
	{
		// If these haven't been set yet; use defaults
		$description = isset($this->data['category_description']) ? $this->data['category_description'] : '';
		$uid = isset($this->data['bbcode_uid']) ? $this->data['bbcode_uid'] : '';
		$bitfield = isset($this->data['bbcode_bitfield']) ? $this->data['bbcode_bitfield'] : '';
		$options = isset($this->data['bbcode_options']) ? (int) $this->data['bbcode_options'] : 0;

		// Generate for display
		return generate_text_for_display($description, $uid, $bitfield, $options, $censor_text);
	}

	/**
	 * Set description
	 *
	 * @param string
	 * @return $this
	 * @access public
	 */
	public function set_description($description)
	{
		// Prepare the text for storage
		$uid = $bitfield = $flags = '';
		generate_text_for_storage($description, $uid, $bitfield, $flags, $this->description_bbcode_enabled(), $this->description_magic_url_enabled(), $this->description_smilies_enabled());

		// Set the description to our data array
		$this->data['category_description'] = $description;
		$this->data['bbcode_uid'] = $uid;
		$this->data['bbcode_bitfield'] = $bitfield;
		// Flags are already set

		return $this;
	}

	/**
	 * Check if bbcode is enabled on the description
	 *
	 * @return integer
	 * @access public
	 */
	public function description_bbcode_enabled()
	{
		return ($this->data['bbcode_options'] & OPTION_FLAG_BBCODE);
	}

	/**
	 * Enable bbcode on the description
	 *
	 * @return $this
	 * @access public
	 */
	public function description_enable_bbcode()
	{
		$this->set_description_option(OPTION_FLAG_BBCODE);

		return $this;
	}

	/**
	 * Disable bbcode on the description
	 *
	 * @return $this
	 * @access public
	 */
	public function description_disable_bbcode()
	{
		$this->set_description_option(OPTION_FLAG_BBCODE, true);

		return $this;
	}

	/**
	 * Check if magic_url is enabled on the description
	 *
	 * @return integer
	 * @access public
	 */
	public function description_magic_url_enabled()
	{
		return ($this->data['bbcode_options'] & OPTION_FLAG_LINKS);
	}

	/**
	 * Enable magic url on the description
	 *
	 * @return $this
	 * @access public
	 */
	public function description_enable_magic_url()
	{
		$this->set_description_option(OPTION_FLAG_LINKS);

		return $this;
	}

	/**
	 * Disable magic url on the description
	 *
	 * @return $this
	 * @access public
	 */
	public function description_disable_magic_url()
	{
		$this->set_description_option(OPTION_FLAG_LINKS, true);

		return $this;
	}

	/**
	 * Check if smilies are enabled on the description
	 *
	 * @return integer
	 * @access public
	 */
	public function description_smilies_enabled()
	{
		return ($this->data['bbcode_options'] & OPTION_FLAG_SMILIES);
	}

	/**
	 * Enable smilies on the description
	 *
	 * @return $this
	 * @access public
	 */
	public function description_enable_smilies()
	{
		$this->set_description_option(OPTION_FLAG_SMILIES);

		return $this;
	}

	/**
	 * Disable smilies on the description
	 *
	 * @return $this
	 * @access public
	 */
	public function description_disable_smilies()
	{
		$this->set_description_option(OPTION_FLAG_SMILIES, true);

		return $this;
	}

	/**
	 * Set option helper
	 *
	 * @return void
	 * @access protected
	 */
	protected function set_description_option($option_value, $negate = false, $reparse_description = true)
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

		// Re-parse the description
		if ($reparse_description && !empty($this->data['category_description']))
		{
			$description = $this->data['category_description'];

			decode_message($description, $this->data['bbcode_uid']);

			$this->set_description($description);
		}
	}
}
