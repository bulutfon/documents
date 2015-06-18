# MESSAGES

Gönderilen mesajlarınıza ulaşıp, yeni mesaj gönderebileceğiniz endpointtir.

## URL'ler
* `GET /messages.json` Gelen faksları listeler
* `GET /messages/id.json` Id si verilen faksın detayını listeler.
* `POST /messages.json` API üzerinden faks gönderimi sağlar

### Örnek Sonuç

*/messages?access_token=xxx*

```json
     {
       "messages": [
         {
           "id": 2,
           "title": "TEST",
           "content": "Test Message",
           "created_at": "2015-06-18T17:59:19.060+03:00",
           "sent_as_single_sms": true
         },
         {
           "id": 1,
           "title": "TEST",
           "content": "Test Message2",
           "created_at": "2015-06-18T17:51:36.229+03:00",
           "sent_as_single_sms": false
         }
       ]
     }
```

### Detay Örnek Sonuç

*/messages/1?access_token=xxx*

```json
    {
      "message": {
        "id": 1,
        "title": "TEST",
        "content": "Test Message",
        "created_at": "2015-06-18T18:21:01.150+03:00",
        "sent_as_single_sms": false,
        "is_planned_sms": false,
        "send_date": null,
        "recipients": [
          {
            "number": 905322041584,
            "state": "SENT"
          }
        ]
      }
    }
```

### Mesaj Gönderme

Mesaj göndermek için apiye gönderilmesi gereken zorunlu parametreler

* **title:** Mesaj başlığı
* **receivers:** Mesajın alıcıları (birden fazla alıcı var ise virgül ile ayırarak gönderilmelidir)
* **content:** Mesajın içeriği

Opsiyonel parametreler

* **is_single_sms:** 1 mesaj boyutunu aşan mesajlar tek mesaj halinde mi iletilecek? (boolean)
* **is_future_sms:** İleri tarihli mesaj (boolean)
* **send_date:** İleri tarihli mesajın gönderim tarihi (is_future_sms true olarak setlendiyse eklenmesi zorunludur. Format: "gun/ay/yıl saat:dakika")

değişkenlerinin string olarak **/messages?access_token=xxx** adresine http post ile gönderilmesi gerekmektedir.

#### Sabitler

Dönen json içerisindeki bazı alanlarda bulunan değişken anlamları aşağıda verilmiştir.

* State
    * **WAITING:** İletim raporu bekleniyor
    * **FAILED:** İletilemedi
    * **CONFIRMED:** İletildi

### Dönen değerler

* **title:** Mesaj Başlığı
* **content:** Mesaj metni
* **sent_as_single_sms:** Uzun mesajlar tek parça halinde mi iletilecek
* **is_planned_sms:** İleri tarihli gönderilen mesaj mı?
* **send_date:** İleri tarihli mesajların gönderileceği zaman
* **created_at:** Oluşturulma zamanı
* **recipients:** Alıcılar
    * **number:** İletilme numara
    * **state:** İletilme durumu
