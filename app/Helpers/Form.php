<?php


/**
 * 单选框
 *
 * @param string $name
 * @param array $options
 * @param string $checked
 * @param string $extra
 * @param string $class
 * @return string
 */
function form_radio($name = '', $options = array(), $checked = FALSE, $extra = '', $class = 'radio')
{
    if ($extra != '') $extra = ' ' . $extra;

    $form = '';

    foreach ($options as $key => $val) {
        $key = (string)$key;

        $sel = $key == $checked ? ' checked="checked"' : '';

        //-inline
        $form .= "<label>\n";
        $form .= "<input type=\"radio\" name=\"{$name}\" value=\"{$key}\"{$sel}{$extra}>{$val}\n";
        $form .= "</label>\n";
    }

    return $form;
}

/**
 * 重写form_textarea函数,直接扩展属性
 * @param string $data
 * @param string $value
 * @param string $extra
 * @return string
 */
function form_textarea($data = '', $value = '', $extra = '')
{
    $defaults = array('name' => ((!is_array($data)) ? $data : ''));

    if (!is_array($data) OR !isset($data['value'])) {
        $val = $value;
    } else {
        $val = $data['value'];
        unset($data['value']); // textareas don't use the value attribute
    }

    $name = (is_array($data)) ? $data['name'] : $data;
    return "<textarea " . _parse_form_attributes($data, $defaults) . $extra . ">" . form_prep($val, $name) . "</textarea>";
}



if ( ! function_exists('form_input'))
{
    /**
     * Text Input Field
     *
     * @param	mixed
     * @param	string
     * @param	string
     * @return	string
     */
    function form_input($data = '', $value = '', $extra = '')
    {
        $defaults = array(
            'type' => 'text',
            'name' => is_array($data) ? '' : $data,
            'value' => $value
        );

        return '<input '._parse_form_attributes($data, $defaults).$extra." />\n";
    }
}

// ------------------------------------------------------------------------

if ( ! function_exists('form_password'))
{
    /**
     * Password Field
     *
     * Identical to the input function but adds the "password" type
     *
     * @param	mixed
     * @param	string
     * @param	string
     * @return	string
     */
    function form_password($data = '', $value = '', $extra = '')
    {
        is_array($data) OR $data = array('name' => $data);
        $data['type'] = 'password';
        return form_input($data, $value, $extra);
    }
}



if ( ! function_exists('form_dropdown'))
{
    /**
     * Drop-down Menu
     *
     * @param	mixed	$data
     * @param	mixed	$options
     * @param	mixed	$selected
     * @param	mixed	$extra
     * @return	string
     */
    function form_dropdown($data = '', $options = array(), $selected = array(), $extra = '')
    {
        $defaults = array();

        if (is_array($data))
        {
            if (isset($data['selected']))
            {
                $selected = $data['selected'];
                unset($data['selected']); // select tags don't have a selected attribute
            }

            if (isset($data['options']))
            {
                $options = $data['options'];
                unset($data['options']); // select tags don't use an options attribute
            }
        }
        else
        {
            $defaults = array('name' => $data);
        }

        is_array($selected) OR $selected = array($selected);
        is_array($options) OR $options = array($options);

        // If no selected state was submitted we will attempt to set it automatically
        if (empty($selected))
        {
            if (is_array($data))
            {
                if (isset($data['name'], $_POST[$data['name']]))
                {
                    $selected = array($_POST[$data['name']]);
                }
            }
            elseif (isset($_POST[$data]))
            {
                $selected = array($_POST[$data]);
            }
        }

        $extra = _attributes_to_string($extra);

        $multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';

        $form = '<select '.rtrim(_parse_form_attributes($data, $defaults)).$extra.$multiple.">\n";

        foreach ($options as $key => $val)
        {
            $key = (string) $key;

            if (is_array($val))
            {
                if (empty($val))
                {
                    continue;
                }

                $form .= '<optgroup label="'.$key."\">\n";

                foreach ($val as $optgroup_key => $optgroup_val)
                {
                    $sel = in_array($optgroup_key, $selected) ? ' selected="selected"' : '';
                    $form .= '<option value="'.html_escape($optgroup_key).'"'.$sel.'>'
                        .(string) $optgroup_val."</option>\n";
                }

                $form .= "</optgroup>\n";
            }
            else
            {
                $form .= '<option value="'.html_escape($key).'"'
                    .(in_array($key, $selected) ? ' selected="selected"' : '').'>'
                    .(string) $val."</option>\n";
            }
        }

        return $form."</select>\n";
    }
}

