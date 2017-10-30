# BFON - BulutFon Object Notation

BFON, Bulutfon tarafından belirlenen bir [JSON](http://www.json.org/) standartıdır. BFON ile geliştiriciler Bulutfon'a görüşme anında telefonu kapatma, belli bir ses dosyasını okuma, basılan tuşları algılama gibi işlemleri yaptırtabilirler.

Response ile birlikte döndürülen **BFON**'un (json) bütün parametreleri tam ve eksiksiz olarak doldurulmalıdır.

## Methodlar

* [play](#play)
* [gather](#gather)
* [dial](#dial)
* [continue](#continue)
* [say](#say) (yakında eklenecek)
* [hangup](#hangup)
* [reject](#reject)
* [set_caller](#set_caller)
* [return_data](#return_data)
* [sleep](#sleep)

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
* timeout: 5000
* ask: "http://192.168.1.1:8000/test.mp3",
* play_on_error: "http://192.168.1.1:8000/test.mp3",
* variable_name: "testvar"

Timeout parametresi opsiyonel olup, kullanıcının tuşa bastıktan sonra, diğer tuşlamayı ne kadar bekleyeceğini `milisaniye` cinsinden belirtir. Varsayılan değeri `5000` milisaniyedir (5 saniye). Örnekteki gibi kullanıcıdan, belli bir aralıkta değer alacaksanız, arayan kişi `#`'yi tuşlayarak bu süreyi beklemeden girdi işlemini sonlandırabilir. Örneğin, yukarıdaki gibi minimum 2, maksimum 5 karakter uzunluğundaki değerde, kullanıcı her tuşlamasının ardından 5 sn bir sonraki değeri girmesi için beklenir, kullanıcı 5 karakter tuşladıysa veya bekleme süresi dolduysa tuşladığı değer size iletilir. Fakat kullanıcının gireceği değer 3 karakter ise istenen değeri tuşladıktan sonra `#`'ye basarak işleme devam edebilir.

### dial

Arayanı menüye, gruba, dahiliye veya harici bir numaraya yönlendirir. 

**args**

* destination: "1000"
* hide_cli_on_diversion : "true"

**Notlar**

* Bulutfon'da menüler 2 haneli, gruplar 3 haneli, dahililer 4 hanelidir.
* Harici numaralara yönlendirmede aranan operatöre göre bir yönlendirme ücreti alınır.
* hide_cli_on_diversion false olarak gönderilirse, yönlendirmelerde arayanın numarası görünür.

### continue

Arama planı kaldığı yerden devam eder. Harici yönetim adresine tekrar istek yapar.

### say (yakında eklenecek)

Şuan sistemde text to speech özelliği yoktur.

**args**

* lang: "tr",
* voice: "woman",
* text: "Merhaba, dünya."

**NOT**: Bu method şuan desteklenmiyor. Bunun yerine her hangi bir TTS sistemi kullanarak play methodunu kullanabilirsiniz.

**Notlar**

* Bu özellik kelime başına bir ücrete tabii olacaktır. O yüzden bütün cümleyi değil değişken olan bölümü `say` yöntemiyle kullanmanız önerilir.

### hangup

Arama anında arayana telefonu kapatır.

### reject

Gelen aramayı hiç açmadan kapatır. Hangup ile arasında temel fark `hangup` görüşme anında kapatırken, `reject` gelen çağrıyı hiç açmadan, çalma aşamasında kapatır.

### set_caller

Santral kullanıcılarına aktarılan çağrılar için özel arayan bilgisi tanımlanmasını sağlar.

**args**

caller_name : String formatında arayan bilgisi

### return_data

Bu method ile bir sonraki istekte bize geri dönülmesini istediğimiz datayı belirleyebiliriz. Bu method ile birden fazla adım içeren çağrı planlarında, oturum mantığı tanımlanabilir.

**args**

value : String formatında bir değerdir. Eğer array veya kullanılmak istenirse ilgili kullanılacak dilin decode ve encode methodlarına bakılabilir.

### sleep

Bu method ile görüşme esnasında bekleme yaptırabilirsiniz. 

**args**

timeout: Ne kadar beklenmesi gerektiğini saniye olarak belirtebilirsiniz.

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
            "action": "sleep",
            "args": {
                "timeout": "60"
            }
        },
        {
            "action": "hangup"
        },
        {
            "action": "continue"
        },
        {
            "action": "set_caller_name",
            "args": {
                "caller_name": "ABC İnşaat Firması"
            }
        }
           
    ]
 }
```

## Kütüphaneler & SDK'lar

* https://github.com/hakanersu/bfxm - Bfxm için BFON yaratan PHP composer paketi.
