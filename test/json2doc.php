<?php

$a = 'MIICQDCCAeWgAwIBAgIMAVRI7yH9l1kN9QQKMAoGCCqGSM49BAMCMHExCzAJBgNVBAYTAkhVMREw
DwYDVQQHDAhCdWRhcGVzdDEWMBQGA1UECgwNTWljcm9zZWMgTHRkLjEXMBUGA1UEYQwOVkFUSFUt
MjM1ODQ0OTcxHjAcBgNVBAMMFWUtU3ppZ25vIFJvb3QgQ0EgMjAxNzAeFw0xNzA4MjIxMjA3MDZa
Fw00MjA4MjIxMjA3MDZaMHExCzAJBgNVBAYTAkhVMREwDwYDVQQHDAhCdWRhcGVzdDEWMBQGA1UE
CgwNTWljcm9zZWMgTHRkLjEXMBUGA1UEYQwOVkFUSFUtMjM1ODQ0OTcxHjAcBgNVBAMMFWUtU3pp
Z25vIFJvb3QgQ0EgMjAxNzBZMBMGByqGSM49AgEGCCqGSM49AwEHA0IABJbcPYrYsHtvxie+RJCx
s1YVe45DJH0ahFnuY2iyxl6H0BVIHqiQrb1TotreOpCmYF9oMrWGQd+HWyx7xf58etqjYzBhMA8G
A1UdEwEB/wQFMAMBAf8wDgYDVR0PAQH/BAQDAgEGMB0GA1UdDgQWBBSHERUI0arBeAyxr87GyZDv
vzAEwDAfBgNVHSMEGDAWgBSHERUI0arBeAyxr87GyZDvvzAEwDAKBggqhkjOPQQDAgNJADBGAiEA
tVfd14pVCzbhhkT61NlojbjcI4qKDdQvfepz7L9NbKgCIQDLpbQS+ue16M9+k/zzNY9vTlp8tLxO
svxyqltZ+efcMQ==';

echo base64_decode($a).PHP_EOL;
exit;
class Foo {
    private static $used = 0;
    private $id;
    public function __construct() {
        $this->id = self::$used++;
    }
    public function __clone() {
        $this->id = self::$used++;
    }
    public function show()
    {
        var_dump($this->id);
    }
}

$a = new Foo; // $a is a pointer pointing to Foo object 0
$b = $a; // $b is a pointer pointing to Foo object 0, however, $b is a copy of $a
$b->show();
$a->show();
$c = &$a; // $c and $a are now references of a pointer pointing to Foo object 0
$c->show();
$a = new Foo; // $a and $c are now references of a pointer pointing to Foo object 1, $b is still a pointer pointing to Foo object 0
$a->show();
unset($a); // A reference with reference count 1 is automatically converted back to a value. Now $c is a pointer to Foo object 1
$a = &$b; // $a and $b are now references of a pointer pointing to Foo object 0
$a->show();
$a = NULL; // $a and $b now become a reference to NULL. Foo object 0 can be garbage collected now
unset($b); // $b no longer exists and $a is now NULL
$a = clone $c; // $a is now a pointer to Foo object 2, $c remains a pointer to Foo object 1
unset($c); // Foo object 1 can be garbage collected now.
$c = $a; // $c and $a are pointers pointing to Foo object 2
unset($a); // Foo object 2 is still pointed by $c
$a = &$c; // Foo object 2 has 1 pointers pointing to it only, that pointer has 2 references: $a and $c;
const ABC = TRUE;
if(ABC) {
    $a = NULL; // Foo object 2 can be garbage collected now because $a and $c are now a reference to the same NULL value
} else {
    unset($a); // Foo object 2 is still pointed to $c
}
exit;

class A
{
    public $p1 =1;
    public $p2 =2;

    public function show()
    {
        var_dump($this->p1,$this->p2);
    }

}

Class B{
    public function foo(A $obj){
        $obj->p1 = 3;
        $obj->p2 = 4;
    }
    public function foo1($d)
    {
        $d = 4;
    }
}

$a = new A();

$d = 4;

$b = new B();
$b->foo($a);

$a->show();
exit;
$json_str =
    '{
  "ProgramId": 0,
  "Status": "All",
  "PageNo": 0,
  "PageSize": 0
}';
$data = json_decode($json_str,true);

array2doc($data);

function array2doc($data,$time = 0)
{
    foreach ($data as $k => $v) {
        $type = gettype($v);
        $name = $k;
        echo str_repeat("\t",$time) . " * @property " . ($type=='array' ? "{$k}[]" : $type) ." \${$name}".PHP_EOL;
        if ($type == 'array') {
            $dd = current($v);
            if (is_array($dd)) {
                array2doc(current($v),$time+1);
            } else {
                echo str_repeat("\t",$time+1) . " * @property " . gettype($dd) ." \${$name}".PHP_EOL;
            }

        }
    }
}

function camelCase2Underline($str)
{
    return strtolower(preg_replace('/([a-z])([A-Z])/', "$1_$2", $str));
}

function underline2camelCase($str)
{
    $uncamelized_words = "_" . str_replace("_", " ", strtolower($str));
    return ltrim(str_replace(" ", "", ucwords($uncamelized_words)), "_");
}