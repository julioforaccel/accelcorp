<?php
function kapost_byline_admin_settings()
{
	$form = array();

	$form['kapost_create_user'] = array(
	    '#type' => 'checkbox',
	    '#title' => t('Create User'),
	    '#default_value' => variable_get('kapost_create_user', false),
	    '#description' => t('Create a new Drupal user for each published user unless their account (based on email) already exists.')
	);

	$form['kapost_use_existing_user'] = array(
		'#type' => 'checkbox',
	    '#title' => t('Use existing User (only)'),
	    '#default_value' => variable_get('kapost_use_existing_user', false),
	    '#description' => t('Use existing Drupal user (based on email) for each published user. (mutually exclusive with Create User above)')
	);

	$form['kapost_preview'] = array(
		'#type' => 'checkbox',
	    '#title' => t('Preview'),
	    '#default_value' => variable_get('kapost_preview', false),
	    '#description' => t('Enable Kapost users to preview posts before publishing')
	);

	if(module_exists("pathauto"))
	{
		$form['kapost_path_auto'] = array(
		    '#type' => 'checkbox',
			'#title' => t('Path Auto'),
		    '#default_value' => variable_get('kapost_path_auto', false),
		    '#description' => t('Create alias using Path Auto')
		);
	}

	$category_fields = array('' => 'Default');
	$featured_image_fields = array('' => 'Default');
	foreach(field_info_fields() as $k => $v)
	{
		switch($v['type'])
		{
			case 'taxonomy_term_reference':
				$category_fields[$k] = $k;
				break;

			case 'image':
			case 'media': // support for the deprecated 'Multimedia Type'
				$featured_image_fields[$k] = $k;
				break;
		}
	}

	if(module_exists("taxonomy"))
	{
		$form['kapost_category_field'] = array(
		    '#type' => 'select',
		    '#title' => t('Categories'),
		    '#default_value' => variable_get('kapost_category_field', false),
			'#description' => t('Map categories from Kapost to this field'),
			'#options' => $category_fields
		);

		$form['kapost_tag_field'] = array(
		    '#type' => 'select',
		    '#title' => t('Tags'),
		    '#default_value' => variable_get('kapost_tag_field', false),
			'#description' => t('Map tags from Kapost to this field'),
			'#options' => $category_fields
		);
	}

	$form['kapost_featured_image_field'] = array(
		'#type' => 'select',
		'#title' => t('Featured Image'),
		'#default_value' => variable_get('kapost_featured_image_field', false),
		'#description' => t('Map featured image from Kapost to this field'),
		'#options' => $featured_image_fields
	);

	return system_settings_form($form);
}
