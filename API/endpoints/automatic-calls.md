# Automatic Calls

Bulutfon ile gönderilen otomatik aramaların listelendiği, ve yeni otomatik arama oluşturulabilen endpointtir. endpointtir.

## URL'ler

* `GET /automatic-calls.json` Otomatik aramaları listeler
* `GET /automatic-calls/id.json` Id si Otomatik aramaları.
* `POST /automatic-calls.json` API üzerinden otomatik arama gönderimi sağlar

### Örnek Sonuç

*/automatic-calls?access_token=xxx*

```json
{
  "automatic_calls": [
    {
      "id": 1,
      "title": "Anket1",
      "did": 908508850000,
      "announcement": "Anket1",
      "gather": true,
      "created_at": "2015-06-03T17:00:49.799+03:00"
    },
    {
      "id": 2,
      "title": "Anket2",
      "did": 908508850000,
      "announcement": "Anket2",
      "gather": true,
      "created_at": "2015-06-03T17:04:20.667+03:00"
    }
  ]
}
```

### Detay Örnek Sonuç

*/automatic-calls/1?access_token=xxx*

```json
{
  "automatic_call": {
    "id": 2,
    "title": "Anket2",
    "did": 908508850000,
    "announcement": "Anket2",
    "gather": true,
    "created_at": "2015-06-03T17:04:20.667+03:00",
    "call_range": {
      "monday": {
        "active": true,
        "start": "09:00",
        "finish": "18:00"
      },
      "tuesday": {
        "active": true,
        "start": "09:00",
        "finish": "18:00"
      },
      "wednesday": {
        "active": true,
        "start": "09:00",
        "finish": "18:00"
      },
      "thursday": {
        "active": true,
        "start": "09:00",
        "finish": "18:00"
      },
      "friday": {
        "active": true,
        "start": "09:00",
        "finish": "18:00"
      },
      "saturday": {
        "active": true,
        "start": "09:00",
        "finish": "18:00"
      },
      "sunday": {
        "active": true,
        "start": "09:00",
        "finish": "18:00"
      }
    },
    "recipients": [
      {
        "number": 905322222222,
        "has_called": true,
        "gather": 2
      },
      {
        "number": 905323333333,
        "has_called": true,
        "gather": 4
      },
      {
        "number": 905324444444,
        "has_called": true,
        "gather": 1
      }
    ]
  }
}
```

### Yeni otomatik arama başlatmak

Otomatik arama başlatmak için apiye zorunlu olarak gönderilmesi gereken parametreler

* **title:** Otomatik arama başlığı
* **receivers:** Otomatik aramanın alıcıları (birden fazla alıcı var ise virgül ile ayırarak gönderilmelidir)
* **did:** Otomatik aramanın gönderileceği santral numarası
* **announcement_id:** Aranınca çalınacak ses dosyasının id'si

Bunların yanısıra gönderilebilecek opsiyonel parametler de,

* **gather:** Kullanıcının bastığı tuşun kayıt edilip edilmeyeceğini belirtir. Varsayılan olarak `true` dur
* **{gün}_active:** O gün arama yapılıp yapılamayacağını belirtir. Varsayılan olarak `true` dur. `{gün}` yerine gelebilecek değerler mon,tue, wed, thu, fri, sat, sun. (ör: fri_active)
* **{gün}_start:** O gün arama yapılabilecek aralığın başlama saatidir. Varsayılan olarak `09:00` dur. `{gün}` yerine gelebilecek değerler mon,tue, wed, thu, fri, sat, sun. (ör: fri_start)
* **{gün}_finish:** O gün arama yapılabilecek aralığın başlama saatidir. Varsayılan olarak `18:00` dir. `{gün}` yerine gelebilecek değerler mon,tue, wed, thu, fri, sat, sun. (ör: fri_finish)

değişkenlerini string olarak **/automatic-calls?access_token=xxx** adresine http post ile gönderilmesi gerekmektedir.

**NOT:**

Yapılacak aramaların tamamı aynı anda başlatılmayıp sıra ile yapılacağı için, aranabilir saat aralıklarına dikkat etmeniz önemli olabilir.

### Dönen değerler

* **id:** Otomatik arama id'si
* **title:** Otomatik arama başlığı
* **did:** Otomatik aramanın başlatıldığı numara
* **announcement:** Okunacak dosya adı
* **gather:** Kullanıcının bastığı tuşlar kaydedilecek mi?
* **created_at:** Oluşturulma tarihi
* **call_range:** Aramaların yapılabileceği günler ve saat aralıkları.
    * **active:** O gün aranabilir mi?
    * **start:** Aramaya başlama saati
    * **finish:** Arama bitiş saati
* **recipients:** Aranan numara bilgileri.
    * **number:** Aranan numara
    * **has_called:** Çağrı başarılı mı
    * **gather:** Aranan kişi bir tuşa bastıysa basılan tuş
