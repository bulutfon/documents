# Bulutfon API Dökümantasyonu

**Rest** mimarisinde tasarlanmış Bulutfon API'si, serilizasyon için **JSON**, doğrulama için **OAuth 2** kullanır.

## Kimlik Doğrulama ve Yetkilendirme

### Uygulama oluşturma

**[https://bulutfon.com](https://bulutfon.com)** adresindeki kullanıcı bilgileriniz ile panelinize giriş yaptıktan sonra. **Uygulamalar** menüsünün altında **API Uygulamaları > Yeni Uygulama Oluştur** diyerek forma uygulama adı ve token'ınızın döneceği callback url'i girip uygulamanızı oluşturun.

* Uygulama oluşturulduktan sonra, **Yetkilendir** butonuna basarak erişim izni verin.

* Bu işlemlerin ardından authorization kodunuz yönlendirme adresi olarak tanımladığınız url'e **code** parametresi ile gönderilecektir.

* Son olarak bu gelen değeri

    * client_id = Uygulama Anahtarı
    * client_secret = Gizli Anahtar
    * code = sistemden dönen authorization kodunuz
    * redirect_uri = Yönlendirme url'iniz
    * grant_type = authorization_code

    parametreleri ile **[https://bulutfon.com/oauth/token](https://bulutfon.com/oauth/token)** adresine **POST** edin.
* Sonuç olarak size aşağıdaki gibi bir access token dönecektir.

    ```json
        {
            "access_token": "16a1094343d0271126f25124fda4159717e29e8ca87068389792dbb554d24385"
            "token_type": "bearer"
            "expires_in": 7200
            "refresh_token": "551f3f26dab1afd712c183399c93fab7846cf582c907263c4a7892c7a12cd02c"
            "created_at": 1429026419
        }
    ```

Bu access_token'ı api'yi kullanırken her isteğe eklemeniz gerekmektedir. Token'ın geçerlilik süresi 2 saattir. 2 saat sonra refresh_token'ı kullanarak
tokenınızı yenileyebilirsiniz.

* Bunun için

    * client_id = Uygulama Anahtarı
    * client_secret = Gizli Anahtar
    * refresh_token = Size dönen json'daki refresh_token değeri
    * redirect_uri = Yönlendirme url'iniz
    * grant_type = refresh_token

    parametreleri ile **[https://bulutfon.com/oauth/token](https://bulutfon.com/oauth/token)** adresine **POST** edin.

Tokenınızı aldıktan sonra **[https://api.bulutfon.com](https://api.bulutfon.com)** adresinden yapacağınız isteklere **access_token** parametresi ile bu tokenı ekleyerek
istek yapmanız gerekmektedir.


## Scope'lar

### CDR
Arama kayıtları ile ilgili işlemleriniz için bu scope'a istek yapmanız gerekmektedir.

### URL'ler
* `GET /cdr.json` Santrale ait arama kayıtlarını geri döndürür
* `GET /cdr/uuid.json` Arama Kaydının detayını döndürür

### Arama Kaydı Örnek Sonuç

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

### Arama Kaydı Detayı Örnek Sonuç

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
        "call_record": "Var",
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

## Sadece JSON Desteği
## İstek Limitleri

[429 Too Many Requests](http://tools.ietf.org/html/draft-nottingham-http-new-status-02#section-4)

## HTTP Statü Kodları
## Bölümler & Kapsamlar

* CDR (Call Detail Records) - Arama Kayıtları
* Records - Görüşme Ses Dosyaları

## Katkı Sağlayın
