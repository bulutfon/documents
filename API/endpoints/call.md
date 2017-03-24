# Call

Api üzerinden arama gerçekleştirerek dahiliye bağlama işlemi yapar.

## URL'ler

[Liste](http://api.bulutfon.com/docs#!/Originate)

* `POST /call.json` Api üzerinden arama yapıp dahiliye bağlama işlemi yapar.

### Örnek Sonuç
call?access_token=XXX&caller=XXX&callee=XXX&extension=XXX
```json
    {
        "success": true,
        "message": "Arama başarıyla başlatıldı."
    }
```

#### Parametreler

İstek yaparken gönderilmesi gereken parametreler aşağıdaki gibidir.

* Zorunlu Alanlar
    * **caller:** Aramanın gerçekleştirileceği santralinizdeki size ait numara.
    * **callee:** Aranacak numara.
    * **extension:** Aramanın aktarılacağı dahili.

* Opsiyonel Alanlar
    * **timeout:** Arama sırasında beklenecek olan çalma süresi.
