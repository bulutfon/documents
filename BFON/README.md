# BFON - BulutFon Object Notation

**NOT** : Bu özellik taslak aşamasındadır. Lütfen kullanmak için Bulutfon telefon numaranızla birlikte dev at bulutfon dot com'a email atınız.

## Genel Bakış

## Methodlar

* [reject](#reject)
* [play](#play)
* [gather](#gather)
* [dial](#dial)
* [hangup](#hangup)
* [continue](#continue)
* [say](#say) (yakında eklenecek)

### reject

### play

Belli bir adresteki mp3 dosyasını arayana çalar.

**args**

* url: "http://192.168.1.1:8000/test.mp3"

### gather

Belli bir adresteki ses dosyasını araya çalar. Sonra arayanın bastığı tuşları bir değişkene atar ve harici yönetim adresine POST eder. 

**args**

* min_digits: "2",
* max_digits: "5",
* max_attempts: "3",
* ask: "http://192.168.1.1:8000/test.mp3",
* play_on_error: "http://192.168.1.1:8000/test.mp3",
* variable_name: "testvar"

### dial

Arayanı menüye, grubu, dahiliye veya harici bir numaraya yönlendirir.

**args**

* destination: "1000"

**Notlar**

* Bulutfon'da menüler 2 haneli, gruplar 3 haneli, dahililer 4 hanelidir.
* Harici numaralara yönlendirmede aranan operatöre göre bir yönlendirme ücreti alınır.

### hangup

Arayana telefon kapatılır.

### continue

Arama planı kaldığı yerden devam eder. Harici yönetim adresine tekrar istek yapar.

### say (yakında eklenecek)

Şuan sistemde text to speech özelliği yoktur.

**args**

* lang: "tr",
* voice: "woman",
* text: "Merhaba, dünya."

## Örnek

```json
 {
    "seq": [
        {
            "action": "reject"
        },
        {
            "action": "play",
            "args": {
                "url": "http://192.168.1.1:8000/test.mp3"
            }
        },
        {
            "action": "gather",
            "args": {
                "min_digits": "2",
                "max_digits": "5",
                "max_attempts": "3",
                "ask": "http://192.168.1.1:8000/test.mp3",
                "play_on_error": "http://192.168.1.1:8000/test.mp3",
                "variable_name": "testvar"
            }
        },
        {
            "action": "dial",
            "args": {
                "destination": "1000"
            }
        },
        {
            "action": "say",
            "args": {
                "lang": "tr",
                "text": "Merhaba dünya."
            }
        },
        {
            "action": "hangup"
        },
        {
            "action": "continue"
        }
    ]
 }
```
