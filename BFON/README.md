# BFON - BulutFon Object Notation

**NOT** : Bu özellik taslak aşamasındadır. Lütfen kullanmak için Bulutfon telefon numaranızla birlikte dev at bulutfon dot com'a email atınız.

## Genel Bakış
## Doğrulama

* Http Basic Authentication yöntemi kullanılacaktır.
* Kullanıcı adı ve şifrenizi Bulutfon santral panelinizden girmelisiniz.

## Methodlar

* [reject](#reject)
* [play](#play)
* [gather](#gather)
* [dial](#dial)
* [hangup](#hangup)
* [continue](#continue)
* [say](#say) (coming soon)

### reject

### play

**args**

* url: "http://192.168.1.1:8000/test.mp3"

### gather

**args**

* min_digits: "2",
* max_digits: "5",
* max_attempts: "3",
* ask: "http://192.168.1.1:8000/test.mp3",
* play_on_error: "http://192.168.1.1:8000/test.mp3",
* variable_name: "testvar"

### dial

**args**

* destination: "1000"

### hangup

### continue

### say (yakında eklenecek)

**args**

* lang: "tr",
* voice: "woman",
* text: "Demir gibi kollarım hiç acımam sollarım."

