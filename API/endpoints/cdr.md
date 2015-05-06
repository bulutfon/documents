### CDR
=======

Arama kayıtları ile ilgili işlemleriniz için bu scope'a istek yapmanız gerekmektedir.

#### URL'ler
* `GET /cdrs.json` Santrale ait arama kayıtlarını geri döndürür
* `GET /cdrs/uuid.json` Arama Kaydının detayını döndürür

#### Arama Kaydı Örnek Sonuç

```json
    {
        "cdrs":[
            {
                "uuid":"f35d3f92-e43a-11e4-b7e6-17aee3ce4e7b",
                "bf_calltype":"voice",
                "direction":"LOCAL",
                "caller":1005,
                "callee":1006,
                "call_time":"2015-04-16T16:17:37+03:00",
                "answer_time":null,
                "hangup_time":"2015-04-16T16:17:46+03:00",
                "call_record":"NO",
                "hangup_cause":"ORIGINATOR_CANCEL",
                "hangup_state":null
            },
            {
                "uuid":"e0e02f46-e43a-11e4-b73b-17aee3ce4e7b",
                "bf_calltype":"voice",
                "direction":"LOCAL",
                "caller":1005,
                "callee":1006,
                "call_time": "2015-04-16T16:17:05+03:00",
                "answer_time": "2015-04-16T16:17:37+03:00",
                "hangup_time": "2015-04-16T16:17:46+03:00",
                "call_record":"NO",
                "hangup_cause":"NORMAL_CLEARING",
                "hangup_state":"recv_bye"
            },
            {
                "uuid":"78e057d6-e43a-11e4-b5d7-17aee3ce4e7b",
                "bf_calltype":"voice",
                "direction":"IN",
                "caller":905320000000,
                "callee":908508850000,
                "call_time": "2015-04-16T16:14:11+03:00",
                "answer_time": "2015-04-16T16:14:11+03:00",
                "hangup_time": "2015-04-16T16:18:12+03:00",
                "call_record":"YES",
                "hangup_cause":"NORMAL_CLEARING",
                "hangup_state":"send_refuse"
            },
            {
                "uuid":"6930557a-e43a-11e4-b591-17aee3ce4e7b",
                "bf_calltype":"voice",
                "direction":"IN",
                "caller":905320000000,
                "callee":908508850000,
                "call_time": "2015-04-16T16:14:11+03:00",
                "answer_time": "2015-04-16T16:14:11+03:00",
                "hangup_time": "2015-04-16T16:18:12+03:00",
                "call_record":"REMOVED",
                "hangup_cause":"NORMAL_CLEARING",
                "hangup_state":"send_refuse"
            }
        ]
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

* **caller_or_callee:** Parametre ile gönderilen numarayı arayan ve aranan numaraya göre filtreler
* **caller:** Parametre ile gönderilen numarayı arayan numaraya göre filtreler
* **callee:** Parametre ile gönderilen numarayı aranan numaraya göre filtreler
* **time_limit:** Zaman bazında filtreleme için kullanılır, alabileceği değerler:
    ** **hour:** Son 1 saat içerisinde oluşturulan kayıtları gösterir
    ** **day:** Son 24 saat içerisinde oluşturulan kayıtları gösterir
    ** **month:** Son 1 ay içerisinde oluşturulan kayıtları gösterir

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
