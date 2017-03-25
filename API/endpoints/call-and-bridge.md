# Call & Bridge

Api üzerinden arama gerçekleştirerek menü, grup veya dahiliye bağlama işlemi yapar.

## URL'ler

[Liste](http://api.bulutfon.com/docs#!/Originate)

* `POST /call_and_bridge.json` Api üzerinden arama yapıp menü, grup veya dahiliye bağlama işlemi yapar.

### Örnek Sonuç
call_and_bridge?access_token=XXX&caller=XXX&callee=XXX&destination=XXXX
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
    * **destination:** Aramanın aktarılacağı yer.
        * XX Menüye yönlendir.
        * XXX Gruba yönlendir.
        * XXXX Dahiliye yönlendir.

* Opsiyonel Alanlar
    * **timeout:** Arama sırasında beklenecek olan çalma süresi.
