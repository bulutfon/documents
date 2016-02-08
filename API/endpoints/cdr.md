### CDR

Arama kayıtları ile ilgili işlemleriniz için bu scope'a istek yapmanız gerekmektedir.

#### URL'ler

[Tam liste](http://api.bulutfon.com/docs#!/CDR)

* `GET /cdrs.json` Santrale ait arama kayıtlarını geri döndürür
* `GET /cdrs/uuid.json` Arama Kaydının detayını döndürür

#### Arama Kaydı Örnek Sonuç

```json
{
  "cdrs": [
    {
      "uuid": "87f444b4-fd56-11e4-acd8-ffc986c99ca0",
      "bf_calltype": "voice",
      "direction": "OUT",
      "caller": 908508850000,
      "callee": 905323440000,
      "extension": 908508850249,
      "call_time": "2015-05-18T15:08:01+03:00",
      "answer_time": "2015-05-18T15:08:13+03:00",
      "hangup_time": "2015-05-18T15:08:20+03:00",
      "call_price": 0.01143,
      "call_record": "Yok",
      "hangup_cause": "NORMAL_CLEARING",
      "hangup_state": "send_bye"
    },
    {
      "uuid": "7f13c2fc-fd56-11e4-ac8a-ffc986c99ca0",
      "bf_calltype": "voice",
      "direction": "OUT",
      "caller": 908508850000,
      "callee": 905326200000,
      "extension": 908508850249,
      "call_time": "2015-05-18T15:07:46+03:00",
      "answer_time": "2015-05-18T15:07:58+03:00",
      "hangup_time": "2015-05-18T15:08:01+03:00",
      "call_price": 0.00429,
      "call_record": "Yok",
      "hangup_cause": "NORMAL_CLEARING",
      "hangup_state": "recv_bye"
    },
    {
      "uuid": "76c702b2-fd56-11e4-ac58-ffc986c99ca0",
      "bf_calltype": "voice",
      "direction": "OUT",
      "caller": 908508850000,
      "callee": 905073010000,
      "extension": 908508850249,
      "call_time": "2015-05-18T15:07:32+03:00",
      "answer_time": "2015-05-18T15:07:43+03:00",
      "hangup_time": "2015-05-18T15:07:49+03:00",
      "call_price": 0.00888,
      "call_record": "Yok",
      "hangup_cause": "NORMAL_CLEARING",
      "hangup_state": "send_bye"
    }
  ],
  "pagination": {
    "page": 1,
    "total_count": 236,
    "total_pages": 79,
    "limit": 3,
    "previous_page": null,
    "next_page": "https://api.bulutfon.com/cdrs?page=2"
  }
}
```

#### Arama Kaydı Detayı Örnek Sonuç

```json
    {
      "cdr": {
        "uuid": "dd3b3506-e40e-11e4-9880-17aee3ce4e7b",
        "bf_calltype": "voice",
        "direction": "IN",
        "caller": 905070000000,
        "callee": 908508850000,
        "call_time": "2015-04-16T11:02:02+03:00",
        "answer_time": "2015-04-16T11:02:02+03:00",
        "hangup_time": "2015-04-16T11:04:44+03:00",
        "call_record": "YES",
        "hangup_cause": "NORMAL_CLEARING",
        "hangup_state": "recv_bye",
        "call_flow": [
          {
            "callee": 908508850000,
            "start_time": "2015-04-16T11:02:02+03:00",
            "answer_time": null,
            "hangup_time": null,
            "redirection": "REDIRECTED_TO_MENU",
            "redirection_target": 10
          },
          {
            "callee": 10,
            "start_time": "2015-04-16T11:02:02+03:00",
            "answer_time": "2015-04-16T11:02:02+03:00",
            "hangup_time": null,
            "redirection": "REDIRECTED_TO_MENU",
            "redirection_target": 11
          },
          {
            "callee": 11,
            "start_time": "2015-04-16T11:02:02+03:00",
            "answer_time": "2015-04-16T11:02:02+03:00",
            "hangup_time": null,
            "redirection": "REDIRECTED_TO_GROUP",
            "redirection_target": 101
          },
          {
            "callee": 101,
            "start_time": "2015-04-16T11:02:02+03:00",
            "answer_time": "2015-04-16T11:02:02+03:00",
            "hangup_time": "2015-04-16T11:04:44+03:00",
            "redirection": "CONNECTING_TO_GROUP",
            "origination": [
              {
                "destination": 1004,
                "start_time": "2015-04-16T11:02:02+03:00",
                "answer_time": "2015-04-16T11:02:02+03:00",
                "hangup_time": "2015-04-16T11:04:44+03:00",
                "result": "ANSWERED"
              },
              {
                "destination": 1008,
                "start_time": "2015-04-16T11:02:02+03:00",
                "answer_time": "2015-04-16T11:02:02+03:00",
                "hangup_time": "2015-04-16T11:04:44+03:00",
                "result": "LOSE_RACE"
              },
              {
                "destination": 1009,
                "start_time": "2015-04-16T11:02:02+03:00",
                "answer_time": "2015-04-16T11:02:02+03:00",
                "hangup_time": "2015-04-16T11:04:44+03:00",
                "result": "LOSE_RACE"
              },
              {
                "destination": 1015,
                "start_time": "2015-04-16T11:02:02+03:00",
                "answer_time": "2015-04-16T11:02:02+03:00",
                "hangup_time": "2015-04-16T11:04:44+03:00",
                "result": "LOSE_RACE"
              }
            ]
          }
        ]
      }
    }
```

### Filtreler

Arama kayıtlarını arayan ve aranan numaraya ve belli tarih aralığına göre filtreleyebilirsiniz

Filtreleme için kullanacağınız parametreler

* **caller_or_callee:** Parametre ile gönderilen numarayı arayan ve aranan numaraya göre filtreler (virgül ile ayırarak birden fazla numara sorgulanabilir)
* **caller:** Parametre ile gönderilen numarayı arayan numaraya göre filtreler (virgül ile ayırarak birden fazla numara sorgulanabilir)
* **callee:** Parametre ile gönderilen numarayı aranan numaraya göre filtreler (virgül ile ayırarak birden fazla numara sorgulanabilir)
* **limit:** Her sayfada gösterilecek kayıt sayısını belirtir.
* **order:** İstenilen fielda göre arama kayıtlarını sıralar. Ör: `&order=uuid,asc`
* **time_limit:** Zaman bazında filtreleme için kullanılır, alabileceği değerler:
    * **hour:** Son 1 saat içerisinde oluşturulan kayıtları gösterir
    * **day:** Son 24 saat içerisinde oluşturulan kayıtları gösterir
    * **month:** Son 1 ay içerisinde oluşturulan kayıtları gösterir

Zaman ve arama parametleri birlikte kullanılabilir.


#### Sabitler

Dönen json içerisindeki fieldlardaki değişken anlamları aşağıda verilmiştir.

* **bf_calltype:** Arama Tipi
      * **voice:** Telefon Araması
      * **fax:** Fax

* **hangup_cause:** Arama Sonlanma Sebebi
      * **NORMAL_CLEARING:** 'Normal'
      * **USER_BUSY:** 'Meşgul'
      * **NO_USER_RESPONSE:** 'Kullanıcı cevaplamadı.'
      * **NO_ANSWER:** 'Cevap Yok'
      * **CALL_REJECTED:** 'Arama Reddedildi'
      * **INVALID_NUMBER_FORMAT:** 'Yanlış numara formatı'
      * **ORIGINATOR_CANCEL:** 'Aramayı başlatan cevaplanmadan iptal ediyor.'
      * **LOSE_RACE:** 'Başkası açtı'
      * **ANSWERED:** 'Cevaplandı'

* **hangup_state:** Arama Sonlanma Durumu
      * **send_cancel:** 'Sistem tarafından iptal edilen çağrı'
      * **send_bye:** 'Sistem tarafından sonlandırılan çağrı'
      * **recv_refuse:** 'İstemci tarafından reddedilen çağrı'
      * **recv_cancel:** 'İstemci tarafından iptal edilen çağrı'
      * **send_refuse:** 'Sistem tarafından reddedilen çağrı'
      * **recv_bye:** 'İstemci tarafından sonlandırılan çağrı'

* **redirection:** Arama aktarım yönü
      * **REDIRECTED_TO_MENU:** Menüye aktarıldı
      * **REDIRECTED_TO_GROUP:** Gruba aktarıldı
      * **REDIRECTED_TO_EXTENSION:** Dahiliye Aktarıldı
      * **CONNECTING_TO_MENU:** Menüye Bağlanılıyor
      * **CONNECTING_TO_GROUP:** Gruba Bağlanılıyor
      * **CONNECTING_TO_EXTENSION:** Dahiliye Bağlanılıyor
      * **OTHER:** Diğer
* **call_record:** Arama Kaydı
      * **YES:** Var
      * **NO:** Yok
      * **REMOVED:** Silinmiş


### Dönen değerler

* **uuid:** Aramanın benzersiz id'si
* **bf_calltype:** Aramanın tipi (Ses veya Faks)
* **direction:** Aramanın yönü
* **caller:** Arayan Numara
* **callee:** Aranan Numara
* **extension:** Arayan Dahili (Sadece aramanın yönü dışarı doğru ise dönen sonuç içinde bulunur)
* **call_time:** Aramanın başladığı zaman damgası
* **answer_time:** Aramanın cevaplandığı zaman damgası
* **hangup_time:** Aramanın sonlandığı zaman damgası
* **call_price:** Arama ücreti (Sadece aramanın yönü dışarı doğru ise dönen sonuç içinde bulunur)
* **call_record:** Aramaya ait ses kaydının olup olmadığı
* **hangup_cause:** Arama Sonlanma Sebebi
* **hangup_state:** Arama Sonlanma Durumu
* **page:** Şu anki sayfa
* **total_count:** Toplam kayıt sayısı
* **total_pages:** Toplam sayfa sayısı
* **limit:** Sayfadaki maksimum kayıt sayısı
* **previous_page:** Önceki sayfa adresi
* **next_page:** Sonraki Sayfa Adresi
* **call_flow:** Gelen aramalardaki geçilen adımlar
    * **callee:** Aranan numara, menü, grup veya dahili
    * **redirection:** Aramanın aktarılma yönü
    * **redirection_target:** Aramanın aktarıldığı numara
    * **result:** Arama Sonucu

