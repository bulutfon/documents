# Groups

Gruplarınız hakkında bilgi alabileceğiniz adrestir.

## URL'ler
* `GET /groups.json` Santrale bağlı numaraları gösterir
* `GET /groups/:id.json` Numaraya ait detayları ve varsa mesai saatlerini gösterir

### Örnek Sonuç

**/groups?access_token=xxx**

```json
    {
       "groups":[
          {
             "id":1,
             "number":101,
             "name":"Teknik Destek",
             "timeout":30,
             "delay_time": 0,
             "ring_duration": 30
          },
          {
             "id":2,
             "number":102,
             "name":"Diğer Birimler Mesai İçi",
             "timeout":30,
             "delay_time": 0,
             "ring_duration": 30
          },
          {
             "id":3,
             "number":100,
             "name":"Diğer Birimler Mesai Dışı",
             "timeout":30,
             "delay_time": 0,
             "ring_duration": 30
          },
          {
             "id":4,
             "number":103,
             "name":"İngilizce Bilenler",
             "timeout":30,
             "delay_time": 0,
             "ring_duration": 30
          }
       ]
    }
```

### Detay Örnek Sonuç

**/groups/1?access_token=xxx**

```json
{
   "group":{
      "id":1,
      "number":101,
      "name":"Teknik Destek",
      "timeout":30,
      "extensions":[
         {
            "id":1,
            "number":1015,
            "caller_name":"Ad Soyad",
            "email":"a@bulutfon.com"
         },
         {
            "id":2,
            "number":1009,
            "caller_name":"Ad Soyad",
            "email":"b@bulutfon.com"
         },
         {
            "id":3,
            "number":1008,
            "caller_name":"Ad Soyad",
            "email":"c@bulutfon.com"
         },
         {
            "id":4,
            "number":1004,
            "caller_name":"Ad Soyad",
            "email":"d@bulutfon.com"
         }
      ]
   }
}
```

### Dönen değerler

* **id:** Grup id'si
* **number:** Grup Numarası
* **name:** Grup adı
* **timeout:** Grup zaman aşımı
