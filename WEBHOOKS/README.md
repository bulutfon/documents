# Web Kancaları

Web Kancaları, arama başladığında, sonlandığında ve yeni bir faks geldiğinde tetiklenerek belirlediğiniz adrese bu arama veya faks bilgilerini gönderen sistemdir.

## Kullanım

Web Kancalarını kullanmak için, öncelikle kullanıcı panelinizde `Uygulamalar > Web Kancaları` menüsünden yeni bir web
kancası tanımlamanız gerekmektedir.

Her web kancası sadece bir santral numarasına bağlı olabilir. Yeni web kancası ekleme formunda, rapor almak istediğiniz
santral numarasını, isteğin gönderileceği url'i, kancanın hangi aksiyonlarda tetikleneceğini, istek formatını
(json veya x-www-form-urlencoded olarak) ve varsa http basic authentication bilgilerinizi girdikten sonra Web Kancası ekle diyerek,
web kancasını oluşturabiliriz.

Web kancasını oluşturduktan sonra aksiyonlarla ilgili parametreler verdiğiniz adrese POST edilecektir.

**Not**: Değerlerin POST olarak elde edilmesi için web kancası oluşturulurken x-www-form-urlencoded seçeneğinin seçilmesi gereklidir. Diğer durumda Bulutfon değerleri JSON formatında POST etmektedir.

## Eventlar

WebHook ile tetiklenebilecek olaylar;

 * Arama Başlangıcı
 * Arama Bitişi
 * Gelen Faks
 * Cevaplanmayan çağrı
 * Dahiliye düşen çağrı
 * Gruba düşen çağrı
 * Menüye düşen çağrı

Bu eventların bir ya da birden fazlası seçilebilir

## Gönderilecek parametreler

* Tum isteklerde gelecek ortak parametreler şunlardır.
  * **event_type**: Olay tipi (call_init = Arama Başlangıcı, call_hangup = Arama Bitişi, fax_init = Gelen Fax, missing_call = Kaçan Çağrı, call_init_extension = Dahiliye düşen çağrı, call_init_group = Gruba düşen çağrı, call_init_manu = Menüye düşen çağrı)
  * **domain_id**: Santralinize ait Bulutfon ID bilgisi. Tek santrali olan müşterilerimiz burada hep aynı kodu göreceklerdir.
  * **account_id**: Bulutfon CRM hesap kodunuz. 
  * **caller**: Arayan Numara
  * **callee**: Aranan Numara
  * **uuid**: Aramanın benzersiz id'si
  * **direction**: Arama yönü (Gelen arama (IN) veya Giden Arama(OUT))
  * **timestamp**: İşlemin gerçekleştiği zaman damgası. Unix epoch time formatındadır.

* API vasıtası ile başlatılan otomatik çağrılarda yukarıdaki bilgilere ek olarak şu bilgiler gelir.
  * **autodial**: otomatik çağrı olduğunu belirten true değeri gelir.
  * **additional_data**: API ile çağrı başlatırken belirlediğiniz sisteminize özel bilgi. Kullanıcılarımız bu kısmı sistemlerindeki kayıtlar ile çağrıları eşleştirmek için kullanabilirler.API isteğinde belirtilmemiş ise Null dönecektir.
  * **callback_url**: API isteği sırasında bu çağrıya özel olarak belirlenen callback_url bilgisi. API isteğinde belirtilmemiş ise Null dönecektir.

* Çağrı bitiminde gelen eventlere özel olarak aşağıdaki bilgiler payloada eklenecektir.
  * **talk_duration**: Saniye cinsinden çağrının konuşulma süresidir. Sıfır olması, görüşme olmadığı anlamına gelir. Karşılama menüleri çağrıları cevapladığı için menü dinlenmesi de konuşma süresi sayılacaktır.
  * **hangup_cause**: Çağrının Q.850 spesifikasyonu formatında release kodudur. https://www.itu.int/rec/T-REC-Q.850/ Pratikte sistem tarafından görüşme yapılmasından bağımsız olarak sorunsuz işlenen her çağrı için NORMAL_CLEARING olarak gelecektir.
  * **hangup_detail**: Çağrıyı başlatan kişiye göre çağrının sonlanma şekli. Görüşme `send_bye` ise aranan tarafından, `recv_bye` ise arayan tarafından kapatıldığını belirtir. `send_refuse` çağrının reddeildiğini belirtir.
  * **result_disposition**: Çağrı başarı ile başka bir dahiliye ya da aranan numaraya bağlandı ise `SUCCESS` mesajı alınır. Aksi durumda boş dönecektir.
  * **cdr_url**: Çağrının panelinizdeki CDR kaydının linki.
  * **cdr_api_url**: Çağrı bilgilerine API ile ulaşmak için kullanacağınız URL.

