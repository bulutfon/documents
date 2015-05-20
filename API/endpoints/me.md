# ME
====

Kullanıcınız ve santraliniz hakkındaki bilgilere erişmek için kullanacağınız endpointtir.

## URL'ler
* `GET /me.json`

### Örnek Sonuç

```json
    {
        "user": {
            "email": "mail@mail.com",
            "name": "Ad Soyad",
            "gsm": "902222222"
        },
        "pbx": {
            "name": "santral",
            "url": "santral.bulutfon.net",
            "state": "CONFIRMED",
            "package": "LARGE",
            "customer_type": "CORPORATE"
        },
        "credit": {
            "balance": "300.06"
        }
    }
```

#### Sabitler

Dönen json içerisindeki bazı alanlarda bulunan değişken anlamları aşağıda verilmiştir.

* State
    * **DRAFT:** Taslak
    * **RECANTED:** Vazgeçildi
    * **CONFIRMED:** Onaylandı
    * **CANCEL:** İptal Edildi
    * **SUSPENDED:** Gelen aramalara kapalı
    * **PRETERMINATED:** Bütün aramalara kapalı
    * **TERMINATED:** Borçları nedeniyle kapatıldı

* Package
    * **SMALL:** Giriş Paketi
    * **MIDDLE:** Orta Paket
    * **LARGE:** Büyük Paket

* Customer Type
    * **INVIDUAL:** Bireysel Müşteri
    * **CORPORATE:** Kurumsal Müşteri

### Dönen değerler

* **User:** Kullanıcı bilgilerini içerir
    * **email:** Kullanıcının mail adresi
    * **name:** Kullanıcının ad soyadı
    * **gsm:** Kullanıcının cep telefonu

* **PBX:** Santral bilgilerini içerir
    * **name:** Santral adı
    * **url:** Santral url'i
    * **state:** Santral statüsü
    * **package:** Santral paketi
    * **customer_type:** Müşteri tipi

* **Credit:**
    * **balance:** Kalan kontör miktarı