// ------------------------------------------------------------------------

if ( ! function_exists('form_checkbox'))
{
    /**
     * Checkbox Field
     *
     * @param	mixed
     * @param	string
     * @param	bool
     * @param	string
     * @return	string
     */
    function form_checkbox($data = '', $value = '', $checked = FALSE, $extra = '')
    {
        $defaults = array('type' => 'checkbox', 'name' => ( ! is_array($data) ? $data : ''), 'value' => $value);

        if (is_array($data) && array_key_exists('checked', $data))
        {
            $checked = $data['checked'];

            if ($checked == FALSE)
            {
                unset($data['checked']);
            }
            else
            {
                $data['checked'] = 'checked';
            }
        }

        if ($checked == TRUE)
        {
            $defaults['checked'] = 'checked';
        }
        else
        {
            unset($defaults['checked']);
        }

        return '<input '._parse_form_attributes($data, $defaults).$extra." />\n";
    }
}

// ------------------------------------------------------------------------

//if ( ! function_exists('form_radio'))
//{
//    /**
//     * Radio Button
//     *
//     * @param	mixed
//     * @param	string
//     * @param	bool
//     * @param	string
//     * @return	string
//     */
//    function form_radio($data = '', $value = '', $checked = FALSE, $extra = '')
//    {
//        is_array($data) OR $data = array('name' => $data);
//        $data['type'] = 'radio';
//        return form_checkbox($data, $value, $checked, $extra);
//    }
//}


// ------------------------------------------------------------------------

if ( ! function_exists('_parse_form_attributes'))
{
    /**
     * Parse the form attributes
     *
     * Helper function used by some of the form helpers
     *
     * @param	array	$attributes	List of attributes
     * @param	array	$default	Default values
     * @return	string
     */
    function _parse_form_attributes($attributes, $default)
    {
        if (is_array($attributes))
        {
            foreach ($default as $key => $val)
            {
                if (isset($attributes[$key]))
                {
                    $default[$key] = $attributes[$key];
                    unset($attributes[$key]);
                }
            }

            if (count($attributes) > 0)
            {
                $default = array_merge($default, $attributes);
            }
        }

        $att = '';

        foreach ($default as $key => $val)
        {
            if ($key === 'value')
            {
                $val = html_escape($val);
            }
            elseif ($key === 'name' && ! strlen($default['name']))
            {
                continue;
            }

            $att .= $key.'="'.$val.'" ';
        }

        return $att;
    }
}


// ------------------------------------------------------------------------

if ( ! function_exists('html_escape'))
{
    /**
     * Returns HTML escaped variable.
     *
     * @param	mixed	$var		The input string or array of strings to be escaped.
     * @param	bool	$double_encode	$double_encode set to FALSE prevents escaping twice.
     * @return	mixed			The escaped string or array of strings as a result.
     */
    function html_escape($var, $double_encode = TRUE)
    {
        if (empty($var))
        {
            return $var;
        }

        if (is_array($var))
        {
            return array_map('html_escape', $var, array_fill(0, count($var), $double_encode));
        }

        return htmlspecialchars($var, ENT_QUOTES, 'UTF-8', $double_encode);
    }
}



// ------------------------------------------------------------------------

if ( ! function_exists('form_prep'))
{
    /**
     * Form Prep
     *
     * Formats text so that it can be safely placed in a form field in the event it has HTML tags.
     *
     * @deprecated	3.0.0	An alias for html_escape()
     * @param	string|string[]	$str		Value to escape
     * @return	string|string[]	Escaped values
     */
    function form_prep($str)
    {
        return html_escape($str, TRUE);
    }
}
