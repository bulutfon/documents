#BFXM(BulutFon eXternal Manager)

Bulutfon, harici bir web sunucusundan BFON formatında alacağı direktif dosyaları ile pbx davranışlarını düzenleyebilir. Bu özelliğe BFXM diyoruz. 

Kullanıcılar, panellerindeki uygulamalar menüsünden yeni bir BFXM oluşturup, çağrı geldiği anda kendi belirledikleri bir urlye istek yaptırabilirler. İstek bir HTTP POST isteğidir. Kullanıcı diler ise bu isteğin HTTP Basic Auth olarak yapılmasını sağlayabilir.

POST isteğinde BFXM şu parametreleri gönderir.
 - "uuid" : Çağrı için universally unique identifier. Bu değer daha sonra raporlamalarda çağrıyı bulmak için de kullanılabilir.
 - "caller" : Çağrıyı başlatan numara
 - "callee" : Çağrıyı alan numara
 - "step" : İterasyon işlemlerinde adım sayısı

BFXM in web sunucudan beklediği örnek BFON dökümanı şu şekilde olabilir.

```json
{
  "bfxm" : {
    "version" : 1
  },
  "seq" : [
    {
      "action" : "play",
      "args" : {
        "url" : "http://192.168.123.34:8000/test.mp3"
      }
    },
    {
      "action" : "say",
      "args" : {
        "lang" : "tr",
        "text" : "Merhaba dünya."
      }
    },
    {
      "action" : "set_caller_name",
      "args" : {
       "caller_name" : "ABC İnşaat Firması"
      }
    },
    {
      "action" : "dial",
      "args" : {
        "destination" : "1000"
      }
    },
  ]
}
```

## BFON Direktifleri

### play
Mp3 formatında, kullanıcı tarafında host edilen dosyayı çalar

##### Parametreleri
 - url : Çalılnacak dosyanın urli


### reject
Çağrıyı reddeder.

### hangup
Cevaplanmış bir çağrıyı sonlandırır.

### dial
Santraldeki bir numarya yönlendirir.

##### Parametreleri
 - destination : menü, grup ya da dahili numarası

### gather
Kullanıcıdan bir girdi tuşlatır. Gather methodu kullanıldığında, BFON dosyasının tamamı işlenince, sistem tekrar istek yapar ve istekte cevabın atandığı değişken de post edilir. Bu istekte step değişleni bir artırılarak gelir.

##### Parametreleri

  - min_digits : En az tuşlanacak sayı adedi
  - max_digits : En çok tuşlanacak sayı adedi
  - max_attempts : En fazla hata adedi
  - ask : Sorulacak sorunun mp3 ses kaydı urlsi.
  - play_on_error : Hata durumunda çalınacak mp3 ses kaydı urlsi.
  - variable_name : verilen cevabın atanacağı değişken. 

### say
Parametrelerde gönderilen metni karşı arayana okur. 

##### Parametreleri
  - lang : Dil (tr,en)
  - text : Okunacak metin

### set_caller_name
Santral kullanıcılarına aktarılan çağrılarda özel arayan bilgisi tanımlar.

##### Parametreleri
  - caller_name : String olarak arayan bilgisi
 
## Kütüphaneler & SDK'lar

* [https://github.com/hakanersu/bfxm](https://github.com/hakanersu/bfxm) - Bfxm için BFON yaratan PHP composer paketi.

## Örnekler ve Açık Kaynak Projeler

**Örnekler**

* Numara Engelleme Örneği - Arayan numara eğer karalisteyse engelleyen bir BFXM projesidir. [Youtube videosunu](https://www.youtube.com/watch?v=4DeFu8JvG3o) izleyebilir ve [örnek kodları](https://github.com/bulutfon/documents/tree/master/BFXM/Examples/php-numara-engelleme) inceleyebilirsiniz.
* Basılan tuşu txt dosyasına yazan ASP.NET uygulaması - https://github.com/bulutfon/documents/tree/master/BFXM/Examples/ASP.NET
* Basılan tuşu txt dosyasına yazan PHP uygulaması - https://github.com/bulutfon/documents/tree/master/BFXM/Examples/Php

**Açık Kaynak Projeler**

* [netinternet/bfxm-whmcs](https://github.com/netinternet/bfxm-whmcs) - [Netinternet](netinternet.com.tr) firmasının geliştirdiği [Whmcs](www.whmcs.com), [Hipchat](www.hipchat), BFXM uygulaması. Arayan müşterinin son beş destek talebini hipchatte gösteriyor.
* [bulutfon-apps/notifications-for-permit](https://github.com/bulutfon-apps/notifications-for-permit) - [Ahmet İlhan](https://github.com/ahmetilhann)'in geliştirdiği arayan kişilerden bildirim izinleri alarak izinli ve izinsiz listesi oluşturan bir proje.

## Eğitim Videoları

* [BFXM ile Numara Engelleme Örneği](https://www.youtube.com/watch?v=4DeFu8JvG3o&feature=youtu.be)

## Daha iyisi yapmamız için geri bildirimde bulunun!

Lütfen bizlere daha iyi bir API'yi nasıl yapacağımızı söyleyin, geri bildirimde bulunun. Eğer API'de bir özelliğe ihtiyacınız varsa veya bir hata bulduysanız, lütfen [geliştirici formuna](http://devforums.bulutfon.com/) konu açın.

