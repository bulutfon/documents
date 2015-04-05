# BFXM - BulutFon eXternal Manager

**NOT** : BFXM şuan beta aşamasındadır. Bu özelliği aktif ettirmek için dev @ bulutfon.com email adresine email atınız.

Bulutfon, harici bir web sunucusundan BFON formatında alacağı direktif dosyaları ile pbx davranışlarını düzenleyebilir. Bu özelliğe BFXM diyoruz. 

## Genel Bilgi

Kullanıcılar, panellerindeki uygulamalar menüsünden yeni bir BFXM oluşturup, çağrı geldiği anda kendi belirledikleri bir urlye istek yaptırabilirler. İstek bir HTTP POST isteğidir. 

POST isteğinde BFXM şu parametreleri gönderir.
 - "uuid" : Çağrı için universally unique identifier. Bu değer daha sonra raporlamalarda çağrıyı bulmak için de kullanılabilir.
 - "caller" : Çağrıyı başlatan numara
 - "callee" : Çağrıyı alan numara
 - "step" : İterasyon işlemlerinde adım sayısı

BFXM in web sunucudan beklediği örnek BFON dökümanı şu şekilde olabilir.

```json
{
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
      "action" : "dial",
      "args" : {
        "destination" : "1000"
      }
    },
  ]
}
```

## BFXM'i Aktifleştirme

1. **Uygulamalar** > **BulutfonXM** seçilir.
2. Uygulama ismi, url girilir. Eğer doğrulama istenirse kullanıcı adı ve şifrede girilir.
3. BulutfonXM kullanılacak numara seçimi için **Ayarlar** > **Santral Numaraları** menüsünden ilgili numara seçilir.
4. Varsayılan hedef olarak **BulutfonXM** seçilip, ilgili uygulama seçilir.

## Doğrulama

* Http Basic Authentication yöntemi kullanılacaktır.
* Kullanıcı adı ve şifrenizi Bulutfon santral panelinizden girmelisiniz.

## BFON Direktifleri

Daha detaylı bilgi için [BFON](https://github.com/bulutfon/documents/blob/master/BFON/README.md) adresine bakabilirsiniz.

 - play : mp3 formatında, kullanıcı tarafında host edilen dosyayı çalar
  - url : Çalılnacak dosyanın urli
 - reject : çağrıyı reddeder.
 - hangup : cevaplanmış bir çağrıyı sonlandırır.
 - dial : santraldeki bir numarya yönlendirir.
  - destination : menü, grup ya da dahili numarası
 - gather : kullanıcıdan bir girdi tuşlatır. Gather methodu kullanıldığında, BFON dosyasının tamamı işlenince, sistem tekrar istek yapar ve istekte cevabın atandığı değişken de post edilir. Bu istekte step değişleni bir artırılarak gelir.
  - min_digits : En az tuşlanacak sayı adedi
  - max_digits : En çok tuşlanacak sayı adedi
  - max_attempts : En fazla hata adedi
  - ask : Sorulacak sorunun mp3 ses kaydı urlsi.
  - play_on_error : Hata durumunda çalınacak mp3 ses kaydı urlsi.
  - variable_name : verilen cevabın atanacağı değişken. 
 - say : Bir test okur
  - lang : tr,en
  - text : okunacak metin
