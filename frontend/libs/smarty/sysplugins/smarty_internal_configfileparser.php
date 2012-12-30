<?php
/**
* Smarty Internal Plugin Configfileparser
*
* This is the config file parser.
* It is generated from the internal.configfileparser.y file
* @package Smarty
* @subpackage Compiler
* @author Uwe Tews
*/

class TPC_yyToken implements ArrayAccess
{
    public $string = '';
    public $metadata = array();

    function __construct($s, $m = array())
    {
        if ($s instanceof TPC_yyToken) {
            $this->string = $s->string;
            $this->metadata = $s->metadata;
        } else {
            $this->string = (string) $s;
            if ($m instanceof TPC_yyToken) {
                $this->metadata = $m->metadata;
            } elseif (is_array($m)) {
                $this->metadata = $m;
            }
        }
    }

    function __toString()
    {
        return $this->_string;
    }

    function offsetExists($offset)
    {
        return isset($this->metadata[$offset]);
    }

    function offsetGet($offset)
    {
        return $this->metadata[$offset];
    }

    function offsetSet($offset, $value)
    {
        if ($offset === null) {
            if (isset($value[0])) {
                $x = ($value instanceof TPC_yyToken) ?
                    $value->metadata : $value;
                $this->metadata = array_merge($this->metadata, $x);
                return;
            }
            $offset = count($this->metadata);
        }
        if ($value === null) {
            return;
        }
        if ($value instanceof TPC_yyToken) {
            if ($value->metadata) {
                $this->metadata[$offset] = $value->metadata;
            }
        } elseif ($value) {
            $this->metadata[$offset] = $value;
        }
    }

    function offsetUnset($offset)
    {
        unset($this->metadata[$offset]);
    }
}

class TPC_yyStackEntry
{
    public $stateno;       /* The state-number */
    public $major;         /* The major token value.  This is the code
                     ** number for the token at this stack level */
    public $minor; /* The user-supplied minor token value.  This
                     ** is the value of the token  */
};


#line 12 "smarty_internal_configfileparser.y"
class Smarty_Internal_Configfileparser#line 79 "smarty_internal_configfileparser.php"
{
#line 14 "smarty_internal_configfileparser.y"

    // states whether the parse was successful or not
    public $successful = true;
    public $retvalue = 0;
    private $lex;
    private $internalError = false;

    function __construct($lex, $compiler) {
        // set instance object
        self::instance($this);
        $this->lex = $lex;
        $this->smarty = $compiler->smarty;
        $this->compiler = $compiler;
    }
    public static function &instance($new_instance = null)
    {
        static $instance = null;
        if (isset($new_instance) && is_object($new_instance))
            $instance = $new_instance;
        return $instance;
    }

    private function parse_bool($str) {
        if (in_array(strtolower($str) ,array('on','yes','true'))) {
            $res = true;
        } else {
            $res = false;
        }
        return $res;
    }

    private static $escapes_single = Array('\\' => '\\',
                                          '\'' => '\'');
    private static function parse_single_quoted_string($qstr) {
        $escaped_string = substr($qstr, 1, strlen($qstr)-2); //remove outer quotes

        $ss = preg_split('/(\\\\.)/', $escaped_string, -1, PREG_SPLIT_DELIM_CAPTURE);

        $str = "";
        foreach ($ss as $s) {
            if (strlen($s) === 2 && $s[0] === '\\') {
                if (isset(self::$escapes_single[$s[1]])) {
                    $s = self::$escapes_single[$s[1]];
                }
             }

             $str .= $s;
        }

        return $str;
    }

    private static function parse_double_quoted_string($qstr) {
        $inner_str = substr($qstr, 1, strlen($qstr)-2);
        return stripcslashes($inner_str);
    }

    private static function parse_tripple_double_quoted_string($qstr) {
        return stripcslashes($qstr);
    }

    private function set_var(Array $var, Array &$target_array) {
        $key = $var["key"];
        $value = $var["value"];

        if ($this->smarty->config_overwrite || !isset($target_array['vars'][$key])) {
            $target_array['vars'][$key] = $value;
        } else {
            settype($target_array['vars'][$key], 'array');
            $target_array['vars'][$key][] = $value;
        }
    }

    private function add_global_vars(Array $vars) {
        if (!isset($this->compiler->config_data['vars'])) {
      $this->compiler->config_data['vars'] = Array();
        }
        foreach ($vars as $var) {
            $this->set_var($var, $this->compiler->config_data);
        }
    }

    private function add_section_vars($section_name, Array $vars) {
        if (!isset($this->compiler->config_data['sections'][$section_name]['vars'])) {
            $this->compiler->config_data['sections'][$section_name]['vars'] = Array();
        }
        foreach ($vars as $var) {
            $this->set_var($var, $this->compiler->config_data['sections'][$section_name]);
        }
    }
#line 173 "smarty_internal_configfileparser.php"

    const TPC_OPENB                          =  1;
    const TPC_SECTION                        =  2;
    const TPC_CLOSEB                         =  3;
    const TPC_DOT                            =  4;
    const TPC_ID                             =  5;
    const TPC_EQUAL                          =  6;
    const TPC_FLOAT                          =  7;
    const TPC_INT                            =  8;
    const TPC_BOO