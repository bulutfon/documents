# MESSAGE TITLES

Panelden tanımladığınız mesaj başlıklarınızı listeleyebileceğiniz endpointtir.

## URL'ler
* `GET /message-titles.json?access_token=xxx*`

### Örnek Sonuç

```json
    {
      "message_titles": [
        {
          "id": 1,
          "name": "TEST",
          "state": "CONFIRMED"
        },
        {
          "id": 2,
          "name": "TEST2",
          "state": "CONFIRMED"
        },
        {
          "id": 3,
          "name": "TEST3",
          "state": "DRAFT"
        }
      ]
    }
```

#### Sabitler

Dönen json içerisindeki bazı alanlarda bulunan değişken anlamları aşağıda verilmiştir.

* State
    * **DRAFT:** Taslak (Henüz onaylı değil)
    * **REJECTED:** Reddedildi
    * **CONFIRMED:** Onaylandı

### Dönen değerler

* **name:** Tanımlı Mesaj Başlığı
* **state:** Onay durumu
