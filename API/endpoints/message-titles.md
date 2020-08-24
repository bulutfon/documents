# MESSAGE TITLES (KULLANIMDAN KALDIRILDI)

-------

**Önemli NOT:** Bulutfon SMS hizmeti vermeyi 31/12/2020 tarihi itibariyle sonlandıracaktır. Bu bağlamda 31/12/2020 itibariyle bu endpoint kullanımdan kaldırılacaktır.

-------

MESSAGE TITLES, SMS başlığını ifade etmektedir. SMS Başlıkları panelden bir dilekçe ile başvurulur. Başlılar Onay Bekleniyor (DRAFT), Onaylı (CONFIRMED), Red edildi (REJECTED) şeklindedir. **Sadece onaylı SMS başlığıyla SMS gönderebilirsiniz.** .

## URL'ler

[Liste](http://api.bulutfon.com/docs#!/Message_Title)

* `GET /message-titles.json?access_token=xxx*`
* `GET /message-titles/{message_title}/sms-rejections.json?access_token=xxx*`
* `DELETE /message-titles/{message_title}/sms-rejections/{number}.json?access_token=xxx*`

### Örnek Sonuç
*message-titles.json?access_token=xxx*
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
### Örnek Sonuç (Kara Liste)
*message-titles/{message_title}/sms-rejections.json?access_token=xxx*
```json
{
    "sms_rejections": [
        {
            "number": "905068118260",
            "sms_sent_at": "2017-12-15T12:02:26.212+03:00",
            "rejected_at": "2017-12-15T12:02:56.793+03:00"
        }
    ]
}
```
### Örnek Sonuç (Kara Listeden Numara Çıkarma)
*message-titles/{message_title}/sms-rejections/{number}.json?access_token=xxx*
```json
{
    "message": "Numara kara listeden kaldırıldı."
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
