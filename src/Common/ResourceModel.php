<?php


namespace InCommAlder\Common;

use InCommAlder\Exceptions\AlderConfigurationException;
use InCommAlder\Validation\JsonValidator;

class ResourceModel
{
    use ApiModel;

    private $_propMap = [];

    public function __construct($data = null)
    {
        switch (gettype($data)) {
            case "NULL":
                break;
            case "string":
                JsonValidator::validate($data);
                $this->fromJson($data);
                break;
            case "array":
                $this->fromArray($data);
                break;
            default:
        }
    }

    public function getList($json_str){
        JsonValidator::validate($json_str);
        $data = json_decode($json_str, true);
        foreach ($data as $index => $item) {
            $data[$index] = $this->fromArray($item);
        }
        return $data;
    }

    public function fromJson($json_str)
    {
        JsonValidator::validate($json_str);
        $data = json_decode($json_str, true);
        return $this->fromArray($data);
    }

    public function fromArray($data)
    {
        if (empty($data)) {
            return $this;
        }

        foreach ($data as $key => $value) {

            if (!is_array($value)) {
                $this->assignValue($key, $value);
            } else {
                $clazz = ReflectionUtil::getPropertyClass(get_class($this), $key);

                if ($clazz == 'array' || $clazz == 'string') {
                    $this->assignValue($key,$value);
                    continue;
                }

//                $is_class_array = ReflectionUtil::isPropertyClassArray(get_class($this), $key);
//                var_dump(compact('clazz','is_class_array'));

                if (!class_exists($clazz)) {
                    throw new AlderConfigurationException("$clazz not defined");
                }

                $is_class_array = ReflectionUtil::isPropertyClassArray(get_class($this), $key);

                if (empty($value)) {
                    if ($is_class_array) {
                        $this->assignValue($key,[]);
                    } else {
                        $this->assignValue($key, new $clazz);
                    }
                    continue;
                }

                if ($is_class_array) {
                    $arr = [];
                    foreach ($value as $nk => $nv) {
                        /** @var self $obj */
                        $obj = new $clazz();
                        $obj->fromArray($nv);
                        $arr[$nk] = $obj;
                    }
                    $this->assignValue($key, $arr);
                } else {
                    /** @var self $obj */
                    $obj = new $clazz();
                    $obj->fromArray($value);
                    $this->assignValue($key, $obj);
                }
            }
        }
        return $this;
    }

    private function assignValue($key, $value)
    {
        $setter = 'set' . self::convertToCamelCase($key);
        if (method_exists($this, $setter)) {
            $this->$setter($value);
        } else {
            $this->__set($key, $value);
        }
    }

    /**
     * Converts Params to Array
     *
     * @param $param
     * @return array
     */
    private function _convertToArray($param)
    {
        $ret = array();
        foreach ($param as $k => $v) {
            if ($v instanceof ResourceModel) {
                $ret[$k] = $v->toArray();
            } elseif (is_array($v) && sizeof($v) <= 0) {
                $ret[$k] = array();
            } elseif (is_array($v)) {
                $ret[$k] = $this->_convertToArray($v);
            } else {
                $ret[$k] = $v;
            }
        }
        // If the array is empty, which means an empty object,
        // we need to convert array to StdClass object to properly
        // represent JSON String
        if (sizeof($ret) <= 0) {
            $ret = new ResourceModel();
        }
        return $ret;
    }

    /**
     * Returns array representation of object
     *
     * @return array
     */
    public function toArray()
    {
        return $this->_convertToArray($this->_propMap);
    }

    /**
     * Returns object JSON representation
     *
     * @param int $options http://php.net/manual/en/json.constants.php
     * @return string
     */
    public function toJson($options = 0)
    {
        // Because of PHP Version 5.3, we cannot use JSON_UNESCAPED_SLASHES option
        // Instead we would use the str_replace command for now.
        // TODO: Replace this code with return json_encode($this->toArray(), $options | 64); once we support PHP >= 5.4
        if (version_compare(phpversion(), '5.4.0', '>=') === true) {
            return json_encode($this->toArray(), $options | 64);
        }
        return str_replace('\\/', '/', json_encode($this->toArray(), $options));
    }


    /**
     * Converts the input key into a valid Setter Method Name
     *
     * @param $key
     * @return mixed
     */
    public static function convertToCamelCase($key)
    {
        return str_replace(' ', '', ucwords(str_replace(array('_', '-'), ' ', $key)));
    }

    /**
     * Time param convert to Datetime
     * @param string $time_str
     * @param string $time_zone
     * @return \DateTime
     *
     * @throws \Exception
     */
    public static function str2Datetime($time_str, $time_zone = \DateTimeZone::UTC) {
        return new \DateTime($time_str, new \DateTimeZone($time_zone));
    }

    /**
     * Magic Method for toString
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toJson(JSON_PRETTY_PRINT);
    }


    /**
     * Magic Get Method
     *
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        if ($this->__isset($key)) {
            return $this->_propMap[$key];
        }
        return null;
    }

    /**
     * Magic Set Method
     *
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        if (!is_array($value) && $value === null) {
            $this->__unset($key);
        } else {
            $this->_propMap[$key] = $value;
        }
    }

    /**
     * Magic isSet Method
     *
     * @param $key
     * @return bool
     */
    public function __isset($key)
    {
        return isset($this->_propMap[$key]);
    }

    /**
     * Magic Unset Method
     *
     * @param $key
     */
    public function __unset($key)
    {
        unset($this->_propMap[$key]);
    }
}