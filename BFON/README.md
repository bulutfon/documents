# BFON - BulutFon Object Notation

BFON, Bulutfon tarafından belirlenen bir [JSON](http://www.json.org/) standartıdır. BFON ile geliştiriciler Bulutfon'a görüşme anında telefonu kapatma, belli bir ses dosyasını okuma, basılan tuşları algılama gibi işlemleri yaptırtabilirler.

## Methodlar

* [play](#play)
* [gather](#gather)
* [dial](#dial)
* [continue](#continue)
* [say](#say) (yakında eklenecek)
* [hangup](#hangup)
* [reject](#reject)



### play

Belli bir adresteki mp3 dosyasını arayana çalar.

**args**

* url: "http://192.168.1.1:8000/test.mp3"

### gather

Belli bir adresteki ses dosyasını arayana çalar. Sonra arayanın bastığı tuşları bir değişkene atar ve harici yönetim adresine POST eder. 

**args**

* min_digits: "2",
* max_digits: "5",
* max_attempts: "3",
* ask: "http://192.168.1.1:8000/test.mp3",
* play_on_error: "http://192.168.1.1:8000/test.mp3",
* variable_name: "testvar"

### dial

Arayanı menüye, gruba, dahiliye veya harici bir numaraya yönlendirir. 

**args**

* destination: "1000"

**Notlar**

* Bulutfon'da menüler 2 haneli, gruplar 3 haneli, dahililer 4 hanelidir.
* Harici numaralara yönlendirmede aranan operatöre göre bir yönlendirme ücreti alınır.

### continue

Arama planı kaldığı yerden devam eder. Harici yönetim adresine tekrar istek yapar.

### say (yakında eklenecek)

Şuan sistemde text to speech özelliği yoktur.

**args**

* lang: "tr",
* voice: "woman",
* text: "Merhaba, dünya."

**Notlar**

* Bu özellik kelime başına bir ücrete tabii olacaktır. O yüzden bütün cümleyi değil değişken olan bölümü `say` yöntemiyle kullanmanı önerilir.

### hangup

Arama anında arayana telefonu kapatır.

### reject

Gelen aramayı hiç açmadan kapatır. Hangup ile arasında temel fark `hangup` görüşme anında kapatırken, `reject` gelen çağrıyı hiç açmadan, çalma aşamasında kapatır.

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

## Kütüphaneler & SDK'lar

* https://github.com/hakanersu/bfxm - Bfxm için BFON yaratan PHP composer paketi.
