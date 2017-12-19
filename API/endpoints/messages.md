# MESSAGES

Gönderilen mesajlarınıza ulaşıp, yeni mesaj gönderebileceğiniz endpointtir.

## URL'ler

[Tam Liste](http://api.bulutfon.com/docs#!/Message)

* `GET /messages.json` Gönderilen mesajları  listeler
* `GET /messages/id.json` Id si verilen mesajın detayını listeler.
* `POST /messages.json` API üzerinden mesaj gönderimi sağlar

### Örnek Sonuç

*/messages?access_token=xxx*
*/messages?access_token=xxx&page=2*
*/messages?access_token=xxx&limit=200&page=2*

```json
     {
       "messages": [
         {
           "id": 2,
           "title": "TEST",
           "content": "Test Message",
           "recipients": "905xxxxxxxxx"
           "created_at": "2015-06-18T17:59:19.060+03:00",
           "sent_as_single_sms": true
         },
         {
           "id": 1,
           "title": "TEST",
           "content": "Test Message2",
           "recipients": "905xxxxxxxxx,905xxxxxxxxx"
           "created_at": "2015-06-18T17:51:36.229+03:00",
           "sent_as_single_sms": false
         }
       ],
       "paginate": {
            "total_pages": 12,
            "previous_page": null,
            "next_page": "/messages?access_token=xxx&limit=2&page=2"
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

* **is_future_sms:** İleri tarihli mesaj (boolean)
* **reject_link:** SMS sonuna ret linki ekle.  (boolean)
* **send_date:** İleri tarihli mesajın gönderim tarihi (is_future_sms true olarak setlendiyse eklenmesi zorunludur. Format: "gun/ay/yıl saat:dakika")

değişkenlerinin string olarak **/messages?access_token=xxx** adresine http post ile gönderilmesi gerekmektedir.

**NOT:** 1 saat içerisinde bir numaraya gönderilecek aynı içerikli maksimum sms sayısı 6, farklı içerikli maksimum sms sayısı ise 20'dir. Bu sayıları aştıktan sonraki gönderdiğiniz smsler **spam** olarak algılanıp iletilmeyecektir. Spam filtresine takıldığınız zaman, gönderim yapmaya çalıştığınız numaraya sms atmanız 1 saat süresince engellenecektir.

#### Sabitler

Dönen json içerisindeki bazı alanlarda bulunan değişken anlamları aşağıda verilmiştir.

* State
    * **WAITING:** İletim raporu bekleniyor
    * **FAILED:** İletilemedi
    * **CONFIRMED:** İletildi

### Dönen değerler

* **title:** Mesaj Başlığı
* **content:** Mesaj metni
* **is_planned_sms:** İleri tarihli gönderilen mesaj mı?
* **send_date:** İleri tarihli mesajların gönderileceği zaman
* **created_at:** Oluşturulma zamanı
* **recipients:** Alıcılar
    * **number:** İletilme numara
    * **state:** İletilme durumu