* Dahili, grup ve menülere düşen çağrılara ait isteklerde `destination` parametresi ile ilgili hedefin numarası dönülür.
## Örnek Eventlar

### Arama Başlangıcı

```json
{
  "event_type": "call_init",
  "domain_id": 1234,
  "account_id": 5678,
  "caller": 90532000000,
  "callee": 908508850000,
  "uuid": "f615986c-2001-11e5-bdee-6599352d46ce",
  "direction": "IN",
  "timestamp": 1435762851086820
}
```


### Dahiliye Düşen Çağrı

```json
{
  "event_type": "incoming_call_extension",
  "domain_id": 1234,
  "account_id": 5678,
  "caller": 90532000000,
  "callee": 908508850000,
  "uuid": "f615986c-2001-11e5-bdee-6599352d46ce",
  "direction": "IN",
  "timestamp": 1435762851086820,
  "destination": 1000
}
```

### Gruba Düşen Çağrı

```json
{
  "event_type": "incoming_call_group",
  "domain_id": 1234,
  "account_id": 5678,
  "caller": 90532000000,
  "callee": 908508850000,
  "uuid": "f615986c-2001-11e5-bdee-6599352d46ce",
  "direction": "IN",
  "timestamp": 1435762851086820,
  "destination": 111
}
```

### Menüye Düşen Çağrı

```json
{
  "event_type": "call_init_menu",
  "domain_id": 1234,
  "account_id": 5678,
  "caller": 90532000000,
  "callee": 908508850000,
  "uuid": "f615986c-2001-11e5-bdee-6599352d46ce",
  "direction": "IN",
  "timestamp": 1435762851086820,
  "destination": 10
}
```

### Arama Bitişi

```json
{
  "event_type": "call_hangup",
  "caller": 90532000000,
  "callee": 908508850000,
  "uuid": "f615986c-2001-11e5-bdee-6599352d46ce",
  "timestamp": 1614261582000000,
  "hangup_cause": "NORMAL_CLEARING",
  "direction": "IN",
  "talk_duration": 35,
  "hangup_cause": "NORMAL_CLEARING",
  "hangup_detail": "send_bye",
  "result_disposition": "SUCCESS",
  "cdr_url": "https://oim.bulutfon.com/account/pbx/call-records/2021/02/25/f615986c-2001-11e5-bdee-6599352d46ce",
  "cdr_api_url": "https://api.bulutfon.com/v2/cdr/2021/02/25/f615986c-2001-11e5-bdee-6599352d46ce"
}
```

### Gelen Faks

```json
{
  "event_type": "fax_init",
  "domain_id": 1234,
  "account_id": 5678,
  "caller": 90532000000,
  "callee": 908508850000,
  "uuid": "f615986c-2001-11e5-bdee-6599352d46ce",
  "direction": "IN",
  "timestamp": 1435762851086820
}
```
### Cevaplanmayan çağrı

```json
{
  "event_type": "missing_call",
  "domain_id": 1234,
  "account_id": 5678,
  "caller": 90532000000,
  "callee": 908508850000,
  "uuid": "f615986c-2001-11e5-bdee-6599352d46ce",
  "direction": "IN",
  "timestamp": 1435762851086820
}
```

## Videolar

* [Bulutfon Webkancalarına genel bir bakış](https://www.youtube.com/watch?v=R3j9lIF-8GU)
* [Bulutfon Webkancalarının ayarlanması ve çalışma mantığı](https://www.youtube.com/watch?v=ZopGoFXtib8)
* [Bulutfon Webkancalarıyla gelen çağrıların veritabanına kayıt uygulaması](https://www.youtube.com/watch?v=ohqd3EcgJDw)
* [Ngrok'un kurulumu ve kullanımı](https://www.youtube.com/watch?v=bnIs7q_-Olc)

