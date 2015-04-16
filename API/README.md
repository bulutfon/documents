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
            access_token: "16a1094343d0271126f25124fda4159717e29e8ca87068389792dbb554d24385"
            token_type: "bearer"
            expires_in: 7200
            refresh_token: "551f3f26dab1afd712c183399c93fab7846cf582c907263c4a7892c7a12cd02c"
            created_at: 1429026419
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
                 "call_time":"16-04-2015 16:17",
                 "answer_time":null,
                 "hangup_time":"16-04-2015 16:17",
                 "call_record":"Yok",
                 "hangup_cause":"Aramayı başlatan cevaplanmadan iptal ediyor.",
                 "hangup_state":null
              },
              {
                 "uuid":"e0e02f46-e43a-11e4-b73b-17aee3ce4e7b",
                 "bf_calltype":"voice",
                 "direction":"LOCAL",
                 "caller":1005,
                 "callee":1006,
                 "call_time":"16-04-2015 16:17",
                 "answer_time":"16-04-2015 16:17",
                 "hangup_time":"16-04-2015 16:17",
                 "call_record":"Yok",
                 "hangup_cause":"Normal",
                 "hangup_state":"İstemci tarafından sonlandırılan çağrı"
              },
              {
                 "uuid":"78e057d6-e43a-11e4-b5d7-17aee3ce4e7b",
                 "bf_calltype":"voice",
                 "direction":"IN",
                 "caller":90532xxxxxxx,
                 "callee":90850885xxxx,
                 "call_time":"16-04-2015 16:14",
                 "answer_time":"16-04-2015 16:14",
                 "hangup_time":"16-04-2015 16:18",
                 "call_record":"Var",
                 "hangup_cause":"Normal",
                 "hangup_state":"Sistem tarafından sonlandırılan çağrı"
              },
              {
                 "uuid":"76a8a946-e43a-11e4-b5b4-17aee3ce4e7b",
                 "bf_calltype":"voice",
                 "direction":"IN",
                 "caller":90532xxxxxxx,
                 "callee":90850885xxxx,
                 "call_time":"16-04-2015 16:14",
                 "answer_time":"16-04-2015 16:14",
                 "hangup_time":"16-04-2015 16:14",
                 "call_record":"Yok",
                 "hangup_cause":"Normal",
                 "hangup_state":"İstemci tarafından sonlandırılan çağrı"
              },
              {
                 "uuid":"6930557a-e43a-11e4-b591-17aee3ce4e7b",
                 "bf_calltype":"voice",
                 "direction":"IN",
                 "caller":90532xxxxxxx,
                 "callee":90850885xxxx,
                 "call_time":"16-04-2015 16:13",
                 "answer_time":"16-04-2015 16:13",
                 "hangup_time":"16-04-2015 16:13",
                 "call_record":"Yok",
                 "hangup_cause":"Normal",
                 "hangup_state":"İstemci tarafından sonlandırılan çağrı"
              }
           ]
        }
    ```

### Arama Kaydı Detayı Örnek Sonuç

    ```json
        {
           "cdr":{
              "uuid":"dd3b3506-e40e-11e4-9880-17aee3ce4e7b",
              "bf_calltype":"voice",
              "direction":"IN",
              "caller":90507xxxxxxx,
              "callee":90850885xxxx,
              "call_time":"16-04-2015 11:02",
              "answer_time":"16-04-2015 11:02",
              "hangup_time":"16-04-2015 11:04",
              "call_record":"Var",
              "hangup_cause":"Normal",
              "hangup_state":"İstemci tarafından sonlandırılan çağrı",
              "call_flow":[
                 {
                    "callee":"90850885xxxx",
                    "start_time":"16/04/2015 - 11:02:02",
                    "answer_time":null,
                    "hangup_time":null,
                    "redirection":"Menüye Yönlendi - (10)"
                 },
                 {
                    "callee":"10",
                    "start_time":"16/04/2015 - 11:02:02",
                    "answer_time":"16/04/2015 - 11:02:02",
                    "hangup_time":null,
                    "redirection":"Menüye Yönlendi - (11)"
                 },
                 {
                    "callee":"11",
                    "start_time":"16/04/2015 - 11:02:02",
                    "answer_time":"16/04/2015 - 11:02:02",
                    "hangup_time":null,
                    "redirection":"Gruba Yönlendi - (101)"
                 },
                 {
                    "callee":"101",
                    "start_time":"16/04/2015 - 11:02:02",
                    "answer_time":"16/04/2015 - 11:02:02",
                    "hangup_time":"16/04/2015 - 11:04:44",
                    "redirection":"Gruba bağlanılıyor",
                    "origination":[
                       {
                          "destination":"1004",
                          "start_time":"16/04/2015 - 11:02:02",
                          "answer_time":"16/04/2015 - 11:02:02",
                          "hangup_time":"16/04/2015 - 11:04:44",
                          "result":"Cevapladı"
                       },
                       {
                          "destination":"1008",
                          "start_time":"16/04/2015 - 11:02:02",
                          "answer_time":"16/04/2015 - 11:02:02",
                          "hangup_time":"16/04/2015 - 11:04:44",
                          "result":"Başkası açtı"
                       },
                       {
                          "destination":"1009",
                          "start_time":"16/04/2015 - 11:02:02",
                          "answer_time":"16/04/2015 - 11:02:02",
                          "hangup_time":"16/04/2015 - 11:04:44",
                          "result":"Başkası açtı"
                       },
                       {
                          "destination":"1015",
                          "start_time":"16/04/2015 - 11:02:02",
                          "answer_time":"16/04/2015 - 11:02:02",
                          "hangup_time":"16/04/2015 - 11:04:44",
                          "result":"Başkası açtı"
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
