# Outgoing Faxes

Bulutfon ile gönderilen faksların listelendiği endpointtir.

## URL'ler

[Tam Liste](http://api.bulutfon.com/docs#!/Outgoing_Fax)

* `GET /outgoing-faxes.json` Gelen faksları listeler
* `GET /outgoing-faxes/id.json` Id si verilen faksın detayını listeler.
* `POST /outgoing-faxes.json` API üzerinden faks gönderimi sağlar

### Örnek Sonuç

*/outgoing-faxes?access_token=xxx*

```json
{
  "faxes": [
    {
      "id": 1,
      "title": "Title1",
      "did": 908508850000,
      "recipient_count": 1,
      "created_at": "2015-03-02T00:17:31.148+02:00"
    },
    {
      "id": 2,
      "title": "Title2",
      "did": 908508850000,
      "recipient_count": 1,
      "created_at": "2015-03-02T22:18:01.951+02:00"
    }
  ]
}
```

### Detay Örnek Sonuç

*/outgoing-faxes/1?access_token=xxx*

```json
{
  "fax": {
    "id": 1,
    "title": "Title1",
    "did": 908508850000,
    "recipient_count": 1,
    "created_at": "2015-03-02T00:17:31.148+02:00",
    "recipients": [
      {
        "number": 908508850000,
        "state": "SENT",
        "hangup_cause": "NORMAL_CLEARING",
        "hangup_state": "send_bye"
      }
    ]
  }
}
```

### Faks Göndermek

Fax göndermek için apiye gönderilmesi gereken parametreler

* **title:** Gönderilecek faksın başlığı
* **receivers:** Gönderilecek faksın alıcıları (birden fazla alıcı var ise virgül ile ayırarak gönderilmelidir)
* **did:** Faksın gönderileceği santral numarası
* **attachment:** Faks olarak gönderilecek belge (pdf, jpeg, png, tiff formatında olabilir)

değişkenlerini string olarak **/outgoing-faxes?access_token=xxx** adresine http post ile gönderilmesi gerekmektedir.

**NOT:** Burada dikkat edilmesi gereken attachment stringi

`'data:' + file_type + ';name:' + filename + ';base64:' + base64_encoded_file`

şeklinde olmalıdır.

Burada file_type değişkeni dosya mime type'ını belirtir (application/pdf, image/png gibi),
filename değişkeni dosya adını belirtir. (abc.pdf)
base64_encoded_file ise dosyanın okunan değerinin base64 decode edilmiş stringidir.

### Sabitler

Dönen json içerisindeki bazı alanlarda bulunan değişken anlamları aşağıda verilmiştir.

* State
    * **SENT:** Gönderildi
    * **FAILED:** Gönderilemedi
    * **WAITING:** Gönderme kuyruğunda

### Dönen değerler

* **id:** Faksın id'si
* **title:** Faksın başlığı
* **did:** Faksın gönderildiği numara
* **recipient_count:** Faksın alıcı sayısı
* **created_at:** Faksın gittiği zaman damgası
* **recipients:** Gönderilen numara bilgileri
    * **number:** Gönderilecek numara
    * **state:** Gönderilme durumu
