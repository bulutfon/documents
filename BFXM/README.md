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
        "text" : "Demir gibi kollarım hiç acımam sollarım."
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

##BFON Direktifleri

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
