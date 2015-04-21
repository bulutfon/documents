# Extensions
============

Dahilileriniz hakkında bilgi alabileceğiniz adrestir.

## URL'ler
* `GET /extensions.json` Santrale bağlı numaraları gösterir
* `GET /extensions/:id.json` Numaraya ait detayları ve varsa mesai saatlerini gösterir

### Örnek Sonuç

*/extensions?access_token=xxx*

```json
    {
       "extensions":[
          {
             "id":1,
             "number":1001,
             "registered":true,
             "caller_name":"Ad Soyad",
             "email":"a@bulutfon.com"
          },
          {
             "id":2,
             "number":1001,
             "registered":false,
             "caller_name":"Ad Soyad",
             "email":"b@bulutfon.com"
          },
          {
             "id":3,
             "number":1002,
             "registered":true,
             "caller_name":"Ad Soyad",
             "email":"c@bulutfon.com"
          }
       ]
    }
```

### Detay Örnek Sonuç

*/extensions/1?access_token=xxx*

```json
    {
       "extension":{
          "id":1,
          "number":1000,
          "registered":false,
          "caller_name":"Ad Soyad",
          "email":"a@bulutfon.com",
          "did":"900000000000",
          "acl":[
             "domestic",
             "gsm",
             "international"
          ]
       }
    }
```

### Sabitler

Dönen json içerisindeki bazı alanlarda bulunan değişken anlamları aşağıda verilmiştir.

* State
    * **DRAFT: ** Taslak
    * **IN-PROGRESS:** İşleme alındı
    * **CONFIRMED:** Onaylandı
    * **CANCELED:** Vazgeçildi
    * **TERMINATED:** Kapatıldı
    * **NTS-DRAFT:** NTS ile taşıma taslak
    * **NTS-IN-PROGRESS:** NTS işleniyor
    * **NTS-CANCEL:** NTS vazgeçildi

* Destination
    * **Auto attendant:** Menü
    * **Group:** Grup
    * **Extension:** Dahili