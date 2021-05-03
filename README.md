PHPBinaryReader
===
What is this?
---
A binary reader class written in PHP to process little-endian bytes with no hassle.

Example Usage
---

```php
$content = file_get_contents('file.bin');
$reader = new BufferReader($content);

while($reader->hasNext()) {
  // do something with the byte
  $byte = $reader->readByte();
}
...
```

Example reading different data types
---

```php
$content = file_get_contents('file.bin');
$reader = new BufferReader($content);

$byte = $reader->readByte();
$unsignedShort = $reader->readShort();
$unsignedLong = $reader->readLong();
$string = $reader->readString();
$stringWithKnownLength = $reader->readString(200);
```
