# Web Kancaları

Web Kancaları, arama başladığında, sonlandığında ve yeni bir faks geldiğinde tetiklenerek belirlediğiniz adrese bu arama veya faks bilgilerini gönderen sistemdir.

## Kullanım

Web Kancalarını kullanmak için, öncelikle kullanıcı panelinizde `Uygulamalar > Web Kancaları` menüsünden yeni bir web
kancası tanımlamanız gerekmektedir.

Her web kancası sadece 1 santral numarasına bağlı olabilir. Yeni web kancası ekleme formunda, rapor almak istediğiniz
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

* Arama Başlangıcı ve Gelen Faksta
    * **event_type:** Olay tipi (call_init = Arama Başlangıcı, call_hangup = Arama Bitişi, fax_init = Gelen Fax, missing_call = Kaçan Çağrı, call_init_extension = Dahiliye düşen çağrı, call_init_group = Gruba düşen çağrı, call_init_manu = Menüye düşen çağrı)
    * **caller:** Arayan Numara
    * **callee:** Aranan Numara
    * **uuid:** Aramanın benzersiz id'si
    * **direction:** Arama yönü (Gelen arama (IN) veya Giden Arama(OUT))
    * **timestamp:** İşlemin gerçekleştiği zaman

Arama Bitişinde bu parametrelere ek olarak [CDR](https://github.com/bulutfon/documents/blob/master/API/endpoints/cdr.md#arama-kaydı-detayı-Örnek-sonuç) verileri gönderilir.

## Örnek Eventlar

### Arama Başlangıcı

```json
{
  "event_type": "call_init",
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
  "event_type": "call_init_extension",
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
  "event_type": "call_init_group",
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
  "timestamp": 1435762855286302,
  "hangup_cause": "NORMAL_CLEARING",
  "direction": "IN",
  "cdr": {
    "uuid": "f615986c-2001-11e5-bdee-6599352d46ce",
    "bf_calltype": "voice",
    "bf_direction": "IN",
    "bf_caller": 905326200000,
    "bf_callee": 908508850000,
    "call_time": "2015-07-01T18:00:51+03:00",
    "answer_time": "2015-07-01T18:00:51+03:00",
    "hangup_time": "2015-07-01T18:00:55+03:00",
    "call_record": false,
    "hangup_cause": "NORMAL_CLEARING",
    "sip_hangup_disposition": "recv_bye",
    "callflow": [
      {
        "callee": 908508850000,
        "start_time": "2015-07-01T18:00:51+03:00",
        "answer_time": null,
        "hangup_time": null,
        "redirection": "REDIRECTED_TO_MENU",
        "redirection_target": 99
      },
      {
        "callee": 99,
        "start_time": "2015-07-01T18:00:51+03:00",
        "answer_time": "2015-07-01T18:00:51+03:00",
        "hangup_time": "2015-07-01T18:00:55+03:00",
        "redirection": "CONNECTING_TO_MENU"
      }
    ]
  }
}
```

### Gelen Faks

```json
{
  "event_type": "fax_init",
  "caller": 905326200000,
  "callee": 908508850000,
  "uuid": "kkk919b-aaaa-aaaa-bbbb-ccccccfd40ee",
  "direction": "IN",
  "timestamp": 1450458620079404
}
```
### Cevaplanmayan çağrı

```json
{
  "event_type": "missing_call",
  "caller": 90532000000,
  "callee": 908508850000,
  "uuid": "f615986c-2001-11e5-bdee-6599352d46ce",
  "timestamp": 1435762855286302,
  "hangup_cause": "NORMAL_CLEARING",
  "direction": "IN",
}
```

## Videolar

* [Bulutfon Webkancalarına genel bir bakış](https://www.youtube.com/watch?v=R3j9lIF-8GU)
* [Bulutfon Webkancalarının ayarlanması ve çalışma mantığı](https://www.youtube.com/watch?v=ZopGoFXtib8)
* [Bulutfon Webkancalarıyla gelen çağrıların veritabanına kayıt uygulaması](https://www.youtube.com/watch?v=ohqd3EcgJDw)
* [Ngrok'un kurulumu ve kullanımı](https://www.youtube.com/watch?v=bnIs7q_-Olc)

## Örnekler ve Açık Kaynak Projeler

**Örnekler**

* Aramaları HipChatte odaya gönderen PHP uygulaması - https://github.com/bulutfon/documents/tree/master/WEBHOOKS/Examples/Php/Hipchat
