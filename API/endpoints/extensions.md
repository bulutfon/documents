# Extensions

Dahilileriniz hakkında bilgi alabileceğiniz adrestir.

## URL'ler
* `GET /extensions.json` Santrale bağlı numaraları gösterir
* `GET /extensions/:id.json` Numaraya ait detayları ve varsa mesai saatlerini gösterir
* `POST /extensions.json` Gönderilen parametreler ile yeni dahili oluşturur.
* `PUT /extensions/:id.json` Gönderilen parametreler ile verilen id ye ait dahiliyi günceller.
* `DELETE /extensions/:id.json` Verilen id ye ait dahiliyi siler.

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
          "voice_mail":true,
          "redirection_type":"UNREACHABLE",
          "destination_type":"EXTENSION",
          "destination_number":1000,
          "external_number":null,
          "acl":[
             "domestic",
             "gsm",
             "international"
          ]
       }
    }
```

### Dahili Oluşturma ve Güncelleme

#### Dahili oluşturma için gerekli parametreler,

* **full_name:** Dahiliyi kullanacak kişinin adı soyadı (Zorunlu alan)
* **email:** Dahiliyi kullanacak kişinin email adresi (Zorunlu alan)
* **did:** Dahilinin dış aramalarda kullanacağı telefon numarası (Zorunlu alan)
* **number:** Dahili numarası (Zorunlu alan)
* **voicemail:** Sesli mesaj kutusunun aktif olup olmayacağı (Opsiyonel, varsayılan olarak pasif)
* **redirection_type:** Yönlendirme yapılacak ise şartı (Zorunlu alan Alabileceği değerler: **NONE, UNREACHABLE, ALWAYS**)
* **destination_type:** Yönlendirme yapılacak ise yönlendirileceği hedef (redirection_type NONE dışında bir değer ise zorunlu, alabileceği değerler: **EXTENSION, GROUP, AUTOATTENDANT, EXTERNAL**)
* **destination_number:** Yönlendirme yapılacak ise yönlendirileceği numara (destination_type EXTERNAL dışında bir değer ise zorunlu)
* **external_number:** Yönlendirme yapılacak ise dış numara (destination_type EXTERNAL ise zorunlu)
* **acl:** Array olarak dahilinin arama yetkileri

Bu parametreleri json formatında */extensions/?access_token=xxx* adresine post ettiğiniz taktirde dahiliniz oluşturulacaktır.

#### Dahili güncelleme

Dahili oluştururken kullandığınız parametreleri kullanarak güncelleme yapabilirsiniz. Güncelleme sırasında zorunlu parametre yoktur. Göndermediğiniz değerler değiştirilmeden bırakılacaktır.

### Sabitler

Dönen json içerisindeki bazı alanlarda bulunan değişken anlamları aşağıda verilmiştir.

* Destination Type
    * **Auto attendant:** Menü
    * **Group:** Grup
    * **Extension:** Dahili

* Redirection Type
    * **NONE:** Hiçbir zaman
    * **UNREACHABLE:** Ulaşılamadığında
    * **ALWAYS:** Her zaman

### Dönen değerler

* **id:** Dahilinin id'si
* **number:** Dahilinin Numarası
* **registered:** Dahilinin bir cihaz ile giriş yapıp yapmadığı
* **caller_name:** Dahiliyi kullanan kişinin adı soyadı
* **email:** Dahiliyi kullanan kişinin email adresi
* **did:** Dahilinin bağlı bulundupu santral numarası
* **voice_mail:** Sesli mesaj aktif mi?
* **redirection_type:** Varsa yönlendirme koşulu
* **destination_type:** Varsa yönlendirme tipi
* **destination_number:** Varsa yönlendirme numarası
* **external_number:** Varsa yönlendirilecek dış numara
* **acl:** Dahilinin arama yetkileri
